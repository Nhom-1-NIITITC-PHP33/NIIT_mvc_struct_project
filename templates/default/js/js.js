$(window).resize(function () {
    if ($(this).width() < 1024) {
        //An|Hien|Add|Remove class cho menu-right khi thay doi kich thuoc man hinh
        $("#right").hide();
        $("div#product").removeClass("col-sm-9");
        $("div#product").addClass("col-sm-12");

        //An|Hien|Add|Remove class cho menu-right khi thay doi kich thuoc man hinh
        $("#service").hide();
        $("div#slide-show-hot").removeClass("col-sm-9");
        $("div#slide-show-hot").addClass("col-sm-12");

        $("#search").hide();
    } else
    {
        $("#right").show();
        $("div#product").removeClass("col-sm-12");
        $("div#product").addClass("col-sm-9");

        $("#service").show();
        $("div#slide-show-hot").removeClass("col-sm-12");
        $("div#slide-show-hot").addClass("col-sm-9");

        $("#search").show();
    }
});


window.onscroll = function () {
    myFunction()
};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
$(document).ready(function () {
    $("#loginLink").click(function (event) {
        event.preventDefault();
        $(".overlay").fadeToggle("fast");
    });

    $(".overlayLink").click(function (event) {
        event.preventDefault();
        var action = $(this).attr('data-action');

        $.get("ajax/" + action, function (data) {
            $(".login-content").html(data);
        });

        $(".overlay").fadeToggle("fast");
    });

    $(".close").click(function () {
        $(".overlay").fadeToggle("fast");
    });

    $(document).keyup(function (e) {
        if (e.keyCode == 27 && $(".overlay").css("display") != "none") {
            event.preventDefault();
            $(".overlay").fadeToggle("fast");
        }
    });
});

function validateForm_login() {
    var usr = document.getElementById("usr").value;
    var pwd = document.getElementById("pwd").value;
    var msg = "";
    if (usr === "") {
        document.getElementById("usr-alert").innerHTML  = "Tên tài khoản không được để trống\n"
    } else {
        document.getElementById("usr-alert").innerHTML  = ""
    }
    if (pwd === "") {
        document.getElementById("pwd-alert").innerHTML  = "Mật khẩu không được để trống\n"
    } else {
        document.getElementById("pwd-alert").innerHTML  = ""
    }
    if (usr === "" || pwd === "") {
        return false;
    }
}
function validateForm_register() {
    var error = 0;
    var usr = document.getElementById("usr").value;
    var pwd = document.getElementById("pwd").value;
    var repwd = document.getElementById("repwd").value;

    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var address = document.getElementById("address").value;
    var regex_email = /^[A-Z0-9a-z._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,4}$/g;

    if (usr === "") {
        document.getElementById("usr-alert").innerHTML  = "Tên tài khoản không được để trống\n";
        error = 1;
    } else {
        document.getElementById("usr-alert").innerHTML  = ""
    }
    if (pwd === "") {
        document.getElementById("pwd-alert").innerHTML  = "Mật khẩu không được để trống\n";
        error = 1;
    } else {
        document.getElementById("pwd-alert").innerHTML  = ""
    }
    if (repwd !== pwd) {
        document.getElementById("repwd-alert").innerHTML  = "Mật khẩu không đúng\n";
        error = 1;
    } else {
        document.getElementById("repwd-alert").innerHTML  = ""
    }
    if (name === "") {
        document.getElementById("name-alert").innerHTML  = "Họ tên của bạn không được để trống\n";
        error = 1;
    } else {
        document.getElementById("name-alert").innerHTML  = ""
    }
    if (phone === "") {
        document.getElementById("phone-alert").innerHTML  = "Số điện thoại không được để trống\n";
        error = 1;
    } else {
        document.getElementById("phone-alert").innerHTML  = ""
    }
    if (email === "") {
        document.getElementById("email-alert").innerHTML  = "Email không được để trống\n";
        error = 1;
    } else if (!regex_email.test(email)) {
        document.getElementById("email-alert").innerHTML  = "Email không hợp lệ\n";
        error = 1;
    } else {
        document.getElementById("email-alert").innerHTML  = ""
    }
    if (address === "") {
        document.getElementById("address-alert").innerHTML  = "Địa chỉ không được để trống\n";
        error = 1;
    } else {
        document.getElementById("address-alert").innerHTML  = ""
    }
    if (error === 1) {
        return false;
    }
}

function showCate() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cbCategory").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET", "getcate.php", true); //here
            xmlhttp.send();
        }