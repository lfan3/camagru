<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display Webcam Stream</title>
 
<style>
#containerOuter {
	margin: 0px auto;
	width: 550px;
	height: 1200px;
	border: 1px #333 solid;
}
#container {
	margin: 0px auto;
	width: 500px;
	height: 375px;
	position: relative;
	top : 160px;
	border: 10px #333 solid;
}
#videoElement {
	width: 500px;
	height: 375px;
	background-color: #666;
    opacity: 1;
    filter: grayscale(0.6);
	z-index:0;
}
.videoCanvas{
	width: 70px;
	height: 70px;
	z-index: 1;
	border: 1px solid red;
	position:absolute;
}
#vc1, #vc2, #vc3{
	left:40px;
}
#vc1, #vc4{
	top:0;
}
#vc2, #vc5{
	top:90px;
}
#vc3, #vc6{
	top:200px;
}
#vc4, #vc5, #vc6{
	right:40px;
}
#vc7{
	bottom:0;
	left: 180px;
}

#worksp{
	width: 520px;
	height: 500px;
	border: 1px solid blue;
	position: relative;
	top: 270px;
	left: 15px;
}
#canvas{
    width: 500px;
	height: 375px;
	border: 1px solid black;
	position: relative;
	left:5px;
}
#outer{
	height: 84px;
	width: 550px;
	margin: auto;
	position:absolute;
	left: -5%;
	top : 400px;
	border: 1px solid black;
}
.filterList{
	list-style: none;
}
.filterList li{
	display: inline;
}
.ub{
	position: absolute;
	top: 390px;
}
#start{
	position: absolute;
	left:80px
}
#save{
	position: absolute;
	right: 80px;
}
#delete{
	position: absolute;
	left: 215px;
}

</style>
</head>

<body>
<div id="containerOuter">
	<div id="container">
		<video autoplay="true" id="videoElement"></video>
		<canvas class = "videoCanvas" id = "vc1"></canvas>
		<canvas class = "videoCanvas" id = "vc2"></canvas>
		<canvas class = "videoCanvas" id = "vc3"></canvas>
		<canvas class = "videoCanvas" id = "vc4"></canvas>
		<canvas class = "videoCanvas" id = "vc5"></canvas>
		<canvas class = "videoCanvas" id = "vc6"></canvas>
		<canvas class = "videoCanvas" id = "vc7"></canvas>

		<div id = "outer">		
    		<ul class = filterList>
				<li><img src="../filters/alcohol.png" alt="alcohol" class="simg"></li>
				<li><img src="../filters/bored.png" alt="bored" class="simg"></li>
				<li><img src="../filters/botanical.png" alt="botanical" class="simg"></li>
				<li><img src="../filters/emoji.png" alt="emoji" class="simg"></li>
				<li><img src="../filters/heart.png" alt="heart" class="simg"></li>
				<li><img src="../filters/inspiration.png" alt="inspiration" class="simg"></li>
				<li><img src="../filters/mushroom.png" alt="mushroom" class="simg"></li>
			</ul>	
		</div>
	</div>
	<div id = worksp>
		<canvas id = "canvas"></canvas>
		<button id = "start" class = "ub">take photo</button> 
		<button id = "delete" class = "ub">delete photo</button> 
		<button id = "save" class = "ub">save photo</button> 
		<button id = "test" class = "ub"> test </button>
		<div id = "miniature"></div>
	</div>
</div>

<script type="text/javascript" src="../js/webcame.js"></script>
<script>
	var test = document.getElementById("test");
	test.onclick = function(){
		testButton();
	}

	function testButton(){
		var bar = {
			foo : 'foo',
			nice : 'nice'
		}
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if (this.readyState === 4 && this.status === 200);
			console.log( xhr.responseText);
		}
		xhr.open("POST", "../testJson.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("ok=yes");
		console.log("tedt");
	}

</script>
	
</body>
</html>