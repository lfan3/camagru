<?php
include_once("../database/montage.php");
include_once("../config/database.php");
$gc = new Gallery($DB_DSN,$DB_USER,$DB_PASSWORD);
$allmontages = $gc->get_all_gallery();
echo json_encode($allmontages);
/*
function getSnapShot($userId, $imgPath) {
    include_once '../config/database.php';
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbc->prepare("INSERT INTO gallery (userid, img) VALUE (:userid, :img)");
        $query->bindParam(':userid', $userId);
        $query->bindParam(':img', $imgPath);
        $query->execute();
    }catch(PDOException $e){
        echo "ERRORM: ". $e->getMesssage();
    }
}*/
?>