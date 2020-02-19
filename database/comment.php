<?php
include '../config/database.php';

Class Comment {
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
            echo "Comment Connection Error " . $e->getMessage();
        }
    }
    public function closeConnection(){
        $this->connex = null;
    }
    public function add_comment($userId, $commentText, $gid) {
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("INSERT INTO comment (userid, gid, comment) VALUE (:userid, :gid, :comment)");
            $query->bindParam(':userid', $userId);
            $query->bindParam(':gid', $gid);
            $query->bindParam(':comment', $commentText);
            $query->execute();
            $dbc = $this->closeConnection();
        }catch(PDOException $e){
            echo "ERRORaddcomment: ". $e->getMessage();
        }
    }
    public function drop_comment($userId, $commentText, $gid){
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("DELETE FROM comment WHERE (userid =:userid AND gid =:gid AND comment =:comment)");
            $query->bindParam(':userid', $userId);
            $query->bindParam(':gid', $gid);
            $query->bindParam(':comment', $commentText);
            $query->execute();
            $dbc = $this->closeConnection();
        }catch(PDOException $e){
            echo "drop_comment Error " . $e->getMessage();
        }

    }
    public function get_comment_from_img($gid) {
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("SELECT userid, comment, gid FROM comment WHERE gid = $gid");
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
            echo "ERRORgetcomment: ". $e->getMessage();
        }
    }
    
}

/******** utilisation de cette class !!! *********/
//$gc = new Comment($DB_DSN,$DB_USER,$DB_PASSWORD);
//$gc->drop_comment(38, "i like 72", 72);
//$gc->add_comment(38, "i love it", 71);
//$gc->add_comment(38, "such wonderful", 71);
//$gc->add_comment(39, "lovely picture", 71);

//echo "hello";
//
//$tab = $gc->get_comment_from_img(71);
//print_r($tab);

