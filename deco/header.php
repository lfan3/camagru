
<style>
ul{
    display:flex;
    justify-content: space-evenly;
    list-style: none;
}
a{
    color:white;
    text-decoration:none;
    opacity:0.8;
}
a:hover{
    text-decoration : underline;
}
a:active{
    color:black;
}
li{
    text-transform : uppercase;
    font-family : helvetica;
}
#welcome{
    font-family: Comic Sans MS; 
    font-size:20px;
    text-align : center;
    margin:auto;
    margin: 1.5em;
}
</style>
<div id = "header">
        <div id="welcome" > Welcome <?php echo '<span id = "username">' . $_SESSION['username'] . ' !</span>'?> </div>
        <ul id = "headerList">
            <li> <a href="gallery.php" id="gallery" class="headerlink">grand gallery </li>
            <li> <a href="member.php" id="gallery" class="headerlink">camagru </li>
            <li> <a href="profile.php" id="profile" class="headerlink">my profile</a> </li>
            <li> <a href="logout.php" id="logout" class="headerlink">logout</a> </li>
        </ul>

</div>