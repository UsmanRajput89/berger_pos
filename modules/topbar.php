<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <!-- <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="index.html" class="header-logo">
                    <img src="assets/images/logo.jfif" class="img-fluid rounded-normal" alt="logo">
                    <h5 class="logo-title ml-3">berger</h5>

                </a>
            </div> -->
            <div class="topbar-menu-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="index.php" class="header-logo">
                    <img src="assets/images/logo.jfif" class="img-fluid rounded-normal" alt="logo">
                    <!-- <h5 class="logo-title ml-3">berger</h5> -->
                </a>
            </div>
            <!-- <div class="iq-search-bar device-search">
                <form action="#" class="searchbox">
                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                    <input type="text" class="text search-input" placeholder="Search here...">
                </form>
            </div> -->
            <div class="topbar-menu d-flex">
                <a href="page-list-product.php">Products</a>
                <a href="page-list-category.php">Categories</a>
                <a href="page-list-customers.php">Customers</a>
                <a href="page-list-sale.php">Sales</a>
                <!-- <a href="#">Reports</a> -->
            </div>
            <div class="d-flex align-items-center">
                <!-- <div class="change-mode">
                    <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                        <div class="custom-switch-inner">
                            <p class="mb-0"> </p>
                            <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                            <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                            </label>
                        </div>
                    </div>
                </div> -->
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button> -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">

                        <!-- <li>
                            <a href="#" class="btn border add-btn shadow-none mx-2 d-none d-md-block" data-toggle="modal" data-target="#new-order"><i class="las la-plus mr-2"></i>New
                                Order</a>
                        </li> -->

                        <li class="nav-item nav-icon dropdown caption-content">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/user/1.png" class="img-fluid rounded" alt="user">
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 text-center">
                                        <div class="media-body profile-detail text-center">
                                            <img src="assets/images/page-img/profile-bg.jpg" alt="profile-bg" class="rounded-top img-fluid mb-4">
                                            <img src="assets/images/user/1.png" alt="profile-img" class="rounded profile-img img-fluid avatar-70">
                                        </div>
                                        <div class="p-3">
                                            <!-- <p class="mb-1"><?php //echo $_SESSION['name']; ?> -->
                                            </p>
                                            <h5 class="mb-1"><?php echo $_SESSION['name']; ?></h5>
                                            <p class="mb-1"><?php echo $_SESSION['email']; ?></p>
                                            <!-- <p class="mb-0">Since 10 march, 2020</p> -->
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <a href="https://templates.iqonic.design/posdash/html/app/user-profile.html" class="btn border mr-2">Profile</a>
                                                <a href="admin/logout.php" class="btn border">Sign Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
