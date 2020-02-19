<?php
session_start();
include_once("../database/like.php");
include_once("../config/database.php");

$userId = $_SESSION['id'];

$gid = $_POST['gid'];
$gc = new Like($DB_DSN,$DB_USER,$DB_PASSWORD);
$vef = $gc->check_before_add($userId, $gid);
if($vef)
    $gc->add_like($userId, $gid);
else
    echo "liked";

?>

