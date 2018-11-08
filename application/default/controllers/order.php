<?php

class Default_Controllers_Order extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function number_unformat($number) {
        $x = preg_replace('/,/', "", $number);
        return rtrim($x, "đ");
    }

    public function index() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        $customer = new Default_Models_Customer($db);
        $customer->email = $_SESSION['email'];

        $this->view->infoCustomer = $customer->getInforCustomer();

        $this->view->render('order/index');
    }

    public function formOrder() {
        $database = new Libs_Model();
        $db = $database->getConnection();
        $order = new Default_Models_Order($db);

        //Lấy customerID từ bảng customer để thêm vào bảng order
        $customer = new Default_Models_Customer($db);
        $customer->email = $_SESSION['email'];

        $objCus = $customer->getInforCustomer();
        $order->customerID = $objCus['customerID'];

        $objOrder = $order->getInforOrderByCustomerID();
        $order->payment = $_POST['thanhtoan'];
        $payment = $_POST['thanhtoan'];

        $orderDetail = new Default_Models_OrderDetail($db);

        if ($payment != "") {
            $order->addOrder();
            foreach ($_SESSION["cart_item"] as $item) {
                $orderDetail->orderID = $objOrder['orderID'];
                $orderDetail->productID = $item['id'];
                $orderDetail->quantity = $item["quantity"];
                $orderDetail->price = $item["price"] * $item["quantity"];
                $orderDetail->addOrderDetail();
            }
            unset($_SESSION["cart_item"]);
            echo "<script>window.location.href='" . URL_BASE . "order';alert('Bạn đã mua hàng thành công');</script>";
        } else {
            echo "<script>window.location.href='" . URL_BASE . "order';alert('Bạn chưa nhập hình thức thanh toán');</script>";
        }
    }

}

?>