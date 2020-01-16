<?php
include 'database/dbdefine.php';

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $checkquery = $dbh->prepare("SELECT username FROM users WHERE username=:username");
    $username = 'root';
    $checkquery->execute(array(':username' => $username));
 //   $result = $checkquery->fetch(PDO::FETCH_ASSOC);
    $result = $checkquery->fetch();
    echo $result['username']."\n";
    print_r($result);
    //$checkquery->closeCursor();
} catch (PDOException $e) {
    echo "ERROR: ".$e->getMessage();
}

?>