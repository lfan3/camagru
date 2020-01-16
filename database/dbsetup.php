<?php
include '../config/database.php';

//create a database;
try {
    $dbc = new PDO($DB_DSN_S, $DB_USER, $DB_PASSWORD);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "CREATE DATABASE IF NOT EXISTS $DB_NAME";
    $dbc->exec($query);
    echo "camagru database is created\n";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}

// create table user
try {
    $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "CREATE TABLE IF NOT EXISTS users(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(25) NOT NULL,
        email VARCHAR(60) NOT NULL,
        passwd VARCHAR(255) NOT NULL,
        token VARCHAR(100) NOT NULL,
        verified INT NOT NULL DEFAULT 0,
        creationdate VARCHAR(20) NOT NULL
        )";
    $dbc->exec($query);
    echo "the user table is created\n";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}

// create table gallery
try{
    $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "CREATE TABLE IF NOT EXISTS gallery(
            id INT NOT NULL AUTO_INCREMENT,
            userid INT NOT NULL,
            img VARCHAR(255),
            PRIMARY KEY(id),
            FOREIGN KEY(userid) REFERENCES users(id)
            ON UPDATE CASCADE
            ON DELETE CASCADE
            )";
    $dbc->exec($query);
    echo "gallery table is created";
} catch (PDOException $e){
    echo $query . "<br>" . $e->getMessage();
}

// careate table commentary and like
try{
    $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "CREATE TABLE IF NOT EXISTS commentary(
        id INT NOT NULL AUTO_INCREMENT,
        userid INT NOT NULL,
        gid INT NOT NULL,
        commentary VARCHAR(500),
        i_like   BOOLEAN NOT NULL DEFAULT 0,
        PRIMARY KEY (id),
        FOREIGN KEY (userid) REFERENCES users(id),
        FOREIGN KEY (gid) REFERENCES gallery(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
    )";
    $dbc->exec($query);
    echo "commentaray is created";
} catch (PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
?>