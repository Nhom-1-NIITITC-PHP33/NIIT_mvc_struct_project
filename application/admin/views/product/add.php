<div  style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Thêm sản phẩm mới</h2>
    <?php
    //Tiến hành lấy dữ liệu trên form
//    if (isset($_POST['btnSave'])) {
//        try {
//            $name = $_POST['txtName'];
//            $price = $_POST['txtPrice'];
//            $category_id = $_POST['cbCategory'];
//            $desc = $_POST['txtDesc'];
//
//            $fileName = $_FILES['txtImage']['name'];
//            $fileSize = $_FILES['txtImage']['size'];
//            $fileTmp = $_FILES['txtImage']['tmp_name'];
//
//            //Định dạng kiểu dữ liệu                
//            $target_dir = "upload/";
//            $target_file = $target_dir . basename($fileName);
//            $uploadOK = TRUE;
//            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//            if ($fileTmp != NULL) {
//                $check = getimagesize($fileTmp);
//
//
//                //Kiem tra file upload co phai la dinh dang anh
//                if ($check == true) {
//                    $uploadOK = TRUE;
//                } else {
//                    $uploadOK = FALSE;
//                    echo "<div class='alert alert-danger'>Không đúng định dạng ảnh.</div>";
//                }
//                //Kiem tra file da ton tai trong 'upload/'
//                if (file_exists($target_file)) {
//                    $uploadOK = FALSE;
//                    echo "<div class='alert alert-danger'>Ảnh này đã tồn tại.</div>";
//                }
//                //Kiểm tra dung lượng file ảnh
//                if ($_FILES['txtImage']['size'] > 500000) {
//                    $uploadOK = FALSE;
//                    echo "<div class='alert alert-danger'>Dung lượng ảnh quá 5MB.</div>";
//                }
//                //Kiểm tra kiểu file ảnh
//                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//                    echo "<div class='alert alert-danger'>Xin lỗi, chỉ cho phép các định dạng: JPG, JPEG, PNG & GIF </div>";
//                    $uploadOK = FALSE;
//                }
//            } else {
//                echo "<div class='alert alert-danger'>Không có ảnh được chọn</div>";
//                $uploadOK = FALSE;
//            }
//            //Truyền giá trị từ Form cho các thuộc tính của Product
//            $objPro->name = $name;
//            $objPro->price = $price;
//            $objPro->category_id = $category_id;
//            $objPro->description = $desc;
//            $objPro->image = $target_file;
//
//            if ($uploadOK) {
//                //upload ảnh tới thư mục 'upload/' và Lưu dữ liệu xuống DB
//                $root = getcwd();
//
//                if (move_uploaded_file($fileTmp, $target_file) && $objPro->addProduct()) {
//                    echo "<div class='alert alert-success'>Thêm sản phẩm thành công.</div>";
//                } else {
//                    echo "<div class='alert alert-info'>Quá trình thêm mới thất bại.</div>";
//                }
//            } else {
//                echo "<div class='alert alert-info'>Không thể upload được file ảnh.</div>";
//            }
//        } catch (PDOException $ex) {
//            die("Lỗi: " . $ex->getMessage());
//        }
//    }
    ?>
    <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm_addProduct();">
        <table class="table table-bordered table-hover table-responsive">
            <tr>
                <th>Tên sản phẩm</th>
                <td>
                    <input type="text" name="txtName" class="form-control" id="productName"><br>
                    <span id="productName-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Giá gốc</th>
                <td>
                    <input type="text" name="txtPrice" class="form-control" id="unitPrice">
                    <span id="unitPrice-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Giảm giá</th>
                <td>
                    <input type="text" name="txtDiscount" class="form-control" id="discount"><p id="idSub"></p>
                    <span id="discount-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Danh mục</th>
                <td>
                    <select name="cbCategory1" class="form-control" id="category" onchange="alert(document.getElementById($this).value);">
                        <?php
                        while ($row = $this->catData1->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option value="<?php echo $row['categoryID']; ?>" >
                                <?php echo $row['categoryName']; ?>
                            </option>
                            <?php
                        }
                        ?>

                    </select>
                    <span id="category-alert" class="alert" style="color:red;"></span>
                </td>
            <tr>
            <tr id="loai">
                <th>Loại sản phẩm</th>
                <td>
                    <select name="cbCategory2" class="form-control" id="category2">
                    </select>
                    <script>
                            $(document).on('change', '#category', function(event) {
                                categoryId = $(this).val();
                                $.ajax({
                                    type: 'POST',
                                    dataType: 'html',
                                    url: 'http://localhost/mvc_struct_project/admin/index/getCategoryBySubID',
                                    data: {
                                        categoryId: categoryId,
                                    },
                                    success: function(response) {
                                        $('#category2').html(response);
                                    },  
                                    error: function(jqXHR, textStatus, errorThrown) {}
                                });
                            });
                            
//                        function getSubCategoryID() {
//                            var subCategoryID = document.getElementById("category").value;
//                            document.getElementById("idSub").innerHTML = subCategoryID;
//                        }
                    </script>
                    <span id="category-alert" class="alert" style="color:red;"></span>
                </td>
            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name="txtImage" class="form-control">
                    <span id="image-alert" class="alert" style="color:red;"></span>                    
                </td>
            </tr>
            <tr>
                <th>Mô tả chi tiết</th>
                <td>
                    <textarea name="txtDesc" id="description"> </textarea>
                </td>
            <span id="description-alert" class="alert" style="color:red;"></span>
            </tr>
            <script>
                CKEDITOR.replace('txtDesc');
            </script>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnSave" value="Lưu" class="btn btn-success"> &nbsp;
                    <a href="<?php echo URL_BASE ?>admin/index" class="btn btn-danger" > Quay về trang chủ</a>
                </td>
            </tr>

        </table>
    </form>
</div>