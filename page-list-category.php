<?php 
    include 'process/model.php'; 
    include "includes/contants.php";

    $obj = new database();

    $res = $obj->get_data('categories');

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
                        <h4 class="mb-3">Category List</h4>
                        <p class="mb-0">Use category list as to describe your overall core business from the provided list. <br>
                            Click the name of the category where you want to add a list item. .</p>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form">
                        Add Category
                    </button> 
                    <!-- <a href="page-add-category.php" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a> -->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Sr #</th>
                                <th>Category Name</th>
                                <th>Drmi Price</th>
                                <th>Quarter Price</th>
                                <th>Gallon Price</th>
                                <th>Dabbi Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            
                            <?php $i=1; foreach ($res as $value) : ?>
                            
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $value['category_name']; ?>
                                </td>
                                <td><?php echo $value['drumi_price']; ?></td>
                                <td><?php echo $value['quarter_price']; ?></td>
                                <td><?php echo $value['gallon_price']; ?></td>
                                <td><?php echo $value['dabbi_price']; ?></td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-success mr-2 edit_category" data-id="<?php echo $value['category_id']; ?>" data-table="categories" data-col="category_id" href="#" data-toggle="modal" data-target="#form">
                                            <i class="ri-pencil-line mr-0"></i>
                                        </a>
                                        
                                        <a class="badge bg-warning mr-2 delete" data-toggle="tooltip" data-id="<?php echo $value['category_id']; ?>" data-table="categories" data-col="category_id" data-placement="top" title="" data-original-title="Delete" href="#">
                                            <i class="ri-delete-bin-line mr-0"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <?php $i++; endforeach; ?>
                            
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" data-toggle="validator" method="POST" id="category_form">
                    
                    <div class="row px-10 mx-10">
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name *</label>
                                <input type="text" class="form-control" placeholder="Enter Category Id" data-errors="Please Enter Catgeory ID" name="category_id" id="category_id" hidden>
                                <input type="text" class="form-control" placeholder="Enter Category Name" data-errors="Please Enter Catgeory Name." name="name" id="category_name" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Drumi Price *</label>
                                <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." name="drumi_price" id="drumi_price">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quarter Price *</label>
                                <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." name="quarter_price" id="quarter_price" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gallon Price *</label>
                                <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." name="gallon_price" id="gallon_price" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dabbi Price *</label>
                                <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." name="dabbi_price" id="dabbi_price">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" id="category_submit">Submit</button>
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