<?php
session_start();
include '../config/database.php';
include '../database/like.php';
/**************************** add comment *************************** */
$gid =$_POST['gid'];
$userId = $_SESSION['id'];

if(!empty($gid) & !empty($userId)){
    $gc = new Like($DB_DSN,$DB_USER,$DB_PASSWORD);
    $gc->drop_like($userId, $gid);
}

echo $gid . " " . $userId;