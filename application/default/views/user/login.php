<div class="container text_center">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 login_div">
            <form action="<?php echo URL_BASE?>user/proccess" method="POST" onsubmit="return validateForm_login()">
                <div class="form-group">
                    <div>
                        <h3>THÔNG TIN TÀI KHOẢN</h3>
                        <div>
                            <label for="usr" class="text-primary login_center ">Tên tài khoản</label>
                            <span id="usr-alert" style="color: red"></span>
                            <input type="text" name="email" class="form-control" id="usr" placeholder="Tên tài khoản">
                        </div>
                        <br>
                        <div>
                            <label for="pwd" class="text-primary login_center ">Mật khẩu</label>
                            <span id="pwd-alert" style="color: red"></span>
                            <input type="password" class="form-control" name="pass" id="pwd" placeholder="Mật khẩu"> 
                        </div>
                    </div>                   
                </div>
                <br>
                <input type="submit" value="Đăng nhập" class="btn btn-primary btn-block"></input>               
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

