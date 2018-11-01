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
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var regex_email = /^[A-Z0-9a-z._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,4}$/g;
    var error = false;
    if (email === "") {
        document.getElementById("email-alert").innerHTML = "Email không được để trống\n";
        error = true;
    } else if (!regex_email.test(email)) {
        document.getElementById("email-alert").innerHTML = "Email không hợp lệ\n";
        error = true;
    } else {
        document.getElementById("email-alert").innerHTML = ""
    }
    if (password === "") {
        document.getElementById("password-alert").innerHTML = "Mật khẩu không được để trống\n";
        error = true;
    } else {
        document.getElementById("password-alert").innerHTML = ""
    }
    if (error) {
        return false;
    }
}





function showCate() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cbCategory").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "getcate.php", true); //here
    xmlhttp.send();
}