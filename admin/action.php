<?php
include "../includes/conn.php";
session_start();
if($_POST['type'] == 1){
$username = $_POST['username'];
$password = $_POST['password'];
$datenow =  date("Y-m-d h:i:sa");
$ip_address = $_SERVER['REMOTE_ADDR'];
$check = mysqli_query($conn,"SELECT * FROM admintbl WHERE userName = '$username'");
$sql1 = "INSERT INTO `logstbl`(`logs`, `ipaddress`, `date`) VALUES (CONCAT('$username',' logged in!'),'$ip_address','$datenow')";
    if(mysqli_num_rows($check)<1){
        echo json_encode(array("statusCode"=>202));
    }else{
        $row = mysqli_fetch_array($check);
        if(password_verify($password, $row['password'])){
            if (mysqli_query($conn, $sql1)) {
            $_SESSION['id'] = $row['adminId'];
            $_SESSION['name'] =  $row['userName'];
            echo json_encode(array("statusCode"=>200));
            }
        }
        else{
            echo json_encode(array("statusCode"=>201));
        }
    }    
}

if($_POST['type'] == 2){
$id = $_POST['id'];
$datenow =  date("Y-m-d h:i:sa");
$ip_address = $_SERVER['REMOTE_ADDR'];
$sql = "DELETE FROM `customertbl` WHERE `customerId` = '$id'";
$sql1 = "INSERT INTO `logstbl`(`logs`, `ipaddress`, `date`) VALUES ('Admin deleted a customer!','$ip_address','$datenow')";
    if (mysqli_query($conn, $sql)) {
        if (mysqli_query($conn, $sql1)) {
            echo json_encode(array("statusCode"=>200));
        }
    }else{
        echo json_encode(array("statusCode"=>201));
    }           
}

if($_POST['type'] == 3){
$name = $_POST['name']; 
$email = $_POST['email'];
$number = $_POST['number'];  
$address = $_POST['address'];  
$barangay = $_POST['barangay'];  
$city = $_POST['city'];  
$province = $_POST['province'];
$subscription = $_POST['subscription'];  
$start = $_POST['start'];  
$end = $_POST['end'];  
$username = $_POST['username'];  
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);  	
$datenow =  date("Y-m-d h:i:sa");
$ip_address = $_SERVER['REMOTE_ADDR'];

$sql = "INSERT INTO `pharmacytbl`(`userName`, `password`, `pharmacyName`, `email`, `contactNumber`, `address`, `barangayId`, `city`, `province`, `date`, `subscriptionStart`, `subscriptionEnd`, `code`) VALUES ('$username','$password','$name','$email','$number','$address','$barangay','$city','$province','$datenow','$start','$end','$subscription')";

$sql1 = "INSERT INTO `logstbl`(`logs`, `ipaddress`, `date`) VALUES ('Admin added new pharmacy!','$ip_address','$datenow')";
	if (mysqli_query($conn, $sql)) {
        if (mysqli_query($conn, $sql1)) {
			echo json_encode(array("statusCode"=>200));
        }
	}else{
		echo json_encode(array("statusCode"=>201));
	}			
}

if($_POST['type'] == 4){
$id = $_POST['id']; 
$name = $_POST['name']; 
$email = $_POST['email'];
$number = $_POST['number'];  
$address = $_POST['address'];  
$barangay = $_POST['barangay'];  
$city = $_POST['city'];  
$province = $_POST['province'];
$subscription = $_POST['subscription'];  
$start = $_POST['start'];  
$end = $_POST['end'];  
$username = $_POST['username'];
if($password == $_POST['password']){
    $password = $_POST['password'];
}else{
    $password = password_hash($password, PASSWORD_DEFAULT);
}	
$datenow =   date("Y-m-d h:i:sa");
$ip_address = $_SERVER['REMOTE_ADDR']; 

$sql = "UPDATE `pharmacytbl` SET `userName`='$username',`password`='$password',`pharmacyName`='$name',`email`='$email',`contactNumber`='$number',`address`='$address',`barangayId`='$barangay',`city`='$city',`province`='$province',`subscriptionStart`='$start',`subscriptionEnd`='$end',`code`='$subscription' WHERE `pharmacyId`='$id'";
$sql1 = "INSERT INTO `logstbl`(`logs`, `ipaddress`, `date`) VALUES ('Admin updated a pharmacy!','$ip_address','$datenow')";
	if (mysqli_query($conn, $sql)) {
        if (mysqli_query($conn, $sql1)) {
			echo json_encode(array("statusCode"=>200));
        }
	}else{
		echo json_encode(array("statusCode"=>201));
	}			
}

