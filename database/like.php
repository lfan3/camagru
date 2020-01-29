<?php
include '../config/database.php';

Class Like {
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
    public function check_before_add($userId, $gid){
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("SELECT userid, gid, i_like FROM liketable WHERE userid = $userId");
            $query->execute();
            $i = 0;
            while($val = $query->fetch(PDO::FETCH_ASSOC)){
                if($val['userid'] == $userId && $val['gid'] == $gid)
                    return 0;
                $i++;
            }
            return 1;
            $dbc = $this->closeConnection();
        }catch(PDOException $e){
            echo "ERRORcheckbeforeadd: ". $e->getMessage();
        }
    }
    public function add_like($userId, $gid){
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("INSERT INTO liketable (userid, gid, i_like) VALUE (:userid, :gid, 1)");
            $query->bindParam(':userid', $userId);
            $query->bindParam(':gid', $gid);
            $query->execute();
            $dbc = $this->closeConnection();
        }catch(PDOException $e){
            echo "ERRORaddlike: ". $e->getMessage();
        }
    }
    public function get_likes_per_img($gid){
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("SELECT SUM(i_like) AS total_like FROM liketable WHERE gid = $gid");
            $query->execute();
            $tab = $query->fetch(PDO::FETCH_ASSOC);
            if($tab)
                return $tab['total_like'];
            else
                return 0;
            $dbc = $this->closeConnection();
        } catch (PDOException $e){
            echo "ERROR likes per img: " . $e->getMessage();
        }
    }
}


//$gc = new Like($DB_DSN,$DB_USER,$DB_PASSWORD);
//$gc->add_like(38, 71);
//$gc->add_like(39, 71);
//$likeNb = $gc->get_likes_per_img(71);
//$vef = $gc->check_before_add(38, 71);
//echo $vef;


?>