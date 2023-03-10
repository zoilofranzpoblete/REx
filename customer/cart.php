<?php 
include '../includes/conn.php';
// include 'data.php';
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
if(empty($_GET['pharmaID'])){
    $pharmaID = ''; 
}else{
    $pharmaID = $_GET['pharmaID'];
}
if(empty($id)){
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title><?php echo strtoupper('Hello'); ?> Pharmacy - REx</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="../images/favicon-32x32.png" />
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
  <link href="../admin/css/sweetalert.css" rel="stylesheet" />

</head>

<body>

  <div class="site-wrap">
  <?php include 'includes/header.php';?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> 
            <strong class="text-black">Cart</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $result = mysqli_query($conn,"SELECT * FROM `carttbl` WHERE `customerID` = '$id'");
                    $n = 1;
                    while($row = mysqli_fetch_array($result)) {
                    $cartID = $row['cartID'];
                    $image =  (!empty($row['productImage'])) ? '../images/'.$row['productImage'] : '../images/Rex-logo.png';
                ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="<?php echo $image; ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">
                      <?php echo $row['productName']; ?>
                      </h2>
                    </td>
                    <td>
                        <?php echo "₱".$row['price'].".00"; ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="<?php echo $row['quantity']; ?>" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>
    
                    </td>
                    <td>
                        <input type="hidden" class="form-control" id="cart[]" value="<?php echo $row['total']; ?>"/>
                        <?php echo "₱".$row['total'].".00"; ?></td>
                    <td>
                        <button class="btn btn-primary height-auto btn-sm" tootip="Updat Item" id="update_cart" data-id="<?php echo $cartID; ?>" data-product="<?php echo $row['productID']; ?>" data-quantity="<?php echo $row['quantity']; ?>"><span class="icon-pencil"></span></button>
                        <button class="btn btn-primary height-auto btn-sm" tooltip="Remove Item"  id="remove_cart" data-id="<?php echo $cartID; ?>" data-product="<?php echo $row['productID']; ?>" data-quantity="<?php echo $row['quantity']; ?>"><span class="icon-times"></span></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
    
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
                <?php
                if(empty($pharmaID)){
                    echo '<a href="pharmacy.php" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>';
                    
                }else{
                    echo '<a href="shop.php?id='.$pharmaID.'" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">
                        <?php 
                            $result = mysqli_query($conn, "SELECT SUM(total) AS total FROM `carttbl` WHERE `customerID` = '$id'"); 
                            $row = mysqli_fetch_assoc($result); 
                            echo "₱".$row['total'].".00";
                         ?>
                    </strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">
                        <?php 
                            $result = mysqli_query($conn, "SELECT SUM(total) AS total FROM `carttbl` WHERE `customerID` = '$id'"); 
                            $row = mysqli_fetch_assoc($result); 
                            echo "₱".$row['total'].".00";
                         ?>
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">Proceed To
                      Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-secondary bg-image" style="background-image: url('../images/bg_2.jpg');">
      <div class="container">
        <div class="col-lg-12 mb-12 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('../images/bg_1.jpg');">
              <div class="banner-1-inner align-self-center">
                <h2>About Us</h2>
                <p style="font-size: 15px;">A better way for customers to buy medications is intended by the online medicine ordering service REx. 
                  "REx" is an acronym made up of two abbreviations. Rx stands for "medical prescription" and "Ex" stands for "express." 
                  This means that when you buy medications, the application guarantees convenience and speedy delivery of medicines to you.
                </p>
              </div>
            </a>
        </div>
        </div>
      </div>
    </div>
    <?php include "includes/footer.php"; ?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="process.js"></script>
  <script src="../admin/js/sweetalert.js"></script>
  <script src="js/main.js"></script>    
  <script>

  </script>         
</body>

</html>