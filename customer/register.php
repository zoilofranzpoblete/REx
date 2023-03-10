<?php  include '../includes/conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Register - REx</title>
        <link href="../admin/css/styles.css" rel="stylesheet" />
        <link href="../admin/css/sweetalert.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="../images/favicon-32x32.png" />
        <link href="../admin/css/datepicker.css" rel="stylesheet" />
        <script data-search-pseudo-elements defer src="../admin/js/all.min.js" crossorigin="anonymous"></script>
        <script src="../admin/js/feather.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body background= "../images/hero_1.jpg" style="background-size: cover;background-repeat: no-repeat;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                 <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-1 rounded-lg mt-5 border-info">
                                    <div class="card-header justify-content-center bg-info-soft">
                                        <p class="text-dark my-2" style="font-size: 20px;"><b>Create Account</b></p>
                                        <p class="text-dark">You need to create an account to access the system</p>
                                    </div>
                                    <div class="card-body">
                                        All fields with <code>( * )</code> is required!<br>
                                            <hr><label class="text-uppercase mb-1" ><b>Personal Information</b></label><hr>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase mb-1" for="register_fname">First Name <code>*</code></label>
                                                        <input class="form-control register" id="register_fname" type="text" placeholder="E.G. JUAN" onkeypress="return (event.charCode > 64 && event.charCode < 91) 
                                                        || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase mb-1" for="register_lname">Last Name <code>*</code></label>
                                                        <input class="form-control register" id="register_lname" type="text" placeholder="E.G. DELA CRUZ" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase mb-1" for="register_contact">Contact Number  <code>*</code></label>
                                                        <input class="form-control register" id="register_contact" type="text" placeholder="09XXXXXXXXXX" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" maxlength="11"autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase mb-1" for="register_email">Email <code>*</code></label>
                                                        <input class="form-control register" id="register_email" type="email"  placeholder="E.G. EMAIL@EXAMPLE.COM" autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="register_address" class="text-uppercase mb-1">Address <code>*</code></label>
                                                        <textarea class="form-control register" id="register_address" rows="2" placeholder="E.G. 123 SAMPLE STREET" autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="register_brgy" class="text-uppercase mb-1">Barangay <code>*</code></label>
                                                        <select class="form-control text-uppercase register" id="register_brgy">
                                                            <option hidden value="">Select barangay</option>
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
                                                    <div class="form-group">
                                                        <label class="mb-1 text-uppercase " for="register_city">City</label>
                                                        <input class="form-control text-uppercase register" id="register_city" type="text"  value="Angeles City" readonly/>
                                                    </div>
                                                </div> 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-1 text-uppercase " for="register_province">Province</label>
                                                        <input class="form-control text-uppercase register" id="register_province" type="text"  value="Pampanga" readonly/>
                                                    </div>
                                                </div> 
                                            </div>
                                             
                                            
                                            <hr><label class="text-uppercase mb-1" ><b>Account Information</b></label><hr>
                                            <div class="form-group">
                                                <label class="text-uppercase mb-1" for="register_uname">Username <code>*</code></label>
                                                <input class="form-control register" id="register_uname" type="text"  placeholder="---" autocomplete="off"/>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase mb-1" for="register_pass">Password <code>*</code></label>
                                                        <div class="input-group">
                                                        <input class="form-control" id="register_pass" type="password" placeholder="---" autocomplete="off"/>
                                                        <button class="btn-primary" id="reveal_pass"><span class="fas fa-eye"></span></button>
                                                        </div>
                                                    </div>
                                                 </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase mb-1" for="register_pass">Confim Password <code>*</code></label>
                                                        <div class="input-group">
                                                        <input class="form-control register" id="register_passconfirm" type="password" placeholder="---" autocomplete="off"/>
                                                        <button class="btn-primary" id="reveal_confirmpass"><span class="fas fa-eye"></span></button>
                                                        </div>
                                                    </div>
                                                 </div>
                                             </div>
                                            <div class="form-group text-uppercase mt-4 mb-0">
                                                <a class="btn btn-primary btn-block" id="register_btn">Create Account</a>
                                            </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div>Have an account? <a href="login.php">Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div><br>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark text-">
                    <div class="container text-center">
                    <p class="text-white small">
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved.</p>
                </div>
                </footer>
            </div>
        </div>
        <script src="../admin/js/jquery-3.5.1.min.js"></script>
        <script src="../admin/js/bootstrap.bundle.min.js"></script>
        <script src="../admin/js/scripts.js"></script>
        <script src="process.js"></script>
        <script src="../admin/js/sweetalert.js"></script>
        <script src="../admin/js/datepicker_ui.js"></script>
          <script>
          $( function() {
            $( "#register_bday" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "1930:c" 

            });
          } );
        </script>
        <script type="text/javascript">
            $("#reveal_pass").on('click',function() {
                var $pwd = $("#register_pass");
                if ($pwd.attr('type') === 'password') {
                    $pwd.attr('type', 'text');
                    $("#reveal_pass").html("<i class='fas fa-eye-slash'></i>");
                }else{
                    $pwd.attr('type', 'password');
                    $("#reveal_pass").html("<i class='fas fa-eye'></i>");
                }
                 $('#register_pass').focus();
            });

            $("#reveal_confirmpass").on('click',function() {
                var $pwd = $("#register_passconfirm");
                if ($pwd.attr('type') === 'password') {
                    $pwd.attr('type', 'text');
                    $("#reveal_confirmpass").html("<i class='fas fa-eye-slash'></i>");
                }else{
                    $pwd.attr('type', 'password');
                    $("#reveal_confirmpass").html("<i class='fas fa-eye'>");
                }
                $('#register_passconfirm').focus();
            });
        </script>
</body>

</html>
