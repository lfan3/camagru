<?php
session_start();

include_once '../database/dbupdate.php';

$username = htmlspecialchars(trim($_POST['username']));
$email    = htmlspecialchars(trim($_POST['email']));

if(isset($username) && isset($email) && !empty($username) && !empty($email)){
    passwdmail($username, $email);
    echo "the confirmation email is already sended to your email.";
}
else
    $_SESSION['error'] = "All Fields must be filled !";
?>
