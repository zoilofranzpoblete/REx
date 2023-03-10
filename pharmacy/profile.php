<?php 
include '../includes/conn.php';
// include 'data.php';
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
if(empty($id)){
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Profile - REx</title>
          <link href="css/styles.css" rel="stylesheet" />
        <link href="css/sweetalert.css" rel="stylesheet" />
        <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
        <link rel="icon" type="image/x-icon" href="../images/favicon-32x32.png" />
        <script src="js/all.min.js"></script>
        <script src="js/feather.min.js"></script>
        <style type="text/css">
          .blinking{
            animation: blinker 1.2s linear infinite;
            }

            @keyframes blinker {
              50% {
                opacity: 0;
              }
            }
        </style>
    </head>
    <body class="nav-fixed" background= "">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-primary-soft " id="sidenavAccordion" >
        <a class="navbar-brand ps-3" href="index.php">REx Admin</a>
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle"><i data-feather="menu"></i></button>
            <ul class="navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown no-caret mr-3 mr-lg-0 dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/illustrations/profiles/profile-1.png" /></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-1.png" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name"><?php echo $name; ?></div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#logout_modal">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
           <?php include 'includes/header.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark pb-10 pt-5" style="background-image: url('../images/bg_1.jpg'); background-position-y:50%; background-size:cover;"></header>
                    <div class="container mt-n10">
                    <?php
                        $result = mysqli_query($conn,"SELECT * FROM `pharmacytbl` WHERE `pharmacyId` = $id");
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Pharmacy Picture and Account Details</div>
                                    <div class="card-body">
                                        <div class="text-center"><img class="img-account-profile rounded-circle mb-2" src="../images/undraw_medicine_b1ol.png" alt=""></div> 
                                        <div class="row gx-3 mb-3 mt-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="profile_username">Username</label>
                                                <input class="form-control" id="profile_username" type="text" value="<?php echo $row['userName']; ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="profile_password">Password</label>
                                                <input class="form-control" id="profile_password" type="password" value="<?php echo $row['password']; ?>" readonly>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" id="profile_changepass_btn" type="button" data-id ="<?php echo $id; ?>" data-toggle="modal" data-target="#profile_changepass_modal">Change Password?</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header">Pharmacy Details</div>
                                    <div class="card-body">
                                        <form>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="profile_pharmaname">Pharmacy Name</label>
                                                <input class="form-control text-uppercase" id="profile_pharmaname" type="text" value="<?php echo $row['pharmacyName']; ?>" readonly>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="profile_email">Email</label>
                                                    <input class="form-control" id="profile_email" type="text" value="<?php echo $row['email']; ?>" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="profile_contact">Contact Number</label>
                                                    <input class="form-control" id="profile_contact" type="text" value="<?php echo $row['contactNumber']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-12">
                                                    <label class="small mb-1" for="profile_address">Address</label>
                                                    <input class="form-control text-uppercase" id="profile_address" type="text"  value="<?php echo $row['address']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="profile_barangay">Barangay</label>
                                                    <input class="form-control text-uppercase" id="profile_barangay" type="text" value="<?php echo $row['barangayId']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="profile_city">City</label>
                                                    <input class="form-control text-uppercase" id="profile_city" type="text" value="<?php echo $row['city']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="profile_province">Province</label>
                                                    <input class="form-control text-uppercase" id="profile_province" type="text" value="<?php echo $row['province']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="profile_subscription">Subscription</label>
                                                    <input class="form-control text-uppercase" id="profile_subscription" type="text" value="<?php echo $row['code']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="profile_expirydate">Expiry Date</label>
                                                    <input class="form-control" id="profile_expirydate" type="text" value="<?php echo $row['subscriptionEnd']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="profile_status">Status</label>
                                                    <?php
                                                    $dateNow = date("Y-m-d");
                                                    if($row['subscriptionEnd'] >= $dateNow){
                                                        echo '<h1><span class="badge badge-success">Active</span></h1>';
                                                    }else{
                                                        echo '<h1><span class="badge badge-danger">Inactive</span></h1>' ;
                                                    } 
                                                    ?>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="button" id="profile_changedetails_btn"  data-id="<?php echo $id; ?>" data-toggle="modal" data-target="#profile_changedetails_modal">Update?</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>    
                </main>
                <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark text-">
                    <div class="container text-center">
                        <p class="text-dark small">Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved.</p></p>
                </div>
                </footer>
            </div>
        </div>
        <div class="modal fade" id="profile_changepass_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Pharmacy Account Details</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group my-2">
                                            <label for="edit_profile_username" class="text-uppercase">Username</label>
                                            <input class="form-control account" id="edit_profile_id" type="hidden" />
                                            <input class="form-control pharma" id="edit_profile_username" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group my-2">
                                            <label for="edit_profile_password" class="text-uppercase">Password</label>
                                            <input class="form-control account" id="edit_profile_password" type="password" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group my-2">
                                            <label for="edit_profile_new_password" class="text-uppercase">New Password</label>
                                            <input class="form-control account" id="edit_profile_new_password" type="password" placeholder="---" />
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="edit_profile_account"><i data-feather='save'></i>&nbsp;Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i data-feather='x-circle'></i>&nbsp;Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="profile_changedetails_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Pharmacy Details</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group my-2">
                                            <label for="edit_profile_name" class="text-uppercase">Pharmacy Name</label>
                                            <input class="form-control account" id="edit_profdet_id" type="hidden" />
                                            <input class="form-control pharma" id="edit_profdet_name" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group my-2">
                                            <label for="edit_profdet_email" class="text-uppercase">Email</label>
                                            <input class="form-control account" id="edit_profdet_email" type="email" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group my-2">
                                            <label for="edit_profdet_contact" class="text-uppercase">Contact No</label>
                                            <input class="form-control account" id="edit_profdet_contact" type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group my-2">
                                            <label for="edit_profdet_address" class="text-uppercase">Address</label>
                                            <input class="form-control account" id="edit_profdet_address" type="text"  />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="edit_profdet_barangay" class="text-uppercase">Barangay</label>
                                                <select class="form-control pharma text-uppercase" id="edit_profdet_barangay">
                                                    <option hidden value="">Select Barangay</option>
                                                    <?php
                                                    $sql = mysqli_query($conn,"SELECT barangayId, barangayName FROM barangaytbl");
                                                    while($row = mysqli_fetch_array($sql)) {
                                                        echo '<option value="' . $row['barangayName'] . '">' . $row['barangayName'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="edit_profdet_city" class="text-uppercase">City</label>
                                                <input class="form-control pharma text-uppercase" id="edit_profdet_city" type="text" value="Angeles City" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="edit_profdet_province" class="text-uppercase">Province</label>
                                                <input class="form-control pharma text-uppercase" id="edit_profdet_province" type="text" value="Pampanga" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="edit_profdet_account"><i data-feather='save'></i>&nbsp;Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i data-feather='x-circle'></i>&nbsp;Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php  include 'logout_modal.php'; ?>
       </script><script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="includes/chart-area-demo.js"></script>
        <script src="process.js"></script>
        <script src="js/sweetalert.js"></script>
</body>
</html>