<?php

include_once '../database/dpupdate.php';

$passwd = htmlspecialchars(trim($_POST['passwd']));
$confpass = htmlspecialchars(trim($_POST['confpass']));

if(isset($username) && isset($email) && !empty($username) && !empty($email))
    passwdmail($username, $email);
else
    $_SESSION['error'] = "All Fields must be filled !";
?>

