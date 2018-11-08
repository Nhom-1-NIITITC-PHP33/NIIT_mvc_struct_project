<?php

class Default_Models_Advertise {

    public $advertiseId;
    public $advertiseName;
    public $description;
    public $image;
    
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function getAllSlide() {
        $query = "SELECT advertiseId, image FROM advertises";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }



    
}
?>

