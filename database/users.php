<?php
include '../config/database.php';

Class Users {
    private $db;
    private $user;
    private $passwd;
    protected $connex;

    public function __construct($db, $user, $passwd){
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
    public function get_user_name($id) {
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("SELECT id, username FROM users Where id = $id");
            $query->execute();
            $val = $query->fetch(PDO::FETCH_ASSOC);
            $username = $val['username'];
            return ($username);
        } catch(PDOException $e) {
            echo "getUserName Error " . $e->getMessage();
        }
    }
}
/**************************************** 
$db = new Users($DB_DSN,$DB_USER,$DB_PASSWORD);
echo $db->get_user_name(38);
echo $db->get_user_name(39);
*****************************************/
?>