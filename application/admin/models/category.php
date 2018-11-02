<?php
    class Admin_Models_Category
    {
        //Khai bao cac thuoc tinh cua bang category\
        public $categoryID;
        public $subCategoryID;
        public $categoryName;
        public $description;
        public $created;
        
        //Khai bao doi tuong csdl
        private $con = null;
        
        //Xay dung ham khoi tao cua doi tuong 'category'
        public function __construct($db) {
            $this->con = $db;
        }
        public function addCategory(){
            $query = " INSERT INTO categories SET subCategoryID=:subcategoryID, categoryName=:categoryName, description:=description, created=:created";
            $stmt = $this->con->prepare($query);
            // Lam sach du lieu

            $this->subCategoryID = htmlspecialchars(strip_tags($this->subCategoryID));
            $this->categoryName = htmlspecialchars(strip_tags($this->categoryName));
            $this->created = date('Y-m-d H:i:s');
            
            //tien hanh bind cac gia tri cho truy van
            $stmt->bindParam(":subCategoryID", $this->subCategoryID);
            $stmt->bindParam(":categoryName", $this->categoryName);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":created", $this->created);
            
            if( $stmt->execute()){
                return true;
            }else{
                return FALSE;
            }
            
        }
        public function updateCategory() {
            $query ="UPDATE categories SET subCategoryID=:subCategoryID, categoryName=:categoryName, description=:description, WHERE categoryID=:categoryID";
            $stmt= $this->con->prepare($query);
            // Lam sach du lieu
            $this->categoryID = htmlspecialchars(strip_tags($this->categoryID));
            $this->subCategoryID = htmlspecialchars(strip_tags($this->subCategoryID));
            $this->categoryName = htmlspecialchars(strip_tags($this->categoryName));
            
            //tien hanh bind cac gia tri cho truy van
            
            $stmt->bindParam(":subCategoryID", $this->subCategoryID);
            $stmt->bindParam(":categoryName", $this->categoryName);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":categoryID", $this->categoryID);
            
            if( $stmt->execute()){
                return true;
            }else{
                return FALSE;
            }
            
        }

        public function deleteCategory() {
            $query = "DELETE FROM categories WHERE categoryID=:categoryID";
            $stmt = $this->con->prepare($query);
            // Lam sach du lieu
            $this->categoryID = htmlspecialchars(strip_tags($this->categoryID));
            
            //tien hanh bind cac gia tri cho truy van
            $stmt->bindParam(":categoryID", $this->categoryID);
            
            if( $stmt->execute()){
                return true;
            }else{
                return FALSE;
            }
            
        }
    }
    ?>