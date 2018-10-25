<?php
class Admin_Controllers_Index extends Libs_Controller{
	public function __contruct(){
		parent::__contruct();
	}
	public function index(){
		$this->view->render("index/index");
	}
	public function add(){
		$this->view->render("product/add");
	}
}
?>