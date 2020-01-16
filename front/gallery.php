<?php
session_start();
include_once("../database/montage.php");

$montage = get_all_montage();
?>
<!DOCTYPE html>
<HTML>
  <header>
    <meta charset="UTF-8">
    <title>CAMAGRU - gallery</title>
  </header>
  <body>

    <div class="main">
        <div class="select">
        <img class="thumbnail" src ="../filters/alcohol.png"></img>
      	<input id="alcohol.png" type="radio" name="img" value="./filters/alcohol.png" onclick="onCheckBoxChecked(this)">
      	<img class="thumbnail" src="../filters/heart.png"></img>
      	<input id="heart.png" type="radio" name="img" value="./filters/heart.png" onclick="onCheckBoxChecked(this)">
    </div>
    <div class="side">
        <div class="title">Montages</div>
        <div id="miniatures">
        <?php
            $gallery = "";
              if ($montages != null) {
                for ($i = 0; $montages[$i] ; $i++) {
                  $class = "icon";
                  if ($montages[$i]['userid'] === $_SESSION['id']) {
                    $class .= " removable";
                  }
                  $gallery .= "<img class=\"" . $class . "\" src=\"./montage/" . $montages[$i]['img'] . "\" data-userid=\"" . $montages[$i]['userid'] . "\"></img>";
                }
                echo $gallery;
              }
        ?>

        </div>

    </div>
    </div>

    </body>
    </HTML>
 
