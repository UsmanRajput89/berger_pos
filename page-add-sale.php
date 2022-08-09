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
                            <form action="" data-toggle="validator">
                                <div class="row">
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
                                    <div class="col-md-12">
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product</label>
                                            <select name="product" class="selectpicker form-control" data-style="py-0">
                                                    
                                                <?php foreach ($products as $product) : ?>
                                                    <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?> </option>
                                                <?php endforeach;  ?>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive-sm invoice-table">
                                            <table class="data-table ">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" scope="col">#</th>
                                                        <th scope="col">Item</th>
                                                        <th class="text-center" scope="col">Quantity</th>
                                                        <th class="text-center" scope="col">Price</th>
                                                        <th class="text-center" scope="col">Totals</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center" scope="row">1</th>
                                                        <td>
                                                            <h6 class="mb-0">Web Design</h6>
                                                        </td>
                                                        <td class="text-center">5</td>
                                                        <td class="text-center">$120.00</td>
                                                        <td class="text-center"><b>$2,880.00</b></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center" scope="row">2</th>
                                                        <td>
                                                            <h6 class="mb-0">Web Design</h6>
                                                        </td>
                                                        <td class="text-center">5</td>
                                                        <td class="text-center">$120.00</td>
                                                        <td class="text-center"><b>$2,880.00</b></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center" scope="row">3</th>
                                                        <td>
                                                            <h6 class="mb-0">Web Design</h6>
                                                        </td>
                                                        <td class="text-center">5</td>
                                                        <td class="text-center">$120.00</td>
                                                        <td class="text-center"><b>$2,880.00</b></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center" scope="row">4</th>
                                                        <td>
                                                            <h6 class="mb-0">Web Design</h6>
                                                        </td>
                                                        <td class="text-center">5</td>
                                                        <td class="text-center">$120.00</td>
                                                        <td class="text-center"><b>$2,880.00</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Add Sale</button>
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

<!-- <div class="document active">
    <div class="spreadSheetGroup">

        
        <table class="shipToFrom">
            <thead style="font-weight:bold">
                <tr>
                    <th>TO</th>
                    <th>SHIP TO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td contenteditable="true" style="width:50%">
                        
                    </td>
                    <td contenteditable="true" style="width:50%">
                        Apollo Painting & Wallcovering<br/>
                        ATTN: <br/>
                        535 N. Eucalyptus Ave.<br/>
                        Inglewood, CA 90302<br/>
                        Phone (310)672-3080
                    </td>
                </tr>
            </tbody>
        </table>

        <hr style="visibility:hidden"/>
    
    
        <table class="tableBorder">
            <thead style="font-weight:bold">
                <tr>
                    <th>SHIPPING METHOD</th>
                    <th>SPECIFIED BY</th>
                    <th>SIDEMARK</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td contenteditable="true" style="width:33.3%"></td>
                    <td contenteditable="true" style="width:33.3%"></td>
                    <td contenteditable="true" style="width:33.3%"></td>
                </tr>
            </tbody>
        </table>
    
    
    
        <table class="proposedWork" width="100%" style="margin-top:20px">
            <thead>
                <th>QTY</th>
                <th>UNIT</th>
                <th>DESCRIPTION</th>
                <th>COST</th>
                <th class="amountColumn">TOTAL</th>
                <th class="docEdit trAdd">+</th>
            </thead>
            <tbody>
                <tr>
                    <td contenteditable="true">1</td>
                    <td class="unit" contenteditable="true"></td>
                    <td contenteditable="true" class="description"></td>
                    <td class="amount" contenteditable="true">0</td>
                    <td class="amount amountColumn rowTotal" contenteditable="true">0</td>
                    <td class="docEdit tdDelete">X</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td style="border:none"></td>
                    <td style="border:none"></td>
                    <td style="border:none"></td>
                    <td style="border:none;text-align:right">SUBTOTAL:</td>
                    <td class="amount subtotal">0.00</td>
                    <td class="docEdit"></td>
                </tr>
                <tr>
                    <td style="border:none"></td>
                    <td style="border:none"></td>
                    <td style="border:none"></td>
                    <td style="border:none;text-align:right">SALES TAX:</td>
                    <td class="amount" contenteditable="true">0.00</td>
                    <td class="docEdit"></td>
                </tr>
                <tr>
                    <td style="border:none"></td>
                    <td style="border:none"></td>
                    <td style="border:none"></td>
                    <td style="border:none;text-align:right;white-space:nowrap">SHIPPING & HANDLING:</td>
                    <td class="amount" contenteditable="true">0.00</td>
                    <td class="docEdit"></td>
                </tr>
                <tr>
                    <td style="border:none"></td>
                    <td style="border:none"></td>
                    <td style="border:none"></td>
                    <td style="border:none;text-align:right">TOTAL:</td>
                    <td class="total amount" contenteditable="true"">0.00</td>
                    <td class="docEdit"></td>
                </tr>
            </tfoot>
        </table>

    
    
        <table width="100%">
            <tbody>
                <tr>
                    <td style="50%" style="vertical-align:top">
                        <table style="width:100%">
                            <tbody>
                                <tr>
                                    <td style="text-align:left">
                                        <p>1. Please send two copies of your invoice.</p>
                                        <p>2. Enter this order in accordance with the prices, terms, delivery method, and specifications listed above.</p>
                                        <p>3. Please notify us immediately if you are unable to ship as specified.</p>
                                        <p>4. Send all correspondence to:</p>
                                        <p style="padding-left:20px">Apollo Painting & Wallcovering
                                        <br/>
                                        535 N. Eucalyptus Ave.
                                        <br/>
                                        Inglewood, CA 90302
                                        <br/>
                                        Phone (714)326-3025 </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="padding-left:40px; width:50%; vertical-align:top">
                        <table style="width:100%">
                        <tbody>
                            <tr>
                                <td style="text-align:left">
                                    <strong>COMMENTS:</strong>
                                </td>
                            </tr>
                            <tr>
                                <td contenteditable="true" style="text-align:left;border: 1px solid #000">Please ship all goods to our office using our UPS account #1234</td>
                            </tr>
                            <tr>
                                <td style="padding-top:60px">
                                    Authorized by: _____________________________ Date: __________
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>



    </div>
</div> -->