if($_POST['type'] == 5){
    $id = $_POST['id'];
    $datenow =  date("Y-m-d h:i:sa");
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $sql = "DELETE FROM `pharmacytbl` WHERE `pharmacyId` = '$id'";
    $sql1 = "INSERT INTO `logstbl`(`logs`, `ipaddress`, `date`) VALUES ('Admin deleted a pharmacy!','$ip_address','$datenow')";
        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, $sql1)) {
                echo json_encode(array("statusCode"=>200));
            }
        }else{
            echo json_encode(array("statusCode"=>201));
        }           
    }

// if($_POST['type'] == 3){
// $id = $_POST['ids'];
// $sql = "DELETE FROM `pet_adoption` WHERE `id` = '$id'";
//     if (mysqli_query($conn, $sql)) {
//             echo json_encode(array("statusCode"=>200));
//     }else{
//         echo json_encode(array("statusCode"=>201));
//     }           
// }

// if($_POST['type'] == 4){
// $schedule_site = $_POST['schedule_site']; 
// $schedule_date = $_POST['schedule_date'];
// $schedule_slot = $_POST['schedule_slot'];  
// $date_now = date("Y-m-d");

//     if ($schedule_date > $date_now){
//     $sql = "INSERT INTO `vaccination_schedule`(`vaccinationSite`, `scheduledDate`, `appointmentCount`, `status`) VALUES ('$schedule_site','$schedule_date','$schedule_slot','1')";
//         if (mysqli_query($conn, $sql)) {
//                 echo json_encode(array("statusCode"=>200));
//         }else{
//             echo json_encode(array("statusCode"=>201));
//         }           
//     }else{
//          echo json_encode(array("statusCode"=>202));
//     }         
// }

// if($_POST['type'] == 5){
// $id = $_POST['id']; 
// $schedule_site = $_POST['schedule_site']; 
// $schedule_date = $_POST['schedule_date'];
// $schedule_slot = $_POST['schedule_slot'];
// $date_now = date("Y-m-d");

//     if ($schedule_date >= $date_now){
//     $sql = "UPDATE `vaccination_schedule` SET `vaccinationSite` ='$schedule_site', `scheduledDate`='$schedule_date', `appointmentCount` = '$schedule_slot' WHERE `id` = '$id'";
//         if (mysqli_query($conn, $sql)) {
//                 echo json_encode(array("statusCode"=>200));
//         }else{
//             echo json_encode(array("statusCode"=>201));
//         }
//      }else{
//          echo json_encode(array("statusCode"=>202));
//     }           
// }

// if($_POST['type'] == 6){
// $id = $_POST['ids']; 

// $sql = "DELETE FROM `vaccination_schedule` WHERE `id` = '$id'";
//     if (mysqli_query($conn, $sql)) {
//             echo json_encode(array("statusCode"=>200));
//     }else{
//         echo json_encode(array("statusCode"=>201));
//     }           
// }

