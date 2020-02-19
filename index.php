<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <meta nam="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="front/css/style.css">
</head>
<style>
    .wrap{
        background-color:#1abc9c;
    }
</style>

<body>

<h1>Camagru APP</h1>
<?php if(isset($_SESSION['id'])){
    header("location: front/member.php");
}else{?>
<div class="wrap --rtn">
    <form name='loginForm' id= "form" method="POST" action="forms/login.php" class="flex-form" >
        <ul class="select__list">
            <li id="js-usr-new" class="select__label"><a href="front/signUpFront.php">Sign Up</a></li>
            <li id="js-usr-rtn" class="select__label">Sign in</li>
            <li id="js-usr-rst" class="select__label"><a href="front/forgetpasswd.php">Reset</a></li>
        </ul>
        <span id="pointer"></span>
        <input type="text" id="username" name="username" placeholder="username" class="ui-elem ui-elem-email"><br />
        <input type="text" id="email" name="email" placeholder="email" class="ui-elem ui-elem-email"><br />
        <input type="password" id="passwd" name="passwd" placeholder="password" class="ui-elem ui-elem-pass"><br />
        <input type="submit" id="js-btn" class="ui-button" value="login in"><br />
        
        <span class="error">
            <?php
             if(!empty($_SESSION['loginError'])){
                echo $_SESSION['loginError'];
             }
            ?>
        </span>
    </form>
    <footer id = "footer" style="margin-top:1px">
		<?php include 'deco/footer.php'; ?>
	</footer>
</div>
   
<?php } ?>

</body>
<!-----------------------------------------------------------------
    1, htmlspecialchar()  for the input forme.
    2, session['error']
------------------------------------------------------------------>
</html>