<?php
if(isset($_POST['add_pharma_details'])){
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
    $photo = $_FILES['photos']['name'];
    move_uploaded_file($_FILES['photos']['tmp_name'], '../images/'.$photo);
    $filename = $photo;	
    $datenow =  date('Y-m-d');
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO `pharmacytbl`(`userName`, `password`, `pharmacyName`, `pharmacyImage`, `email`, `contactNumber`, `address`, `barangayId`, `city`, `province`, `date`, `subscriptionStart`, `subscriptionEnd`, `code`) VALUES ($username,$password,$name,$filename,$email,$number,$address,$barangay,$city,$province,$datenow,$start,$end,$subscription)";
    
    $sql1 = "INSERT INTO `logstbl`(`logs`, `ipaddress`, `date`) VALUES ('Admin added new pharmacy',$ip_address,$datenow)";
        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, $sql2)) {
                echo json_encode(array("statusCode"=>200));
            }
        }else{
            echo json_encode(array("statusCode"=>201));
        }			
}
?>