var bigPicDiv = document.getElementById("bigPic");
var bigPicImg = document.getElementById("bigPicImg");
var commentPart = document.getElementById("commentPart");
/*clikc on the image*/
var slideImgs = document.getElementsByClassName("slide");
var username = "anonyme";
var rest = document.getElementsByClassName("rest");
var pagiDiv = document.getElementById("pagination");
var galleryTab;
var gibNb;
var slide = document.getElementById("slide");
var lastImgNb;
var pageNb = 0;

/**************************first page images ********************* */

function fiveimges()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      galleryTab = JSON.parse(this.responseText);
    //  console.log("galleryTab", galleryTab);
        firstPageImgs(5, galleryTab);
    }
  }
  xhttp.open("GET", "../functions/getSnapShot.php?t=" + Math.random(), true);
  xhttp.send();
  lastImgNb = 5;
  pageNb = 0;
}

function fiveimgesMemo(f, l)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      galleryTab = JSON.parse(this.responseText);
    //  console.log("galleryTab", galleryTab);
        firstPageImgsfl(f,l, galleryTab, 5);
    }
  }
  xhttp.open("GET", "../functions/getSnapShot.php?t=" + Math.random(), true);
  xhttp.send();
  lastImgNb = 5;
}

function tenimges()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      galleryTab = JSON.parse(this.responseText);
    //  console.log("galleryTab", galleryTab);
      firstPageImgs(10, galleryTab, 10);
    }
  }
  xhttp.open("GET", "../functions/getSnapShot.php?t=" + Math.random(), true);
  xhttp.send();
  lastImgNb = 10;
  pageNb = 0;
}

function tenimgesMemo(f,l)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      galleryTab = JSON.parse(this.responseText);
    //  console.log("galleryTab", galleryTab);
      firstPageImgsfl(f,l, galleryTab, 10);
    }
  }
  xhttp.open("GET", "../functions/getSnapShot.php?t=" + Math.random(), true);
  xhttp.send();
  lastImgNb = 10;
}


function fifimges(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      galleryTab = JSON.parse(this.responseText);
    //  console.log("galleryTab", galleryTab);
      firstPageImgs(15, galleryTab);
    }
  }
  xhttp.open("GET", "../functions/getSnapShot.php?t=" + Math.random(), true);
  xhttp.send();
  lastImgNb = 11;
}

function fifimgesMemo(f,l)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      galleryTab = JSON.parse(this.responseText);
    //  console.log("galleryTab", galleryTab);
      firstPageImgsfl(f,l, galleryTab, 15);
    }
  }
  xhttp.open("GET", "../functions/getSnapShot.php?t=" + Math.random(), true);
  xhttp.send();
  lastImgNb = 15;
}

function nextPage(){
  pageNb++;
  if(lastImgNb == 5)
    fiveimgesMemo(5*pageNb, 5*(pageNb + 1));
  else if(lastImgNb == 10)
    tenimgesMemo(10*pageNb, 10*(pageNb + 1));
  else if(lastImgNb == 15)
    fifimges();
}

function firstPageImgs(imgNb, galleryTab){
  let len = galleryTab.length;
  var slideDiv = document.createElement("div");
  let i = 0;
  slideDiv.setAttribute("id", "slide");

  while(slide.firstChild){
    slide.removeChild(slide.firstChild);
  }
  while(i < imgNb && (len-1-i) >= 0){
    creatCard(len, i, slideDiv);
    i++;
  }
  slide.appendChild(slideDiv);

  lastImgNb = imgNb;
  console.log("firstpageimages: " + lastImgNb);

}

function firstPageImgsfl(first, last, galleryTab, imgNb){
  let len = galleryTab.length;
  var slideDiv = document.createElement("div");
  slideDiv.setAttribute("id", "slide");

  while(slide.firstChild){
    slide.removeChild(slide.firstChild);
  }
  while(first < last && (len-1-first) >= 0){
    creatCard(len, first, slideDiv);
    first++;
  }
  slide.appendChild(slideDiv);
  lastImgNb = imgNb;
}

function firstPageImgsflt(first, last, galleryTab){
  let len = galleryTab.length;
  var slideDiv = document.createElement("div");
  slideDiv.setAttribute("id", "slide");

  while(slide.firstChild){
    slide.removeChild(slide.firstChild);
  }
  while(first < last && (len-1-first) >= 0){
    creatCard(len, first, slideDiv);
    first++;
  }
  slide.appendChild(slideDiv);
  lastImgNb = 10;
}


