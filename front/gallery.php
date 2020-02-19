<?php
session_start();
?>
<link rel="stylesheet" href="css/galStyle.css">

<style>
/* parent div and child div doivent declarer tous en position absolute pour avoir un rapport de position*/ 
/* pour centrer un element en position absolut, il faut dir left and right est 0, then margin : auto */
body{
    background-color:#83e0eb;
}

#goback{
  position:relative;
  top : 150px;
  left : 20px;
  width : 176px;
  height : 50px;
  background : green;
  text-align : center;
  vertical-align : center;
  line-height:50px;
}

/* responsive definition for the height*/
.card{
  /*  position : relative;*/
  width : 200px;
  height : 160px;

}

/****bigpic style */
#bigPic{
  /*    height : 660px;*/
    width : 500px;
    margin-top : 30px;
  /*    border: 1px blue solid;*/
    top : 150px;
    
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
/*    border : 1px solid blue;*/
    width:20px;
    height:20px;
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

input[name="submitcomment"]{
    top : 100px;
    left: 325px;
}
.commentOuterDiv{
    width : 380px;
    left : 20px;
}

footer{
	position:relative;
	bottom : -66em;
  margin : 0 auto;
  text-align : center;
}
/**************end of bigpic style ****************** */
</style>

<body>
<?php if($_SESSION['id']){
    include '../deco/header.php';
    }else{
      echo "<a href='signUpFront.php' style='font-size:1.5em'> << go back</a>";
}?>

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

<!-- je peux directement recupere all image depuis php -->
<div id="bigPic" class = "71">
    <img class="bigPic" src="../images/5e23fde8a37c0.png" id="bigPicImg">
    <span id ="likeNub"> </span>
    <img id ="like" src="../filters/like.png">

    <form method = "POST" action = "../functions/Fcomment.php">
        <label>Comments</label>
        <input id="gid" name="gid">
        <input id="mina" name="mina" value="gall">
        <textarea rows = "5" cols = "60" id="comment" name = "comment">
        </textarea>
        <div id="goback" onclick = "FzoomOut()"> go back to see other photos </div>
        <input type="submit" value="Done" name="submitcomment">
    </form>
    <div id = "commentPart">
       
    </div>
 
</div>
<?php include 'js/bigGal.php'?>

<footer>
	<?php include '../deco/footer.php'; ?>
</footer>

</body>








