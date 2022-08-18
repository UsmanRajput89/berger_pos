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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4>Aging Analysis</h4>
                        </div>
                        <a href="page-add-sale.php" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Sale</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                        <!-- <table border="0" cellspacing="5" cellpadding="5">
                            <tbody>
                                <tr>
                                    <td>Minimum date:</td>
                                    <td><input type="text" id="min" name="min"></td>
                                </tr>
                                <tr>
                                    <td>Maximum date:</td>
                                    <td><input type="text" id="max" name="max"></td>
                                </tr>
                            </tbody>
                        </table> -->

                        <table class="data-table mb-0" >
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>Customer </th>
                                    <th>Name</th>
                                    <th>Area</th>
                                    <th>Outstanding Amount</th>
                                    <th>0 - 30 days</th>
                                    <th>31 - 45 days</th>
                                    <th>46 - 60 days</th>
                                    <th>61 - 90 days</th>
                                    <th>91 - 120 days</th>
                                    <th>121 - 180 days</th>
                                    <th>181 - 364 days</th>
                                    <th>Under 2 Years</th>
                                    <th>Under 3 Years</th>
                                    <th>Over 3 Years</th>
                                </tr>
                            </thead>
                            <tbody class="ligth-body">
                                <tr class="ligth ligth-data">
                                    <td>0000</td>
                                    <td>Johnson</td>
                                    <td>Lahore</td>
                                    <td>290000</td>
                                    <th>0 - 30 days</th>
                                    <th>31 - 45 days</th>
                                    <th>46 - 60 days</th>
                                    <th>61 - 90 days</th>
                                    <th>91 - 120 days</th>
                                    <th>121 - 180 days</th>
                                    <th>181 - 364 days</th>
                                    <th>Under 2 Years</th>
                                    <th>Under 3 Years</th>
                                    <th>Over 4 Years</th>
                                </tr>
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
        <!-- Modal Edit -->
        <!-- <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <div class="media align-items-top justify-content-between">
                                <h3 class="mb-3">Product</h3>
                                <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i>
                                </div>
                            </div>
                            <div class="content edit-notes">
                                <div class="card card-transparent card-block card-stretch event-note mb-0">
                                    <div class="card-body px-0 bukmark">
                                        <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
                                            <div class="quill-tool">
                                            </div>
                                        </div>
                                        <div id="quill-toolbar1">
                                            <p>Virtual Digital Marketing Course every week on Monday, Wednesday
                                                and Saturday.Virtual Digital Marketing Course every week on
                                                Monday</p>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0">
                                        <div class="d-flex flex-wrap align-items-ceter justify-content-end">
                                            <div class="btn btn-primary mr-3" data-dismiss="modal">Cancel</div>
                                            <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>

<?php include 'modules/foot.php'; ?>


<?php
else :
    header("Location: index.php");
    exit();
endif;
?>