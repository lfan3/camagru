<?php
//this page is opened from new user's email
//we need to verify the token
//if token is ok
//succesfulled signed in
//otherwise not good.

$id = $_GET['id'];
$token = $_GET['token'];
$passwd = $_POST['passwd'];
$confpass =  $_POST['confpass'];

function checkUsedEmailLink()
{
    include_once '../config/database.php.php';
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        //check if the link is already been used
        $query = $dbc->prepare(
            "SELECT id, token
            FROM users 
            WHERE id = :id AND token = :token");
        $query->execute(array(':id'=>$id, ':token'=>$token));
        $rqi = $query->fetch(PDO::FETCH_ASSOC);
        if(!$rqi)
        {
            $query->closeCursor();
            echo  "this confirmation link has already been used";
            return;
        }else{ 
            $query->closeCursor(); ?>
            <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                </head>
                <body> 
                    <form name='changePassForm' method="POST" action="#">
                    <label> password: </label>
                    <input type="password" id="passwd" name="passwd"><br />
                    <label> confirm password: </label>
                    <input type="password" id="confpass" name="confpass"><br />
                    <input type="submit" value="change password">
                </body>
                </html>
            <?php }
    }catch (PDOException $e){
        echo "ERROR1: " . $e->getMessage();
    }
}

function updateNewPass(){
    include_once '../database/dbupdate.php';
    if(!$passwd)
        checkUsedEmailLink();
    else
        updatePassToken($passwd, $confpass);
}

updateNewPass();


?>