// if($_POST['type'] == 7){
// $id = $_POST['id']; 
// $sql = mysqli_query($conn,"SELECT * FROM adoption_application WHERE id = '$id'");
// 	if(mysqli_num_rows($sql)>0){
// 		 while($row = mysqli_fetch_array($sql)) {
// 		 	$request_id = $row['id'];
// 		 	$request_name = $row['fullName'];
// 		 	$request_contact = $row['contact'];
// 		 	$request_email = $row['email'];
// 		 	$request_address = $row['address'];
// 		 	$request_brgy = $row['barangay'];
// 		 	$request_petname = $row['petName'];
// 		 	$request_petcode = $row['petCode'];
// 		 	$request_breed = $row['breed'];
//             $request_gender = $row['gender'];
//             $request_color = $row['color'];
// 		 	$request_status = $row['status'];
// 		 }
// 		 	echo '
// 		 	<link href="css/styles.css" rel="sylesheet" />
// 		 	<div class="row">
//                 <div class="col-md-4">
//                 	<div class="form-group">
//                         <label class="small text-uppercase mb-1" for="request_id">Request ID</label>
//                         <input class="form-control" id="request_id" value="'.$request_id.'" readonly />
//                     </div>
//                 </div>
//                 <div class="col-md-8">
//                 	<div class="form-group">
//                         <label class="small text-uppercase mb-1" for="request_name">Name</label>
//                         <input class="form-control" id="request_name" value="'.$request_name.'" readonly />
//                     </div>
//                 </div>
//                 <div class="col-md-6">
//                 	<div class="form-group">
//                         <label class="small text-uppercase mb-1" for="request_contact">Contact Number</label>
//                         <input class="form-control" id="request_contact" value="'.$request_contact.'" readonly />
//                     </div>
//                 </div>
//                 <div class="col-md-6">
//                 	<div class="form-group">
//                         <label class="small text-uppercase mb-1" for="request_email">Email</label>
//                         <input class="form-control" id="request_email" value="'.$request_email.'" readonly />
//                     </div>
//                 </div>
//                  <div class="col-md-6">
//                 	<div class="form-group">
//                         <label class="small text-uppercase mb-1" for="request_address">Address</label>
//                         <input class="form-control" id="request_address" value="'.$request_address.'" readonly />
//                     </div>
//                 </div>
//                 <div class="col-md-6">
//                 	<div class="form-group">
//                         <label class="small text-uppercase mb-1" for="request_brgy">Barangay</label>
//                         <input class="form-control" id="request_brgy" value="'.$request_brgy.'" readonly />
//                     </div>
//                 </div>
//             </div>
//             <table class="table table-bordered" width="100%" cellspacing="0">
//                 <thead>
//                     <tr>
//                         <th>Code</th>
//                         <th>Name</th>
//                         <th>Breed</th>
//                         <th>Gender</th>
//                         <th>Color</th>
//                     </tr>
//                 </thead>
//                 <tbody>';
//                 	echo'<tr>
//                         <td>'.$request_petcode.'</td>
//                         <td>'.$request_petname.'</td>
//                         <td>'.$request_breed.'</td>
//                         <td>'.$request_gender.'</td>
//                         <td>'.$request_color.'</td>
//                     </tr>';
//                 echo '</tbody>
//             	</table>
//                 ';
// 	}
// }

// if($_POST['type'] == 8){
// $idd = $_POST['idd'];
// $name = $_POST['name'];  
// $email = $_POST['email'];
// $code = $_POST['code'];
// $sql = "UPDATE `adoption_application` SET `status` = '1' WHERE `id` = '$idd'";
// $sql2 = "UPDATE `pet_adoption` SET `status` = '0' WHERE `petCode` = '$code'";
//     if (mysqli_query($conn, $sql)) {
//         if (mysqli_query($conn, $sql2)) {
//            // require 'mail/PHPMailerAutoload.php';
//            //      $mail = new PHPMailer;
//            //      $mail->isSMTP();
//            //      $mail->Host = 'ssl://smtp.gmail.com';
//            //      $mail->SMTPAuth = true;
//            //      $mail->Username = 'sample.donotreply@gmail.com';
//            //      $mail->Password = 'dummy@123';
//            //      $mail->SMTPSecure = 'ssl';
//            //      $mail->Port = 465 ;
//            //      $mail->From = 'noreply@cityvet.gov.ph';
//            //      $mail->FromName = 'OFFICE OF THE CITY VETERINARY OF MUNTINLUPA - ADOPTION REQUEST';
//            //      $mail->addAddress(''.$email.'');
//            //      $mail->isHTML(true);   
//            //      $mail->Subject = 'Adoption Request is approved';
//            //      $mail->Body    = '
//            //      Good day Mr/Ms '.$name.',<br>
//            //      Your adoption request is approved<br>

