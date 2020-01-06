<?php
$DB_NAME = "camagru";
$DB_DSN = "mysql:host=localhost;database=".$DB_NAME;
$DB_DSN_S = "mysql:host=localhost";
$DB_USER = "root";
$DB_PASSWORD = "roooot";

//create a database;
try {
    $dbh = new PDO($DB_DSN_S, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $new_db = "CREATE TABLE "
    echo "connection reussit";
} catch (PDOException $e) {
    echo "ERROR: ".$e->getMessage();
}
?>