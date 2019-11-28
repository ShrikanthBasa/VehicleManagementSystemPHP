<?php
  error_reporting(0);
  session_start();
  $alert = 0;
  $alert = $_GET["alert"];
  if(!isset($_SESSION["Uname"]))
  {
    echo "<script type='text/javascript'>window.top.location='index.php';</script>";
  }
  include('head.php');
  include('connection.php');
  $sort = "Salary";
  $order = "DESC";
 ?>

 <style media="screen">
   th,td{
     width:200px;
     text-align: center;
   }
   select{
     height: 40px;
     width: 200px;
   }
   .myButton {
  	background-color:#44c767;
  	-moz-border-radius:28px;
  	-webkit-border-radius:28px;
  	border-radius:28px;
  	border:1px solid #18ab29;
  	display:inline-block;
  	cursor:pointer;
  	color:#ffffff;
  	font-family:Arial;
  	font-size:17px;
  	padding:3px 8px;
  	text-decoration:none;
  	text-shadow:0px 1px 0px #2f6627;
    margin-left: 20px;
    }
    .myButton:hover {
    	background-color:#5cbf2a;
    }
    .myButton:active {
    	position:relative;
    	top:1px;
    }
    .btn1{
      background-color: #283843;
      border:1px solid #283843;
      border-radius:5px;
      color:white;
    }
 </style>

 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $order = $_POST['order'];
  if($order == "Ascending"){$order = "ASC";}
  if($order == "Descending"){$order = "DESC";}
  $sort = $_POST['sort'];
  if($sort == "Experience"){$sort = "Exp";}
  if($sort == "Licence"){$sort = "Lic_No";}
 }
 ?>

 <div class="container mt-5" style="text-align:right">
   <form method="post">
   <select name="sort">
     <option <?php if($sort == "Exp"){ ?> selected<?php } ?>>Experience</option>
     <option <?php if($sort == "Rating"){ ?> selected<?php } ?>>Rating</option>
     <option <?php if($sort == "Salary"){ ?> selected<?php } ?>>Salary</option>
     <option <?php if($sort == "Lic_No"){ ?> selected<?php } ?>>Licence</option>
   </select>
   <select name="order">
     <option <?php if($order == "ASC"){ ?> selected<?php } ?>>Ascending</option>
     <option <?php if($order == "DESC"){ ?> selected<?php } ?>>Descending</option>
   <input type="submit" class="myButton" value="submit">
 </center>
   </form>
 </div>

<div class="container mt-3 ">
 <?php if($alert == 1) {?>
 <div class="alert alert-danger" id="alertmsg">
   <strong>Error!</strong> Something went wrong.
 </div>
 <?php } ?>
 <?php if($alert == 2) {?>
   <div class="alert alert-success" id="alertmsg">
     <strong>Success!</strong>
   </div>
 <?php } ?>
</div>

 <div class="container-fluid mt-1">
   <center>
  <table border="1px" cellpadding="5px">
    <tr style="background-color:#283843;color:white">
      <th>LICENCE NO</th>
      <th style="width:400px">NAME</th>
      <th>PHONE</th>
      <th>SALARY</th>
      <th>JOINING</th>
      <th>EXPERIENCE</th>
      <th>RATING</th>
      <th style="width:400px">DRIVES</th>
      <th style="width:400px">ADD PHONE</th>
      <th>DELETE DRIVER</th>
    </tr>
<?php
    $sql = "SELECT * FROM Driver WHERE FK_BID = "."'".$_SESSION['BID']."' order by ".$sort." ".$order;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
              <tr>
                <?php echo "<td>".$row["Lic_No"]."</td>"; ?>
                <?php echo "<td>".$row["Name"]."</td>"; ?>

                <td>
                <select style="width:110px">
                <?php
                $sql3 = "select phone from Ephone where FK_Driver=".$row["Lic_No"];
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0) {
                    while($row3 = $result3->fetch_assoc()) {
                      echo "<option>".$row3["phone"]."</option>";
                    }
                }
                ?>
              </select>
              </td>

                <?php echo "<td>Rs.".$row["Salary"]."</td>"; ?>
                <?php echo "<td>".$row["month"]."-".$row["year"]."</td>"; ?>
                <?php echo "<td>".(2019-$row["year"])." Years</td>"; ?>
                <?php echo "<td>".$row["Rating"]."</td>"; ?>
                <?php
                $sql1 = "SELECT RegNo,Model FROM Vehicle WHERE FK_Driver=".$row['Lic_No'];
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc()
                 ?>
                 <?php echo "<td>".$row1["RegNo"]."-".$row1["Model"]."</td>"; ?>

                 <td>
                   <form <?php echo 'action="method.php?Lic='.$row["Lic_No"].'"' ?> method="POST">
                     <input type="text" maxlength="10" pattern="\d{10}" name="Phone" style="width:100px" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                      <input type="submit" class="btn1" value="Go" style="display:inline-block;">
                   </form>
                 </td>

                <?php echo "<td><a href='method.php?Driver=true&Lic_No=".$row["Lic_No"]."'><input type='submit' class='myButton btn1' value='Delete'></a></td>"; ?>
              </tr>
            <?php
        }
      }
      else{
        echo "<td colspan=11 style='color:red'>NO DRIVERS ARE CURRENTLY AVAILABLE<a href='home.php'> Add Driver?</a></td>";
      }
 ?>
  </table>
  <h6 class="mt-3">**NOTE : Deleting a driver also Removes him from associated vehicle and customers if any</h6>
  </div>
</center>
<script src="bootstrap/js/jquery-1.10.2.js" type="text/javascript"></script>
<script type="text/javascript">
  setTimeout(function(){
    var x = document.getElementById("alertmsg");
    $("#alertmsg").slideUp(800);
  }, 2000);
</script>

<?php include("footer.php") ?>
