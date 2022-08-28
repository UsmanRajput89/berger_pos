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

function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$invoice_code = createRandomPassword();

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
                            <form action="invoice_print.php" data-toggle="validator" id="invoice_form">
                                <div class="row d-flex">
                                
                                    <input type="text" name="invoice" value="<?php echo $invoice_code; ?>" hidden>
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

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product</label>
                                            <select name="product" class="selectpicker form-control" data-style="py-0" id="product_select">
                                                    
                                                <?php foreach ($products as $product) : ?>
                                                    <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?> </option>
                                                <?php endforeach;  ?>
                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <select name="qty" class="selectpicker form-control" data-style="py-0" id="product_select">
                                                    
                                                <?php /* foreach ($products as $product) : ?>
                                                    <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?> </option>
                                                <?php endforeach; */  ?>

                                                <option value="gallon">Gallon</option>
                                                <option value="quarter">Quarter</option>
                                                <option value="dabbi">Dabbi</option>
                                                <option value="drumi">Drumi</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Pcs</label>
                                            <input type="number" name="pcs" class="form-control" placeholder="">
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
                                                        <th class="text-center" scope="col">Delete</th>
                                                        <!-- <th class="text-center" scope="col">#</th> -->
                                                        <th scope="col">Item</th>
                                                        <th class="text-center" scope="col">Quantity</th>
                                                        <th class="text-center" scope="col">Pcs</th>
                                                        <th class="text-center" scope="col">Price</th>
                                                        <th class="text-center" scope="col">Totals</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="invoice_table_body">
                                                   
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <!-- <tr>
                                                        <td colspan="5" align="right">Grand Total</td>
                                                        <td class="text-center grandTotal"></td>
                                                    </tr> -->
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ml-auto">
                                        <div class="form-group">
                                            <label>Amount Recieved</label>
                                            <input type="number" name="amount_recieved" class="form-control" placeholder="Amount Recieved">
                                        </div>
                                    </div>

                                    
                                </div>
                                <button type="submit" class="btn btn-primary mt-5">Create Invoice</button>
                                <!-- <a href="invoice_print.php?id=<?php //echo $invoice_code; ?>&amount=<?php //echo $GET['amount_recieved']; ?>" class="btn btn-primary mt-5" target="_blank">Create Invoice</a> -->
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

