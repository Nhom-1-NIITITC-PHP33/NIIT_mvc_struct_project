<div class="container-fluid">
    <div class="container" id="slide-show">
        <div class="row">
            <div class="col-sm-9" id="slide-show-hot">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <?php
                        $count = $this->slide->rowCount();
                        for ($x = 1; $x < $count; $x++) {
                            ?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo $x ?>"></li>
                            <?php
                        }
                        ?>

                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $num = 1;
                        while ($newslide = $this->slide->fetch(PDO::FETCH_ASSOC)) {
                            extract($newslide);
                            if ($num == 1) {
                                ?>
                                <div class="item active">
                                    <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $image; ?>"  style="width:100%;">
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="item">
                                    <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $image; ?>"  style="width:100%;">
                                </div>
                                <?php
                            }
                            $num = 2;
                        }
                        ?>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-3" id="service">
                <div class="container-fluid">
                    <div class="row">
                        <div class="html5-main-video">
                            <i style="color: red;">Những lưu ý khi mua iphone!!</i>
                            <iframe src="https://www.youtube.com/embed/T2PkjIWXmX4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="service">
                            <a href="#">
                                <div >
                                    <img src="<?php echo URL_BASE; ?>templates/default/image/qc1.jpg" alt=""style="width: 280px;height: 115px;"/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="container" style="padding: 0px;">
    <div   >
        <div>
            <img style="width: 100%;"src="<?php echo URL_BASE; ?>templates/default/image/quangcao1.PNG" alt=""/>
        </div>
    </div>
</div><br>
<div class="container-fluid">
    <div class="container" id="product-header">
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fa fa-list-alt" style="padding-right: 5px;"></i>
            <span style="color: #1b6d85; font-size: 23px;">Sản phẩm mới nhất</span>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="owl-carousel owl-theme owl-loaded owl-drag">
            <?php
            while ($newRow = $this->newData->fetch(PDO::FETCH_ASSOC)) {
                extract($newRow);
                ?>

                <div class="item">
                    <h4> 
                        <a href="<?php echo URL_BASE . 'index/detail?id=' . $productID; ?>">
                            <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $image; ?>" alt=""/>
                        </a>
                    </h4>
                </div>
                <?php
            }
            ?>
        </div>
        <script>
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                nav: true,
                margin: 10,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    960: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                }
            });
            owl.on('mousewheel', '.owl-stage', function (e) {
                if (e.deltaY > 0) {
                    owl.trigger('next.owl');
                } else {
                    owl.trigger('prev.owl');
                }
                e.preventDefault();
            });
        </script>
    </div>
</div>
<div class="container" id="product-header">
    <div style="text-align: center; margin-bottom: 30px;">
        <i class="fa fa-list-alt" style="padding-right: 5px;"></i>
        <span style="color: #1b6d85;font-size: 23px;">Sản phẩm chính</span>
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
                        while ($row = $this->proData->fetch(PDO::FETCH_ASSOC)) {
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
                                                <span><a href="#" onclick="livesale1(<?php echo $productID; ?>)">Thêm vào giỏ hàng <br><i class="fa fa-cart-arrow-down" style="font-size: 24px;"></i></a></span>
                                            </p>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="item-name">
                                    <a href="<?php echo URL_BASE . 'detail?id=' . $productID ?>"><?php echo $productName; ?></a>
                                </div>
                                <div class="item-price">
                                    <span class="new-price"><?php echo number_format($unitPrice * (100 - $discount) / 100) . " đ"; ?></span>
                                    <span class="old-price"><?php echo number_format($unitPrice) . " đ"; ?></span>
                                    <div  class="muangay btn"><a href="<?php echo URL_BASE; ?>cart" onclick="livesale1(<?php echo $productID; ?>)">Mua ngay</a></div>
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