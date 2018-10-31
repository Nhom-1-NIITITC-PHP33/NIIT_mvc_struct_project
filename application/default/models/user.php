<?php

class Default_Models_User {

    public $id;
    public $gender;
    public $password;
    public $email;
    public $phone;
    public $address;
    public $status;
    public $fullName;
    public $birthDate;
    public $avatar;
    private $con = null;
    
    public function __construct($db) {
        $this->con = $db;
    }
    
    public function addUser() {
        $query = "INSERT INTO `customers` ( `email`, `password`, `phone`, `address`,  `fullName`, `birthDate`, `gender`) "
                    . "VALUES  ( :email, :password, :phone, :address, :fullName, :birthDate, :gender);";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':fullName', $this->fullName);
        $stmt->bindParam(':birthDate', $this->birthDate);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->execute();
    }
    
    public function checkUser(){
        $query = "SELECT * FROM customers WHERE email = ? AND password = ? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $this->password);
        $stmt->execute();
         $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
}