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
                            <h4 class="card-title">Add category</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="process/add_category.php" data-toggle="validator" method="POST">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name *</label>
                                        <input type="text" class="form-control" placeholder="Enter Category Name" name="name" required>

                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add category</button>
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