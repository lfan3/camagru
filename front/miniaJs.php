<script>
var aUserName = '<?php echo $_SESSION["username"]; ?>';
var aUserId = '<?php echo $_SESSION["id"]; ?>';
var bigPicDiv = document.getElementById("bigPic");
var bigPicImg = document.getElementById("bigPicImg");
var commentPart = document.getElementById("commentPart");
var textArea = document.getElementById("comment");
/*clikc on the image*/
var slideImgs = document.getElementsByClassName("slide");
var username = "anonyme";
var pagiDiv = document.getElementById("pagination");
var galleryTab;
var gibNb;
var slide = document.getElementById("slide");
var lastImgNb;
var pageNb = 0;
var galleryLength;
var nameGid = document.getElementById("gid");
var likeNbd = '0';
/**************************first page images ********************* */

function fiveimges()
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      galleryTab = JSON.parse(this.responseText);
    //  console.log("galleryTab", galleryTab);
      galleryLength = galleryTab.length;
        firstPageImgs(5, galleryTab);
    }
  }
  xhttp.open("GET", "../functions/Fminiature.php?t=" + Math.random(), true);
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
        firstPageImgsfl(f,l, galleryTab, 5);
    }
  }
  xhttp.open("GET", "../functions/Fminiature.php?t=" + Math.random(), true);
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
  xhttp.open("GET", "../functions/Fminiature.php?t=" + Math.random(), true);
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
  xhttp.open("GET", "../functions/Fminiature.php?t=" + Math.random(), true);
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
  xhttp.open("GET", "../functions/Fminiature.php?t=" + Math.random(), true);
  xhttp.send();
  lastImgNb = 11;
  pageNb = 0;
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
  xhttp.open("GET", "../functions/Fminiature.php?t=" + Math.random(), true);
  xhttp.send();
  lastImgNb = 15;
}

function nextPage(){
  pageNb++;
  var max_page;
  
  if(lastImgNb == 5)
    max_page = galleryLength / 5;
  else if(lastImgNb == 10)
    max_page = galleryLength / 10;
  else if(lastImgNb == 15)
    max_page = galleryLength / 15;

  if(lastImgNb == 5 && pageNb < max_page)
    fiveimgesMemo(5*pageNb, 5*(pageNb + 1));
  else if(lastImgNb == 10 && pageNb < max_page)
    tenimgesMemo(10*pageNb, 10*(pageNb + 1));
  else if(lastImgNb == 15 && pageNb < max_page)
    fifimgesMemo(15*pageNb, 15*(pageNb + 1));
}

function prePage(){
  if(pageNb>=1){
    if(lastImgNb == 5)
    fiveimgesMemo(5*(pageNb -1), 5*pageNb);
    else if(lastImgNb == 10)
    tenimgesMemo(10*(pageNb - 1), 10*pageNb);
    else if(lastImgNb == 15)
    fifimgesMemo(15*(pageNb -1), 15*pageNb);
  }
  pageNb--;
}

function firstPageImgs(imgNb, galleryTab){
  let len = galleryTab.length;
  let i = 0;

  while(slide.firstChild){
    slide.removeChild(slide.firstChild);
  }
  while(i < imgNb && (len-1-i) >= 0){
    creatCard(len, i, slide);
    i++;
  }
  lastImgNb = imgNb;
}

function creatCard(len, i, slide){
  //creat card
  var card = document.createElement("div");
  card.setAttribute("class", "card");
  //create image
  var slideImg = FslideImg(len, i);
  slide.appendChild(card);
  card.appendChild(slideImg);
}

function firstPageImgsfl(first, last, galleryTab, imgNb){
  let len = galleryTab.length;
  while(slide.firstChild){
    slide.removeChild(slide.firstChild);
  }
  while(first < last && (len-1-first) >= 0){
    creatCard(len, first, slide);
    first++;
  }
  lastImgNb = imgNb;
}

/******************************chaque image ********************************* */
function FslideImg(len, i){
  var slideImg = document.createElement("IMG");
  slideImg.setAttribute("class", "slide");
  //let imgSrc = (galleryTab[len - i - 1]['img']).replace("../", "");
  let imgSrc = (galleryTab[len - i - 1]['img']);
  let gibNb = galleryTab[len - i - 1]['id'];
  slideImg.setAttribute("src", imgSrc);
 
  slideImg.addEventListener('click', function(e){
    pagiDiv.style.filter = "blur(15px)";
    goback.style.cursor = "zoom-out";
    bigPicImg.src = this.src;
    bigPic.style.display = "block";
    nameGid.setAttribute("name", "gid");
    nameGid.value = gibNb;
    //delete the previous comments with while
   while(commentPart.firstChild){
        commentPart.removeChild(commentPart.firstChild);
    }
    comment_part(displayCommentPart, gibNb);
    likePart(gibNb);
    FdeletImg(gibNb);
  }, true);
  return slideImg;
}