//            //      Please bring the following requirements:<br>
//            //      <ol>
//            //      <li>Valid I.D</li>
//            //      <li>Barangay Certificate of Residency</li>
//            //      <li>Picture of Location for the new pet to be adopted</li>
//            //      <li>Approved Email Confirmation</li>
//            //      </ol>
//            //      <br>
//            //      Thank you.
//            //      <br>
//            //      <small style="color:red"><i>This is a system generated email, do not reply to this email.</i></small> 
//            //      ';
//            //      if(!$mail->send()) {
//                 //     echo json_encode(array("statusCode"=>201));
//                 // }else{
//                     echo json_encode(array("statusCode"=>200));
//         //         }
//         // }
//     }else{
//         echo json_encode(array("statusCode"=>201));
//     }           
// }
// }

// if($_POST['type'] == 9){
// $id = $_POST['id'];
// $name = $_POST['name'];  
// $email = $_POST['email'];
// $sql = "UPDATE `adoption_application` SET `status` ='2' WHERE `id` = '$id'";
// if (mysqli_query($conn, $sql)) {
// // require 'mail/PHPMailerAutoload.php';

// // $mail = new PHPMailer;
// // $mail->Host = 'ssl://smtp.gmail.com';
// // $mail->isSMTP();
// //         $mail->SMTPAuth = true;
// //         $mail->Username = 'sample.donotreply@gmail.com';
// //         $mail->Password = 'dummy@123';
// //         $mail->SMTPSecure = 'ssl';
// //         $mail->Port = 465;
// //         $mail->From = 'noreply@cityvet.gov.ph';
// //         $mail->FromName = 'OFFICE OF THE CITY VETERINARY OF MUNTINLUPA - ADOPTION REQUEST';
// //         $mail->addAddress(''.$email.'');
// //         $mail->isHTML(true);   
// //         $mail->Subject = 'Adoption Request is rejected';
// //         $mail->Body    = '
// //         Good day Mr/Ms '.$name.',<br>
// //         Were regret to inform you that you request is rejected due to the f.f reason/s <br>
// //         <ol>
// //         <li>Given contact number is cannot be reached</li>
// //         <li>Unable to conduct a Initial adoption screening</li>
// //         </ol><br>
// //         Please be advised that you may try to file another request<br>
// //         Thank you.
// //         <br>
// //         <small style="color:red"><i>This is a system generated email, do not reply to this email.</i></small> 
// //         ';
// // if(!$mail->send()){
// //             echo json_encode(array("statusCode"=>201));
// //         }else{
//             echo json_encode(array("statusCode"=>200));
// // }
// }else{
//     echo json_encode(array("statusCode"=>201));
// }           
// }    

// if($_POST['type'] == 10){
// $rand = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
// $petID = sprintf("%05s",$rand);
// $register_date = $_POST['register_date']; 
// $pet_name = $_POST['pet_name'];
// $pet_breed = $_POST['pet_breed'];  
// $pet_gender = $_POST['pet_gender'];  
// $pet_color = $_POST['pet_color'];  
// $petbirthday = $_POST['petbirthday'];  
// $first_name = $_POST['first_name'];  
// $middle_name = $_POST['middle_name'];  
// $last_name = $_POST['last_name'];  
// $gender = $_POST['gender'];  
// $birthday = $_POST['birthday'];  
// $contact = $_POST['contact'];  
// $email = $_POST['email'];  
// $address = $_POST['address']; 
// $microchip = $_POST['microchip']; 

// $sql = "INSERT INTO `pet_registration`(`petID`,`registrationDate`, `lastName`, `firstName`, `middleName`, `gender`, `birthDay`, `contactNumber`, `Email`, `Address`, `petName`, `petBreed`, `petColor`,`petBirthday`,  `petSex`,  `microchipNo`) VALUES ('$petID','$register_date','$last_name','$first_name','$middle_name','$gender','$birthday','$contact','$email','$address','$pet_name','$pet_breed','$pet_color','$petbirthday','$pet_gender','$microchip')";
//     if (mysqli_query($conn, $sql)) {
//             echo json_encode(array("statusCode"=>200));
//     }else{
//         echo json_encode(array("statusCode"=>201));
//     }           
// }

