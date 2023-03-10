<?php
include "includes/conn.php";
session_start();

if($_POST['type'] == 1){
$username = $_POST['username'];
$password = $_POST['password'];
$datenow =  date("Y-m-d h:i:sa");
$ip_address = $_SERVER['REMOTE_ADDR'];
$check = mysqli_query($conn,"SELECT * FROM `customertbl` WHERE `userName` = '$username'");
$sql1 = "INSERT INTO `logstbl`(`logs`, `ipaddress`, `date`) VALUES (CONCAT('$username',' logged in!'),'$ip_address','$datenow')";
    if(mysqli_num_rows($check)<1){
        echo json_encode(array("statusCode"=>202));
    }else{
        $row = mysqli_fetch_array($check);
        if(password_verify($password, $row['password'])){
            if (mysqli_query($conn, $sql1)) {
                $_SESSION['id'] = $row['customerId'];
                $_SESSION['name'] =  $row['fullName'];
                echo json_encode(array("statusCode"=>200));
            }
        }else{
            echo json_encode(array("statusCode"=>201));
        }
    }    
}

if($_POST['type'] == 2){
$name = $_POST['fname'].' '.$_POST['lname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];
$barangay = $_POST['barangay'];
$city = $_POST['city'];
$province = $_POST['province'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$datenow =  date("Y-m-d h:i:sa");
$rand = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
$code = sprintf("%05s",$rand);
$sql = "INSERT INTO `customertbl`(`userName`, `fullName`, `password`, `contactNumber`, `email`, `date`, `code`, `address`, `barangay`, `city`, `province`) VALUES ('$username','$name','$password','$contact','$email','$datenow','$code','$address','$barangay','$city','$province')";
    if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode"=>200));
    }else{
        echo json_encode(array("statusCode"=>201));
    }           
}

if($_POST['type'] == 3){
$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];
$datenow =  date("Y-m-d h:i:sa");
$sql = "INSERT INTO `reportstbl`(`email`, `customerName`, `message`, `dateSubmitted`) VALUES ('$email','$name','$message','$datenow')";
    if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode"=>200));
    }else{
        echo json_encode(array("statusCode"=>201));
    }           
}

if($_POST['type'] == 4){
$productID = $_POST['productID'];
$pharmaID = $_POST['pharmaID'];
$customerID = $_POST['customerID'];
$image =  $_POST['image'];
$brand =  $_POST['brand'];
$price =  $_POST['price'];
$quantity =  $_POST['quantity'];
$total =  $price * $quantity;
$check = mysqli_query($conn,"SELECT * FROM `carttbl` WHERE `productID` = '$productID'");
$row = mysqli_fetch_array($check);
    if(mysqli_num_rows($check) > 0){
        $new_quantity = $quantity + $row['quantity'];
        $new_total = $price * $new_quantity;

        $sql = "UPDATE `carttbl` SET `quantity`='$new_quantity',`total`='$new_total' WHERE `productID` = '$productID'";
        $sql1 = "UPDATE `productstbl` SET `stock` = (`stock`-'$quantity') WHERE `productId`='$productID'";
        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, $sql1)) {
                echo json_encode(array("statusCode"=>200));
            }
        }else{
            echo json_encode(array("statusCode"=>201));
        } 
    }else{
        $sql = "INSERT INTO `carttbl`(`productID`, `pharmaID`, `customerID`, `productImage`, `productName`, `price`, `quantity`, `total`) VALUES ('$productID','$pharmaID','$customerID','$image','$brand','$price','$quantity','$total')";
        $sql1 = "UPDATE `productstbl` SET `stock` = (`stock`-'$quantity') WHERE `productId`='$productID'";
        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, $sql1)) {
                echo json_encode(array("statusCode"=>200));
            }
        }else{
            echo json_encode(array("statusCode"=>201));
        } 
    }      
}
if($_POST['type'] == 5){
    $id = $_POST['id'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $sql = "DELETE FROM `carttbl` WHERE `cartID` ='$id'";
    $sql1= "UPDATE `productstbl` SET `stock` = (`stock`+'$quantity') WHERE `productId`='$product'";
        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, $sql1)) {
                echo json_encode(array("statusCode"=>200));
            }
        }else{
            echo json_encode(array("statusCode"=>201));
        }           
}

if($_POST['type'] == 6){
    $id = $_POST['id'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE `productstbl` SET `stock` = (`stock`+'$quantity') WHERE `productId`='$product'";
    $sql1= "UPDATE `productstbl` SET `stock` = (`stock`-'$quantity') WHERE `productId`='$product'";
        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, $sql1)) {
                echo json_encode(array("statusCode"=>200));
            }
        }else{
            echo json_encode(array("statusCode"=>201));
        }           
}