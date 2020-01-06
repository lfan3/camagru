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

<h1>PICTURE WEB CAM</h1>
<?php if(isset($_SESSION['id'])){?> 
    Welcome <?php echo $_SESSION['username'];}
else{?>
    <form name='loginForm' method="POST" action="login.php">
    <label> username:  </label>
    <input type="text" id="username" name="username"><br />
    <label> email: </label>
    <input type="text" id="email" name="email"><br />
    <label> password: </label>
    <input type="text" id="passwd" name="passwd"><br />
    <input type="submit" value="login in"><br />
    <a href="signup.php"> Create account </a><br />
    <a href="forgetpw.php"> Forget my password </a>
    <span>
        <?php if($_SESSION['error']){
            echo $_SESSION['error'];
        }?>
    </span>
    </form>
<?php } ?>

</body>
<!-----------------------------------------------------------------
    1, htmlspecialchar()  for the input forme.
    2, session['error']
------------------------------------------------------------------>
</html>