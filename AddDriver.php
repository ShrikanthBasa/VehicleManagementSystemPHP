<?php
session_start();
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $lic = $_POST["LIC"];
  $Name = "'".$_POST["Dname"]."'";
  $sal = $_POST["Sal"];
  $month = "'".$_POST["Month"]."'";
  $year = $_POST["Year"];
  $Rate = $_POST["Rating"];
  $key = "'".$_SESSION['BID']."'";
  $exp = 2019 - $year ;
}
$sql = "INSERT INTO Driver VALUES ($lic , $Name , $sal , $month , $year , $exp , $Rate , $key)";
if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>window.top.location='Home.php';</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 ?>
