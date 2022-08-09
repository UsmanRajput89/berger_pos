<?php
include 'process/model.php';
include "includes/contants.php";

// $id = $_GET['id'];
$obj = new database();

$categories = $obj->get_data('categories');

// $product = $obj->one_row('products', 'categories', 'category', 'category_id', $id);


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
                                <h4 class="card-title">Add Customer</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="process/add_customer.php" method="POST" data-toggle="validator">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input name="name" type="text" class="form-control" placeholder="Enter Name" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number *</label>
                                            <input type="text" class="form-control" placeholder="Enter Phone Number" name="number" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>City *</label>
                                            <input type="text" class="form-control" name="city"  placeholder="Enter City" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Add Customer</button>
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