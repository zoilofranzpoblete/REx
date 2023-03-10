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
                            <div class="col-xxl-3 col-lg-3">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body overflow-auto">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">Earning/s</div>
                                                <div class="text-lg font-weight-bold">0</div>
                                            </div>
                                            <i class="feather-xl text-white-50 fas fa-money-bill"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-3">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">Pending Order</div>
                                                <div class="text-lg font-weight-bold">0</div>
                                            </div>
                                            <i class="feather-xl text-white-50 fas fa-exclamation"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-3">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">Completed Order</div>
                                                <div class="text-lg font-weight-bold">0</div>
                                            </div>
                                            <i class="feather-xl text-white-50 fas fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-3">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small">Cancelled Order</div>
                                                <div class="text-lg font-weight-bold"><?php echo "0" //$for_approval; ?></div>
                                            </div>
                                            <i class="feather-xl text-white-50 fas fa-ban"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 mb-4">
                                <div class="card card-header-actions h-100" style="max-height: 450px;">
                                    <div class="card-header">Order Logs</div>
                                    <div class="card-body overflow-auto">
                                         
                                         <div class="timeline timeline-xs">
                                         <?php
                                           //$result = mysqli_query($conn,"SELECT * FROM logstbl ORDER BY id DESC LIMIT 10 ");
                                           //while($row = mysqli_fetch_array($result)) {
                                         ?>
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    <?php //echo $row['date'].' - '.$row['logs']; ?>
                                                </div>
                                            </div>
                                            <?php //} ?>
                                        </div>
                                    </div>

                                    <div class="card-footer text-center">
                                    <a href="logs.php">View more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-8 col-xl-8 mb-8">
                                <div class="card card-header-actions h-100" style="max-height: 450px;">
                                    <div class="card-header">Total Earnings</div>
                                    <div class="card-body overflow-auto">
                                        <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                                    </div>
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
        <script src="js/Chart.min.js"></script>
        <script src="includes/chart-area-demo.js"></script>
       
</body>
</html>