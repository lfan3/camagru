<?php
include_once("../database/like.php");
include_once("../database/comment.php");
include_once("../config/database.php");

$gid = $_GET['gid'];

if(isset($gid) && !empty($gid)){
    $gc = new Like($DB_DSN,$DB_USER,$DB_PASSWORD);
    $nb = $gc->get_likes_per_img($gid);
    echo $nb;
}
//$bc = new Comment($DB_DSN,$DB_USER,$DB_PASSWORD);
//$bc->add_comment(38, $nb, $gid);