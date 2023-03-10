<?php
session_start();
include "../includes/conn.php";
if(isset($_POST['add_product_details'])){
    $id = $_POST['add_product_id']; 
    $name = $_POST['add_product_name']; 
    $brand = $_POST['add_product_bname'];
    $generic = $_POST['add_product_gname'];
    $prescription = $_POST['add_product_prescription'];
    $price = $_POST['add_product_price'];
    $stock = $_POST['add_product_stock'];
    $description = $_POST['add_product_description'];
    $datenow =   date("Y-m-d h:i:sa");
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $file_name = $_FILES['add_product_image']['name']; 
    $file_size =$_FILES['add_product_image']['size'];
    $file_tmp =$_FILES['add_product_image']['tmp_name'];
    $file_type=$_FILES['add_product_image']['type'];
    
    $file_ext=strtolower(end(explode('.',$_FILES['add_product_image']['name'])));
    $extensions= array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions)=== false){
        $_SESSION['error'] = 'Extension not allowed, please choose a JPEG or PNG file.';
    }else{
        if($file_size > 5097152){
            $_SESSION['error'] = 'File size must be less than 5 MB';
        }else{
            if(!empty($file_name)){
                move_uploaded_file($_FILES['add_product_image']['tmp_name'], '../images/'.$file_name);	
            }
            
            $sql = "INSERT INTO `productstbl`(`pharmacyId`, `productImage`, `brandName`, `genericName`, `drugType`, `price`, `stock`, `description`, `date`) VALUES ('$id','$file_name','$brand','$generic','$prescription','$price','$stock','$description','$datenow')";
            $sql1 = "INSERT INTO `logstbl`(`logs`, `ipaddress`, `date`) VALUES (CONCAT('$name',' added a new product'),'$ip_address','$datenow')";
            if (mysqli_query($conn, $sql)) {
                if (mysqli_query($conn, $sql1)) {
                $_SESSION['success'] = 'Product added successfully';
                }
            }else{
                $_SESSION['error'] = $conn->error;
            }
        }
    }
}else{
    $_SESSION['error'] = 'Fill up add form first';
}	
header('location: product.php');	
?>