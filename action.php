<?php
include "includes/conn.php";

if($_POST['type'] == 1){
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