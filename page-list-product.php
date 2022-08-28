<?php 

    include 'process/model.php'; 
    include "includes/contants.php";

    $obj = new database();

    $products = $obj->join_double('products', 'categories', 'category', 'category_id');

    $categories = $obj->get_data('categories');

    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['username'])) :

?>


<?php include 'modules/head.php'; ?>

<div class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Product List</h4>
                        <p class="mb-0">The product list effectively dictates product presentation and provides space<br> to list your products and offering in the most appealing way.</p>
                    </div>
                    
                    <!-- <a href="page-add-product.php" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Product</a> -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form">
                        Add Product
                    </button> 
                </div>
            </div>

            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Product</th>
                                <th>Code</th>
                                <th>Category</th>
                                <!-- <th>Gallon Price</th> -->
                                <th>Gallon Quantity</th>
                                <!-- <th>Quarter Price</th> -->
                                <th>Quarter Quantity</th>
                                <!-- <th>Dabbi Price</th> -->
                                <th>Dabbi Quantity</th>
                                <!-- <th>Drumi Price</th> -->
                                <th>Drumi Quantity</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            
                            <?php foreach ($products as $product) : ?>
                            
                            <tr>
                                <?php //echo $product['name']; ?>
                                
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['sku']; ?></td>
                                <td><?php echo $product['category_name']; ?></td>
                                <!-- <td><?php //echo $product['gallon_price']; ?></td> -->
                                <td><?php echo $product['gallon_quantity']; ?></td>
                                <!-- <td><?php //echo $product['quarter_price']; ?></td> -->
                                <td><?php echo $product['quarter_quantity']; ?></td>
                                <!-- <td><?php //echo $product['dabbi_price']; ?></td> -->
                                <td><?php echo $product['dabbi_quantity']; ?></td>
                                <!-- <td><?php //echo $product['drumi_price']; ?></td> -->
                                <td><?php echo $product['drumi_quantity']; ?></td>
                                
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-success mr-2 edit_product" data-id="<?php echo $product['id']; ?>" data-table="products" href="#" data-toggle="modal" data-target="#form">
                                            <i class="ri-pencil-line mr-0"></i>
                                        </a>

                                        <a class="badge bg-warning mr-2 delete" data-toggle="tooltip" data-id="<?php echo $product['id']; ?>" data-table="products" data-col="id" data-placement="top" title="" data-original-title="Delete" href="#">
                                            <i class="ri-delete-bin-line mr-0"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
                            <?php  endforeach; ?>
                            
                        </tbody>
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
                            <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                        </div>
                        <div class="content edit-notes">
                            <div class="card card-transparent card-block card-stretch event-note mb-0">
                                <div class="card-body px-0 bukmark">
                                    <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
                                        <div class="quill-tool">
                                        </div>
                                    </div>
                                    <div id="quill-toolbar1">
                                        <p>Virtual Digital Marketing Course every week on Monday, Wednesday and Saturday.Virtual Digital Marketing Course every week on Monday</p>
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

    <!-- <div class="container">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form">
        See Modal with Form
    </button>  
    </div> -->

    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Add Poduct</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" data-toggle="validator" method="POST" id="product_form">
                    <div class="row px-10 mx-10">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="product_id" id="product_id" hidden>
                                <label>Name *</label>
                                <input type="text" class="form-control" placeholder="Enter Product Name" data-errors="Please Enter Product Name." name="name" id="product_name" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>SKU *</label>
                                <input type="text" class="form-control" placeholder="Enter Code" data-errors="Please Enter Code." name="sku" id="sku" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category *</label>
                                <select name="category" class="selectpicker form-control" data-style="py-0">
                                    
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?> </option>
                                    <?php endforeach; ?>
                                    
                                </select>
                            </div>
                        </div>
                        
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Gallon Price *</label>
                                <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." name="gallon_price" id="gallon_price" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gallon Quantity *</label>
                                <input type="text" class="form-control" placeholder="Enter Quantity" data-errors="Please Enter Quantity." name="gallon_quantity" id="gallon_quantity">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Quarter Price *</label>
                                <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." name="quarter_price" id="quarter_price" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quarter Quantity *</label>
                                <input type="text" class="form-control" placeholder="Enter Quantity" data-errors="Please Enter Quantity." name="quarter_quantity" id="quarter_quantity">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Dabbi Price *</label>
                                <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." name="dabbi_price" id="dabbi_price">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dabbi Quantity *</label>
                                <input type="text" class="form-control" placeholder="Enter Quantity" data-errors="Please Enter Quantity." name="dabbi_quantity" id="dabbi_quantity">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Drumi Price *</label>
                                <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." name="drumi_price" id="drumi_price">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Drumi Quantity *</label>
                                <input type="text" class="form-control" placeholder="Enter Quantity" data-errors="Please Enter Quantity." name="drumi_quantity" id="drumi_quantity">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                       
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
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