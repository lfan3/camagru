<?php
session_start();

$userId = $_SESSION['id'];
include_once("../database/montage.php");
include_once("../config/database.php");
$gc = new Gallery($DB_DSN,$DB_USER,$DB_PASSWORD);
$usermontages = $gc->get_user_gallery($userId);
echo json_encode($usermontages);
?>
