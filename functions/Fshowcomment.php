<?php

include_once("../database/comment.php");
include_once("../config/database.php");

$gid = $_GET['gid'];

if(isset($gid) && !empty($gid)){
    $gc = new Comment($DB_DSN,$DB_USER,$DB_PASSWORD);
    $tabcom = $gc->get_comment_from_img($gid);

    echo json_encode($tabcom);
}

?>