// if($_POST['type'] == 11){
// $id = $_POST['id']; 
// $register_date = $_POST['register_date']; 
// $pet_name = $_POST['pet_name'];
// $pet_breed = $_POST['pet_breed'];  
// $pet_gender = $_POST['pet_gender'];  
// $pet_color = $_POST['pet_color'];  
// $pet_birthday = $_POST['pet_birthday'];  
// $first_name = $_POST['first_name'];  
// $middle_name = $_POST['middle_name'];  
// $last_name = $_POST['last_name'];  
// $gender = $_POST['gender'];  
// $birthday = $_POST['birthday'];  
// $contact = $_POST['contact'];  
// $email = $_POST['email'];  
// $address = $_POST['address']; 
// $microchip = $_POST['microchip'];  

// $sql = "UPDATE `pet_registration` SET `registrationDate`='$register_date',`lastName`='$last_name',`firstName`='$first_name',`middleName`='$middle_name',`gender`='$gender',`birthDay`='$birthday',`contactNumber`='$contact',`Email`='$email',`Address`='$address',`petName`='$pet_name',`petBreed`='$pet_breed',`petColor`='$pet_color',`petBirthday`='$pet_birthday',`petSex`='$pet_gender',`microchipNo`='$microchip' WHERE `id`='$id'";
//     if (mysqli_query($conn, $sql)) {
//             echo json_encode(array("statusCode"=>200));
//     }else{
//         echo json_encode(array("statusCode"=>201));
//     }           
// }



// if($_POST['type'] == 12){
//     $id = $_POST['id']; 
//     $sql = mysqli_query($conn,"SELECT * FROM pet_registration WHERE id = '$id'");
//     if(mysqli_num_rows($sql)>0){
//          while($row = mysqli_fetch_array($sql)) {
//             $id = $row['id'];
//             $register_date = $row['registrationDate'];
//             $register_lastname = $row['lastName'];
//             $register_firstname = $row['firstName'];
//             $register_middlename = $row['middleName'];
//             $register_gender = $row['gender'];
//             $register_birthday = $row['birthDay'];
//             $register_contact = $row['contactNumber'];
//             $register_email = $row['Email'];
//             $regsiter_address = $row['Address'];
//             $register_petname = $row['petName'];
//             $register_petbreed = $row['petBreed'];
//             $register_petcolor = $row['petColor'];
//             $register_petgender = $row['petSex'];
//             $register_petbirthday = $row['petBirthday'];
//          }
//         echo '<link href="css/styles.css" rel="sylesheet" />
//             <div class="row">
//             <div class="col-md-4">
//                 <div class="form-group my-2">
//                     <label for="display_register_date" class="text-uppercase">Registered Date</label>
//                     <input  class="form-control" readonly id="display_register_date" type="text" value="'.$register_date.'" />
//                 </div>
//             </div>
//             <div class="col-md-8">
//                 <div class="form-group my-2">
//                     <label for="display_register_petname" class="text-uppercase">Pet Name</label>
//                     <input class="form-control" id="display_register_petname" type="text" readonly value="'.$register_petname.'"  />
//                 </div>
//             </div>
//             <div class="col-md-6">
//                 <div class="form-group my-2">
//                     <label for="display_register_petbreed" class="text-uppercase">Pet Breed</label>
//                     <input class="form-control" id="display_register_petbreed" type="text" readonly value="'.$register_petbreed.'" />
//                 </div>
//             </div>
//              <div class="col-md-6">
//                 <div class="form-group my-2">
//                      <label for="display_register_petgender" class="text-uppercase mb-1">Pet Gender</label>
//                      <input class="form-control" id="display_register_petgender" type="text" readonly value="'.$register_petgender.'" />
//                 </div>
//             </div>
//              <div class="col-md-6">
//                 <div class="form-group my-2">
//                     <label for="display_register_petcolor" class="text-uppercase">Pet Color</label>
//                     <input class="form-control" id="display_register_petcolor" type="text" readonly value="'.$register_petcolor.'" />
//                 </div>
//             </div>
//             <div class="col-md-6">
//                 <div class="form-group my-2">
//                     <label for="display_register_petbirthday" class="text-uppercase">Pet Birthday</label>
//                      <input class="form-control" id="display_register_petbirthday" type="date" readonly value="'.$register_petbirthday.'" />
//                 </div>
//             </div>
           
