<?php

function add_montage($userId, $imgPath) {
    include_once '../setup/database.php';
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, POD::ERRMODE_EXCEPTION);
        $query = $dbc->prepare("INSERT INTO gallery (userid, img) VALUE (:userid, :img)");
        $query->bindParam(':userid', $userId);
        $query->bindParam(':img', $imgPath);
        $query->execute();
    }catch(PDOException $e){
        echo "ERRORM: ". $e->getMesssage();
    }
}

//get all images from galery table
function get_all_montage(){
    include_once '../config/database.php';
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
        $query = $dbc->prepare("SELECT userId, img FROM gallery");
        $query->execute();

        $i = 0;
        $tab = null;
        while($val = $query->fetch()){
            $tab[i] = $val;
            $i++;
        }
        $query->closeCursor();
        return($tab);
    }catch(PDOException $e){
        return($e->getMessage());
    }
}