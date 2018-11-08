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
public function getInforOrderByCustomerID(){
    $query = "SELECT * FROM orders WHERE customerID = ? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->customerID)));
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
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
