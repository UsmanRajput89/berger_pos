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
                    <a href="page-add-category.php" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Sr #</th>
                                <th>Category Name</th>
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
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href=""><i class="ri-pencil-line mr-0"></i></a>
                                        <a class="badge bg-warning mr-2 delete" data-toggle="tooltip" data-id="<?php echo $value['category_id']; ?>" data-table="categories" data-col="category_id" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
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
    <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
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
    </div>
</div>

<?php include 'modules/foot.php'; ?>

<?php 
    else :
        header("Location: index.php");
        exit();
    endif;
?>