/************************** card( slideImg + baseDiv)************************* */
function creatCard(len, i, slideDiv){
  //creat card
  var card = document.createElement("div");
  card.setAttribute("class", "card");
  //create image
  var slideImg = FslideImg(len, i);
  slideDiv.appendChild(card);
  card.appendChild(slideImg);
}

/******************************chaque image ********************************* */
function FslideImg(len, i){
  var slideImg = document.createElement("IMG");
  slideImg.setAttribute("class", "slide");
  //let imgSrc = (galleryTab[len - i - 1]['img']).replace("../", "");
  let imgSrc = (galleryTab[len - i - 1]['img']);
  let gibNb = galleryTab[len - i - 1]['id'];
  slideImg.setAttribute("src", imgSrc);
 
  let rest1 = document.getElementById("rest1");
  let rest2 = document.getElementById("rest2");
  slideImg.addEventListener('click', function(e){
    pagiDiv.style.filter = "blur(5px)";
    rest1.style.cursor = "zoom-out";
    rest2.style.cursor = "zoom-out";
    bigPicImg.src = this.src;
    bigPic.style.display = "block";
    //delete the previous comments with while
   while(commentPart.firstChild){
        commentPart.removeChild(commentPart.firstChild);
    }
    comment_part(displayCommentPart, gibNb);
    show_like_number(gibNb);
  }, true);
  return slideImg;
}

function FzoomOut(){
  for(let i=0; i<rest.length; i++){
    rest[i].addEventListener('click', function(e){
      bigPic.style.display = "none";
      pagiDiv.style.filter = "none";
    })
  }
}

/*************commant part controle *********************************** */
function commentOuterDiv(username, comment, i){
    let commentOuterDiv = document.createElement("div");
    commentOuterDiv.setAttribute('class','commentOuterDiv');
    styleTop = commentOuterDiv.offsetTop;
    commentOuterDiv.style.top = 530 + 100 * i + "px";
    commentPart.appendChild(commentOuterDiv);
    
    let usernameDiv = document.createElement("div");
    usernameDiv.setAttribute('class', 'usernameDiv');
    usernameDiv.innerText = username;
    commentOuterDiv.appendChild(usernameDiv);
    let commentTxtDiv = document.createElement("div");
    commentTxtDiv.setAttribute('class', 'commentTxtDiv');
    commentOuterDiv.appendChild(commentTxtDiv);
    commentTxtDiv.innerText = comment;
    return (commentOuterDiv);
}

function comment_part(callback, gibNb){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var tab = JSON.parse(this.responseText);
              callback(tab);
        }
    }
    xhttp.open("GET", "../functions/Fshowcomment.php?gid="+ gibNb, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function displayCommentPart(tab){
    let i = 0;
    while(i < tab.length){
        userId = tab[i]['userid'];
        comment = tab[i]['comment'];
        requete(userId, comment, i);
        i++;
    }        
}

function requete(username, comment, i){
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){      
                username = this.responseText;
                commentOuterDiv(username, comment, i); 
            }
        }
        xhttp.open("GET", "../functions/FgetUserNameFromId.php?userId="+userId, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send();
}
/*********************fin the comment controle ******************************* */


/******************************begining of like ****************************** */
/*clike ont he like icone*/
var like = document.getElementById("like");
var likeNb = document.getElementById("likeNub");

like.addEventListener("click", function(){
    let i = 0;
    let nb = likeNb.textContent; 
    if(!nb)
        i++;
    else{
        i = nb;
        i++;
    }
    likeNb.textContent = i;
    add_like();
}, true)
function add_like(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            return;
        }
    }
    xhttp.open("POST", "../functions/Flikeadd.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("gid=" + gibNb);
}
function show_like_number(gibNb){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("likeNub").innerHTML =  this.responseText;
        }
    }
    xhttp.open("GET", "../functions/Flikeshow.php?gid="+gibNb, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();
}
/******************************end of like ************************************/



/************************************ get galleryTab *******************************/



window.addEventListener("load", function(event) {
  fiveimges();

  FzoomOut();
});