//         </div>
//         <hr><label class="text-uppercase mb-1" ><b>Owners Information</b></label><hr>
//         <div class="row">
//             <div class="col-md-4">
//                 <div class="form-group my-2">
//                     <label for="display_register_firstname" class="text-uppercase">First Name</label>
//                     <input class="form-control" id="display_register_firstname" type="text" readonly value="'.$register_firstname.'" />
//                 </div>
//             </div>
//             <div class="col-md-4">
//                 <div class="form-group my-2">
//                     <label for="display_register_middlename" class="text-uppercase">Middle Name</label>
//                     <input class="form-control" id="display_register_middlename" type="text" readonly value="'.$register_middlename.'" />
//                 </div>
//             </div>
//             <div class="col-md-4">
//                 <div class="form-group my-2">
//                     <label for="display_register_lastname" class="text-uppercase">Last Name</label>
//                     <input class="form-control" id="display_register_lastname" type="text" readonly value="'.$register_lastname.'" />
//                 </div>
//             </div>
//              <div class="col-md-6">
//                 <div class="form-group my-2">
//                      <label for="display_register_gender" class="text-uppercase mb-1">Gender</label>
//                      <input class="form-control" id="display_register_gender" type="text" readonly value="'.$register_gender.'" />
//                 </div>
//             </div>
//             <div class="col-md-6">
//                 <div class="form-group my-2">
//                     <label for="display_register_birthday" class="text-uppercase">Birthday</label>
//                     <input class="form-control" id="display_register_birthday" type="date"  readonly value="'.$register_birthday.'" />
//                 </div>
//             </div>
//              <div class="col-md-6">
//                 <div class="form-group my-2">
//                     <label class="text-uppercase mb-1" for="display_register_contact">Contact Number</label>
//                     <input class="form-control" id="display_register_contact" type="date"  readonly value="'.$register_contact.'" />
//                 </div>
//             </div>
//             <div class="col-md-6">
//                 <div class="form-group my-2">
//                     <label class="text-uppercase mb-1" for="display_register_email">Email</label>
//                     <input class="form-control" id="display_register_email" type="email"  readonly value="'.$register_email.'" />
//                 </div>
//             </div>
//              <div class="col-md-12">
//              <div class="form-group">
//                 <label for="display_register_address" class="text-uppercase mb-1">Address</label>
//                 <textarea class="form-control" id="display_register_address" rows="2" readonly>'.$regsiter_address.'</textarea>
//             </div>
//             </div>
//         </div>';    
//     }

// }

// if($_POST['type'] == 13){
// $id = $_POST['id']; 

// $sql = "DELETE FROM `pet_registration` WHERE `id` = '$id'";
//     if (mysqli_query($conn, $sql)) {
//             echo json_encode(array("statusCode"=>200));
//     }else{
//         echo json_encode(array("statusCode"=>201));
//     }           
// }
// if($_POST['type'] == 14){
// $petid = $_POST['petid']; 
// $petname = $_POST['petname'];
// $vaccinationsite = $_POST['vaccinationsite'];  
// $vaccinationdate = $_POST['vaccinationdate'];  
// $sql = "INSERT INTO `pet_vaccination`(`petID`, `petName`, `vaccinationSite`, `vaccinationDate`) VALUES ('$petid','$petname','$vaccinationsite','$vaccinationdate')";
//     if (mysqli_query($conn, $sql)) {
//             echo json_encode(array("statusCode"=>200));
//     }else{
//         echo json_encode(array("statusCode"=>201));
//     }           
// }
?>