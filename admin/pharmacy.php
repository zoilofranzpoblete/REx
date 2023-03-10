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
        <title>Dashboard - REx</title>
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
                        <div class="row">
                            <div class="col-xxl-6 col-lg-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">Active Pharmacies</div>
                                                <div class="text-lg font-weight-bold"><?php
                                                $dateNow = date("Y-m-d");
                                                $stmt = mysqli_query($conn,"SELECT * FROM pharmacytbl WHERE subscriptionEnd >= '$dateNow'");
                                                echo $active = mysqli_num_rows($stmt);
                                                ?></div>
                                            </div>
                                            <i class="feather-xl text-white-50 fas fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">Inactive Pharmacies</div>
                                                <div class="text-lg font-weight-bold"><?php
                                                $dateNow = date("Y-m-d");
                                                $stmt = mysqli_query($conn,"SELECT * FROM pharmacytbl WHERE subscriptionEnd < '$dateNow'");
                                                echo $active = mysqli_num_rows($stmt);
                                                ?></div>
                                            </div>
                                            <i class="feather-xl text-white-50 fas fa-ban"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-xxl-12 col-lg-12">
                            <div class="card-header">Pharmacy List</div>
                                <div class="card-body">
                                <div class="mb-3"><button class="btn btn-primary float-right" data-toggle="modal" data-target="#add_pharma_modal"><i data-feather="file-plus"></i>&nbsp;Add Record</button></div>
                                <div class="datatable">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Pharmacy Name</th>
                                                <th>Email</th>
                                                <th>Contact#</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $result = mysqli_query($conn,"SELECT * FROM pharmacytbl");
                                                $n = 1;
                                                while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr class="display_pharma_details" data-id="<?php echo $row['pharmacyId']; ?>">
                                                <td><?php echo $n; ?></td>
                                                <td><?php echo $row['pharmacyName']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['contactNumber']; ?></td>
                                                <td><?php 
                                                $dateNow = date("Y-m-d");            
                                                if($row['subscriptionEnd'] >= $dateNow){
                                                    echo '<div class="badge badge-success badge-pill">Active</div>';
                                                }else{
                                                    echo '<div class="badge badge-danger badge-pill">Inactive</div>' ;
                                                } ?></td>
                                                <td>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Update" id="edit_pharma" data-toggle="modal" data-target="#update_pharma_modal"
                                                data-id ='<?php echo $row['pharmacyId']; ?>'  
                                                data-name ='<?php echo $row['pharmacyName']; ?>' 
                                                data-email='<?php echo $row['email']; ?>'
                                                data-number='<?php echo $row['contactNumber']; ?>'
                                                data-address='<?php echo $row['address']; ?>' 
                                                data-barangay='<?php echo $row['barangayId']; ?>' 
                                                data-city='<?php echo $row['city'];?>'
                                                data-province='<?php echo $row['province'];?>'
                                                data-subscription='<?php echo $row['code'];?>'
                                                data-start='<?php echo $row['subscriptionStart'];?>'
                                                data-end='<?php echo $row['subscriptionEnd'];?>'
                                                data-username='<?php echo $row['userName'];?>'
                                                data-password='<?php echo $row['password'];?>'>
                                                <i data-feather="edit"></i></button>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete" id="delete_pharma" data-id='<?php echo $row['pharmacyId']; ?>'><i data-feather="trash-2"></i></button></td>
                                            </tr>
                                            <?php $n++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
        <div class="modal fade" id="add_pharma_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Pharmacy</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Pharmacy Picture</div>
                                    <div class="card-body text-center">
                                        <img class="img-account-profile rounded-circle mb-2" src="../images/undraw_medicine_b1ol.png" alt="" id="preview" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-8 mb-xl-0">
                                    <div class="card-header">Pharmacy Information</div>
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_name" class="text-uppercase">Pharmacy Name</label>
                                                <input class="form-control text-uppercase pharma" id="add_pharma_name" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_email" class="text-uppercase">Email </label>
                                                <input class="form-control pharma" id="add_pharma_email" type="email" placeholder="---" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group my-2">
                                                <label for="confirm_email" class="text-uppercase">Confirm Email</label>
                                                <input class="form-control pharma" id="confirm_email" type="email" placeholder="---" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_contact" class="text-uppercase">Contact No</label>
                                                <input class="form-control pharma" id="add_pharma_contact" type="text" placeholder="---" maxlength="11" 
                                                onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_address" class="text-uppercase">Street/House/Unit Number</label>
                                                <input class="form-control pharma text-uppercase" id="add_pharma_address" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_barangay" class="text-uppercase">Barangay</label>
                                                <select class="form-control pharma text-uppercase" id="add_pharma_barangay">
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
                                                <label for="add_pharma_city" class="text-uppercase">City</label>
                                                <input class="form-control pharma text-uppercase" id="add_pharma_city" type="text" value="Angeles City" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_province" class="text-uppercase">Province</label>
                                                <input class="form-control pharma text-uppercase" id="add_pharma_province" type="text" value="Pampanga" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_subs" class="text-uppercase">Subscription Type</label>
                                                <select class="form-control pharma text-uppercase" id="add_pharma_subs" name="">
                                                    <option hidden value="">Select subscription</option>
                                                    <option value="Monthly">Monthly</option>
                                                    <option value="Annual">Annual</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_start" class="text-uppercase">Start Date</label>
                                                <input class="form-control pharma" id="add_pharma_start" type="date" value="<?php echo date('Y-m-d'); ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_end" class="text-uppercase">End Date</label>
                                                <input class="form-control pharma" id="add_pharma_end" type="date" value="<?php echo date('Y-m-d'); ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_username" class="text-uppercase">Username</label>
                                                <input class="form-control pharma" id="add_pharma_username" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="add_pharma_password" class="text-uppercase">Password</label>
                                                <input class="form-control pharma" id="add_pharma_password" type="password" placeholder="---" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="confirm_password" class="text-uppercase">Confirm Password</label>
                                                <input class="form-control pharma" id="confirm_password" type="password" placeholder="---" />
                                            </div>
                                        </div>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="add_pharma_details"><i data-feather='save'></i>&nbsp;Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i data-feather='x-circle'></i>&nbsp;Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="update_pharma_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Update Pharmacy Details</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Pharmacy Picture</div>
                                    <div class="card-body text-center">
                                        <img class="img-account-profile rounded-circle mb-2" src="../images/undraw_medicine_b1ol.png" alt="" id="preview" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-8 mb-xl-0">
                                    <div class="card-header">Pharmacy Information</div>
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_name" class="text-uppercase">Pharmacy Name</label>
                                                <input class="form-control text-uppercase edit-pharma" id="edit_pharma_id" type="hidden"/>
                                                <input class="form-control text-uppercase edit-pharma" id="edit_pharma_name" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_email" class="text-uppercase">Email </label>
                                                <input class="form-control edit-pharma" id="edit_pharma_email" type="email" placeholder="---" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_contact" class="text-uppercase">Contact No</label>
                                                <input class="form-control edit-pharma" id="edit_pharma_contact" type="text" placeholder="---" maxlength="11" 
                                                onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_address" class="text-uppercase">Street/House/Unit Number</label>
                                                <input class="form-control edit-pharma text-uppercase" id="edit_pharma_address" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_barangay" class="text-uppercase">Barangay</label>
                                                <select class="form-control edit-pharma text-uppercase" id="edit_pharma_barangay">
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
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_city" class="text-uppercase">City</label>
                                                <input class="form-control edit-pharma text-uppercase" id="edit_pharma_city" type="text" value="Angeles City" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_province" class="text-uppercase">Province</label>
                                                <input class="form-control edit-pharma text-uppercase" id="edit_pharma_province" type="text" value="Pampanga" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_subs" class="text-uppercase">Subscription Type</label>
                                                <select class="form-control edit-pharma text-uppercase" id="edit_pharma_subs" name="">
                                                    <option hidden value="">Select subscription</option>
                                                    <option value="Monthly">Monthly</option>
                                                    <option value="Annual">Annual</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_start" class="text-uppercase">Start Date</label>
                                                <input class="form-control edit-pharma" id="edit_pharma_start" type="date" value="<?php echo date('Y-m-d'); ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_end" class="text-uppercase">End Date</label>
                                                <input class="form-control edit-pharma" id="edit_pharma_end" type="date" value="<?php echo date('Y-m-d'); ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_username" class="text-uppercase">Username</label>
                                                <input class="form-control edit-pharma" id="edit_pharma_username" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group my-2">
                                                <label for="edit_pharma_password" class="text-uppercase">Password</label>
                                                <input class="form-control edit-pharma" id="edit_pharma_password" type="password" placeholder="---" />
                                            </div>
                                        </div>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="edit_pharma_details"><i data-feather='save'></i>&nbsp;Update</button>
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
        <script src="process.js"></script>
        <script src="js/sweetalert.js"></script>
        <!-- <script src="js/Chart.min.js"></script> -->
        <!-- <script src="includes/chart-area-demo.js"></script> -->
        <script>
        $(document).ready(function() {
            $('#add_pharma_subs').change(function() {
                if($(this).val() == 'Annual') {
                    var date = new Date();
                    date.setFullYear(date.getFullYear() + 1);
                    var year = date.getFullYear();
                    var month = ('0' + (date.getMonth() + 1)).slice(-2);
                    var day = ('0' + date.getDate()).slice(-2);
                    $('#add_pharma_end').val(year + '-' + month + '-' + day);
                } else {
                    var date = new Date();
                    date.setMonth(date.getMonth() + 1);
                    var year = date.getFullYear();
                    var month = ('0' + (date.getMonth() + 1)).slice(-2);
                    var day = ('0' + date.getDate()).slice(-2);
                    $('#add_pharma_end').val(year + '-' + month + '-' + day);
                }
            });
            $('#edit_pharma_subs').change(function() {
                if($(this).val() == 'Annual') {
                    var date = new Date();
                    date.setFullYear(date.getFullYear() + 1);
                    var year = date.getFullYear();
                    var month = ('0' + (date.getMonth() + 1)).slice(-2);
                    var day = ('0' + date.getDate()).slice(-2);
                    $('#edit_pharma_end').val(year + '-' + month + '-' + day);
                } else {
                    var date = new Date();
                    date.setMonth(date.getMonth() + 1);
                    var year = date.getFullYear();
                    var month = ('0' + (date.getMonth() + 1)).slice(-2);
                    var day = ('0' + date.getDate()).slice(-2);
                    $('#edit_pharma_end').val(year + '-' + month + '-' + day);
                }
            });
        });
        </script>
</body>
</html>