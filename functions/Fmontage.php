<?php
// i need to get the photo and filter
// 1) first i stock the photo into local fichier
// 2) i send the photoPath to database and the filter path
// 3) need to create another php to coller the two images from database together
// and then send to client

define('UPLOAD_DIR', '../images/');
$file = UPLOAD_DIR . uniqid() . '.png';
$photo = $_POST['photo'];
$filter = json_decode($_POST['filter']);
$simgPos = json_decode($_POST['imgAbPos']);

$photo = str_replace('data:image/png;base64,', '', $photo);
$photo = str_replace(' ', '+', $photo);
$decode = base64_decode($photo);
$im = imageCreateFromString($decode);
imagepng($im, $file, 0);

/*******another way to creat the photo into file */
/**************** filtername ********************* */
$file1 = "../test.txt";
$len = count($filter);
$i = 0;
while($i < $len){
    $content .= $filter[$i] . ' ';
    $i++;
}
$juge = is_array($filter);
if($juge)
    $isarray = "true";
else
    $isarray = "fale";
file_put_contents($file1, $content);

$file2 = "../test1.txt";
if($simgPos)
    $ok = "ok";
else
    $ok = "not ok";
file_put_contents($file2, $simgPos['alcohol'][0]);

//$fb = fopen($file1, 'wb');
//fwrite($fb, $filter[0]);
//fwrite($fb, $filter[1]);
//fclose($fb);

?>