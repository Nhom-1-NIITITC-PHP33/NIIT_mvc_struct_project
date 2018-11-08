<div class="container-fluid">
    <div class="container">
        <div class="categoryName" >
            <span>
                <h2 style="  display: inline; color: #1B6D85;"><?php ?></h2>
            </span>
        </div>
    </div>  
</div>


<div class="container-fluid" id="product-list">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="right">
                <div class="container-fluid" id="menu-right">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="menu-right-header">
                                <i class="glyphicon glyphicon-list-alt" style="padding-right: 2%;"></i>
                                Bộ lọc sản phẩm 
                            </div><br>
                            <p style="color: #1B6D85;">Lọc theo giá sản phẩm:</p>
                            <select name="" id="" onchange="showProduct(this.value);" class="form-control">
                                <option value="">--- Chọn khoảng giá --- </option>
                                <option value="">Dưới 3 triệu</option>
                                <option value="">3 -> 5 triệu</option>
                                <option value="">trên 5 triệu</option>
                            </select><br>
                            <p style="color: #1B6D85;">Lọc theo Kích thước màn hình:</p>
                            <select name="" id="" onchange="showProduct(this.value);" class="form-control">
                                <option value="">--- Chọn kích thước màn hình --- </option>
                                <option value="">Dưới 4 inch</option>
                                <option value="">từ 4->5 inch</option>
                                <option value="">trên 5 inch</option>
                            </select><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" id="product">
                <div class="container-fluid">
                    <div class="row">
                        <div class="alert alert-danger" style="text-align: center;">Hết hàng rồi nhé !</div>
                        
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>