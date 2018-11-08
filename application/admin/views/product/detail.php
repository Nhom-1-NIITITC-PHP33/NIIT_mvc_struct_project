<div style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Chi tiết sản phẩm</h2>

    <?php
//    //Gọi phương thức getProductAll
//    $data = $objPro->getProductById();
//
//    $objCat = new Category($db);
//
//    $objCat->id = $data['id'];
//
//    $cats = $objCat->getCategoryByID();


    //Fill dữ liệu vào table
    ?>
    <table class="table table-responsive table-bordered table-hover">
        <tr>
            <th>Mã sản phẩm </th>
            <td><?php echo $this->proDetail['productID']; ?></td>
        </tr>
        <tr>
            <th>Tên</th>
            <td><?php echo $this->proDetail['productName']; ?></td>
        </tr>
        <tr>
            <th>Giá cũ</th>
            <td><?php echo $this->proDetail['unitPrice']; ?>đ</td>
        </tr>
        <tr>
            <th>Giảm giá</th>
            <td><?php echo $this->proDetail['discount']; ?>%</td>
        </tr>
        <tr>
            <th> Tên danh mục</th>
            <td><?php echo $this->catDetail['categoryName']; ?></td>
        </tr>
        <tr>
            <th>Hình ảnh</th>
            <td>
                <?php if ($this->proDetail['image'] != "") { ?>
                    <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $this->proDetail['image']; ?>">
                    <?php
                } else {
                    echo "<div class='alert alert-danger'>Không có ảnh!!!</div>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td><?php echo $this->proDetail['description']; ?></td>
        </tr>
        <tr>
            <td></td>                
            <td><a href="<?php echo URL_BASE; ?>admin" class="btn btn-info">Quay về trang danh sách</a></td>
        </tr>

    </table>
</div>
