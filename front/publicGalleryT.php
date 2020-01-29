<?php
session_start();
?>

<style>
/* parent div and child div doivent declarer tous en position absolute pour avoir un rapport de position*/ 
/* pour centrer un element en position absolut, il faut dir left and right est 0, then margin : auto */

#pagination{
    margin-left:auto;
    margin-right:auto;
    margin-top : 10px;
    left : 0;
    right : 0;
    width : 88%;
    height : 80%;
    border : 1px black solid;
    position : absolute;
}
.button{
    font-size : 25px;
    width : 30px;
    height : 30px;
    color : lightblue;
    border : 1px black solid;
}
#increase{
    text-align : center;
    position : absolute;
    margin-left : auto;
    margin-right : auto;
    left : 0;
    right : 0;
}
#nextPage{
  position : absolute;
  right : 40%;
  margin-right : 10px;
}
#previPage{
  position : absolute;
  left : 40%;
  margin-left : 10px;
}
#increaseButton{
  margin : 10px;
}
#slide{
/*  border: 1px blue solid;*/
  text-align : center;
  margin-top : 38px;
  display : flex;
}
.rest{
  border : 1px red solid;
  width : 30%;
  height : 90%;
  position : absolute;
  top : 200px;
}

#rest2{
  top : 200px;
  right : 0;
}

#like{
  margin-bottom : -5px;
  z-index: 1;
  position : absolute;
  top : 0;
  right : 0;
}
/* responsive definition for the height*/
.card{
  /*  position : relative;*/
    width : 20%;
    height : 100px;
    background-color : white;
    margin-left: 3px;
    margin-right: 3px;
}
.slide{
    position : relative;
    height : 90%;
    width : 100%;
    margin-left: 0;
    margin-right: 0;
    margin-bottom : -4px;
    cursor: zoom-in;
}
.bcard{
    position : relative;
    height : 40px;
    width : 99%;
    margin : 0 auto;
    text-align : center;
    border : 1px black solid; 
    background-color : rgba(223, 247, 213, 0.6);
}
.commentary{
  position : absolute;
  height : 40px;
  width : 70%;
  left : 1%;
  top : 6px;
  margin : auto;
  padding : 0;
  text-align : center;
}
.like{
  position : absolute;
  margin : auto;
  left : 0;
  right : 0;
}
/****bigpic style */
#bigPic{
  /*    height : 660px;*/
    width : 500px;
    margin: auto;
    margin-top : 30px;
  /*    border: 1px blue solid;*/
    position: relative;
    top : 150px;
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
/**************end of bigpic style ****************** */
</style>


<!-- =^..^=   =^..^=   =^..^=    =^..^=    =^..^=    =^..^=    =^..^= -->
<!-- =^..^=   =^..^=   =^..^=    =^..^=    =^..^=    =^..^=    =^..^= -->
<!-- =^..^=   =^..^=   =^..^=    =^..^=    =^..^=    =^..^=    =^..^= -->

<div id = "pagination">
  <?php if($_SESSION['id']){?>
      <p> Hi </p>
  <?php }else{
    //quelque code
  }?>
  <div id = "controlers">
    <button id = "previPage" class = "button" onclick="moins(firstPageImgs)"> < </button>
    <button id = "increase" class = "button" onclick="plus(firstPageImgs)"> + </button>
    <button id = "nextPage" class = "button" > > </button>
  </div>
  <div id="slide"></div>
  <div id= "rest1" class="rest"></div>
  <div id= "rest2" class="rest"></div>
</div>

<div id="bigPic" class = "71">
    <img class="bigPic" src="../images/5e23fde8a37c0.png" id="bigPicImg">
    <span id ="likeNub"> </span>
    <img id ="like" src="../filters/like.png">
    <form method = "POST" action = "../functions/Fcomment.php">
        <label>Comments</label>
        <textarea rows = "5" cols = "60" id="comment" name = "comment"></textarea>
        <input type="submit" value="Done" name="submitcomment">
    </form>
    <div id = "commentPart">
        <!-- comments -->
    </div>
  </div>

<!-- =^..^=   =^..^=   =^..^=    =^..^=    =^..^=    =^..^=    =^..^= -->
<!-- =^..^=   =^..^=   =^..^=    =^..^=    =^..^=    =^..^=    =^..^= -->
<!-- =^..^=   =^..^=   =^..^=    =^..^=    =^..^=    =^..^=    =^..^= -->

<script src=bigI.js></script>




