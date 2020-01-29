<?php
session_start();
include '../config/database.php';
include '../database/comment.php';
/**************************** add comment *************************** */
$text = htmlspecialchars($_POST['comment']);
$gid =$_POST['gid'];;
$userId = $_SESSION['id'];

if(isset($text) && !empty($text)){
    $gc = new Comment($DB_DSN,$DB_USER,$DB_PASSWORD);
    $gc->add_comment(38, $text, $gid);
}
echo $text;
echo $gid;
?>