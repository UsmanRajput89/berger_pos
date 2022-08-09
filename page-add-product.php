<?php 
    include 'process/model.php'; 
    include "includes/contants.php";
    
    $obj = new database();

    $categories = $obj->get_data('categories');
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
                        <form action="process/add_product.php" data-toggle="validator" method="POST">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" placeholder="Enter Product Name" data-errors="Please Enter Product Name." name="name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SKU *</label>
                                        <input type="text" class="form-control" placeholder="Enter Code" data-errors="Please Enter Code." name="sku" required>
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
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price *</label>
                                        <input type="text" class="form-control" placeholder="Enter Price" data-errors="Please Enter Price." name="price" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control image-file" name="pic" accept="image/*">
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description / Product Details</label>
                                        <textarea class="form-control" rows="4"></textarea>
                                    </div>
                                </div> -->
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