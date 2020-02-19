<?php
session_start();
?>

<style>
#notif{
    visibility : hidden;
}
body{
    background-color:#6fd191;
}
h1{
    align-items:center;
    display:flex;
    flex-direction:column;
    justify-content:center; 
    margin-top : 2em;
}
.wrap {
    height:70vh;
    transition:background-color 400ms ease;
}

.flex-form{
    align-items:center;
    display:flex;
    flex-direction:column;
    justify-content:center;
}
.select__list{
    display: inline-flex;
    justify-content: space-between;
    list-style:none;
    padding : 0;
   /* margin : 0;*/
    margin-bottom: 1rem;
    position:absolute;
    top : 6rem;
}
.select__label{
    color:white;
    cursor:pointer;
    font-weight : 500px;
    opacity :0.6;
    padding : 0 2rem;
    text-transform : capitalize;
}
.select__label--active{
    opacity:1;
}

.ui-button,
.ui-elem{
    all:unset;
    border-radius: .7rem;
    height: 3rem;
    transition: all 300ms ease;
    width: 25rem;
    background-color:white;
    margin: 0.5rem 0;
    text-align : center;
}

textarea:focus,
.ui-elem:focus{
    outline-color:white;
}
#pointer{
    border-left: 1rem solid transparent;
    border-right: 1rem solid transparent;
    border-bottom: 1rem solid white;
    height: 0;
    position: absolute;
    top : 8.5rem;
    transition: all 30s ease;
    width: 0;
    left:32.5rem;
}
.ui-button{
    background:rgba(255,255,255,0.2);
    color:white;
    font-weight:500;
    margin:0.5rem 0;
    text-transform:capitalize;
    transition: background 300ms;
}
.ui-button:hover{
    background: rgba(0,0,0, 0.1);
}

a {
    color:white;
    cursor:pointer;
    text-transform : capitalize;
    text-decoration: none;
}
footer{
    position:relative;
    margin : 0 auto;
    text-align : center;
    top : 3em;
}
</style>

<?php if($_SESSION['id']){
    include '../deco/header.php';
}?>

<body>
<h1>Edit Profile</h1>

<div id="baseInfo" class="wrap">
    <form name='signUpForm' class="flex-form" method="POST" action="../forms/updateProf.php?GET=notif">
    <label> username:  </label>
    <input type="text" id="username" name="username" value = <?php echo $_SESSION['username'] ?>><br />
    <label> email: </label>
    <input type="text" id="email" name="email" value = <?php echo $_SESSION['email'] ?>><br />
    <hr>
    <label> password: </label>
    <input type="password" id="passwd" name="passwd"><br />
    <label> confirm password: </label>
    <input type="password" id="confpass" name="confpass"><br />
    <hr>
    <div>
        <p style="text-align:center"><label> Choose your preference:  </label></p>
        <select name="pref" id="pref">
        <option >  ------------------------- choose your option ------------------------ </option> 
        <option>
            I do not want to receive the notification of new commentary per email.
        </option>
        <option>
            I want to receive the notification of new commentary per email.
        </option>
        </select>
    </div>
    <br/>
    <input type="submit" class="preve" value="submit" id ="submit" onclick="notif()"><br />
    <div id="notif" > PROFILE SAVED </div>
    <span class="error">
        <?php 
        echo "<p>" . $_SESSION['error'] . "</p>";
        ?>
    </span>
</div>
<footer>
	<?php include '../deco/footer.php'; ?>
</footer>
</body>
<script>

/******************* redirection from php and give a GET onsubmit **********/
function notif(){
    let note = window.location.href.indexOf("notif");
    var notif = document.getElementById("notif");
    
    if(note != -1){
        notif.style.visibility = "visible";
    }
    setTimeout(() => {
        notif.style.visibility = "hidden";
        window.location.href = "profile.php";
        console.log("hidden");
    }, 3000);
}
notif();

</script>