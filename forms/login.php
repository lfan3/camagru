<?php
session_start();
//il faut savoir verifier chaque variable 
// htmlspecialchar
// if $passwd = null; isset($passwd) = 0; $passwd is not set and passwd is empty
// if $passwd = "", isset($passwd) = 1; $passwd is set but passwd is empty
// if the fied is filled with 0, it is considered as empty
include_once '../functions/loginVerif.php';
$username = htmlspecialchars(trim($_POST['username']));
$email    = htmlspecialchars(trim($_POST['email']));
$passwd   = htmlspecialchars(trim($_POST['passwd']));
$confpass = htmlspecialchars(trim($_POST['confpass']));
$_SESSION['error'] = null;


if(!isset($username) || !isset($email) || !isset($passwd) || empty($username) || empty($email) || empty($passwd) )
    $_SESSION['loginError'] = "All the fields must be filled";
else{   
    $data = loginVerif($username, $passwd, $email);
    if(!$data['id'])
        $_SESSION['loginError'] = "the informations are not correct!" ;
    else{
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['id'] = $data['id'];
        if($_SESSION['loginError'])
            $_SESSION['loginError'] = null;
    }

}

header('Location: ../index.php');

