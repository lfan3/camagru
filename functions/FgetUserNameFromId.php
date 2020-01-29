<?php

include_once("../database/users.php");
include_once("../config/database.php");

$userId = $_GET['userId'];

if(isset($userId) && !empty($userId)){
    $gc = new Users($DB_DSN,$DB_USER,$DB_PASSWORD);
    $name = $gc->get_user_name($userId);
    echo $name;
}

?>

 