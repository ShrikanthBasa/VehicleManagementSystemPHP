<?php error_reporting(0) ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <meta name="description" content="Vehicle Mangement System">
    <meta name="author" content="Shrikanth Basa">
    <title>Vehicle Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="text/javascript" href="bootstrap/JQuiry.js">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="cs/animate.css">
    <link rel="stylesheet" href="cs/style.css">
    	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
    	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <span class="float-left navTitle">Vehicle Management System</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a href="index.php"><button type="button" <?php if(basename($_SERVER['PHP_SELF'])=="Home.php"){echo 'class="btn btn-primary"';}else{echo 'class="btn btn-secondary"';} ?>>Home</button></a>
            </li>
            <li class="nav-item active">
            <a href="About.php"><button type="button" <?php if(basename($_SERVER['PHP_SELF'])=="About.php"){echo 'class="btn btn-primary"';}else{echo 'class="btn btn-secondary"';} ?>>About Us</button></a>
            </li>

            <?php
            if(isset($_SESSION["Uname"])){?>
              <li class="nav-item active">
                <a href="Driver.php"><button type="button" <?php if(basename($_SERVER['PHP_SELF'])=="Driver.php"){echo 'class="btn btn-primary"';}else{echo 'class="btn btn-secondary"';} ?>>Drivers</button></a>
              </li>
              <li class="nav-item active">
                <a href="Vehicle.php"><button type="button" <?php if(basename($_SERVER['PHP_SELF'])=="Vehicle.php"){echo 'class="btn btn-primary"';}else{echo 'class="btn btn-secondary"';} ?>>Vehicles</button></a>
              </li>
              <li class="nav-item active">
                <a href="method.php?logout=1"><button type="submit" class="btn btn-secondary">Logout</button></a>
              </li>
            <?php } ?>
            </ul>
            </div>
        </div>
    </nav>
    </div>
