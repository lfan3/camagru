var video = document.querySelector("#videoElement");
var container = document.getElementById('container');
var vcs = document.getElementsByClassName('videoCanvas');
var outer = document.getElementById('outer');
var simg = document.getElementsByClassName("simg");
var imgObj = new Array(7);	 			
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
var start = document.getElementById('start');
var deleteImg = document.getElementById('delete');
var save = document.getElementById('save');

var getUserMedia = (navigator.getUserMedia ||
  navigator.webkitGetUserMedia ||
  navigator.mozGetUserMedia ||
  navigator.msGetUserMedia ||
  navigator.oGetUserMedia);

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
    // video.srcObject = stream;
    handlevideo(stream);
    })
    .catch(function (e) {
      console.log(e.message);
    });
}

function handlevideo(stream){
  video.srcObject = stream;
  canvas.width = 500;
  canvas.height = 375;
  start.onclick = function(){
    startButton(video);
  };
  deleteImg.onclick = function(){
    deleteButton();
  }
  save.onclick = function(){
    saveButton();
  }
}

/**************************FUNCTION RELATED TO handlevideo()****************** */
function startButton(video){
  ctx.drawImage(video, 0, 0, 500, 375); 
}

function deleteButton(){
  ctx.clearRect(0, 0, 500, 375);
}

function saveButton(){
  var imgData = canvas.toDataURL("image/png");
  var output=imgData.replace(/^data:image\/(png|jpg);base64,/, "");
  //var baseimg = new Image();
  //baseimg.src = imgData;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			console.log("ok");
		};
	};
  xhttp.open("POST", "../testJson.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 // xhttp.send("content=" + imgData);
  xhttp.send("content=" + output);
}
/***************************SMALL CANVAS************************************** */
function vsMouseMove(vcArray){
  var i = 0;
  var isDown = false;
  var vsN;
  var mousePosition = {
    x : 0,
    y : 0
  };
  var offset = [0, 0];

  container.addEventListener('mouseup', function(e){
    isDown = false;
  }, true);

  container.addEventListener('mousemove', function(e){
    event.preventDefault();
    var aleft;
    var aright;
    if(isDown){
      mousePosition = {
        x : e.clientX,
        y : e.clientY
      };
    aleft = mousePosition.x - offset[0];
    atop = mousePosition.y - offset[1];
    if(atop>=-5 && atop<=307 && aleft>=-5 && aleft<=435){
      vcArray[vsN - 1].style.left = aleft + 'px';
      vcArray[vsN - 1].style.top = atop + 'px';
      i++;
    }  
    }
  }, true);

  while(i < vcArray.length){
    vcArray[i].addEventListener('mousedown', function(e){
      isDown = true;
      offset = [
        e.clientX - this.offsetLeft,
        e.clientY - this.offsetTop
      ];
      vsN = parseInt(this.id.replace('vc', ''));
    }, false);
    i++;
  }
}

function vcSetup(vcArray){
  var i = 0;
	while(i < vcArray.length){
		vcArray[i].width = 70;
    vcArray[i].height = 70;
		i++;
  }
}

function getFilter(){
	var i = 0;
	var dx = 0;
	var dy = 0;
	var sx = 70;
	var sy = 70;
	while (i < simg.length){
	// IIFE Solution !!
		(function(x){
			simg[x].addEventListener("click", function(){	
			imgObj[x] = new Image();
			imgObj[x].src = this.src;
			vcs[x].getContext('2d').drawImage(imgObj[x], dx, dy, sx, sy, dx, dy, sx, sy);;
		  }, false);
		})(i);	
		i++;		
  	}
}
vcSetup(vcs);
vsMouseMove(vcs);
window.onload = getFilter();




