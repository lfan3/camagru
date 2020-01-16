<?php
$subject = "confirmation email from Camagru";

//new user sign up mail
function sendenumail($email, $username, $token){
    $message = '   
    <html>
        <head>
            <title>Camagru</title>
        </head>
        <body>
        <p>Welcome to Camagru!</p>
        <p>click the link below to confirme your inscription</p>
        <a href="http://localhost:8080/camagru/front/verifnuser.php?user=' . urlencode($username) . '&token=' . urlencode($token) .'"> 
        Email verification</a>
        </body>
    </html>';
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'Content-Transfer-Encoding: 8bit';
    $headers .= 'From: Camagru' . "\r\n";
    $_SESSION['error'] = 'email sended to ' . $email;
    mail($email,$subject,$message,$headers);
}

//forget password mail
function sendfpmail($email, $id, $token){
    $message = '   
    <html>
        <head>
            <title>Camagru</title>
        </head>
        <body>
        <p>Welcome to Camagru!</p>
        <p>click the link below to change your password</p>
        <a href="http://localhost:8080/camagru/front/updateNewPassFromEmail.php?id=' . urlencode($id) . '&token=' . urlencode($token) .'"> 
        change the password</a>
        </body>
    </html>';
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'Content-Transfer-Encoding: 8bit';
    $headers .= 'From: Camagru' . "\r\n";
    $_SESSION['error'] = 'email sended to ' . $email;
    mail($email,$subject,$message,$headers);
}

?>