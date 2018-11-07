<?php

class Default_Controllers_User extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }
    public function login(){
        $this->view->render('user/login');
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public function loginProccess() {
        $email = $this->test_input($_POST['email']);
        $password = $this->test_input($_POST['password']);

        $database = new Libs_Model;
        $db = $database->getConnection();
        $employee = new Admin_Models_Employee($db);
        $employee->email = $email;
        $employee->password = $password;

        if ($employee->checkEmployee() == true) {
            //Caaps session
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['name']=$fullName;
            //Dieu huong
            echo "<script>window.location.href='" . URL_BASE . "';</script>";
        } else {
            //redirect ve login
            echo "<script>window.location.href='" . URL_BASE . "user/login';</script>";
        }
    }
   

}

?>