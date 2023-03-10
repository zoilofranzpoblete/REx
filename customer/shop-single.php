<?php 
include '../includes/conn.php';
// include 'data.php';
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$pharmaID = $_GET['pharmaID'];
$productID = $_GET['productID'];
if(empty($id)){
  header('Location:login.php');
}
$sql = mysqli_query($conn,"SELECT * FROM `productstbl` WHERE `productId` = '$productID'");
$data = mysqli_fetch_array($sql);
$image =  (!empty($data['productImage'])) ? '../images/'.$data['productImage'] : '../images/Rex-logo.png';
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
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a
              href="shop.php?id=<?php echo $pharmaID;?>">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $data['brandName']; ?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img src="<?php echo $image; ?>" alt="Image" class="img-fluid p-5">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black">
                <input type="hidden" class="form-control" id="product_id" value="<?php echo $productID; ?>"/>
                <input type="hidden" class="form-control" id="product_pharmaID" value="<?php echo $pharmaID; ?>"/>
                <input type="hidden" class="form-control" id="product_customerID" value="<?php echo $id; ?>"/>
                <input type="hidden" class="form-control" id="product_image" value="<?php echo $data['productImage']; ?>"/>
                <input type="hidden" class="form-control" id="product_brand" value="<?php echo $data['brandName']; ?>"/>
                <?php echo $data['brandName']; ?>
            </h2>
            <p><?php echo $data['description']; ?></p>
            <p><strong class="text-primary h4">
                <input type="hidden" class="form-control" id="product_price" value="<?php echo $data['price']; ?>"/>
                <?php echo "P ".$data['price'].".00"; ?>
            </strong></p>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="1" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1" id="product_quantity">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
    
            </div>
            <p><button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" id="add_cart_btn">Add To Cart</button></p>

            <div class="mt-5">
              <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="true">Specifications</a>
                </li>
            
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            
                  <table class="table custom-table">
            
                    <tbody>
                      <tr>
                        <td>Generic Name</td>
                        <td class="bg-light">
                            <?php echo $data['genericName']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Prescription Type</td>
                        <td class="bg-light">
                            <?php echo $data['drugType']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Stocks</td>
                        <td class="bg-light">   
                            <?php echo $data['stock']; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            
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