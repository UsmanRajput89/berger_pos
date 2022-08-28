<?php
include 'process/model.php';
include "includes/contants.php";

// $id = $_GET['id'];
$obj = new database();

$customers = $obj->get_data('customers');

// $product = $obj->one_row('products', 'categories', 'category', 'category_id', $id);


session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) :

?>

    <?php include 'modules/head.php'; ?>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3">Customer List</h4>
                            <p class="mb-0">A customer dashboard lets you easily gather and visualize customer data from optimizing <br>
                                the customer experience, ensuring customer retention. </p>
                        </div>
                        <!-- <a href="page-add-customers.html" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Customer</a> -->

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form">
                            Add Customer
                        </button> 
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                        <table class="data-table table mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <!-- <th>Phone No.</th> -->
                                    <!-- <th>Country</th>
                                    <th>Order</th>
                                    <th>Status</th> -->
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="ligth-body">
                                <?php foreach ($customers as $customer) : ?>
                                <tr>
                                    <td> <?php echo $customer['customer_name'];  ?></td>
                                    <td><?php echo $customer['customer_phone'];  ?></td>
                                    <td><?php echo $customer['customer_address'];  ?></td>
                                    <td><?php echo $customer['customer_city'];  ?></td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ledger" href="customer_ledger.php?id=<?php echo $customer['customer_id']; ?>" target="_blank"><i class="ri-eye-line mr-0"></i></a>

                                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" data-original-title="Edit" href=""><i class="ri-pencil-line mr-0"></i></a>

                                            <a class="badge bg-warning mr-2 delete" data-toggle="tooltip" data-id="<?php echo $customer['customer_id']; ?>" data-table="customers" data-col="customer_id" data-placement="top" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
        <!-- Modal Edit -->
        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Add Poduct</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" method="POST" data-toggle="validator" id="customer_form">
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
    <?php include 'modules/foot.php'; ?>


<?php
else :
    header("Location: index.php");
    exit();
endif;
?>