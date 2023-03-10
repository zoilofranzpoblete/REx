<?php include 'includes/conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>REx</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="images/favicon-32x32.png" />
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
  <link href="css/sweetalert.css" rel="stylesheet" />

</head>
<body>

  <div class="site-wrap">
  <?php include 'includes/header.php';?>
    <div class="site-blocks-cover" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h1>Welcome To</h1>
              <img src="images/rex-banner.png" alt="REx Logo"/>
              <h2 class="sub-title"><strong>Purchase medicines online and get it delivered to you.</strong></h2>
              <p>
                <br>
                <a href="customer/login.php" class="btn btn-black px-5 py-3">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light" id="pharmacy">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Our Partner Pharmacy</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
            <?php
                $datenow =  date("Y-m-d h:i:sa");
                $result = mysqli_query($conn,"SELECT * FROM `pharmacytbl` WHERE `subscriptionEnd` >= '$datenow'");
                $n = 1;
                while($row = mysqli_fetch_array($result)) {
                $image =  (!empty($row['pharmacyImage'])) ? 'images/'.$row['pharmacyImage'] : 'images/Rex-logo.png';
            ?>
              <div class="text-center item mb-4 mr-3 ml-3">
                <a href="customer/login.php">
                  <img src="<?php echo $image; ?>" alt="Image"></a>
                <h3 class="text-dark"><a href="customer/login.php"><?php echo $row['pharmacyName']; ?></a></h3>
                <p class="price">
                  <?php echo $row['contactNumber'].' / '.$row['email']; ?><br>
                  <?php echo 'Address: '.$row['address'].', '.$row['barangayId'].', '.$row['city'].', '.$row['province']; ?>
              </p>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-secondary bg-image" id="about-us" style="background-image: url('images/bg_2.jpg');">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
              <div class="banner-1-inner align-self-center">
                <h2>About Us</h2>
                <p style="font-size: 15px;">A better way for customers to buy medications is intended by the online medicine ordering service REx. 
                  "REx" is an acronym made up of two abbreviations. Rx stands for "medical prescription" and "Ex" stands for "express." 
                  This means that when you buy medications, the application guarantees convenience and speedy delivery of medicines to you.
                </p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex " style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Want to be part of REx?</h2>
                <p>Send us an application by clicking here.
                </p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section" id="contact" style="background-image: url('images/bg_1.jpg');background-size: cover;">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-6 mt-5 mb-5 mb-lg-0">
          <img src="images/bg_3.png" alt="">
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="banner-1 h-100 d-flex" >
              <div class="banner-1-inner ml-auto  align-self-center" style="width:100% !important;">
              <h2>Contact Info</h2>
                <ul class="list-unstyled" style="color:#000;">
                    <li class="phone"><span class="icon-phone"> </span>(+63) 9123-456-7891</a></li>
                    <li class="email"><span class="icon-envelope"> </span>REx.FLPS@gmail.com</li>
                </ul>
                <h2>Report a Problem</h2>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="report_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="report_email" name="report_email" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="report_name" class="text-black">Name </label>
                    <input type="text" class="form-control" id="report_name" name="report_name">
                  </div>
                </div>
    
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="report_message" class="text-black">Message </label>
                    <textarea name="report_message" id="report_message" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                  <button class="btn btn-black btn-lg btn-block" id="report_submit"><b>Send Message</b></button>
                  </div>
                </div>
                </p>
              </div>
          </div>
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
  <script src="js/main.js"></script>
  <script src="process.js"></script>
  <script src="js/sweetalert.js"></script>

</body>

</html>