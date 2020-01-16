<div id = "header">
    <?php if(isset($_SESSION['id'])) { ?>
        <a href="logout.php" id="logout" class="headerlink">logout</a> <br />
        <a href="montage.php" id = "montage" class="headerlink">take a picture</a> <br/>
        <a href="galerie.php" id = "galerie" class="headerlink"> visite the galerie </a> <br/>
    <?php } ?>
 
</div>