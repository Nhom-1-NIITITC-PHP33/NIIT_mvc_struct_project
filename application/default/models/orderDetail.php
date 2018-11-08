<?php

class Default_Models_OrderDetail {

    public $orderID;
    public $productID;
    public $quantity;
    public $price;
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function addOrderDetail() {

        $query = "INSERT INTO orders (productID, quantity, price) value(?, ?, ?)";
        $stmt = $this->con->prepare($query);
//            $this->orderID = htmlspecialchars(strip_tags($this->orderID));
        $this->productID = htmlspecialchars(strip_tags($this->productID));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->price = htmlspecialchars(strip_tags($this->price));

        $stmt->bindParam(1, $this->productID);
        $stmt->bindParam(2, $this->quantity);
        $stmt->bindParam(3, $this->price);
        foreach ($_SESSION['cart_item'] as $item) {
            $this->productID=$item[''];
            $stmt->execute();
        }
    }

}
