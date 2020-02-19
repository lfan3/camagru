<?php

//recuperer les informations from form and send it to database camagru,
//0 we need also to check wether the user is already created.
//if user is not created:
    //1 update the username email hash(pass)
    //2 create the random as tocken(this tocken will be then sendby the email and wait be confirmed by verifnuser.php)
//the methodes to create a tocken : md5, rand, uniqid():
//  md5(microtime(TRUE)*100000);
//  uniqid(rand(), true);


function newuser($username, $email, $passwd){
    //you must put the include inside de fonction, otherwise, it will not work
    include_once '../config/database.php';
    include_once '../functions/emailContent.php';
    $email = strtolower($email);
    //update user table
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //check if the user is already existed
        $query = $dbc->prepare("SELECT username, email FROM users WHERE username = :username OR email = :email");
        $query->execute(array(':username'=>$username, ':email'=>$email));
        if($query->fetch()){
            $_SESSION['error'] = "User existed already";
            $query->closeCursor();
            return;
        };
        if(!$_SESSION['error']){
            $_SESSION['toconf'] = "Check your mail and confirm the inscription";
        }

        $query->closeCursor();

        $passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $tocken = uniqid(rand(), true);
        $date = date_create("",timezone_open("Europe/Paris"));
        $date = date_format($date,"Y/m/d");

        sendenumail($email, $username, $tocken);
        $query = "INSERT INTO users(username, email, passwd, token, creationdate)
                  VALUES (:username, :email, :passwd, :tocken, :creationdate)";
        $rp = $dbc->prepare($query);
        $rp ->bindParam(':username', $username);
        $rp ->bindParam(':email', $email);
        $rp ->bindParam(':passwd', $passwd);
        $rp ->bindParam(':tocken', $tocken);
        $rp ->bindParam(':creationdate', $date);
        $rp ->execute();

    }catch (PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
}

//update new token to a user who forget their password
function passwdmail($username, $email){
    //you must put the include inside de fonction, otherwise, it will not work
    include_once '../config/database.php';
    include_once '../functions/emailContent.php';
    $email = strtolower($email);   
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //check if the user is already existed       
        $query = $dbc->prepare("SELECT id, username, email FROM users WHERE username = '$username' AND email = '$email'");
        $query->execute();
        $rq = $query->fetch(PDO::FETCH_ASSOC);
        //$rq = Array ( [id] => 38 [username] => root [email] => linlinfan21@gmail.com )
        if($rq){
            $id = $rq['id'];
            $token = uniqid(rand(), true);
            $query->closeCursor();
            $mysql = "UPDATE users SET token = '$token' WHERE username = '$username' AND email = '$email'";
            $updatetoken = $dbc->prepare($mysql);
            $updatetoken->execute();
        }else{
           
            $_SESSION['error'] = "The information is not correct";
            return;
        };
        sendfpmail($email, $id, $token);
    }catch (PDOException $e){
        echo "ERROR0: " . $e->getMessage();
    }
}
//forget password, after the link of email
function updatePassTokenT($passwd, $confpass, $id)
{
    include_once '../config/database.php';
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if($passwd === $confpass){
                $passwd = password_hash($passwd, PASSWORD_DEFAULT);
                $token = uniqid(rand(), true);
                $mysql = "UPDATE users SET passwd = '$passwd', token = '$token' WHERE id = '$id'";
                $query = $dbc->prepare($mysql);
                $query->execute();
                ?>

                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <link rel="stylesheet" href = "../front/css/style.css">
                    <style>
                    .wrap{
                        background-color:#1abc9c;
                    }
                    a{
                        color:unset;
                        text-transform : lowercase;
                    }
                    </style>
                </head>
                <body> 
                    <h1>Camagru APP</h1>
                    <div class="wrap --rtn">
                        <?php echo "<p style='color:#f0d1c5; text-align:center; font-size : 2em; position:relative; top:12em'>your password is updated</p>"; ?>
                        <?php echo "<p style='color:#f0d1c5; text-align:center; font-size : 1.5em; position:relative; top:15em'><a href= ../index.php> I go to login in </a></p>"; ?>
                    
                    </div>
                </body>
                </html>

                <?php
                             
        }else{
            echo "the Two passwords are not the same";
        }      
    }catch (PDOException $e){
        echo "ERROR2: " . $e->getMessage();
    }   
}

function updatePassToken($passwd, $confpass, $id)
{
    include_once '../config/database.php';
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
       
        $passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $token = uniqid(rand(), true);
        $mysql = "UPDATE users SET passwd = '$passwd', token = '$token' WHERE id = '$id'";
        $query = $dbc->prepare($mysql);
        $query->execute();
                             
    }catch (PDOException $e){
        echo "ERROR2: " . $e->getMessage();
    }   
}
?>