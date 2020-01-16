<?php
//this page is opened from new user's email
//we need to verify the token
//if token is ok
//succesfulled signed in
//otherwise not good.

$username = $_GET['user'];
$token = $_GET['token'];
$passwd = $_POST['passwd'];
$confpass =  $_POST['confpass'];

include_once '../config/database.php.php';
if (!$passwd){   
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //check if the user is already existed
        $query = $dbc->prepare(
            "SELECT username, token, verified 
             FROM users 
             WHERE username = :username AND token = :token");
        $query->execute(array(':username'=>$username, ':token'=>$token));
        $rqi = $query->fetch(PDO::FETCH_ASSOC);
        if(!$rqi){ ?>
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
            </head>
            <body> 
                <form name='changePassForm' method="POST" action=".">
                <label> password: </label>
                <input type="password" id="passwd" name="passwd"><br />
                <label> confirm password: </label>
                <input type="password" id="confpass" name="confpass"><br />
            </body>
        <?php }
        else{
            return 1;
        };
    }catch (PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }   
}
else{
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //check if the user is already existed
        $query = $dbc->prepare(
            "SELECT username, token, verified 
             FROM users 
             WHERE username = :username AND token = :token");
        $query->execute(array(':username'=>$username, ':token'=>$token));
        $rqi = $query->fetch(PDO::FETCH_ASSOC);
        if($passwd === $confpass){
            if($rqi){ 
                $query->closeCursor();
                $mysql = "UPDATE users SET passwd = '$passwd' WHERE username = '$username' AND token = '$token'";
                echo "<p>you pass is updated</p>";
                echo "<a href= ../front/index.php> go back login in </a>";
               
            }else
                return -1;
        }else{
            echo "the Two passwords are not the same";
        }
       
    }catch (PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }   
}


?>