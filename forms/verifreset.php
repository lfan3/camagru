<?php
session_start();

$passwd = $_POST['passwd'];
$confpass =  $_POST['confpass'];
$id = $_GET['id'];
$token = $_GET['token'];
$_SESSION['error'] = null;

function updateNewPass(){
    include_once '../database/dbupdate.php';
    global $passwd;
    global $confpass;
    global $id;
    global $token;

    if( !isset($passwd) || empty($passwd) || !isset($confpass) || empty($confpass)  )
        $_SESSION['error'] = "All the fields must be filled";
    else{
        if(strlen($passwd) < 5 || strlen($passwd) > 20)
            $_SESSION['error'] = "Choice a passwd which contains 5 to 20 letter and numbers";
        else if(!(preg_match('/[A-Za-z]/', $passwd) && preg_match('/[0-9]/', $passwd)))
            $_SESSION['error'] = "Choice a passwd which contains both letter and numbers";
        else if(preg_match('/[\W]+/', $passwd))
            $_SESSION['error'] = "the passwd should contain only letters and numbers or underscore";
        else if ($passwd !== $confpass)
            $_SESSION['error'] = "the both passwd are not the same";
    }
    if($_SESSION['error'])
        header("location: ../front/updateNewPassFromEmail.php?id=$id&token=$token");
    else
        updatePassTokenT($passwd, $confpass, $id);            

}

updateNewPass();
?>
