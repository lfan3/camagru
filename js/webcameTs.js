var video = document.querySelector("#videoElement");
var container = document.getElementById('container');
var vcs = document.getElementsByClassName('videoCanvas');
var outer = document.getElementById('outer');
var simg = document.getElementsByClassName("simg");
var imgObj = new Array(7);	 			
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
var start = document.getElementById('start');
var reprendre = document.getElementById('reprendre');
var save = document.getElementById('save');
var miniature = document.getElementById('miniature');
var filterName = [];

var imgAbPos = {
  "alcohol_x" : 40,
  "alcohol_y" : 0,
  "bored_x" : 40,
  "bored_y" : 90,
  "botanical_x" : 40,
  "botanical_y" : 200,
  "emoji_x" : 335,
  "emoji_y" : 0,
  "heart_x" : 335,
  "heart_y" : 90,
  "inspiration_x" : 335,
  "inspiration_y" : 200,
  "mushroom_x" : 180,
  "mushroom_y" : 500
};

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
    //startButton(video);
    startButton();
    //createImg(src);

  };
  reprendre.onclick = function(){
    reprendreButton();
  }
  save.onclick = function(){
    saveButton(filterName);
  }
}

/**************************FUNCTION RELATED TO handlevideo()****************** */
//function startButton(video){
//  ctx.drawImage(video, 0, 0, 500, 375); 
//}

function startButton(){
  if(!filterName.length)
    alert("You need to choose a filter in order to take a picture !");
  else{
    video.pause();
    ctx.drawImage(video, 0, 0, 500, 375); 
  }
}

function reprendreButton(){
  video.play();
}

function saveButton(filterName){
  var imgData = canvas.toDataURL("image/png");
  // var output=imgData.replace(/^data:image\/(png|jpg);base64,/, "");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){ 
        console.log("imgAbPos=" + JSON.stringify(imgAbPos));
    };
  };
  xhttp.open("POST", "../functions/Fmontage.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.send("photo=" + imgData + "&filter=" + JSON.stringify(filterName) + "&imgAbPos=" + JSON.stringify(imgAbPos));
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
    let aleft = 0;
    let atop = 0;
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
      switch(vsN){
        case 1 :
            imgAbPos.alcohol_x = aleft;
            imgAbPos.alcohol_y = atop;
            break; 
        case 2:
            imgAbPos.bored_x = aleft;
            imgAbPos.bored_y = atop;
            break; 
        case 3:
            imgAbPos.botanical_x = aleft;
            imgAbPos.botanical_y = atop;
            break; 
        case 4:
            imgAbPos.emoji_x = aleft;
            imgAbPos.emoji_y = atop;
            break; 
        case 5:
            imgAbPos.heart_x = aleft;
            imgAbPos.heart_y = atop;
            break; 
        case 6:
            imgAbPos.inspiration_x = aleft;
            imgAbPos.inspiration_y = atop;
            break; 
        case 7:
            imgAbPos.mushroom_x = aleft;
            imgAbPos.mushroom_y = atop;            
            break; 
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
      let sm = this.alt;
      filterName.push(sm);
      console.log(filterName[filterName.length - 1]);
      
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



