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
    public function get_user_email($id){
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("SELECT id, email FROM users Where id = $id");
            $query->execute();
            $val = $query->fetch(PDO::FETCH_ASSOC);
            $email = $val['email'];
            return ($email);
        } catch(PDOException $e) {
            echo "getUserEmail Error " . $e->getMessage();
        }
    }
    public function update_info($id, $username, $email, $passwd){
        try{
            $passwd = password_hash($passwd, PASSWORD_DEFAULT);
            $data = [
                'username' => $username,
                'email' => $email,
                'passwd' => $passwd
            ];
            $dbc = $this->openConnection();
            $query = $dbc->prepare("UPDATE users SET username=:username, email=:email, passwd=:passwd  Where id=$id");
            $query->execute($data);
        } catch(PDOException $e) {
            echo "update_info Error " . $e->getMessage();
        }
    }
    public function update_info_sans_pass($id, $username, $email){
        try{
            $passwd = password_hash($passwd, PASSWORD_DEFAULT);
            $data = [
                'username' => $username,
                'email' => $email
            ];
            $dbc = $this->openConnection();
            $query = $dbc->prepare("UPDATE users SET username=:username, email=:email Where id=$id");
            $query->execute($data);
        } catch(PDOException $e) {
            echo "update_info Error " . $e->getMessage();
        }
    }
    public function update_user_preference_p($id){
        try{
            $passwd = password_hash($passwd, PASSWORD_DEFAULT);
            $dbc = $this->openConnection();
            $query = $dbc->prepare("UPDATE users SET preference = 1 Where id=$id");
            $query->execute($data);
        } catch(PDOException $e) {
            echo "update_user_prefe_p Error " . $e->getMessage();
        }
    }
    public function update_user_preference_n($id){
        try{
            $passwd = password_hash($passwd, PASSWORD_DEFAULT);
            $dbc = $this->openConnection();
            $query = $dbc->prepare("UPDATE users SET preference = 0 Where id=$id");
            $query->execute($data);
        } catch(PDOException $e) {
            echo "update_user_prefe_n Error " . $e->getMessage();
        }
    }
    public function get_user_preference($id){
        try{
            $dbc = $this->openConnection();
            $query = $dbc->prepare("SELECT id, preference FROM users Where id = $id");
            $query->execute();
            $val = $query->fetch(PDO::FETCH_ASSOC);
            $pref = $val['preference'];
            return ($pref);
        } catch(PDOException $e) {
            echo "getUserEmail Error " . $e->getMessage();
        }
    }
}
///****************************************/
//$db = new Users($DB_DSN,$DB_USER,$DB_PASSWORD);
//echo $db->get_user_preference(38);
//echo $db->get_user_(38);
//echo $db->get_user_name(39);
/*****************************************/
?>