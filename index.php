<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <meta nam="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" href="style.css"> -->
</head>
<style>
.error{
    color : red;
}
#header{
    text-align : center;
}
#headerList{
    list-style : none;
}
#headerList li{
    display : inline;
    margin-left : 50px;
    margin-right : 50px;
}
#username{
    font-weight :  bold;
}
h1{
    text-align: center;
}


</style>
<body>

<h1>Camagru APP</h1>
<?php if(isset($_SESSION['id'])){
    include 'deco/header.php'; 
    include 'front/montage.php';
}else{?>
    <form name='loginForm' method="POST" action="forms/login.php">
    <label> username:  </label>
    <input type="text" id="username" name="username"><br />
    <label> email: </label>
    <input type="text" id="email" name="email"><br />
    <label> password: </label>
    <input type="password" id="passwd" name="passwd"><br />
    <input type="submit" value="login in"><br />
    <a href="front/signUpFront.php"> Create account </a><br />
    <a href="front/forgetpasswd.php"> Forget my password </a>
    <span class="error">
        <?php if($_SESSION['error']){
            echo $_SESSION['error'];
        }?>
    </span>
    </form>
    <?php 
        include 'front/publicGalleryT.php';
    } ?>
</body>
<!-----------------------------------------------------------------
    1, htmlspecialchar()  for the input forme.
    2, session['error']
------------------------------------------------------------------>
</html>