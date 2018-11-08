<div class="container-fluit">
    <div class="header">
        <div class="row">
            <div class="col-sm-3 logo"><a href="<?php echo URL_BASE?>admin" class="adminHeader">D3TAdmin</a></div>
            <div class="col-sm-5">
                <form>
                    <div class="row search">
                        <input type="text" placeholder="Mời bạn nhập tìm kiếm" class="" style="height:30px;width: 300px;">
                        <input type="submit" value="Tìm kiếm" style="height:30px;width:80px;">
                    </div>
                </form>
            </div>
            <div class="col-sm-4 user">
                <div class="row">
                    <div class="col-sm-3 dropdown">
                        <span class="glyphicon glyphicon-globe"></span>
                        <div class="dropdown-user">
                            <p>Bạn có thông báo</p>
                        </div>
                    </div>
                    <div class="col-sm-3 dropdown">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <div class="dropdown-user">
                            <p>Bạn có mail</p>
                        </div>
                    </div>
                    <div class="col-sm-6 dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <div class="dropdown-user">
                            <a href="#">Admin</a>
                            <a href="#">Cài đặt</a>
                            <a href="<?php echo URL_BASE . 'admin/employee/logoutProcess' ?>">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
