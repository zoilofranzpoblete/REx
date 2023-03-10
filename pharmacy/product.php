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
        <title>Products - REx</title>
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
                        if(isset($_SESSION['error'])){
                        echo '
                        <div class="alert alert-danger alert-icon" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <div class="alert-icon-aside">
                                <i class="fas fa-ban"></i>
                            </div>
                            <div class="alert-icon-content">
                                <h6 class="alert-heading">Error!</h6>
                                '.$_SESSION['error'].'
                            </div>
                        </div>';
                        unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['success'])){
                        echo '
                        <div class="alert alert-success alert-icon" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <div class="alert-icon-aside">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="alert-icon-content">
                                <h6 class="alert-heading">Error!</h6>
                                '.$_SESSION['success'].'
                            </div>
                        </div>';
                        unset($_SESSION['success']);
                        }
                    ?>
                        <div class="row">
                                <div class="col-xxl-4 col-lg-4">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mr-3">
                                                    <div class="text-white-75 small">Product with available stocks</div>
                                                    <div class="text-lg font-weight-bold"><?php
                                                    $stmt = mysqli_query($conn,"SELECT * FROM productstbl WHERE pharmacyId = '$id' AND stock > '20'");
                                                    echo $active_stock = mysqli_num_rows($stmt);
                                                    ?></div>
                                                </div>
                                                <i class="feather-xl text-white-50 fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-4">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mr-3">
                                                    <div class="text-white-75 small">Product with limited stocks</div>
                                                    <div class="text-lg font-weight-bold"><?php
                                                    $stmt = mysqli_query($conn,"SELECT * FROM productstbl WHERE pharmacyId = '$id' AND stock <= '20'");
                                                    echo $limted_stock = mysqli_num_rows($stmt);
                                                    ?></div>
                                                </div>
                                                <i class="feather-xl text-white-50 fas fa-exclamation"></i>
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
                                                    <div class="text-white-75 small">Product with out of stocks</div>
                                                    <div class="text-lg font-weight-bold"><?php
                                                    $stmt = mysqli_query($conn,"SELECT * FROM productstbl WHERE pharmacyId = '$id' AND stock < '1'");
                                                    echo $outs_stock = mysqli_num_rows($stmt);
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
                                <div class="mb-3"><button class="btn btn-primary float-right" data-toggle="modal" data-target="#add_product_modal"><i data-feather="file-plus"></i>&nbsp;Add Record</button></div>
                                <div class="datatable">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Brand Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $result = mysqli_query($conn,"SELECT * FROM productstbl WHERE pharmacyId = '$id'");
                                                $n = 1;
                                                while($row = mysqli_fetch_array($result)) {
                                            $image =  (!empty($row['productImage'])) ? '../images/'.$row['productImage'] : '../images/Rex-logo.png';
                                            ?>
                                            <tr>
                                                <td class="display_product_details" data-id="<?php echo $row['productId']; ?>"><?php echo $n; ?></td>
                                                <td class="display_product_details" data-id="<?php echo $row['productId']; ?>"><img src='<?php echo $image; ?>' width='60px' height='60px' class="img-fluid"></td>
                                                <td class="display_product_details" data-id="<?php echo $row['productId']; ?>"><?php echo $row['brandName']; ?></td>
                                                <td class="display_product_details" data-id="<?php echo $row['productId']; ?>"><?php echo $row['price']; ?></td>
                                                <td class="display_product_details" data-id="<?php echo $row['productId']; ?>"><?php echo $row['stock']; ?></td>
                                                <td><?php 
                                                if($row['stock'] < 1){
                                                    echo '<h5><span class="badge badge-danger badge-pill">Out of Stock</span></h5>' ;
                                                }elseif($row['stock'] <= 20){
                                                    echo '<h5><span class="blinking badge badge-warning badge-pill">Limited Stocks</span></h5>';
                                                }else{
                                                    echo '<h5><span class="badge badge-success badge-pill">Available</span></h5>';
                                                } ?></td>
                                                 <td>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" title="Update" id="edit_product" data-toggle="modal" data-target="#edit_product_modal"
                                                data-id="<?php echo $row['productId'];?>"
                                                data-brand="<?php echo $row['brandName'];?>"
                                                data-generic="<?php echo $row['genericName'];?>"
                                                data-type="<?php echo $row['drugType'];?>"
                                                data-price="<?php echo $row['price'];?>"
                                                data-stock="<?php echo $row['stock'];?>"
                                                data-description="<?php echo $row['description'];?>"
                                                data-image="<?php echo $row['productImage'];?>">
                                                
                                                <i data-feather="edit"></i></button>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete" id="delete_product" data-id="<?php echo $row['productId'];?>" data-name="<?php echo $name;?>"><i data-feather="trash-2"></i></button></td>
                                            
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
        <div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Product</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    </div>
                    <div class="modal-body">
                    <form id="add_product" action="add_product.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group my-2">
                                            <label for="add_product_image" class="text-uppercase">Upload Image</label>
                                            <input type="file" class="form-control" id="add_product_image" name="add_product_image" accept="image/png, image/jpeg" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group my-2">
                                            <input class="form-control text-uppercase pharma" id="add_product_id" name="add_product_id" type="hidden" value="<?php echo $id;?>" />
                                            <input class="form-control text-uppercase pharma" id="add_product_name" name="add_product_name" type="hidden" value="<?php echo $name;?>" />
                                            <label for="add_product_bname" class="text-uppercase">Brand Name</label>
                                            <input class="form-control text-uppercase pharma" id="add_product_bname" name="add_product_bname" type="text" placeholder="---" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group my-2">
                                            <label for="add_product_gname" class="text-uppercase">Generic Name</label>
                                            <input class="form-control text-uppercase pharma" id="add_product_gname" name="add_product_gname" type="text" placeholder="---" />
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                    <span><code>NOTE:</code>If you select <code>PRESCRIBE</code>, you need to upload a copy of the doctor's prescription. Your order will automatically cancelled if prescription uploaded.</span>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group my-2">
                                            <label for="add_product_prescription" class="text-uppercase">Prescription Type</label>
                                            
                                            <select class="form-control pharma text-uppercase" id="add_product_prescription" name ="add_product_prescription">
                                                <option hidden value="">Select Type</option>
                                                <option value="PRESCRIBE">PRESCRIBE</option>
                                                <option value="OVER-THE-COUNTER">OVER-THE-COUNTER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group my-2">
                                            <label for="add_product_price" class="text-uppercase">Price</label>
                                            <input class="form-control pharma" id="add_product_price" name ="add_product_price" type="text" placeholder="---" maxlength="4" 
                                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group my-2">
                                            <label for="add_product_stock" class="text-uppercase">Stock/s</label>
                                            <input class="form-control pharma" id="add_product_stock" name="add_product_stock" type="text" placeholder="---" maxlength="10" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group my-2">
                                            <label for="add_product_description" class="text-uppercase">Description </label>
                                            <textarea class="form-control text-uppercase pharma" id="add_product_description" name="add_product_description"  placeholder="---" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="add_product_details" name="add_product_details"><i data-feather='save'></i>&nbsp;Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i data-feather='x-circle'></i>&nbsp;Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Product</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    </div>
                    <div class="modal-body">
                    <form id="update_product" action="edit_product.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5 ">
                                <div class="border text-center">
                                <img src="" alt="Image" id="images" class="img-fluid p-1" style="max-width: 60% !important;">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group my-2">
                                            <label for="edit_product_image" class="text-uppercase">Upload Image</label>
                                            <input type="file" class="form-control" id="edit_product_image" name="edit_product_image" accept="image/png, image/jpeg" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group my-2">
                                            <input class="form-control text-uppercase pharma" id="edit_product_id" name="edit_product_id" type="hidden" />
                                            <input class="form-control text-uppercase pharma" id="edit_product_name" name="edit_product_name" type="hidden" value="<?php echo $name;?>" />
                                            <label for="edit_product_bname" class="text-uppercase">Brand Name</label>
                                            <input class="form-control text-uppercase pharma" id="edit_product_bname" name="edit_product_bname" type="text" placeholder="---" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group my-2">
                                            <label for="edit_product_gname" class="text-uppercase">Generic Name</label>
                                            <input class="form-control text-uppercase pharma" id="edit_product_gname" name="edit_product_gname" type="text" placeholder="---" />
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                    <span><code>NOTE:</code>If you select <code>PRESCRIBE</code>, you need to upload a copy of the doctor's prescription. Your order will automatically cancelled if prescription uploaded.</span>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group my-2">
                                            <label for="edit_product_prescription" class="text-uppercase">Prescription Type</label>
                                            
                                            <select class="form-control pharma text-uppercase" id="edit_product_prescription" name ="edit_product_prescription">
                                                <option hidden value="">Select Type</option>
                                                <option value="PRESCRIBE">PRESCRIBE</option>
                                                <option value="OVER-THE-COUNTER">OVER-THE-COUNTER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group my-2">
                                            <label for="edit_product_price" class="text-uppercase">Price</label>
                                            <input class="form-control pharma" id="edit_product_price" name ="edit_product_price" type="text" placeholder="---" maxlength="4" 
                                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group my-2">
                                            <label for="edit_product_stock" class="text-uppercase">Stock/s</label>
                                            <input class="form-control pharma" id="edit_product_stock" name="edit_product_stock" type="text" placeholder="---" maxlength="10" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group my-2">
                                            <label for="edit_product_description" class="text-uppercase">Description </label>
                                            <textarea class="form-control text-uppercase pharma" id="edit_product_description" name="edit_product_description"  placeholder="---" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="edit_product_details" name="edit_product_details"><i data-feather='save'></i>&nbsp;Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i data-feather='x-circle'></i>&nbsp;Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="display_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Product Details</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="display"></div>
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
       
</body>
</html>