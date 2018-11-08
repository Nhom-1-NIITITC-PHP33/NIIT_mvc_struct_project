<?php

class Default_Models_Order {

    public $orderID;
    public $customerID;
    public $orderDate;
    public $payment;
    public $shiperID;
    public $shiperDate;
    public $status;
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function addOrder() {
        $query = "INSERT INTO orders SET customerID=:customerID, payment=:payment";
        $stmt = $this->con->prepare($query);
               
        $this->customerID = htmlspecialchars(strip_tags($this->customerID));
        $this->payment = htmlspecialchars(strip_tags($this->payment));
        $stmt->bindParam(':customerID', $this->customerID);
        $stmt->bindParam(':payment', $this->payment);
        
        $stmt->execute();
    }

}
