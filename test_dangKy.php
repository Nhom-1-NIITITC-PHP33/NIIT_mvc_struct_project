<?php
$servername = "localhost";
$dbname = "d3t";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "run this far 1<br>";

    $stmt = $conn->prepare("INSERT INTO `customers` (`id`, `username`, `password`, `email`, `phone`, `address`, `status`, `fullName`, `birthDate`, `avarta`) "
            . "VALUES ('', :username, :password, :email, :phone, :address, '', :fullName, :birthDate, '');");//NULL, :username, :password, '', :phone, :address, '', :fullName, :birthDate, ''
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':fullName', $fullName);
    $stmt->bindParam(':birthDate', $birthDate);
    echo "run this far 2<br>";
    
    if ($_POST) {
        $username = $_POST['user'];
        echo "run this far 3<br>";
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $fullName = $_POST['name'];
        $birthDate = $_POST['date'];
        
    }
    $stmt->execute();
    echo "run this far 4<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng ký</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" async=""></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" async=""></script>
        <script async="">
                function validateForm_register() {
                    var error = 0;
                    var user = document.getElementById("user").value;
                    var password = document.getElementById("password").value;
                    var repassword = document.getElementById("repassword").value;

                    var name = document.getElementById("name").value;
                    var phone = document.getElementById("phone").value;
                    var email = document.getElementById("email").value;
                    var date = document.getElementById("date").value;
                    var address = document.getElementById("address").value;
                    var regex_email = /^[A-Z0-9a-z._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,4}$/g;

                    if (user === "") {
                        document.getElementById("user-alert").innerHTML = "Tên tài khoản không được để trống\n";
                        error = 1;
                    } else {
                        document.getElementById("user-alert").innerHTML = ""
                    }
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
                            <label for="user" class="text-primary login_center ">Tên tài khoản</label>
                            <span id="user-alert" style="color: red"></span>
                            <input type="text" class="form-control" id="user" name="user" ><br>
                            <label for="password" class="text-primary login_center ">Mật khẩu</label>
                            <span id="password-alert" style="color: red"></span>
                            <input type="password" class="form-control" id="password" name="password"><br>
                            <label for="repassword" class="text-primary login_center ">Nhập lại mật khẩu</label>
                            <span id="repassword-alert" style="color: red"></span>
                            <input type="password" class="form-control" id="repassword" ><br><br>
                            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                        </div>
                        <div class="col-sm-6">
                            <h3>THÔNG TIN LIÊN HỆ</h3>
                            <label for="name" class="text-primary login_center ">Họ tên của bạn</label>
                            <span id="name-alert" style="color: red"></span>
                            <input type="text" class="form-control" id="name" name="name"><br>
                            <label for="phone" class="text-primary login_center ">Số điện thoại</label>
                            <span id="phone-alert" style="color: red"></span>
                            <input type="text" class="form-control" id="phone" name="phone"><br>
                            <label for="email" class="text-primary login_center ">Địa chỉ email</label>
                            <span id="email-alert" style="color: red"></span>
                            <input type="text" class="form-control" id="email" name="email"><br>
                            <label for="date" class="text-primary login_center ">Ngày sinh</label>
                            <span id="date-alert" style="color: red"></span>
                            <input type="text" class="form-control" id="date" name="date"><br>
                            <label for="address" class="text-primary login_center ">Địa chỉ (số nhà, đường, tỉnh thành)</label>
                            <span id="address-alert" style="color: red"></span>
                            <input type="text" class="form-control" id="address" name="address">

                        </div>

                    </div>

                </div>
            </form>
        </div>

        
    </body>
</html>
