var bigPicDiv = document.getElementById("bigPic");
var bigPicImg = document.getElementById("bigPicImg");
var commentPart = document.getElementById("commentPart");
/*clikc on the image*/
var slideImgs = document.getElementsByClassName("slide");
var username = "anonyme";
var rest = document.getElementsByClassName("rest");
var pagiDiv = document.getElementById("pagination");
var imgTab;
var gibNb;

/**************************first page images ********************* */
function firstPageImgs(imgNb, imgTab){
  let i = 0;
  let len = imgTab.length;
  var slideDiv = document.createElement("div");

  slideDiv.setAttribute("id", "slide");
  while(i < imgNb && (len-1-i) >= 0){
    creatCard(len, i, slideDiv);
    i++;
  }
  pagiDiv.appendChild(slideDiv);
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
  //let imgSrc = (imgTab[len - i - 1]['img']).replace("../", "");
  let imgSrc = (imgTab[len - i - 1]['img']);
  let gibNb = imgTab[len - i - 1]['id'];
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

function plus(callback){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      imgTab = JSON.parse(this.responseText);
      console.log("imgtAB", imgTab);
      callback(5, imgTab);
    }
  }
  xhttp.open("GET", "../functions/getSnapShot.php?t=" + Math.random(), true);
  xhttp.send();
}

window.addEventListener("load", function(event) {
    plus(firstPageImgs);
    FzoomOut();
});