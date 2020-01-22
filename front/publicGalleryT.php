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
    height : 500px;
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
    margin-left:auto;
    margin-right:auto;
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
   border: 1px blue solid;
   text-align : center;
   margin-top : 38px;
   display : flex;
}
.card{
  /*  position : relative;*/
    width : 19%;
    height : 100px;
    background-color : white;
    margin-left: 2px;
    margin-right: 2px;
    border: 1px red solid;
}
.slide{
    position : relative;
    height : 100%;
    width : 100%;
    margin-left: 0;
    margin-right: 0;
    margin-bottom : -2px;
    background-color : yellow;
}
.commentary{
    position : relative;
    height : 20%;
    width : 100%;
    margin : 0 auto;
    padding : 0;
    text-align : center;
    border : 1px black solid;
}
</style>
<div id = "pagination">
 <button id = "increase" class = "button" onclick="plus(firstPageImgs)> + </button>
  <button id = "nextPage" class = "button" "> > </button>
  <?php if($_SESSION['id']){?>
      <p> Hi </p>
  <?php }else{
    //$length = count($allmontages);
    //while($length > 0){
    //  $imgPath = str_replace("../", "", $allmontages[$length - 1]['img']);
    //  echo '<img class="pGallery" src=' . $imgPath . '>';
    //  $length--;
    //}
    //echo '<img class="pGallery" src="filters/emoji.png">';
  }?>
  <div id = "controlers">
    <button id = "previPage" class = "button" onclick="moins(firstPageImgs)"> < </button>
    <button id = "increase" class = "button"> + </button>
    <button id = "nextPage" class = "button" onclick="plus(firstPageImgs)"> > </button>
  </div>
  <div id="slide">
  <!--
    <img class="slide" src="images/5e23fde8a37c0.png" style="width:19%">
    <img class="slide" src="images/5e23fea8e8fba.png" style="width:19%">
    <img class="slide" src="images/5e24cb9a82749.png" style="width:19%">
    <img class="slide" src="images/5e24cb9a82749.png" style="width:19%">
    <img class="slide" src="images/5e24cb9a82749.png" style="width:19%">
    -->
  </div>
 
</div>

<script>
var imgTab;
var pagiDiv = document.getElementById("pagination");

function firstPageImgs(imgNb, imgTab){

  let i = 0;
  let len = imgTab.length;
  var slideDiv = document.createElement("div");
  slideDiv.setAttribute("id", "slide");
  

  while(i < imgNb && (len-1-i) >= 0){
    var card = document.createElement("div");
    card.setAttribute("class", "card");

    var slideImg = document.createElement("img");
    slideImg.setAttribute("class", "slide");
    let imgSrc = (imgTab[len - i - 1]['img']).replace("../", "");
    slideImg.setAttribute("src", imgSrc);

    var commentary = document.createElement("div");
    commentary.setAttribute("class", "commentary");
    commentary.innerHTML = "add a commentary"

    slideDiv.appendChild(card);
    card.appendChild(slideImg);
    card.appendChild(commentary);
    i++;
  }
  pagiDiv.appendChild(slideDiv);
}

function plus(callback){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      imgTab = JSON.parse(this.responseText);
      callback(5, imgTab);
    }
  }
  xhttp.open("GET", "functions/getSnapShot.php?t=" + Math.random(), true);
  xhttp.send();
}

plus(firstPageImgs);
</script>


