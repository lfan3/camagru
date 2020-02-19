<?php
session_start();
include '../config/database.php';
include '../database/comment.php';
include '../database/montage.php';
include '../database/users.php';
include 'emailContent.php';
/**************************** add comment *************************** */
$text = htmlspecialchars($_POST['comment']);
$gid =$_POST['gid'];
$userId = $_SESSION['id'];
$des = $_POST['mina'];
$_SESSION['notMem'] = null;

if(!empty($gid)){
    $gal_db = new Gallery($DB_DSN,$DB_USER,$DB_PASSWORD);
    $authorID = $gal_db->get_photo_author($gid);
    $author_db = new Users($DB_DSN,$DB_USER,$DB_PASSWORD);
    $pref = $author_db->get_user_preference($authorID);
    $email = $author_db->get_user_email($authorID);
}
if(!isset($pref) || !$pref){
    if(isset($text) && !empty($text) && !empty($gid) && !empty($userId) &&!empty($email)){
        $gc = new Comment($DB_DSN,$DB_USER,$DB_PASSWORD);
        $gc->add_comment($userId, $text, $gid);
        $userName =  $author_db->get_user_name($userId);
        sendCommentNotif($email, $userName);
    }
}

if($des === "gall"){
    header("location: ../front/gallery.php");
}
else
    header("location: ../front/member.php");

?>