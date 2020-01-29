<?php
include '../config/database.php';

Class DBConnection {
    private $server;
    private $user;
    private $passwd;
    protected $connex;

    public function __construct($server, $user, $passwd){
        $this->server = $server;
        $this->user = $user;
        $this->passwd = $passwd;
    } 
    public function openConnection(){
        try {
            $this->connex = new PDO($this->server, $this->user, $this->passwd);
            $this->connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connex;
        } catch (PDOException $e) {
            echo "DBConnextion Error " . $e->getMessage();
        }
    }
    public function closeConnextion(){
        $this->connex = null;
    }
}

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
    $datab = new DBConnection($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbc = $datab->openConnection();
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
    $datab->closeConnextion();
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}

// create table gallery
try{
    $datab = new DBConnection($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbc = $datab->openConnection();
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
    $datab->closeConnextion();
} catch (PDOException $e){
    echo $query . "<br>" . $e->getMessage();
}

// careate table comment 
try{
    $datab = new DBConnection($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbc = $datab->openConnection();
    $query = "CREATE TABLE IF NOT EXISTS comment(
        id INT NOT NULL AUTO_INCREMENT,
        userid INT NOT NULL,
        gid INT NOT NULL,
        comment VARCHAR(500),
        PRIMARY KEY (id),
        FOREIGN KEY (userid) REFERENCES users(id),
        FOREIGN KEY (gid) REFERENCES gallery(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
    )";
    $dbc->exec($query);
    echo "comment table is created";
    $datab->closeConnextion();
} catch (PDOException $e){
    echo "ERROR: " . $e->getMessage();
}

// create like talbe
try{
    $datab = new DBConnection($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbc = $datab->openConnection();
    $query = "CREATE TABLE IF NOT EXISTS liketable(
        id INT NOT NULL AUTO_INCREMENT,
        userid INT NOT NULL,
        gid INT NOT NULL,
        i_like   BOOLEAN NOT NULL DEFAULT 0,
        PRIMARY KEY (id),
        FOREIGN KEY (userid) REFERENCES users(id),
        FOREIGN KEY (gid) REFERENCES gallery(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
    )";
    $dbc->exec($query);
    echo "liketable is created";
    $datab->closeConnextion();
} catch (PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
?>