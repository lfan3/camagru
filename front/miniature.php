<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/galStyle.css">
<style>
/* parent div and child div doivent declarer tous en position absolute pour avoir un rapport de position*/ 
/* pour centrer un element en position absolut, il faut dir left and right est 0, then margin : auto */


#controlers{
  margin-bottom : 1em;
}
.button:focus{
	outline : none;
}
.button{
  border-color: #999;
}
.button:hover{
  border-color : black;
}

/* responsive definition for the height*/
.card{
  /*  position : relative;*/
    width : 150px;
    height : 120px;

}

/****bigpic style */
#bigPic{
  /*    height : 660px;*/
    width : 380px;
    margin-top : 10px;
  /*    border: 1px blue solid;*/
    top : 10px;
}
.bigPic{
    width:380px;
    height:290px;
    border-radius: 25px;
}

#like{
    position:absolute;
    right :  20px;
    top : 265px;
}
#likeNub{
    position : absolute;
    right : 60px;
    top : 270px;
    height : 10px;
    width : 10px;
    color: white;
}
label{
    position:absolute;
    font-weight : bold;
    left :  20px;
    top : 280px;
    color : white;
}
#comment{
    position:absolute;
 /*   left :  20px;*/
    top : 300px;
}

#goback{
    position: relative;
    top : 70px;
    width : 180px;
    height : 50px;
    left: 0px;
    background : green;
    /*to center the letters in a div with the following three*/
    text-align :  center;
    vertical-align : middle;
    line-height : 50px;
}
#deletImg{
    position: relative;
    width: 120px;
    height: 50px;
    left: 185px;
    top: 120px;
    background-color: red;
    color: white;
    line-height : 50px;
    text-align : center;
    vertical-align : middle;
    padding : 0px;
  /*  visibility:hidden;*/
}

input[name="submitcomment"]{
    top : 20px;
    left: 310px;
}

.commentOuterDiv{
    width : 370px;
}

.commentDelete{
  position : absolute;
  right:0px;
  width : 20px;
  top : 72px;
  padding: 0;
  background : red;
}
/*
#gid{
  display:none;
}
*/
#commentPart{
  display:relative;
  top : 500px;
}



/**************end of bigpic style ****************** */
</style>
</head>
<body>
<div id = "pagination">
  <div id = "controlers">
    <button id = "previPage" class = "button pages" onclick="prePage()"> < </button>
    <button id = "5Pages" class = "button pages" onclick="fiveimges(firstPageImgs)"> 5 </button>
    <button id = "10Pages" class = "button pages" onclick="tenimges(firstPageImgs)"> 10 </button>
    <button id = "15Pages" class = "button pages" onclick="fifimges(firstPageImgs)"> 15 </button>

  <!--  <button id = "increase" class = "button" onclick="plus(firstPageImgs)"> + </button> -->
    <button id = "nextPage" class = "button pages" onclick = "nextPage()"> > </button>
  </div>
  <div id="slide"></div>
</div>

<div id="bigPic" class = "71">
    <img class="bigPic" src="../images/5e23fde8a37c0.png" id="bigPicImg">
    <span id ="likeNub"> </span>
    <img id ="like" src="../filters/like.png">
    <form method = "POST" action = "../functions/Fcomment.php">
        <label>Comments</label>
        <input id="gid" name="gid">
        <input id="mina" name="mina" value="mina">
        <textarea rows = "5" cols = "60" id="comment" name = "comment" ></textarea>
        <div id="deletImg">delete this photo</div>
        <div id="goback" onclick = "FzoomOut()"> go back to see other photos </div>
        <input type="submit" value="Done" name="submitcomment">
    </form>
    <div id = "commentPart">
        <!-- comments -->
    </div>
</div>


<!--<script src=miniature.js></script>-->
<?php include 'miniaJs.php'?>
</body>
</html>



