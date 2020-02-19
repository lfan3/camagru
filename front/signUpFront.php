<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .wrap{
        background-color:#9b59b6;
    }
    #pointer{
        left : -7rem;
    }
</style>

<body>

<h1  style="color:#af73eb">SIGN UP FOR PICTURE WEB CAM</h1>
<div class="wrap --rtn">
<form name='signUpForm' method="POST" action="../forms/signUpVerif.php" class="flex-form">
<ul class="select__list">
            <li id="js-usr-new" class="select__label">Sign Up</a></li>
            <li id="js-usr-rtn" class="select__label"><a href="../index.php">Sign in</a></li>
            <li id="js-usr-rst" class="select__label"> <a href="forgetpasswd.php">Reset</a></li>
</ul>
<span id="pointer"></span>
<input type="text" id="username" name="username" placeholder="username" class="ui-elem ui-elem-email"><br />
<input type="text" id="email" name="email" placeholder="email" class="ui-elem ui-elem-email"><br />
<input type="password" id="passwd" name="passwd" placeholder="password" class="ui-elem ui-elem-pass"><br />
<input type="password" id="confpass" name="confpass" placeholder="confirm the password" class="ui-elem ui-elem-repass"><br />
<input type="submit" id="js-btn" class="ui-button" value="Sign Up"><br />
<div class="ui-gallery">  <a href = "gallery.php" style="color:black">go to the big gallery</a></div>
<span>
    <?php 
        if($_SESSION['error']){
            echo '<p style="color:red;">' . $_SESSION['error']. '</p>';
        }
        if(isset($_SESSION['toconf']) && !empty($_SESSION['toconf'])){
            echo '<p style="color:green;">' . $_SESSION['toconf'] . '</p>';
        }
    ?>
</span>
</form>

</div>
</body>
<!-----------------------------------------------------------------
    1, htmlspecialchar()  for the input forme.
    2, session['error']
------------------------------------------------------------------>
</html>