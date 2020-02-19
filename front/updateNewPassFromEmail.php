<?php
//this page is opened from new user's email
//we need to verify the token
//if token is ok
//succesfulled signed in
//otherwise not good.
session_start();
$id = $_GET['id'];
$token = $_GET['token'];


function checkUsedEmailLink()
{
    include_once '../config/database.php';
    try{
        $dbc = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        global $token;
        global $id;
        //check if the link is already been used
        $query = $dbc->prepare(
            "SELECT id, token
            FROM users 
            WHERE id = :id AND token = :token");

        $query->execute(array(':id'=>$id, ':token'=>$token));
        $rqi = $query->fetch(PDO::FETCH_ASSOC);
        
        if(!$rqi)
        {
            $query->closeCursor();?>
            <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <link rel="stylesheet" href = "css/style.css">
                    <style>
                    .wrap{
                        background-color:#e74c3c;
                    }
                    </style>
                </head>
                <body> 
                    <h1 style='color:#eb9d7f'>Camagru APP</h1>
                    <div class="wrap --rtn">
                        <?php echo "<p style='color:#f0d1c5'><a href='forgetpasswd.php'> << Go Back </p>" ?>
                        <?php echo "<p style='color:#f0d1c5; text-align:center; font-size : 2em; position:relative; top:15em'> this confirmation link has already been used !"; ?>
                    </div>
                </body>
                </html>
                <?php
            return;
        }else{ 
            $query->closeCursor(); ?>
            <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <link rel="stylesheet" href = "css/style.css">
                    <style>
                        .wrap{
                            background-color:#1abc9c;
                        }
                        form{
                            position:relative;
                            top: 12em;
                        }
                    </style>
                </head>
                <body> 
                    <h1>Camagru APP </h1>
                    <div class="wrap --rtn">
                        <form name='changePassForm' class="flex-form" method="POST" action="../forms/verifreset.php?id=<?php echo $id ?>&token=<?php echo $token ?>">
                        <input type="password" id="passwd" name="passwd" placeholder="password" class="ui-elem ui-elem-pass"><br />
                        <input type="password" id="confpass" name="confpass" placeholder="confirm the password" class="ui-elem ui-elem-repass"><br />
                        <input type="submit" id="js-btn" class="ui-button" value="change password">
                        <br/>
                    <span class="error">
                        <?php
                            if($_SESSION['error'])
                                echo $_SESSION['error'];
                        ?>
                    </span>
                    </div>
                </body>
                </html>
            <?php }
    }catch (PDOException $e){
        echo "ERROR1: " . $e->getMessage();
    }
}

checkUsedEmailLink();


?>