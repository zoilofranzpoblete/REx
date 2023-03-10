<header>
<div class="site-navbar py-2">
      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone"><img class="logo-img" src="https://i.ibb.co/pWx0ZBM/Rex-2.png" alt=""></a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about-us">About</a></li>
                <li><a href="pharmacy.php">Pharmacies</a></li>
                <li><a href="index.php#contact">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <?php
            $stmt = mysqli_query($conn,"SELECT * FROM `carttbl` WHERE `customerID` = '$id'");
            $count = mysqli_num_rows($stmt);
            if (empty($pharmaID)){
              echo '<a href="cart.php?customerID='.$id.'" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">'.$count.'</span>
            </a>'; 
            }else{
              echo '<a href="cart.php?customerID='.$id.'&pharmaID='.$pharmaID.'" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">'.$count.'</span>
            </a>';
            }
             ?>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
            
          </div>
          <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown no-caret mr-3 mr-lg-0 dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid"><?php echo "Hi".' '.$name; ?></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            My Account
                        </a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#logout_modal">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>

        </div>
      </div>
    </div>
</header>