<?php
//this page is opened from new user's email
//we need to verify the token
//if token is ok
//succesfulled signed in
//otherwise not good.
session_start();
include_once '../config/database.php';

$username = $_GET['user'];
$token = $_GET['token'];

try{
    $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //check if the user is already existed
    $query = $dbc->prepare(
        "SELECT username, token, verified 
         FROM users 
         WHERE username = :username AND token = :token");
    $query->execute(array(':username'=>$username, ':token'=>$token));
    $rqi = $query->fetch(PDO::FETCH_ASSOC);
    if(!$rqi)
    {
        echo  "User does not exist";
        return;
    }else{
        $query->closeCursor();
        $vquery = "UPDATE users
                   SET verified = 1
                   WHERE username = '$username'";
        $updatequery = $dbc->prepare($vquery);
        $updatequery->execute();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href = "css/style.css">
            <style>
            .wrap{
                background-color:#1abc9c;
            }
            a{
                text-transform: lowercase;
            }
            </style>
        </head>
        <body> 
            <h1 >Camagru APP</h1>
            <div class="wrap --rtn">
                <?php $_SESSION['error'] = null;?>
            
                <?php echo $_SESSION['error'];?>
                <?php echo "<p style='color:#f0d1c5; font-size : 1.2em'><a href = '../index.php'><< return to login </a></p>" ?>
                <?php echo "<p style='color:#f0d1c5; text-align:center; font-size : 2em; position:relative; top:15em'> Your email has been successfully confirmed!"; ?>
            </div>
        </body>
        </html>
        <?php
    };
}catch (PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
?>