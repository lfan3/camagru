<?php
session_start();

//ask email adresse
//ask new code
//submit button, 
//$post[email]  to verified in database
//and $post[npw] modified in the database the old password to new password
//send another email to reinitialise the pass
$_SESSION['error'] = null;
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
</head>
<style>
    .wrap{
        background-color:#e74c3c;
    }
    #pointer{
        left:7rem;
    }
</style>

<body> 
<h1 style='color:#eb9d7f'>Camagru APP</h1>
<div class="wrap --rtn">
    <form name='getPassForm' id= "form" method="POST" action="../forms/sendpassemail.php" class="flex-form" >
        <ul class="select__list">
            <li id="js-usr-new" class="select__label"><a href="signUpFront.php">Sign Up</a></li>
            <li id="js-usr-rtn" class="select__label"><a href="../index.php">Sign in</a></li>
            <li id="js-usr-rst" class="select__label">Reset</li>
        </ul>
        <span id="pointer"></span>
        <input type="text" id="username" name="username" placeholder="username" class="ui-elem ui-elem-email"><br />
        <input type="text" id="email" name="email" placeholder="email" class="ui-elem ui-elem-email"><br />
        <input type="submit" id="js-btn" class="ui-button" value="send verification to email"><br />
 
        <span class="error">
            <?php
             if($_SESSION['error']){
                echo $_SESSION['error'];
             }
             if($_SESSION['info']){
                 echo "<p style='color:#ebb283'>" . $_SESSION['info'] . "</p>";
             }
            ?>
        </span>
    </form>
</div>
</body>