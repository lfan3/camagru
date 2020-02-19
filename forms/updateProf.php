<?php
session_start();
//il faut savoir verifier chaque variable 
// htmlspecialchar
// if $passwd = null; isset($passwd) = 0; $passwd is not set and passwd is empty
// if $passwd = "", isset($passwd) = 1; $passwd is set but passwd is empty
// if the fied is filled with 0, it is considered as empty
include '../database/users.php';


//chosse the radio, show on, otherwise off
$pref_option = $_POST['pref'];
$pref = strpos($pref_option, "not");

$id = $_SESSION['id'];
$_SESSION['error'] = null;
//if user set preference, update her preference data

if($pref == 5){
    $db = new Users($DB_DSN,$DB_USER,$DB_PASSWORD);
    $db->update_user_preference_p($id);
}
else if($pref == 22){
    $db = new Users($DB_DSN,$DB_USER,$DB_PASSWORD);
    $db->update_user_preference_n($id);
}

if(!empty($_POST['username']))
    $username = htmlspecialchars(trim($_POST['username']));
else
    $username = $_SESSION['username'];

if(!empty($_POST['email']))
    $email = htmlspecialchars(trim($_POST['email']));
else
    $email = $_SESSION['email'];

if(!empty($_POST['passwd']) && !empty($_POST['confpass'])){
    $passwd  = htmlspecialchars(trim($_POST['passwd']));
    $confpass = htmlspecialchars(trim($_POST['confpass']));
}else{
    $passwd = -1;
}


if(strlen($username) > 20 || strlen($username) < 3)
    $_SESSION['error'] = "the username should have more than 2 letters and less than 20 letters";
else if(preg_match('/[\W]+/', $username))
    $_SESSION['error'] = "the username should contain only letters,numbers or underscore";
else
    $_SESSION['username'] = $username;
if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    $_SESSION['error'] = "Please enter a valide email adresse.";
else{
    $_SESSION['email'] = $email;
}
$db = new Users($DB_DSN,$DB_USER,$DB_PASSWORD);
if($passwd != -1){
    if(strlen($passwd) < 5 || strlen($passwd) > 20)
    $_SESSION['error'] = "Choice a passwd which contains 5 to 20 letter or numbers";
    else if(preg_match('/[\W]+/', $passwd))
    $_SESSION['error'] = "the passwd should contain only letters,numbers or underscore";
    else{
        if($passwd === $confpass){
            $_SESSION['passwd'] = $passwd;
            $_SESSION['toconf'] = "Check your mail and confirm the inscription";
        }else{
            $_SESSION['error'] = "the passwords are not the same";
            $_SESSION['passwd'] = null;
        }
    }
    $db->update_info($id, $username, $email, $passwd);
}
else{
    $db->update_info_sans_pass($id, $username, $email);
}

header("Location: ../front/profile.php?GET=notif");

?>
