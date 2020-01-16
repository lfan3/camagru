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
    <meta charset="UTF-8">
</head>
<body> 
        <form name='getPassForm' method="POST" action="../forms/sendpassemail.php">
        <label> username:  </label>
        <input type="text" id="username" name="username"><br />
        <label> email: </label>
        <input type="text" id="email" name="email"><br />
        <input type="submit" value="send change password link to email"><br />
        <span>
            <?php echo $_SESSION['error'];?>
        </span>
</body>