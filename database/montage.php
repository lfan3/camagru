<?php
include '../config/database.php';

Class Gallery {
    private $db;
    private $user;
    private $passwd;
    protected $connex;

    public function __construct($db, $user, $passwd) {
        $this->db = $db;
        $this->user = $user;
        $this->passwd = $passwd;
    }
    protected function openConnection(){
        try {
            $this->connex = new PDO($this->db, $this->user, $this->passwd);
            $this->connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connex;
        } catch (PDOException $e) {
            echo "GalleryConnection Error " . $e->getMessage();
        }
    }
    public function closeConnection(){
        $this->connex = null;
    }
    public function add_montage($userId, $imgPath) {
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("INSERT INTO gallery (userid, img) VALUE (:userid, :img)");
            $query->bindParam(':userid', $userId);
            $query->bindParam(':img', $imgPath);
            $query->execute();
            $dbc = $this->closeConnection();
    }catch(PDOException $e){
            echo "ERRORaddmontage: ". $e->getMesssage();
        }
    }
    public function get_all_gallery(){
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("SELECT id, userId, img FROM gallery");
            $query->execute();
            $i = 0;
            $tab = [];
            while($val = $query->fetch(PDO::FETCH_ASSOC)){
                $tab[$i] = $val;
                $i++;
            }
            $dbc = $this->closeConnection();
            return ($tab);
        }catch(PDOException $e){
            echo "ERRORgetallgallery: ". $e->getMesssage();
        }
    }
}
/******** utilisation de cette class !!! *********/
//$gc = new Gallery($DB_DSN,$DB_USER,$DB_PASSWORD);
//$gc->add_montage(38, "../filters/123.png");
//echo "hello";
//$tab = $gc->get_all_gallery();
//print_r($tab[0]);
