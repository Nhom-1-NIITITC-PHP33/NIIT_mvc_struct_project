<div class="container-fluid">
    <div class="container">
        <div class="categoryName" >
            <span>
                <h2 style="  display: inline; color: #1B6D85;"><?php ?></h2>
            </span>
        </div>
    </div>  
</div>


<div class="container-fluid" id="product-list">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="right">
                <div class="container-fluid" id="menu-right">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="menu-right-header">
                                <i class="glyphicon glyphicon-list-alt" style="padding-right: 2%;"></i>
                                Bộ lọc sản phẩm 
                            </div><br>
                            <p style="color: #1B6D85;">Lọc theo giá sản phẩm:</p>
                            <select name="" id="" onchange="showProduct(this.value);" class="form-control">
                                <option value="">--- Chọn khoảng giá --- </option>
                                <option value="">Dưới 3 triệu</option>
                                <option value="">3 -> 5 triệu</option>
                                <option value="">trên 5 triệu</option>
                            </select><br>
                            <p style="color: #1B6D85;">Lọc theo Kích thước màn hình:</p>
                            <select name="" id="" onchange="showProduct(this.value);" class="form-control">
                                <option value="">--- Chọn kích thước màn hình --- </option>
                                <option value="">Dưới 4 inch</option>
                                <option value="">từ 4->5 inch</option>
                                <option value="">trên 5 inch</option>
                            </select><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" id="product">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        
                        while ($row = $this->categoryGroup->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            ?>
                            <div class="col-sm-3 item-product">
                                <div class="grid" class="item-img">
                                    <figure class="effect-zoe">
                                        <a href="<?php echo URL_BASE . 'detail?id=' . $productID; ?>">
                                            <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $image; ?>" alt="image"/>
                                        </a>
                                        <figcaption>
                                            <p>
                                                <span><a href="#" onclick="livesale(<?php echo $productID; ?>)">Thêm vào giỏ hàng <br><i class="fa fa-cart-arrow-down" style="font-size: 24px;"></i></a></span>
                                            </p>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="item-name">
                                    <a href="<?php echo URL_BASE . 'index/detail?id=' . $productID ?>"><?php echo $productName; ?></a>
                                </div>
                                <div class="item-price">
                                    <span class="new-price"><?php echo number_format($unitPrice * (100 - $discount) / 100) . " đ" ?></span>
                                    <span class="old-price"><?php echo number_format($unitPrice) . " đ"; ?></span>
                                    <div  class="muangay btn"><a href="<?php echo URL_BASE; ?>cart">Mua ngay</a></div>
                                </div>



                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>