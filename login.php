<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page | BERGER DASH</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="https://templates.iqonic.design/posdash/html/assets/images/favicon.ico" /> -->
    <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="assets/css/backende209.css?v=1.0.0">
    <link rel="stylesheet" href="assets/vendor/fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/remixicon/fonts/remixicon.css">
</head>

<body class="  ">
    <div class="wrapper">
        <section class="login-content">
            <div class="container">
                <div class="row align-items-center justify-content-center height-self-center">
                    <div class="col-lg-8">
                        <div class="card auth-card">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center auth-content">
                                    <div class="col-lg-7 align-self-center">
                                        <div class="p-3">
                                            <h2 class="mb-2">Sign In</h2>
                                            <p>Login to stay connected.</p>

                                            <form action="admin/login.php" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="text" placeholder=" " name="username">
                                                            <label>Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="password" placeholder=" " name="password">
                                                            <label>Password</label>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-6">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label control-label-1" for="customCheck1">Remember Me</label>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="col-lg-6">
                                                        <a href="auth-recoverpw.html" class="text-primary float-right">Forgot
                                                            Password?</a>
                                                    </div> -->
                                                    <div class="col-lg-12">

                                                        <p class="text-danger">
                                                            <?php 
                                                            if (isset($_GET['error'])) {
                                                                echo "Incorrect Username or Password";
                                                            }
                                                            ?>
                                                    
                                                        </p>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Sign In</button>
                                                <!-- <p class="mt-3">
                                                    Create an Account <a href="auth-sign-up.html" class="text-primary">Sign Up</a>
                                                </p> -->
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 content-right">
                                        <img src="assets/images/login/01.png" class="img-fluid image-right" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php include 'modules/foot.php'; ?>