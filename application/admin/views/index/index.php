
<?php
session_start();
?>

    <div style="margin-left:0;padding-left: 0;">
        <?php
//        if (!isset($_SESSION['email'])) {
//            header("location:admin/user/login");
//        } else {
//            $this->empData->email = $_SESSION['email'];
//            $emp = $this->empData->getEmployeeByInfo();
//            echo "<div class='alert alert-success' style='text-align:right'>Xin chào: " . $emp['name'] . "</div>";
//            ?>
            <h2 class="page-header">Danh sách sản phẩm</h2>

            <a href="<?php echo URL_BASE ?>admin/index/add" class="btn " style="background: #77b300;">Thêm mới sản phẩm</a>
            <hr>

            <?php
//            $action = isset($_GET['action']) ? $_GET['action'] : "";
//            if ($action == "deleted") {
//                echo "<div class='alert alert-success'>Xóa Sản phẩm thành công</div>";
//            }
            ?>

            <table class="table table-responsive table-bordered table-hover">
                <thead>
                <th>Mã sản phẩm</th>
                <th>Tên</th>
                <th>Giá gốc</th>
                <th>Giảm giá</th>
                <th>Mô tả</th>
                <th>Chức năng</th>            
                </thead>
                <?php
                while ($row = $this->proData->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <tr>
                        <td><?php echo $productID; ?></td>
                        <td><?php echo $productName; ?></td>
                        <td><?php echo $unitPrice; ?>đ</td>
                        <td><?php echo $discount;?>%</td>
                        <td><?php echo $description; ?></td>
                        <td>
                            <a href="<?php echo URL_BASE; ?>admin/index/detail?id=<?php echo $productID; ?>" class="btn btn-info">Xem</a> &nbsp;
                            <a href="<?php echo URL_BASE; ?>admin/index/update?id=<?php echo $productID; ?>" class="btn btn-success">Sửa</a> &nbsp;
                            <a href="#" onclick="delete_product(<?php echo $productID; ?>);" class="btn btn-danger">Xóa</a> &nbsp;
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        ?>

    </div>
    <script>
        function delete_product(id) {
            var response = confirm("Bạn có muốn xóa sản phẩm không?");
            if (response) {
                window.location = "delete.php?id=" + id;
            }
        }
    </script>

