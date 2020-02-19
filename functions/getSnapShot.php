<?php
include_once("../database/montage.php");
include_once("../config/database.php");
$gc = new Gallery($DB_DSN,$DB_USER,$DB_PASSWORD);
$allmontages = $gc->get_all_gallery();
echo json_encode($allmontages);

?>