<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Login - REx</title>
        <link href="../admin/css/styles.css" rel="stylesheet" />
        <link href="../admin/css/sweetalert.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="../images/favicon-32x32.png" />
        <script data-search-pseudo-elements defer src="../admin/js/all.min.js" crossorigin="anonymous"></script>
        <script src="../admin/js/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body background= "../images/hero_1.jpg" style="background-size: cover;background-repeat: no-repeat;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-2 rounded-lg mt-5 border-info" style="margin-top: 17em !important;">
                                    <div class="card-header justify-content-center bg-primary-soft"  style="background-image: url('../images/bg_1.jpg'); background-position-y: 50%;background-size: cover;background-repeat: no-repeat;">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="avatar-md profile-user-width mb-4 my-4">
                                            <span class="avatar-title">
                                                <img src="../images/rex-logo.png" alt="" height="100">
                                            </span>
                                        </div>
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-8">
                                                 <p class="text-dark text-uppercase my-2 mt-5" style="font-size: 20px;"><b>REx - Customer<br> Login</b></p>
                                                 <p class="text-dark">Login to continue</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                            <div class="form-group my-2">
                                                <label for="login_uname" class="text-uppercase">Username</label>
                                                <input class="form-control" id="login_uname" type="text" placeholder="Enter username" />
                                            </div>
                                            <div class="form-group">
                                                <label for="login_pass" class="text-uppercase">Password</label>
                                                <input class="form-control" id="login_pass" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-block btn-primary text-uppercase" type="submit" id="login_btn"><b>Login</b></button>
                                            </div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row" >
                                            <div class="col-lg-6 text-left"><a href="register.php">Register Here!</a></div>
                                            <div class="col-lg-6 text-right"><a href="#">Forgot Password?</a></div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div><br>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark text-">
                    <div class="container text-center">
                        <p class="text-white small">
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved.</p>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../admin/js/jquery-3.5.1.min.js"></script>
        <script src="../admin/js/bootstrap.bundle.min.js"></script>
        <script src="../admin/js/scripts.js"></script>
        <script src="process.js"></script>
        <script src="../admin/js/sweetalert.js"></script>
        
</body>
</html>