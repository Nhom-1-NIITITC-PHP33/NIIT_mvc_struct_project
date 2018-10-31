<?php

class Default_Controllers_User extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function register() {

        $this->view->render('user/register');
    }
    
    public function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    public function registerProcess(){
        $email = $this->test_input($_POST['email']);
        $password = $this->test_input($_POST['password']);
        $phone = $this->test_input($_POST['phone']);
        $address = $this->test_input($_POST['address']);
        $fullName = $this->test_input($_POST['name']);
        $birthDate = $this->test_input($_POST['date']);
        
        $database = new Libs_Model;
        $db = $database->getConnection();
        $user = new Default_Models_User($db);
        $user->email = $email;
        $user->password = $password;
        $user->phone = $phone;
        $user->address = $address;
        $user->fullName = $fullName;
        $user->birthDate = $birthDate;
        $user->addUser();
        //echo "<script>window.location.href='".URL_BASE."user/login';</script>";
    }

        public function  login(){
        $this->view->render('user/login');
    }
    
    public function proccess(){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        $database = new Libs_Model;
        $db = $database->getConnection();
        $user = new Default_Models_User($db);
        $user->email = $email;
        $user->password = $pass;
        
        if($user->checkUser()==true){
            //Caaps session
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $email;
            //Dieu huong
            echo "<script>window.location.href='".URL_BASE."';</script>";
        }else{
            //redirect ve login
            echo "<script>window.location.href='".URL_BASE."user/login';</script>";
        }
    }

   

}

?>