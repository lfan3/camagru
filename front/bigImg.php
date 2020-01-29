<?php
session_start();
$_SESSION['id'] = 38;
?>

<style>
#slide{
   border: 1px green solid;
   text-align : center;
   margin-top : 38px;
}

.card{
    position : absolute;
    width : 200px;
    height : 200px;
    background-color : white;
    border: 1px red solid;
}
.slide{
    position : relative;
    height : 275px;
    width : 33%;
    margin : 0 auto;
    background-color : yellow;
    border-radius: 20px;
/*    cursor: -webkit-zoom-in;*/
    cursor: zoom-in;
}
#bigPic{
/*    height : 660px;*/
    width : 500px;
    margin: auto;
    margin-top : 30px;
/*    border: 1px blue solid;*/
    position: relative;
    border-radius : 25px;
    display :  none;
}
.bigPic{
    width:500px;
    height:365px;
    border-radius: 25px;
}
#like{
    position:absolute;
    right :  20px;
    top : 370px;
}
#likeNub{
    position : absolute;
    right : 60px;
    top : 384px;
}
label{
    position:absolute;
    font-weight : bold;
    left :  20px;
    top : 380px;
}
#comment{
    position:absolute;
    left :  20px;
    top : 410px;
}
textarea {
    border: 1px solid #969A97;
}
input[id="comment"]{
    width: 300px;
    height: 50px;
}
input[name="submitcomment"]{
    position: relative;
    top : 130px;
    left: 360px;
}
.gid{
    display:none;
}

.commentOuterDiv{
    width : 380px;
    height : 70px;
    border : 1px solid black;
    position:absolute;
    top : 530px;
    left : 20px;
    border-radius : 25px;
}

.usernameDiv{
    width : 80px;
    height : 50px;
    text-align : center;
    border : 1px solid red;
    padding-top: 20px;
}

.commentTxtDiv{
    width : 300px;
    height : 50px;
    border : 1px solid green;
    position:absolute;
    left : 80px;
    top : 0px;
    padding-top : 20px;
    overflow:auto;
}

</style>

<div id="slide">
    <img class="slide" src="images/5e23fde8a37c0.png">
    <img class="slide" src="images/5e24cdf204c26.png">
    <img class="slide" src="images/5e25459b54c64.png">
</div>

<div id="bigPic" class = "71">
    <img class="bigPic" src="images/5e23fde8a37c0.png" id="bigPicImg">
    <span id ="likeNub"> </span>
    <img id ="like" src="filters/like.png">
    <form method = "POST" action = "functions/Fcomment.php">
        <label>Comments</label>
        <textarea rows = "5" cols = "60" id="comment" name = "comment"></textarea>
        <input type = "text" class = "gid" name = "gid" value = "71">
        <input type="submit" value="Done" name="submitcomment">
    </form>
    <div id = "commentPart">
        <!-- comments -->
    </div>
</div>