<?php
session_start();
/*********************************stock photo dans local ****************************** */
include '../config/database.php';
include '../database/montage.php';

define('UPLOAD_DIR', '../images/');
$file = UPLOAD_DIR . uniqid() . '.png';
$photo = $_POST['photo'];
$filter = json_decode($_POST['filter']);
$imgAbPos = json_decode($_POST['imgAbPos']);

$photo = str_replace('data:image/png;base64,', '', $photo);
$photo = str_replace(' ', '+', $photo);
$decode = base64_decode($photo);
$success = file_put_contents($file, $decode);

//bug bizzar !!!
//$im = imagecreatefromstring($decode, TRUE);
//imagepng($im, $file, 0);

/******************************* montage and create the final snapshot *********** */
if($success){
    $i = 0;
    $fn = count($filter);

    $kx = $filter[0] . "_x";
    $test = $imgAbPos->$kx + ' ';
    $userId = $_SESSION['id'];
 
    while($i<$fn){
        $name = $filter[$i] . ".png";
        $filters[$i] = imagecreatefrompng('../filters/'.$name);
        $kx = $filter[$i] . "_x";
        $ky = $filter[$i] . "_y";
        $fpos_x[$i] = ($imgAbPos->$kx);
        $fpos_y[$i] = ($imgAbPos->$ky);
        $i++;
    }   
    // Création de l'image principale/background
    $im = imagecreatetruecolor(500, 375);
    $bkm = imagecreatefrompng($file);  
    imagesetbrush($im, $bkm);
    imageline($im, 250, 187, 250, 187, IMG_COLOR_BRUSHED);
    $i = 0;
    while($i<$fn){
        imagesetbrush($im, $filters[$i]);
        $fx = $fpos_x[$i] + 32;
        $fy = $fpos_y[$i] + 32;
        imageline($im, $fx, $fy, $fx, $fy, IMG_COLOR_BRUSHED);
        $i++;
    }
    define('SNAP_DIR', '../snapshots/');
    $snapshot = SNAP_DIR . uniqid() . '.png';
    echo $snapshot;
//    file_put_contents("../lastPhotoRecord.txt", $snapshot);
    imagepng($im, $snapshot);
//    add_montage($_SESSION['id'], $snapshot);
    $gallery = new Gallery($DB_DSN,$DB_USER,$DB_PASSWORD);
    $gallery->add_montage($userId, $snapshot);
}
// Affichage de l'image au navigateur
//header('Content-type: image/png');
//imagepng($im);
//imagedestroy($im);
//imagedestroy($php);

//header("Location: ../test.php"); ????



?>