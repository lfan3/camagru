<?php
session_start();
include '../config/database.php';
include '../database/montage.php';

$gid = $_POST['gid'];

if(!empty($gid)){
    $gc = new Gallery($DB_DSN,$DB_USER,$DB_PASSWORD);
    $gc->delete_photo($gid);
    echo "ok";
}
else{
    echo "error";
}
