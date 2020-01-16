<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
 <!--   <link rel="stylesheet" href="style.css"> -->
</head>
<body>

<h1>Sign Up for PICTURE WEB CAM</h1>

<form name='signUpForm' method="POST" action="../forms/signUpVerif.php">
<label> username:  </label>
<input type="text" id="username" name="username"><br />
<label> email: </label>
<input type="text" id="email" name="email"><br />
<label> password: </label>
<input type="password" id="passwd" name="passwd"><br />
<label> confirm password: </label>
<input type="password" id="confpass" name="confpass"><br />
<input type="submit" value="Sign Up"><br />

<span>
    <?php 
        if($_SESSION['error']){
            echo '<p style="color:red;">' . $_SESSION['error']. '</p>';
        }
        if(isset($_SESSION['toconf'])){
            echo '<p style="color:green;">' . $_SESSION['toconf'] . '</p>';
        }
        //echo $_SESSION['username']. "\n";
        //echo $_SESSION['email']. "\n";
        //echo $_SESSION['passwd']. "\n";

    ?>
</span>
</form>

</body>
<!-----------------------------------------------------------------
    1, htmlspecialchar()  for the input forme.
    2, session['error']
------------------------------------------------------------------>
</html>