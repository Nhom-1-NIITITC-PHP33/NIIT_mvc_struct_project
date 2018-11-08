<?php

class Admin_Controllers_Index extends Libs_Controller {

    public function __contruct() {
        parent::__contruct();
    }

    public function index() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'product'
        $product = new Default_Models_Product($db);
        $this->view->proData = $product->getAllProduct();


        //Khởi tạo model 'Employee'
        $emp = new Admin_Models_Employee($db);
        $this->view->empData = $emp->getEmployeeByInfo();


        $this->view->render('index/index');
    }

    public function detail() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $product = new Default_Models_Product($db);
        //Lấy giá trị id trên URL
        $product->productID = isset($_GET['id']) ? $_GET['id'] : "";
        $this->view->proDetail = $product->getDetailProductByID();

        $dataID = $product->getDetailProductByID();


        $category = new Default_Models_Category($db);
        $category->categoryID = $dataID['categoryID'];
        $this->view->catDetail = $category->getCategoryByID();

        $this->view->render('product/detail');
    }

    public function add() {
        $databasse = new Libs_Model();
        $db = $databasse->getConnection();

//        Khởi tạo model Product
        $product = new Admin_Models_Product($db);
        $this->view->proData = $product;
        ;

//        Khởi tạo model Category
        $category1 = new Default_Models_Category($db);
        //lấy danh mục cha
        $this->view->catData1 = $category1->getAllParentCategory();
        //lấy danh mục con
        $this->view->catData2 = $category1->getCategoryBySubID();
        //Thêm danh mục cha
        $category2 = new Admin_Models_Category($db);
        $this->view->catData = $category2;

        $this->view->render("product/add");
    }

    //Lấy tất cả danh mục theo subcategoryID
    //Ham xu ly lay ra cat ca sp co categoryid
    public function getCategoryBySubID() {
//        $categoryId = $_POST['categoryId'];
//        $category = new Default_Models_Category($db);
//        $category->subCategoryID = $categoryId;
//        $cat = $category->getCategoryBySubID();
//
//        while ($row = $cat->fetch(PDO::FETCH_ASSOC)) {
//
//            echo "<option value='" . $row['subCategoryID'] . "'>" . $row['categoryName'] . "</option>";
//        }
        echo "hello";
    }

}

?>