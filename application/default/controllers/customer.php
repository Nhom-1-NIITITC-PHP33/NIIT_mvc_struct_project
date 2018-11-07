<?php

class Default_Controllers_Customer extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function register() {

        $this->view->render('customer/register');
    }

    public function showHint() {
        echo 'hello';
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function registerProcess() {
        echo 'here';
        $email = $this->test_input($_POST['email']);
        $password = $this->test_input($_POST['password']);
        $phone = $this->test_input($_POST['phone']);
        $address = $this->test_input($_POST['address']);
        $fullName = $this->test_input($_POST['name']);
        $birthDate = $this->test_input($_POST['date']);
        $gender = $this->test_input($_POST['gender']);

        $regex_email = "/^[A-Z0-9a-z._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,4}$/";
        $error = FALSE;
        if ($email == "" || $password == "" || $phone == "" || $address == "" || $fullName == "" || $birthDate == "" || $gender == "" || !preg_match($regex_email, $email)) {
            $error = true;
            echo "<script>window.location.href='" . URL_BASE . "customer/register';</script>";
        } else {
            $database = new Libs_Model;
            $db = $database->getConnection();
            $customer = new Default_Models_Customer($db);
            $customer->email = $email;
            $customer->password = $password;
            $customer->phone = $phone;
            $customer->address = $address;
            $customer->fullName = $fullName;
            $customer->birthDate = $birthDate;
            $customer->gender = $gender;
            if ($customer->checkEmail() == FALSE) {
                $customer->addCustomer();
                echo "<script>window.location.href='" . URL_BASE . "customer/login';</script>";
            } else {
                echo "<script>window.location.href='" . URL_BASE . "customer/register';</script>";
            }
        }
    }

    public function login() {
        $this->view->render('customer/login');
    }

    public function loginProccess() {
        $email = $this->test_input($_POST['email']);
        $password = $this->test_input($_POST['password']);

        $database = new Libs_Model;
        $db = $database->getConnection();
        $customer = new Default_Models_Customer($db);
        $customer->email = $email;
        $customer->password = $password;

        if ($customer->checkCustomer() == true) {
            //Caaps session
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['name']=$fullName;
            //Dieu huong
            echo "<script>window.location.href='" . URL_BASE . "';</script>";
        } else {
            //redirect ve login
            echo "<script>window.location.href='" . URL_BASE . "customer/login';</script>";
        }
    }

    public function logoutProcess() {
        session_unset();
        echo "<script>window.location.href='" . URL_BASE . "';</script>";
    }
}
?>