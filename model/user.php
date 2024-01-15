<?php

    // require_once '../config.php';

class user{
    private $id_user;
    private $name_user;
    private $email_user;
    private $password_user;
    private $id_role;

    public function __construct(){

    }

    public function __get($prop){
        return $this->$prop;
    }

    public function __set($prop, $value){
        $this->$prop = $value;
    }
    
    public static function adduser($name_user, $email_user, $password_user){
        $sql = DBconnection::connection()->prepare("INSERT INTO users(name_user, email_user, password_user, id_role) VALUES (:name_user, :email_user, :password_user, 1)");
        $sql->bindParam(':name_user', $name_user);
        $sql->bindParam('email_user', $email_user);
        $sql->bindParam(':password_user', $password_user);
        $sql->execute();
    }

    public function login($email_user, $password_user){
        $sql = DBconnection::connection()->prepare("SELECT * FROM users WHERE email_user = :email_user and password_user = :password_user");
        $sql->bindParam(':email_user', $email_user);
        $sql->bindParam('password_user', $password_user);
        $sql->execute();

        if($sql->rowCount() == 0){
            return false;

           
        }else{
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $this->id_role = $result['id_role'];
            $this->id_user = $result['id_user'];
            if($result['id_role'] == 1){
                header('Location: ../index.php');
            }
            else if ($result['id_role'] == 2){
                header ('Location: ../dashboard-admin.php');
            }
            return $this->id_user;           
        }

    }

    public static function CountUsers(){
        $req = DBconnection::connection()->query("SELECT COUNT(*) FROM users where id_role = 1");
        $result = $req->fetch(PDO::FETCH_NUM);

        return $result;

    }

    public static function logout() {
        session_destroy();
        unset($_SESSION['id_user']);
        return true;
    }

    public static function checkadmin($id_user){
        $sql = DBconnection::connection()->query("SELECT * from users WHERE id_role = 2");

        if($sql->rowCount() == 0){
            return false;
        }
        return true;
    }
}