<?php
if (isset($_POST["submit"])) {
    $servername = "localhost";
    $dbname = "d3t";
    $db_username = "root";
    $db_password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //SELECT `username``password` FROM `customers` WHERE `username``
        $stmt = $conn->prepare("SELECT `email`,`password` FROM `customers` WHERE `email`=:email AND password=:password;");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);

        $stmt->execute();
        $check = $stmt->rowCount();
        if ($check == 1) {
            session_start();
            $_SESSION["email"] = $email;
            echo 'Xin chào : ' . $_SESSION["email"];
        } else {
            echo 'Đăng nhập thất bại';
            
        }
    } catch (Exception $e) {
        echo '(^v^) : ' . $e->getMessage();
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            span{
                color: red;
                float: right;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" async=""></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" async=""></script>
        <script async="">
            function validateForm_login() {
                var error = 0;
                var email = document.getElementById("email").value;
                var password = document.getElementById("password").value;
                var regex_email = /^[A-Z0-9a-z._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,4}$/g;
                var msg = "";
                if (email === "") {
                    document.getElementById("email-alert").innerHTML = "Email không được để trống\n";
                    error = 1;
                } else if (!regex_email.test(email)) {
                    document.getElementById("email-alert").innerHTML = "Email không hợp lệ\n";
                    error = 1;
                } else {
                    document.getElementById("email-alert").innerHTML = ""
                }
                if (password === "") {
                    document.getElementById("password-alert").innerHTML = "Mật khẩu không được để trống\n";
                    error = 1;
                } else {
                    document.getElementById("password-alert").innerHTML = ""
                }
                if (error === 1) {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div class="container text_center">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 login_div">
                    <form action="login1.php" method="post" onsubmit="return validateForm_login()">
                        <div class="form-group">
                            <div>
                                <h3>THÔNG TIN TÀI KHOẢN</h3>
                                <div>
                                    <label for="email" class="text-primary login_center ">Email đăng nhập</label>
                                    <span id="email-alert"></span>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email đăng nhập"><br>
                                </div>
                                <br>
                                <div>
                                    <label for="password" class="text-primary login_center ">Mật khẩu</label>
                                    <span id="password-alert"></span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu"><br>
                                </div>
                            </div>                   
                        </div>
                        <br>
                        <input type="submit" value="Đăng nhập" class="btn btn-primary btn-block" name="submit">  <br>
                        <a href="logout.php" class="btn btn-danger btn-block">Đăng xuất</a>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </body>
</html>


