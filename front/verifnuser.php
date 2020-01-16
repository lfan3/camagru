<?php
//this page is opened from new user's email
//we need to verify the token
//if token is ok
//succesfulled signed in
//otherwise not good.
include_once '../config/database.php.php';

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
        echo "<p> Your email has been successfully confirmed! Click the button below to login in </p>";
        echo '<a href = "index.php">
        return to login </a>';
    };
}catch (PDOException $e){
    echo "ERROR: " . $e->getMessage();
}
?>