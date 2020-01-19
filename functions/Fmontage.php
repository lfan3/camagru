<?php
// i need to get the photo and filter
// 1) first i stock the photo into local fichier
// 2) i send the photoPath to database and the filter path
// 3) need to create another php to coller the two images from database together
// and then send to client

/*********************************stock image dans local ****************************** */
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
if($success){
    $i = 0;
    $fn = count($filter);
    while($i<$fn){
        $name = $filter[$i] . "png";
        $filters[$i] = imagecreatefrompng('../filters/'.$fn);
        $kx = $filter[$i] . "_x";
        $test = $imgAbPos
    }
    //$php[0] = imagecreatefrompng('../filters/bored.png');
    //$php[1] = imagecreatefrompng('../filters/emoji.png');
    
    // Création de l'image principale, 100x100
    $im = imagecreatetruecolor(500, 375);
    $bkm = imagecreatefrompng($file);
    
    imagesetbrush($im, $bkm);
    // Dessine quelques brosses
    imageline($im, 250, 187, 250, 187, IMG_COLOR_BRUSHED);
    
    imagesetbrush($im, $filters[0]);
    imageline($im, 50, 50, 50, 50, IMG_COLOR_BRUSHED);
    
    //imagesetbrush($im, $php[1]);
    //imageline($im, 100, 100, 100, 100, IMG_COLOR_BRUSHED);

    
    imagepng($im, '../montage/first.png');
}
// Affichage de l'image au navigateur
//header('Content-type: image/png');
//imagepng($im);
//imagedestroy($im);
//imagedestroy($php);



?>