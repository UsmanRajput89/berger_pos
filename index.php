<?php 
    include "includes/contants.php";
    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['username'])) :
?>


<?php include 'modules/head.php'; ?>

<div class="content-page">
    <?php include 'modules/menu.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-transparent card-block card-stretch card-height border-none">
                    <div class="card-body p-0 mt-lg-2 mt-0">
                        <h3 class="mb-3">Hi User, Good Morning</h3>
                        <!-- <p class="mb-0 mr-4">Your dashboard gives you views of key performance or business
                            process.</p> -->
                    </div>
                </div>
            </div>
        </div>
       

    </div>
    <section class="container">
        <!-- <h1>All Things Here</h1> -->

        <div class="row d-flex main-page-menu">
            <div class="col-md-2 text-center item-mm">
                <a href="page-list-product.php">
                    
                    <svg class="svg-icon" id="p-dash2" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                        </path>
                    </svg>

                    <h4>Products</h4>
                
                </a>
            </div>
            <div class="col-md-2 text-center item-mm">
                <a href="page-list-category.php">
                    
                        <svg class="svg-icon" id="p-dash3" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>

                    <h4>Categories</h4>
                
                </a>
            </div>
            <div class="col-md-2 text-center item-mm">
                <a href="page-list-customers.php">
                    
                    <svg class="svg-icon" id="p-dash8" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>

                    <h4>Customers</h4>
                
                </a>
            </div>
            <div class="col-md-2 text-center item-mm">
                <a href="page-list-sale.php">
                    
                    <svg class="svg-icon" id="p-dash4" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                    </svg>

                    <h4>Sale</h4>
                
                </a>
            </div>
            <!-- <div class="col-md-2 text-center item-mm">
                <a href="page-list-product.php">
                    
                    <svg class="svg-icon" id="p-dash1" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>

                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>

                    <h4>Products</h4>
                
                </a>
            </div> -->
            <div class="col-md-2 text-center item-mm">
                <a href="page-list-product.php">
                    
                    <svg class="svg-icon" id="p-dash1" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>

                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>

                    <h4>Reports</h4>
                
                </a>
            </div>
        </div>

    </section>
</div>


<?php include 'modules/foot.php'; ?>
<?php 
    else :
        header('Location: '.URL.'login.php');
        exit();
    endif;
?>