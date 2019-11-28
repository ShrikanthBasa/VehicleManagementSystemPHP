<?php
session_start();
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $reg = $_POST["Reg"];
  $model = "'".$_POST["model"]."'";
  $cap = $_POST["capacity"];
  $dist = $_POST["dist"];
  $cost = $_POST["costper"];
  $ftype = "'".$_POST["Ftype"]."'";
  $key = $_POST["FDkey"];
  $key = preg_replace('/\D/', '', $key);
  $bid = "'".$_SESSION["BID"]."'";
  if($key == 1){
    $key = "NULL";
  }
}
$sql = "INSERT INTO Vehicle VALUES ($reg , $model , $cap , $dist , $cost , $ftype , $bid , $key)";
if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>window.top.location='Home.php';</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

 ?>
