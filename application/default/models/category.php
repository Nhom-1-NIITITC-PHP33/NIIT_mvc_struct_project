<?php

class Default_Models_Category {

    public $id;
    public $categoryID;
    public $subCategoryID;
    public $categoryName;
    public $description;
    private $con = NULL;

    public function __construct($db) {
        $this->con = $db;
    }

    public function getAllParentCategory() {
        $query = "SELECT id, categoryName FROM categories WHERE subCategoryID='' ";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return NULL;
        }
    }

    public function getAllSubCategory() {
        $query = "SELECT id, categoryName FROM categories WHERE subCategoryID!='' "; //AND subCategoryID = categoryID
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return NULL;
        }
    }

}
