<?php
session_start();
include_once("database/montage.php");

$gc = new Gallery($DB_DSN,$DB_USER,$DB_PASSWORD);
$allmontages = $gc->get_all_gallery();
?>

<!DOCTYPE html>
<HTML>
  <header>
    <meta charset="UTF-8">
    <title>CAMAGRU - gallery</title>

  </header>
  <body>
    <div id = pagination>
      <div id="increaseButton">
        <button id = "increase"> more photos </button>
      </div>
      <?php if($_SESSION['id']){?>
          <p> Hi </p>
      <?php }else{
        //$length = count($allmontages);
        //while($length > 0){
        //  $imgPath = str_replace("../", "", $allmontages[$length - 1]['img']);
        //  echo '<img class="pGallery" src=' . $imgPath . '>';
        //  $length--;
        //}
        //echo '<img class="pGallery" src="filters/emoji.png">';
      }?>
    </div>

  </body>
  <script>
  </script>
</HTML>
 
