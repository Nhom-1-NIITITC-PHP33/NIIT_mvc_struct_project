<?php

class Default_Controllers_User extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function register() {

        $this->view->render('user/register');
    }
    public function  login(){
        $this->view->render('user/login');
    }

   

}

?>