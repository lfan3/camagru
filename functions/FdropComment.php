<?php
session_start();
include '../config/database.php';
include '../database/comment.php';
/**************************** add comment *************************** */
$text = htmlspecialchars($_POST['comment']);
$gid =$_POST['gid'];
$userId = $_SESSION['id'];

if(isset($text) && !empty($text) && !empty($gid) & !empty($userId)){
    $gc = new Comment($DB_DSN,$DB_USER,$DB_PASSWORD);
    $gc->drop_comment($userId, $text, $gid);
}

echo $text . " " . $gid . " " . $userId;