function FdeletImg(gibNb){
    deletImg.addEventListener("click", function(e){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
       // window.location.reload(true);
       fiveimges();
       FzoomOut();
      }
    }
    xhttp.open("POST", "../functions/FdeleteImg.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("gid=" + gibNb);
    }, true);
}

function FzoomOut(){
      bigPic.style.display = "none";
      pagiDiv.style.filter = "none";
      footer.style.marginTop = 1 + "px";
}

/*************commant part controle *********************************** */
function commentOuterDiv(username, comment, i, gibNb){
    let commentOuterDiv = document.createElement("div");
    commentOuterDiv.setAttribute('class','commentOuterDiv');
    styleTop = commentOuterDiv.offsetTop;
    let commenHeight = 480 + 100 * i;
    commentOuterDiv.style.top = commenHeight + "px";
    footer.style.marginTop = 120 + 100 * i + "px";
    commentPart.appendChild(commentOuterDiv);
    
    let usernameDiv = document.createElement("div");
    usernameDiv.setAttribute('class', 'usernameDiv');
    usernameDiv.innerText = username;
    commentOuterDiv.appendChild(usernameDiv);

    let commentTxtDiv = document.createElement("div");
    commentTxtDiv.setAttribute('class', 'commentTxtDiv');
    commentOuterDiv.appendChild(commentTxtDiv);
    commentTxtDiv.innerText = comment;

    let commentDeletBu = document.createElement("button");
    commentDeletBu.setAttribute('class', 'commentDelete');
    commentOuterDiv.appendChild(commentDeletBu);
    commentDeletBu.innerText = 'x';
    username = username.replace("\n ", "");
    if (!aUserId || username !== aUserName)
      commentDeletBu.style.display = "none";
    commentDeletBu.addEventListener("click", function(){
        drop_comment(aUserId, comment, gibNb);
    }, true);
    return (commentOuterDiv);
}

function drop_comment(aUserId, comment, commentTxtDiv){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
      window.location.href = "http://localhost:8080/camagru/front/member.php";
    }
  }
  xhttp.open("POST", "../functions/FdropComment.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.send("gid=" + nameGid.value + "&aUserId=" + aUserId + "&comment=" + comment);
//  window.location.reload(true);
}

function comment_part(callback, gibNb){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var tab = JSON.parse(this.responseText);
              callback(tab, gibNb);
        }
    }
    xhttp.open("GET", "../functions/Fshowcomment.php?gid="+ gibNb, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function displayCommentPart(tab, gibNb){
    let i = 0;
    while(i < tab.length){
        userId = tab[i]['userid'];
        comment = tab[i]['comment'];
        requete(userId, comment, i, gibNb);
        i++;
    }    
}

function requete(username, comment, i){
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){      
                username = this.responseText;
                commentOuterDiv(username, comment, i, gibNb); 
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

function likePart(gibNb){
  show_like_number(gibNb);
  like.addEventListener("click", function(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          let resLiked = this.responseText.replace("\n", "");
          if(resLiked === "liked")
            drop_like(gibNb);
          else{
            document.getElementById("likeNub").innerHTML = parseInt(likeNbd) + 1;
          }
        }
    }
    xhttp.open("POST", "../functions/Flikeadd.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("gid=" + gibNb);
  }, true)
}

function show_like_number(gibNb){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("likeNub").innerHTML =  this.responseText;
            if(this.responseText){
              likeNbd = this.responseText;
            }else{
              likeNbd = "0";
            }
        }
    }
    xhttp.open("GET", "../functions/Flikeshow.php?gid="+gibNb, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function drop_like(gibNb){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
    }
  }
  xhttp.open("POST", "../functions/FdropLike.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.send("gid=" + gibNb);
  window.location.reload(true);
}
/******************************end of like ************************************/

/************************************ get galleryTab *******************************/

window.addEventListener("load", function(event) {
  fiveimges();
});

</script>
