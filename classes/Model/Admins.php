<?php 
  namespace Techstore\Classes\Models;
  use Techstore\Classes\DB;
use Techstore\Classes\Session;

class Admins extends DB{

    public function __construct()
    {
        $this->table = 'admins';
        $this->connect();
    }

    public function login($email, $password,Session $session){
        $sql1 = "SELECT * FROM $this->table WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql1);
        $admin = mysqli_fetch_assoc($result);

        if(!empty($admin)){
           $pass = $admin['password'];
           if(password_verify($password, $pass)){
            
               $session->set("adminId", $admin['id']);
               $session->set("adminName", $admin['name']);
               $session->set("adminEmail", $admin['email']);
           
            return true;
           }else{
              return "This Password Is Not Correct";
           }
        }else{
            return "This Email Is Invalid";
        }
    }

    public function logout(Session $session){
        $session->removeSession('adminId');
        $session->removeSession('adminName');
        $session->removeSession('adminEmail');
    }


  }
?>