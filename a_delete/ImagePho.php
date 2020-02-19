<?php
function LoadPNG($imgname)
{
    /* Tente d'ouvrir l'image */
    $im = @imagecreatefrompng($imgname);

    /* Traitement en cas d'échec */
    if(!$im)
    {
        /* Création d'une image vide */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* On y affiche un message d'erreur */
        imagestring($im, 1, 5, 5, 'Erreur de chargement ' . $imgname, $tc);
    }

    return $im;
}

//header('Content-Type: image/png');
//
//$img = LoadPNG('filters/alcohol.png');
//
//imagepng($img);
//imagedestroy($img);

$php[0] = imagecreatefrompng('filters/bored.png');
$php[1] = imagecreatefrompng('filters/emoji.png');

// Création de l'image principale, 100x100
$im = imagecreatetruecolor(500, 375);
$sm = imagecreatefrompng('images/5e23fde8a37c0.png');

// Définit l'arrière-plan en blanc
//$white = imagecolorallocate($im, 255, 255, 255);
//imagefilledrectangle($im, 0, 0, 100, 100, $white);

// Définit la brosse

imagesetbrush($im, $sm);
// Dessine quelques brosses
imageline($im, 250, 187, 250, 187, IMG_COLOR_BRUSHED);

imagesetbrush($im, $php[0]);
imageline($im, 50, 50, 50, 50, IMG_COLOR_BRUSHED);

imagesetbrush($im, $php[1]);
imageline($im, 100, 100, 100, 100, IMG_COLOR_BRUSHED);
// Affichage de l'image au navigateur
header('Content-type: image/png');

//imagepng($im, 'montage/seconde.png');
imagepng($im);
imagedestroy($im);
imagedestroy($php);
?>
