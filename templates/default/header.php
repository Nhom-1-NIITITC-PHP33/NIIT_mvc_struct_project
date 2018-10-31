<div class="container-fluid w3-yellow" id="topheader" onload="showCate()">
    <div class="container">
        <div class="row ">
            <div class="col-sm-3 list">
                <a href="#">
                    <span class="fa fa-bell-o"></span>Thông báo</a>
            </div>
            <div class="col-sm-3 list">
                <a href="<?php echo URL_BASE . 'care/index' ?>">
                    <span class="fa fa-question-circle"></span>Trợ giúp</a>
            </div>
            <?php 
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
                    echo "Xin chao:". $_SESSION['user'];
                    
                }else{
            ?>
            <div class="col-sm-3 list">
                <a href="<?php echo URL_BASE . 'user/register' ?>">Đăng ký</a>
            </div>
            <div class="col-sm-3 list">
                <a href="<?php echo URL_BASE . 'user/login' ?>">Đăng nhập</a>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<div class="container-fluid" id="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-3" id="logo">
                <a href="../index">
                    <img src="<?php echo URL_BASE ?>/templates/default/image/logo.jpg" alt="logo" width="110px" height="60px">
                </a>
            </div>
            <div class="col-xs-6  col-sm-6">
                <div class="container-fluid">
                    <div class="row" id="search">
                        <div class="col-sm-8" style="padding-right: 1px;">
                            <input type="search" name="txtSearch" id="txtSearch" placeholder="Bạn cần tìm gì?"><!--working here-->
                        </div>
                        <div class="col-sm-3" style="padding: 0px;">
                            <div id="select-box">
                                <select name="categoryId" id="cbCategory">
                                    
                                    <option value="" selected>Please choose</option>
                                    <?php 
                        $database = new Libs_Model();
                        $db = $database->getConnection();
                        $category = new Default_Models_Category($db);
                        $catObj = $category->getAllSubCategory();
                        while($rowCat=$catObj->fetch(PDO::FETCH_ASSOC)){
                        ?>
                                    <option value="<?php echo $rowCat['categoryName']; ?>" >
                            <?php echo $rowCat['categoryName']; ?></a>
                                </option>
                        <?php
                        }
                        ?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding: 0px;">
                            <button type="button" id="btnSearch">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-3  col-sm-3" id="cart">
                <a href="<?php echo URL_BASE ?>cart/index">
                    <button type="button" class="btn btn-default">
                        <i class="fa fa-cart-arrow-down" style="font-size: 24px;"></i>
                        <span class="badge">0</span>
                    </button>
                </a>
            </div>                    
        </div>
    </div>
</div>
<nav class="navbar navbar-inverse" role="navigation" id="myHeader" >
    <div class="container-fluid" style="background: #1b6d85;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <span class="glyphicon glyphicon-home" style="color:#ffffff"></span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                      <?php 
                        $database = new Libs_Model();
                        $db = $database->getConnection();
                        $category = new Default_Models_Category($db);
                        $catObj = $category->getAllParentCategory();
                        while($rowCat=$catObj->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <li id="menuheader">
                            <a href="#"><?php echo $rowCat['categoryName']; ?></a>
                        </li>
                        <?php
                        }
                        ?>
                    <!--                                <li id="menuheader">
                                                        <a href="#">Sản phẩm bán chạy</a>
                                                    </li>
                                                    <li class="dropdown" id="menuheader">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Điện Thoại
                                                            <span class="caret"></span>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="danhmucIP.php">Iphone</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Samsung</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Sony</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Xiaomi</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Nokia</a>
                                                            </li>
                    
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown" id="menuheader">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tablet
                                                            <span class="caret"></span>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#">Iphone</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Samsung</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Sony</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Xiaomi</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Nokia</a>
                                                            </li>
                    
                                                        </ul>
                                                    </li>
                                                    <li id="menuheader">
                                                        <a href="#">Phụ kiện</a>
                                                    </li>
                                                    <li id="menuheader">
                                                        <a href="#">Ưu đãi</a>
                                                    </li>-->
                    <li id="menuheader">
                        <a href="#">Giới thiệu</a>
                    </li>
                    <li id="menuheader">
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<script>
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
</script>
