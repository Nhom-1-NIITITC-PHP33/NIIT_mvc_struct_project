<div class="container content-cart">
    <div class="container title-cart">
        Giỏ hàng
    </div>
    <div class="container hello">
        <span class="glyphicon glyphicon-info-sign" style="color:#7094db;margin-right: 10px;"></span>Chào mừng đến với D3T.vn!
    </div>
    <div class="container table-cart">
        <table class="table table-bordered table-responsive table-condensed table-hover">
            <tr>
                <th><input type="checkbox"></th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Số tiền</th>
                <th>Thao tác</th>
            </tr>
            <tr>
                <td><input type="checkbox" name=""></td>
                <td>IphoneX</td>
                <td>1</td>
                <td>20.000.000</td>
                <td><a class="btn btn-danger">Xóa</a></td>
            </tr>
            <tr>
                <td><input type="checkbox" name=""></td>
                <td>IphoneX</td>
                <td>1</td>
                <td>20.000.000</td>
                <td><a class="btn btn-danger">Xóa</a></td>
            </tr>
            <tr>
                <td><input type="checkbox" name=""></td>
                <td>IphoneX</td>
                <td>1</td>
                <td>20.000.000</td>
                <td><a class="btn btn-danger">Xóa</a></td>
            </tr>
        </table>
    </div>

    <div class="container hello">
        <span class="glyphicon glyphicon-plane" style="color:#7094db;margin-right: 10px;"></span>Miễn Phí Vận Chuyển cho đơn hàng từ 200.000 (giảm tối đa 40.000)
    </div>
    <div class="container">
        <table class="table table-hover table-condensed table-responsive table-bordered info-cart">
            <tr>
                <td><h2>Chọn tất cả</h2></td>
                <td style="color: blue;"><h2>Tổng tiền hàng (3 sản phẩm): 60.000.000</h2></td>
            </tr>
            <tr>
                <td>3 Sản phẩm</td>
                <td><a href="<?php echo URL_BASE;?>order/index" class="btn btn-success">Mua ngay</a>
                    <a href="index" class="btn btn-info">Tiếp tục mua</a>
                </td>

            </tr>
        </table>
    </div>
</div>
<div class="seen-product container">
    <h2>Có thể bạn cũng thích</h2>
    <div class="owl-carousel owl-theme owl-loaded owl-drag">
        <div class="item"><h4> 
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr1.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr2.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr3.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr4.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr5.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr6.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr7.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr8.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr9.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr10.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr11.PNG" alt=""/>
            </h4></div>
        <div class="item"><h4>
                <img src="<?php echo URL_BASE; ?>templates/default/image/cr12.PNG" alt=""/>
            </h4></div>
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
