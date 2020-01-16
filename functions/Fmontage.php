<?php
// i need to get the photo and filter
// 1) first i stock the photo into local fichier
// 2) i send the photoPath to database and the filter path
// 3) need to create another php to coller the two images from database together
// and then send to client

define('UPLOAD_DIR', '../images/');
$file = UPLOAD_DIR . uniqid() . '.png';
$content = $_POST['content'];
$content = str_replace('data:image/png;base64,', '', $content);
$content = str_replace(' ', '+', $content);
$decode = base64_decode($content);
$im = imageCreateFromString($decode);
imagepng($im, $file, 0);

/*******another way to creat the photo into file */
//$fb = fopen($file, 'wb');
//fwrite($fb, $decode);
//fclose($fb);

?>