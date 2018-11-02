<?php

class Default_Controllers_Cart extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function index() {
        $database = new Libs_Model;
        $db = $database->getConnection();
        $product = new Default_Models_Product($db);
        $product->productID = isset($_GET['id']) ? $_GET['id'] : "";
        $this->view->ProductCart = $product->getDetailProductByID();
                //lấy sản phẩm mới nhất 
        $this->view->newData = $product->getNewProduct();
        $this->view->render('cart/index');
    }
        public function addtocart() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $database = new Libs_Model;
        $db = $database->getConnection();
        $product = new Default_Models_Product($db);
        $product->productID = $id;
        $productByCode = $product->getDetailProductByID();
        $product->productCode = $productByCode["productCode"];
        $productCart = $product->getDetailProductByCode();
        $Cart[] = $productCart;

        if ($id != "") {
            $itemArray = array($Cart[0]["productCode"] => array(
                    'id' => $Cart[0]["productID"],
                    'productCode' => $Cart[0]["productCode"],
                    'image' => $Cart[0]["image"],
                    'name' => $Cart[0]["productName"],
                    'price' => ($Cart[0]["unitPrice"] * (100 - $Cart[0]["discount"]) / 100),
                    'quantity' => 1                    
            ));
            if (!empty($_SESSION["cart_item"])) {
                if (in_array($Cart[0]["productCode"], array_keys($_SESSION["cart_item"]))) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($Cart[0]["productCode"] == $k) {
                            if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                $_SESSION["cart_item"][$k]["quantity"] = 1;
                            }
                            $_SESSION["cart_item"][$k]["quantity"] += 1;
                        }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
            echo count($_SESSION["cart_item"]);


            //B1: Kiểm tra sự tồn tại của $_SESSION['cart']
            //Nếu đã tồn tại sản phẩm cần thêm trong SESSION, thì 
            //B2: tăng thêm số lượng của sản phẩm đó trong SESSION và không hiển thị thêm số lượng trong id='cart'
            //ngược lại
            //B2': Xuống model Product --> lấy sản phẩm theo id 
            //B3:	 Thêm sản phẩm đó vào $_SESSION['cart'] và hiển thị số lượng lên id='cart'
        } else {
            echo "0";
        }
    }

    public function deleteCart() {
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        if ($id != "") {
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($id == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
        }
        $this->view->render('cart/index');
    }


   

}

?>