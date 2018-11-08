<?php

class Default_Models_Product {

    public $productID;
    public $productCode;
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
    //search product
    public function searchProduct($name){
        
            $query = "$name";
            $stmt = $this->con->prepare($query);
            $stmt->execute();

            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                return $stmt;
            } else {
                return null;
            }
        
    }
    
    public function getAllProduct() {
        $query = "SELECT productID, productCode, productName, unitPrice, discount, image, description FROM products";
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
        $query = "SELECT * FROM products WHERE productID=? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->productID)));
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function getAllProductByCategoryID() {
        $query = "SELECT * FROM products WHERE categoryID = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->categoryID)));
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function getNewProduct() {
        $query = "SELECT productID, image FROM products ORDER BY created DESC LIMIT 0, 10";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }
    public function getDetailProductByCode() {
        $query = "SELECT * FROM products WHERE productCode = ? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->productCode)));
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

