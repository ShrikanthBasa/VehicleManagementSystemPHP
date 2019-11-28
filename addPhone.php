<?php

  session_start();
  include('connection.php');
  $LIC = $_GET["Lic"];
  echo $LIC;
  $ph = $_POST["Phone"];
  echo $ph;
  $sql = "insert into Ephone values(".$LIC.",".$ph.")";
  echo $sql;
  if ($conn->query($sql) === TRUE) {
      echo "<script type='text/javascript'>window.top.location='Driver.php?alert=2';</script>";

  } else {
      echo "<script type='text/javascript'>window.top.location='Driver.php?alert=1';</script>";
  }
  ?>
