<?php

class Admin_Models_Product {
    
    //Khai báo các thuộc tính của bảng Product
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
    //Khai báo đối tượng  CSDl        
    private $con = null;

    //Xây dựng hàm khởi tạo của đối tượng "products"

    public function __construct($db) {
        $this->con = $db;
    }
    
    public function addProduct() {
        $query = "INSERT INTO products SET productName=:productName, unitPrice=:unitPrice, discount=:discount, description=:description, image=:image, categoryID=:categoryID, created=:created";
        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu 
        $this->productName = htmlspecialchars(strip_tags($this->productName));
        $this->unitPrice = htmlspecialchars(strip_tags($this->unitPrice));
        $this->discount = htmlspecialchars(strip_tags($this->discount));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->categoryID = htmlspecialchars(strip_tags($this->categoryID));
        $this->created = date('Y-m-d H:i:s');

        //Tiến hành bind các giá trị cho truy vấn 

        $stmt->bindParam(":productName", $this->productName);
        $stmt->bindParam(":unitPrice", $this->unitPrice);
        $stmt->bindParam(":discount",$this->discount);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":categoryID", $this->categoryID);
        $stmt->bindParam(":created", $this->created);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
        public function updateProduct() {
        $query = "UPDATE products SET productName=:productName, unitPrice=:unitPrice, discount=:discount, description=:description, image=:image"
                . " categoryID=:categoryID WHERE productID=:productID";
        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu 
        $this->productName = htmlspecialchars(strip_tags($this->productName));
        $this->unitPrice = htmlspecialchars(strip_tags($this->unitPrice));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->categoryID = htmlspecialchars(strip_tags($this->categoryID));
        $this->productID = htmlspecialchars(strip_tags($this->productID));


        //Tiến hành bind các giá trị cho truy vấn
       
        $stmt->bindParam(":productName", $this->productName);
        $stmt->bindParam(":unitPrice", $this->unitPrice);
        $stmt->bindParam(":discount", $this->discount);
        $stmt->bindParam(":image",$this->image);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":categoryID", $this->categoryID);
        $stmt->bindParam(":productID", $this->productID);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
        public function deleteProduct() {
        $query = " DELETE FROM products WHERE productID=:productID";

        $stmt = $this->con->prepare($query);

        $stmt->bindParam(":productID", $this->productID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
     
}
