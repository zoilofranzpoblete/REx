<?php
include "includes/conn.php";

if (isset($_POST['checkout'])) {
$datenow =  date("Y-m-d h:i:sa");
$id = $_POST['customerID'];
$pharmaID = $_POST['pharmaID'];
foreach ($_POST['name'] as $key => $value) {
$name = $value;
$price[] = $_POST['price'][$value];
$quantity[] = $_POST['quantity'][$value];
$total[] = $_POST['total'][$value];
}
$rand = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
$code = sprintf("ORDER".year()."-%05s",$rand);
$sql = "INSERT INTO `reportstbl`(`email`, `customerName`, `message`, `dateSubmitted`) VALUES ('$email','$name','$message','$datenow')";
}

?>