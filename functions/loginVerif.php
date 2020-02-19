<?php

function loginVerif($username, $passwd, $email){
    include_once '../config/database.php';
    $email = strtolower($email);
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $mysql = "SELECT id, username, email, passwd, verified FROM users
                  WHERE username = '$username' AND email = '$email'";
        $query = $dbc->prepare($mysql);
        $query->execute();
        $r = $query->fetch(PDO::FETCH_ASSOC);
        if($r){
            $pass_hash = $r['passwd'];
            $verified = $r['verified'];
            if (password_verify($passwd, $pass_hash) && $verified)
                return $r;
            else if(!$verified && password_verify($passwd, $pass_hash)){
                $_SESSION['error'] = "you need to confirm the inscription per email";
            }
            else{
                $_SESSION['error'] = "The password is not correct, please retry";
            }
        }else{
            $_SESSION['error'] = "The information is not correct, please retry";
        } 
    }catch (PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
}

?>