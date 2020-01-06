<?php
session_start();
//il faut savoir verifier chaque variable 
// htmlspecialchar
// if $passwd = null; isset($passwd) = 0; $passwd is not set and passwd is empty
// if $passwd = "", isset($passwd) = 1; $passwd is set but passwd is empty
// if the fied is filled with 0, it is considered as empty
$username = htmlspecialchars(trim($_POST['username']));
$email    = htmlspecialchars(trim($_POST['email']));
$passwd   = htmlspecialchars(trim($_POST['passwd']));
$specara  = 
$_SESSION['error'] = null;

if(!isset($username) || !isset($email) || !isset($passwd) || empty($username) || empty($email) || empty($passwd) )
    $_SESSION['error'] = "All the fields must be filled";
else{
    if(strlen($username) > 20 || strlen($username) < 3)
        $_SESSION['error'] = "the username should have more than 2 letters and less than 20 letters";
    else if(preg_match('/[\W]+/', $username))
        $_SESSION['error'] = "the username should contain only letters,numbers or underscore";
    else
        $_SESSION['username'] = $username;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $_SESSION['error'] = "Please enter a valide email adresse.";
    else
        $_SESSION['email'] = $email;
    if(strlen($passwd) < 5 || strlen($passwd) > 20)
        $_SESSION['error'] = "Choice a passwd which contains 5 to 20 letter or numbers";
    else if(preg_match('/[\W]+/', $passwd))
        $_SESSION['error'] = "the passwd should contain only letters,numbers or underscore";
    else
        $_SESSION['passwd'] = $passwd;
}



//function signup($email, $username, $passwd, $host) {
//    $email = strtolower($email);
//}

header('Location: ../signUpFront.php');

?>