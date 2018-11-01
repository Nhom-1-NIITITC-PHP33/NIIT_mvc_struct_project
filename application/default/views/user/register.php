<script>
function validateForm_register() {
    var error = false;
    var password = document.getElementById("password").value;
    var repassword = document.getElementById("repassword").value;

    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var date = document.getElementById("date").value;
    var address = document.getElementById("address").value;
    var regex_email = /^[A-Z0-9a-z._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,4}$/g;


    if (password === "") {
        document.getElementById("password-alert").innerHTML = "Mật khẩu không được để trống\n";
        error = true;
    } else {
        document.getElementById("password-alert").innerHTML = ""
    }
    if (repassword !== password) {
        document.getElementById("repassword-alert").innerHTML = "Mật khẩu không đúng\n";
        error = true;
    } else {
        document.getElementById("repassword-alert").innerHTML = ""
    }
    if (name === "") {
        document.getElementById("name-alert").innerHTML = "Họ tên của bạn không được để trống\n";
        error = true;
    } else {
        document.getElementById("name-alert").innerHTML = ""
    }
    if (phone === "") {
        document.getElementById("phone-alert").innerHTML = "Số điện thoại không được để trống\n";
        error = true;
    } else {
        document.getElementById("phone-alert").innerHTML = ""
    }
    if (email === "") {
        document.getElementById("email-alert").innerHTML = "Email không được để trống\n";
        error = true;
    } else if (!regex_email.test(email)) {
        document.getElementById("email-alert").innerHTML = "Email không hợp lệ\n";
        error = true;
    } else {
        document.getElementById("email-alert").innerHTML = ""
    }
    if (date === "") {
        document.getElementById("date-alert").innerHTML = "Ngày sinh không được để trống\n";
        error = true;
    } else {
        document.getElementById("date-alert").innerHTML = ""
    }
    if (address === "") {
        document.getElementById("address-alert").innerHTML = "Địa chỉ không được để trống\n";
        error = true;
    } else {
        //document.getElementById("address-alert").innerHTML = ""
    }

    if (error) {
        return false;
    }else{
        return isEmailAvailable();
    }
}

function isEmailAvailable(){
    //gửi dữ lieu bang ajax
    var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        if (responseText === 'noExist'){
                            document.getElementById("email-alert").innerHTML = '';
                            return true;
                        }else{
                            document.getElementById("email-alert").innerHTML = 'Email này đã sử dụng';
                            return false;
                        }
                    }
                };
                xmlhttp.open("GET", "<?php echo URL_BASE;?>user/checkExistEmail/?q=" + email, true);
                xmlhttp.send();
}

</script>

<div class="container text_center">
    <form  action="<?php echo URL_BASE ?>user/registerProcess" method="post" enctype="multipart/form-data" onsubmit="return validateForm_register()"> 
        <div class="form-group login_div">
            <div class="row">
                <div class="col-sm-6 ">
                    <h3>THÔNG TIN TÀI KHOẢN</h3>
                    <label for="email" class="text-primary login_center" onfocusout=isEmailAvailable()>Email đăng nhập</label>
                    <span id="email-alert"></span>
                    <input type="text" class="form-control" id="email" name="email" tabindex=1 ><br> <!--onfocusout="<?php echo URL_BASE ?>user/showHint"-->

                    <label for="password" class="text-primary login_center ">Mật khẩu</label>
                    <span id="password-alert"></span>
                    <input type="password" class="form-control" id="password" name="password" tabindex=2><br>

                    <label for="repassword" class="text-primary login_center ">Nhập lại mật khẩu</label>
                    <span id="repassword-alert"></span>
                    <input type="password" class="form-control" id="repassword" tabindex=3><br>


                </div>
                <div class="col-sm-6">
                    <h3>THÔNG TIN LIÊN HỆ</h3>
                    <label for="name" class="text-primary login_center">Họ tên của bạn</label>
                    <span id="name-alert"></span>
                    <input type="text" class="form-control" id="name" name="name" tabindex=4><br>

                    <label for="phone" class="text-primary login_center ">Số điện thoại</label>
                    <span id="phone-alert"></span>
                    <input type="text" class="form-control" id="phone" name="phone" tabindex=5><br>

                    <label for="date" class="text-primary login_center ">Ngày sinh</label>
                    <span id="date-alert"></span>
                    <input type="text" class="form-control" id="date" name="date" tabindex=6><br>

                    <label for="address" class="text-primary login_center ">Địa chỉ (số nhà, đường, tỉnh thành)</label>
                    <span id="address-alert"></span>
                    <input type="text" class="form-control" id="address" name="address" tabindex=7><br>
                    
                    <label for="gender" class="text-primary login_center ">Giới tính</label>
                    <span id="gender-alert"></span>
                    <select type="text" class="form-control" id="gender" name="gender" tabindex=8>
                        <option value="Other">Giới tính khác</option>
                        <option value="Male">Nam</option>
                        <option value="Female">Nữ</option>
                    </select><br>

                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success btn-block" tabindex=9 name="submit" >Đăng ký</button>
                </div>
                <div class="col-sm-3"></div>
            </div>

        </div>
    </form>
</div>

