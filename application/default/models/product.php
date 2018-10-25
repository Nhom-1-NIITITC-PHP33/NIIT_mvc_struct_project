<?php

class Default_Models_Product {

    public $id;
    public $productID;
    public $productName;
    public $supplierID;
    public $categoryID;
    public $quantity;
    public $unitPrice;
    public $discount;
    public $status;
    public $description;
    public $image;
    public $created;
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function getAllProduct() {
        $query = "SELECT id, productName, unitPrice, discount, image FROM products";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function getDetailProductByID() {
        $query = "SELECT * FROM products WHERE id=? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->id)));
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

}
?>

