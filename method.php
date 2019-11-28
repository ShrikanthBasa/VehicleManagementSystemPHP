<?php
error_reporting(0);
  session_start();
  include('connection.php');

  if ($_GET["logout"]==1) {
    unset($_SESSION["BID"]);
    unset($_SESSION["Branch"]);
    unset($_SESSION["Uname"]);
      echo "<script type='text/javascript'>window.top.location='index.php';</script>";
  }

  if(isset($_POST["Phone"]))
  {
    $LIC = $_GET["Lic"];
    $ph = $_POST["Phone"];
    $sql = "insert into Ephone values(".$LIC.",".$ph.")";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>window.top.location='Driver.php?alert=2';</script>";

    } else {
        echo "<script type='text/javascript'>window.top.location='Driver.php?alert=1';</script>";
    }
  }

  if($_GET["Driver"]== "true")
  {
    $LIC = $_GET["Lic_No"];
    $sql = "update Vehicle set FK_Driver=NULL where FK_Driver=".$LIC;
    $conn->query($sql);
    $sql = "update customer set DriverId=NULL where DriverId=".$LIC;
    $conn->query($sql);
    $sql = "Delete from ephone where FK_Driver=".$LIC;
    $conn->query($sql);
    $sql = "DELETE from Driver where Lic_No=".$LIC;
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>window.top.location='Driver.php?alert=2';</script>";
    } else {
        echo "<script type='text/javascript'>window.top.location='Driver.php?alert=1';</script>";
    }
  }

  if($_GET["Vehicle"]== "true")
  {
    $reg = $_GET["Reg"];
    $sql = "DELETE from Vehicle where RegNo=".$reg;
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>window.top.location='Vehicle.php?alert=2';</script>";
    } else {
        echo "<script type='text/javascript'>window.top.location='Vehicle.php?alert=1';</script>";
    }
  }

  if ($_GET["Remove"] == 1) {
    $reg = $_GET["Reg"];
    $sql = "UPDATE Vehicle set FK_Driver=NULL where RegNo=".$reg;
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>window.top.location='Vehicle.php?alert=2';</script>";
    } else {
        echo "<script type='text/javascript'>window.top.location='Vehicle.php?alert=1';</script>";
    }
  }

  if($_GET["Cust"] == 2)
  {
    $Cname = "'".$_GET["Cname"]."'";
    $CDid = $_GET["DriverId"];
    $CDid = preg_replace('/\D/', '', $CDid);
    $Cpick = "'".$_GET["Cpick"]."'";
    $Cdrop = "'".$_GET["Cdrop"]."'";
    $Cdist = $_GET["Cdist"];
    $Rating = $_GET["Rate"];

    $sql1 = "select Rating from Driver where Lic_No=".$CDid;
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $totRating = ($row1["Rating"] + $Rating)/2;

    $sql1 = "select Distance from Vehicle where FK_Driver=".$CDid;
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $totDist = ($row1["Distance"] + $Cdist);


    $sql = "update Driver set Rating=".$totRating." where Lic_No=".$CDid;
    $conn->query($sql);
    $sql = "update vehicle set Distance=".$totDist." where FK_Driver=".$CDid;
    $conn->query($sql);

    $sql = "INSERT INTO Customer VALUES ($Cname,$CDid,$Cpick,$Cdrop, $Cdist)";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>window.top.location='Customer.php';</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

 ?>
