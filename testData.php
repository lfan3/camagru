<?php
$DB_DSN = "mysql:host=localhost";
$DB_USER = "root";
$DB_PASSWORD = "roooot";

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE lol";
    $dbh->exec($sql);
    echo "Database created successfully<br>";
} catch (PDOException $e) {
    echo "ERROR: ".$e->getMessage();
}

?>