<?php
if ($_POST) {
    $servername = "localhost";
    $dbname = "d3t";
    $db_username = "root";
    $db_password = "";
//check if email has been used when user type in email (ajax)
//validate server side
//encryte password
    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO `customers` ( `password`, `email`, `phone`, `address`,  `fullName`, `birthDate`) "
                . "VALUES ( :password, :email, :phone, :address, :fullName, :birthDate);"); //NULL, :username, :password, '', :phone, :address, '', :fullName, :birthDate, ''
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':birthDate', $birthDate);

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $password = test_input($_POST['password']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $address = test_input($_POST['address']);
        $fullName = test_input($_POST['name']);
        $birthDate = test_input($_POST['date']);

        $stmt->execute();
    } catch (PDOException $e) {
        echo "(^v^) : " . $e->getMessage();
    }
}
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng ký</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            span{
                color: red; 
                float: right
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" async=""></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" async=""></script>
        <script async="">
            function validateForm_register() {
                var error = 0;
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
                    error = 1;
                } else {
                    document.getElementById("password-alert").innerHTML = ""
                }
                if (repassword !== password) {
                    document.getElementById("repassword-alert").innerHTML = "Mật khẩu không đúng\n";
                    error = 1;
                } else {
                    document.getElementById("repassword-alert").innerHTML = ""
                }
                if (name === "") {
                    document.getElementById("name-alert").innerHTML = "Họ tên của bạn không được để trống\n";
                    error = 1;
                } else {
                    document.getElementById("name-alert").innerHTML = ""
                }
                if (phone === "") {
                    document.getElementById("phone-alert").innerHTML = "Số điện thoại không được để trống\n";
                    error = 1;
                } else {
                    document.getElementById("phone-alert").innerHTML = ""
                }
                if (email === "") {
                    document.getElementById("email-alert").innerHTML = "Email không được để trống\n";
                    error = 1;
                } else if (!regex_email.test(email)) {
                    document.getElementById("email-alert").innerHTML = "Email không hợp lệ\n";
                    error = 1;
                } else {
                    document.getElementById("email-alert").innerHTML = ""
                }
                if (date === "") {
                    document.getElementById("date-alert").innerHTML = "Ngày sinh không được để trống\n";
                    error = 1;
                } else {
                    document.getElementById("date-alert").innerHTML = ""
                }
                if (address === "") {
                    document.getElementById("address-alert").innerHTML = "Địa chỉ không được để trống\n";
                    error = 1;
                } else {
                    document.getElementById("address-alert").innerHTML = ""
                }
                if (error === 1) {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div class="container text_center">
            <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm_register()"> <!--onsubmit="return validateForm_register()" -->
                <div class="form-group login_div">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <h3>THÔNG TIN TÀI KHOẢN</h3>
                            <label for="email" class="text-primary login_center ">Email đăng nhập</label>
                            <span id="email-alert"></span>
                            <input type="text" class="form-control" id="email" name="email" tabindex=1><br>
                            <label for="password" class="text-primary login_center ">Mật khẩu</label>
                            <span id="password-alert"></span>
                            <input type="password" class="form-control" id="password" name="password" tabindex=2><br>
                            <label for="repassword" class="text-primary login_center ">Nhập lại mật khẩu</label>
                            <span id="repassword-alert"></span>
                            <input type="password" class="form-control" id="repassword" tabindex=3><br><br>
                            <button type="submit" class="btn btn-primary btn-block" tabindex=8>Đăng ký</button>
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
                            <input type="text" class="form-control" id="address" name="address" tabindex=7>
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </body>
</html>