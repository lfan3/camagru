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
    include_once '../functions/emailfunction.php';
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
function updatePassToken($passwd, $confpass)
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
                echo "<p>you pass is updated</p>";
                echo "<a href= ../front/index.php> go back login in </a>";               
        }else{
            echo "the Two passwords are not the same";
        }      
    }catch (PDOException $e){
        echo "ERROR2: " . $e->getMessage();
    }   
}
?>