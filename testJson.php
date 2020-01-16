<?php
/*********testbutton************ */
$file = "testImage.png";
$content = $_POST['content'];
//$content = substr($content, strpos($content, ",") + 1);

$decode = base64_decode($content);
//$jsoncode = json_encode($content);

$fb = fopen($file, 'w+');
fwrite($fb, $decode);
fclose($fb);

$file1 = "xml1";
file_put_contents($file1, $content);
/*
$im = imageCreateFromString($content['content']);
if(!$im)
    echo "error";

imagepng($im, $file, 0);
*/
?>