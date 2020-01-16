<?php

$x = 200;
$y = 200;

$gd = imagecreatetruecolor($x, $y);

$corners[0] = array('x' => 100, 'y' =>  10);
//$corners[1] = array('x' =>   0, 'y' => 190);
//$corners[2] = array('x' => 200, 'y' => 190);

$red = imagecolorallocate($gd, 0, 255, 0); 
//imagecolorallocate() draw pixel
//imagecolorat() get pixelcolor
for ($i = 0; $i < 100000; $i++) {
  imagesetpixel($gd, round($x),round($y), $red);
  $x = ($x + $corners[0]['x']) / 2;
  $y = ($y + $corners[0]['y']) / 2;
}

header('Content-Type: image/png');
imagepng($gd);

?>