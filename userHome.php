<?php include('head.php');
session_start();
if(!isset($_SESSION['CUST']))
{
  echo "NOT";
}
?>
