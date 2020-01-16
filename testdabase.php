<?php
include 'database/dbdefine.php';
try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $tocken = uniqid(rand(), true);
        $date = date_create("",timezone_open("Europe/Paris"));
        $date = date_format($date,"Y/m/d");
        echo "into hiere";
        $query = "
                  INSERT INTO users(username, email, passwd, token, verified, creationdate)
                  VALUES ('ok', 'okfad', 'fasdf', 'fasdfafd', 1, '1990')";
        $dbc->exec($query);
        echo "user table updated, new user is been added\n";
    }catch (PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }

?>