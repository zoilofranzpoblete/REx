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
<title>Pharmacy List - REx</title>
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

    <div class="site-section">
      <div class="container">
        <!-- <div class="row mb-5">
          <div class="col-lg-12">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by prescription type:</h3>
            <select id="category" class="form-control text-uppercase">
                <option value="" hidden>All categories</option>
                <option value="Prescibed">Prescibed</option>
                <option value="Over-the-counter">Over-the-counter</option>
            </select>
          </div>
        </div> -->
        <h3 class="mb-5 h4 text-uppercase text-black d-block">List of Pharmacy</h3>
        <div class="row">
        <?php
            $datenow =  date("Y-m-d h:i:sa");
            $result = mysqli_query($conn,"SELECT * FROM `pharmacytbl` WHERE `subscriptionEnd` >= '$datenow'");
            $n = 1;
            while($row = mysqli_fetch_array($result)) {
            $image =  (!empty($row['pharmacyImage'])) ? '../images/'.$row['pharmacyImage'] : '../images/Rex-logo.png';
        ?>
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="shop.php?id=<?php echo $row['pharmacyId']; ?>"><img src="<?php echo $image; ?>" alt="Image"></a>
            <h3 class="text-dark"><a href="shop.php?id=<?php echo $row['pharmacyId']; ?>"><?php echo $row['pharmacyName']; ?></a></h3>
            <p class="price"><?php echo $row['contactNumber'].' / '.$row['email']; ?><br>
            <?php echo 'Address: '.$row['address'].', '.$row['barangayId'].', '.$row['city'].', '.$row['province']; ?></p>
          </div>
        <?php } ?>
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
  <script src="js/main.js"></script>
  <script src="../admin/js/sweetalert.js"></script>    
  <script>

  </script>         
</body>

</html>