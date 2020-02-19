<?php
session_start();
?>

<style>
body{
    background-color:#1abc9c;
}
#containerOuter {
	margin-left: auto;
	margin-right: auto;
	margin-top: 50px;
	width: 550px;
	height: 500px;
/*	border: 1px green solid;*/
}
#container {
	margin: 0px auto;
	width: 500px;
	height: 375px;
	position: relative;
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
/*	border: 1px solid red;*/
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
	width: 120px;
	height: 300px;
/*	border: 1px solid blue;*/
	position: relative;
	top: -350px;
	left: 15px;
	display : flex;
	flex-direction : column;
	justify-content : space-around;
	left : 570px;
}
.ub{
	height : 70px;
	width : 110px;
	background : #F05D3D;
	text-align : center;
	font-size : 1.3em;
	font-weight : bold;
}

#canvas{
    width: 500px;
	height: 375px;
	position:relative;
	top : -379px;
/*	border: 1px solid black;*/
/*	position: relative;*/
/*	left:5px; */
	display: none;
}
#outer{
	height: 84px;
	width: 550px;
	margin: auto;
	position:absolute;
	left: -5%;
	top : 400px;
/*	border: 1px solid black;*/
}
.filterList{
	list-style: none;
	position : absolute;
	left : -1.5em;
}
.filterList li{
	display: inline;
	padding: 5px;
}

#miniature{
	position : absolute;
/*	height : 800px;*/
	width : 100%;
	top : 43.5em;
	margin : auto;
	left : 0;
	right : 0;
}
#footer{
	position:relative;
	bottom : -16em;
}

#fileInput{
	color: transparent;
}
#fileInput::-webkit-file-upload-button {
	visibility : hidden;
}
#fileInput::before {
	content:'Select your Image';
	color:black;
	display:inline-block;
/*	background: -webkit-linear-gradient(top, #b3daff, #99ceff);*/
	border:1px solid #999;
	border-radius: 3px;
	padding: 5px 8px;
	cursor: pointer;
}
#fileInput:hover::before{
	border-color: black;
}
input:focus{
	outline : none;
}
/*
footer{
	margin-top : 20em;
}*/
</style>
</head>


<div id="containerOuter">
	<div id="container">
		<video autoplay="true" id="videoElement"></video>
		<canvas id = "canvas"></canvas>
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
	<div id = "worksp">
	
		<button id="turnoff" class="ub" onclick = "vidOff()">turn off video</button>
		<button id = "start" class = "ub">take photo</button> 
	<!--	<button id = "reprendre" class = "ub">reprendre photo</button> -->
		<button id = "save" class = "ub">save photo</button> 
		<input type = "file"  id="fileInput" onchange="readFile(event)"  accept="image/png, image/jpg" > 
	</div>
	<div id = "miniature">
		<?php include 'miniature.php'; ?>
	</div>


</div>
<footer id = "footer" style="margin-top:1px">
		<?php include '../deco/footer.php'; ?>
</footer>
<script type="text/javascript" src="js/webcameTs.js"></script>
