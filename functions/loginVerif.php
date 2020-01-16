<?php

function loginVerif($username, $passwd, $email){
    include_once '../config/database.php.php';
    $email = strtolower($email);
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $mysql = "SELECT id, username, email, passwd FROM users
                  WHERE username = '$username' AND email = '$email'";
        $query = $dbc->prepare($mysql);
        $query->execute();
        $r = $query->fetch(PDO::FETCH_ASSOC);
        if($r){
            $pass_hash = $r['passwd'];
            if (password_verify($passwd, $pass_hash))
                return $r;
            else
                $_SESSION['error'] = "The password is not correct, please retry";
        }else{
            $_SESSION['error'] = "The information is not correct, please retry";
        } 
    }catch (PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
}

?>