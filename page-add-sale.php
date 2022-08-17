<?php
include 'process/model.php';
include "includes/contants.php";

// $id = $_GET['id'];
$obj = new database();

$categories = $obj->get_data('categories');
$products = $obj->get_data('products');
$customers = $obj->get_data('customers');


// echo '<pre>';
// var_dump($products);
// echo '</pre>';

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
                                <h4 class="card-title">Add Sale</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" data-toggle="validator" id="invoice_form">
                                <div class="row d-flex">
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date *</label>
                                            <input type="text" class="form-control" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reference No *</label>
                                            <input type="text" class="form-control" placeholder="Enter Reference No" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Biller *</label>
                                            <select name="type" class="selectpicker form-control" data-style="py-0">
                                                <option>Test Biller</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Customers</label>
                                            <select name="customers" class="selectpicker form-control" id="customers" data-style="py-0">
                                            
                                                <?php foreach ($customers as $customer) : ?>
                                                    <option value="<?php echo $customer['customer_id']; ?>"><?php echo $customer['customer_name']; ?> </option>
                                                <?php endforeach; ?>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category" class="selectpicker form-control" id="category" data-style="py-0">
                                            
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?> </option>
                                                <?php endforeach; ?>
                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Product</label>
                                            <select name="product" class="selectpicker form-control" data-style="py-0" id="product_select">
                                                    
                                                <?php foreach ($products as $product) : ?>
                                                    <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?> </option>
                                                <?php endforeach;  ?>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input type="number" name="qty" class="form-control" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- <div class="form-group"> -->
                                            <!-- <button type="submit" class="btn btn-primary mt-5">Add Sale</button> -->
                                            <a href="#" class="btn btn-primary add_invoice_item" id="add_invoice_item">Add Item</a>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive-sm invoice-table">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" scope="col">#</th>
                                                        <th scope="col">Item</th>
                                                        <th class="text-center" scope="col">Quantity</th>
                                                        <th class="text-center" scope="col">Price</th>
                                                        <th class="text-center" scope="col">Totals</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="invoice_table_body">
                                                    <!-- <tr>
                                                        <th class="text-center" scope="row">1</th>
                                                        <td class="text-center">Blue Paint</td>
                                                        <td class="text-center">5</td>
                                                        <td class="text-center">$120.00</td>
                                                        <td class="text-center"><b>$2,880.00</b></td>
                                                    </tr> -->
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="4" align="right">Grand Total</td>
                                                        <td class="text-center grandTotal"></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                    
                                </div>
                                <button type="submit" class="btn btn-primary mt-5">Create Invoice</button>
                                <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
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

