<?php 


    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['username'])) :

?>

<?php include 'modules/head.php'; ?>

<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form action="https://templates.iqonic.design/posdash/html/backend/page-list-product.html" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Type *</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Standard</option>
                                            <option>Combo</option>
                                            <option>Digital</option>
                                            <option>Service</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" data-errors="Please Enter Name." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Code *</label>
                                        <input type="text" class="form-control" placeholder="Enter Code" data-errors="Please Enter Code." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Barcode Symbology *</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>CREM01</option>
                                            <option>UM01</option>
                                            <option>SEM01</option>
                                            <option>COF01</option>
                                            <option>FUN01</option>
                                            <option>DIS01</option>
                                            <option>NIS01</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category *</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Beauty</option>
                                            <option>Grocery</option>
                                            <option>Food</option>
                                            <option>Furniture</option>
                                            <option>Shoes</option>
                                            <option>Frames</option>
                                            <option>Jewellery</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cost *</label>
                                        <input type="text" class="form-control" placeholder="Enter Cost" data-errors="Please Enter Cost." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price *</label>
                                        <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tax Method *</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Exclusive</option>
                                            <option>Inclusive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Quantity *</label>
                                        <input type="text" class="form-control" placeholder="Enter Quantity" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control image-file" name="pic" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description / Product Details</label>
                                        <textarea class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Product</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>


<?php include 'modules/foot.php'; ?>


<?php 
    else :
        header("Location: index.php");
        exit();
    endif;
?>