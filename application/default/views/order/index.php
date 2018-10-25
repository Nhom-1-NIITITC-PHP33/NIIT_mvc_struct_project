<div class="container content-cart">
    <div class="container title-cart">
        Đơn hàng
    </div>
    <div class="container hello">
        <span class="glyphicon glyphicon-info-sign" style="color:#7094db;margin-right: 10px;"></span>Chào mừng đến với D3T.vn!

    </div>
    <div class="container">
        <h3>Nhập thông tin khách hàng</h3>
        <div class="info-order">
            <form action="#" method="post" name="RegisterForm" onsubmit="return checkValid()">
                <label> Họ và tên </label><span class="msg" id="msgUser">(*)</span>
                <input type="text" name="txtUser" placeholder="  Mời bạn nhập tên" id="txtUser" class="form-control"/><br>
                <label> Địa chỉ</label> <span class="msg" id="msgAddr">(*)</span>
                <input type="text" name="txtAddr" placeholder="  Mời bạn nhập địa chỉ" id="txtAddr" class="form-control"/><br>
                <label> Điện thoại</label> <span class="msg" id="msgMobile">(*)</span>
                <input type="text" name="txtMobile" placeholder="  Mời bạn nhập số điện thoại" id="txtMobile" class="form-control"/><br>
                <label> Email</label><span class="msg" id="msgEmail">(*)</span>
                <input type="text" name="txtEmail" placeholder="  Mời bạn nhập email" id="txtEmail"/ class="form-control"><br>                         
                </div>
                <div class="container hello">
                    <span class="glyphicon glyphicon-info-sign" style="color:#7094db;margin-right: 10px;"></span>Sản phẩm bạn đã chọn để mua

                </div>
                <div class="container table-cart">
                    <table class="table table-bordered table-responsive table-condensed table-hover">
                        <tr>

                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Số tiền</th>

                        </tr>
                        <tr>

                            <td>IphoneX</td>
                            <td>1</td>
                            <td>20.000.000</td>

                        </tr>
                        <tr>

                            <td>IphoneX</td>
                            <td>1</td>
                            <td>20.000.000</td>

                        </tr>
                        <tr>                            
                            <td>IphoneX</td>
                            <td>1</td>
                            <td>20.000.000</td>
                        </tr>
                        <tr>
                            <th colspan="2">Tổng số tiền</th>
                            <th style="color:red;">60.000.000</th>
                        </tr>

                    </table>
                </div>

                <div class="container hello">
                    <span class="glyphicon glyphicon-plane" style="color:#7094db;margin-right: 10px;"></span>Miễn Phí Vận Chuyển cho đơn hàng từ 200.000 (giảm tối đa 40.000)
                </div>
                <div class="container" style="margin-top:30px;">
                    <span style="font-size: 26px;">Hình thức thanh toán </span>

                    <input type="radio" name ="thanhtoan">Thẻ tín dụng/Ghi nợ
                    <input type="radio" name="thanhtoan">Thanh toán sau khi nhận hàng

                </div>
                <div class="container order-information">
                    <table class="table table-hover table-condensed table-responsive table-bordered">
                        <tr>
                            <th>Tổng tiền hàng</th>
                            <td>60.000.000</td>
                        </tr>
                        <tr>
                            <th>Phí vận chuyển</th>
                            <td>200.000</td>
                        </tr>
                        <tr>
                            <th>Giảm giá phí vận chuyển</th>
                            <td>- 200.000</td>
                        </tr>
                        <tr>
                            <th>Tổng thanh toán</th>
                            <td>60.000.000</td>
                        </tr>
                    </table>
                </div>

                <input type="submit" id="btnReg" name="btnReg" value="Đặt hàng"/>
                <a href="cart.php" class="btn" id="btnBack">Quay lại giỏ hàng</a>

            </form>

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
    </div>