<div class="container text_center">
    <form onsubmit="return validateForm_register()" action="<?php echo URL_BASE . 'models/userModel' ?>">
        <div class="form-group login_div">
            <div class="row">
                <div class="col-sm-6 ">
                    <h3>THÔNG TIN TÀI KHOẢN</h3>
                    <label for="usr" class="text-primary login_center ">Tên tài khoản</label>
                    <span id="usr-alert" style="color: red"></span>
                    <input type="text" class="form-control" id="usr" ><br>
                    <label for="pwd" class="text-primary login_center ">Mật khẩu</label>
                    <span id="pwd-alert" style="color: red"></span>
                    <input type="password" class="form-control" id="pwd" ><br>
                    <label for="repwd" class="text-primary login_center ">Nhập lại mật khẩu</label>
                    <span id="repwd-alert" style="color: red"></span>
                    <input type="password" class="form-control" id="repwd" ><br><br>
                    <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                </div>
                <div class="col-sm-6">
                    <h3>THÔNG TIN LIÊN HỆ</h3>
                    <label for="name" class="text-primary login_center ">Họ tên của bạn</label>
                    <span id="name-alert" style="color: red"></span>
                    <input type="text" class="form-control" id="name"><br>
                    <label for="phone" class="text-primary login_center ">Số điện thoại</label>
                    <span id="phone-alert" style="color: red"></span>
                    <input type="text" class="form-control" id="phone"><br>
                    <label for="email" class="text-primary login_center ">Địa chỉ email</label>
                    <span id="email-alert" style="color: red"></span>
                    <input type="text" class="form-control" id="email"><br>
                    <label for="address" class="text-primary login_center ">Địa chỉ (số nhà, đường, tỉnh thành)</label>
                    <span id="address-alert" style="color: red"></span>
                    <input type="text" class="form-control" id="address">

                </div>

            </div>

        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>