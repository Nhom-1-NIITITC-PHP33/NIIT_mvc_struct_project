<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="<?php echo URL_BASE; ?>templates/default/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo URL_BASE; ?>templates/default/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo URL_BASE; ?>templates/default/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <link href="<?php echo URL_BASE; ?>templates/default/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URL_BASE; ?>templates/default/css/layout.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URL_BASE; ?>templates/default/css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="favicon.png">
        <link href="<?php echo URL_BASE; ?>templates/default/css/effect.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE; ?>templates/default/css/order.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo URL_BASE; ?>templates/default/js/assets/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URL_BASE; ?>templates/default/js/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo URL_BASE; ?>templates/default/js/assets/owl.carousel.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo URL_BASE; ?>templates/default/js/js.js"></script>

<!--        <script type="text/javascript">
            CloudZoom.quickStart();
        </script> 
        <link rel="icon" href="logo.jpg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css">
        <link href="js/assets/assets/owl.theme.green.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/assets/swiper.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.esm.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.esm.bundle.js"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->

        <link rel="icon" href="<?php echo URL_BASE; ?>templates/default/logo.jpg">
        <title>D3T Mobile</title>

        <script>
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
            //Chức năng thêm vào giỏ hàng và lọc sản phẩm
            function showProduct() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("result").innerHTML = this.responseText;
                    }
                };

                xmlhttp.open("GET", "<?php echo URL_BASE; ?>show", true);
                xmlhttp.send();

            }
            function getbycategory(catid) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("result").innerHTML = this.responseText;
                    }
                };

                xmlhttp.open("GET", "<?php echo URL_BASE; ?>getbycategory?id=" + catid, true);
                xmlhttp.send();
            }
            function livesale1(id) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("messageCart").innerHTML = this.responseText;
                    }
                };

                xmlhttp.open("GET", "<?php echo URL_BASE; ?>cart/addToCartFromIndex?id=" + id, true);
                xmlhttp.send();
            }
            function livesale2(id) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("messageCart").innerHTML = this.responseText;
                    }
                };

                xmlhttp.open("GET",<?php echo count($_SESSION['cart_item']); ?>, true);
                xmlhttp.send();
            }
            //Kết thúc chức năng thêm vào giỏ hàng và lọc sản phẩm

            function showCart() {
                document.getElementById("messageCart").innerHTML = <?php echo count($_SESSION['cart_item']); ?>;


            }

            function saveCart(obj) {
                var quantity = $(obj).val();
                var code = $(obj).attr("id");
                $.ajax({
                    url: "<?php echo URL_BASE; ?>cart/editQuantity",
                    type: "POST",
                    data: 'code=' + code + '&quantity=' + quantity,
                    success: function (data, status) {
                        $("#total_price").html(data)
                    },
                    error: function () {
                        alert("Problen in sending reply!")
                    }
                });
            }
        </script>
    </head>
    <body onload="showCart();">

        <?php require 'templates/default/header.php'; ?>
<?php
require TEMPLATE;
?>
<?php require 'templates/default/footer.php'; ?>
    </body>
</html>
