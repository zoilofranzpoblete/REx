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
        <title>Orders - REx</title>
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
                            <div class="col-xxl-4 col-lg-4">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">Pending Order</div>
                                                <div class="text-lg font-weight-bold">
                                                <?php
                                                    $stmt = mysqli_query($conn,"SELECT * FROM `ordertbl` WHERE `pharmaID` = '$id' AND `status` = '0'");
                                                    echo $pending = mysqli_num_rows($stmt);
                                                ?>
                                                </div>
                                            </div>
                                            <i class="feather-xl text-white-50 fas fa-exclamation"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">Completed Order</div>
                                                <div class="text-lg font-weight-bold">
                                                <?php
                                                    $stmt = mysqli_query($conn,"SELECT * FROM `ordertbl` WHERE `pharmaID` = '$id' AND `status` = '1'");
                                                    echo $complete = mysqli_num_rows($stmt);
                                                ?>
                                                </div>
                                            </div>
                                            <i class="feather-xl text-white-50 fas fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">Declined Order</div>
                                                <div class="text-lg font-weight-bold">
                                                <?php
                                                    $stmt = mysqli_query($conn,"SELECT * FROM `ordertbl` WHERE `pharmaID` = '$id' AND `status` = '2'");
                                                    echo $decline = mysqli_num_rows($stmt);
                                                ?>
                                                </div>
                                            </div>
                                            <i class="feather-xl text-white-50 fas fa-ban"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-xxl-12 col-lg-12">
                            <div class="card-header">Order List</div>
                                <div class="card-body">
                                <div class="datatable">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order Number</th>
                                                <th>Customer Name</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $result = mysqli_query($conn,"SELECT * FROM `ordertbl` WHERE `pharmaID` = $id");
                                                $n = 1;
                                                while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr class="display_pharma_details">
                                                <td><?php echo $n; ?></td>
                                                <td><?php echo $row['orderNumber']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php            
                                                if($row['status'] = "0"){
                                                    echo '<h3><span class="badge badge-warning">Pending</span></h3>';
                                                }elseif($row['status'] = "1"){
                                                    echo '<h3><span class="badge badge-success">Completed</span></h3>';
                                                }else{
                                                    echo '<h3><span class="badge badge-danger">Declined</span></h3>';
                                                }
                                                 ?></td>
                                                <td>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Complete Order" id="edit_pharma"><i data-feather="check"></i></button>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Decline Order" id="delete_pharma"'><i data-feather="times"></i></button></td>
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
</body>
</html>