<?php
  session_start();
  error_reporting(0);
  $alert = 0;
  $alert = $_GET["alert"];
  if(!isset($_SESSION["Uname"]))
  {
    echo "<script type='text/javascript'>window.top.location='index.php';</script>";
  }
  include('head.php');
  include('connection.php');
  $sort = "RegNo";
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
  if($sort == "Registration"){$sort = "RegNo";}
  if($sort == "Cost"){$sort = "costperkm";}
 }
 ?>

 <div class="container mt-5" style="text-align:right">
   <form method="post">
   <select name="sort">
     <option <?php if($sort == "RegNo"){ ?> selected<?php } ?>>Registration</option>
     <option <?php if($sort == "Capacity"){ ?> selected<?php } ?>>Capacity</option>
     <option <?php if($sort == "Distance"){ ?> selected<?php } ?>>Distance</option>
     <option <?php if($sort == "costperkm"){ ?> selected<?php } ?>>Cost</option>
   </select>
   <select name="order">
     <option <?php if($order == "ASC"){ ?> selected<?php } ?>>Ascending</option>
     <option <?php if($order == "DESC"){ ?> selected<?php } ?>>Descending</option>
   <input type="submit" class="myButton" value="submit">
 </center>
   </form>

 </div>
  <div class="container mt-3">
  <?php if($_GET["alert"] == 1) {?>
  <div class="alert alert-danger"  id="alertmsg">
    <strong>Error!</strong> Something went wrong.
  </div>
  <?php } ?>
  <?php if($_GET["alert"] == 2) {?>
    <div class="alert alert-success"  id="alertmsg">
      <strong>Success!</strong>
    </div>
  <?php } ?>
  </div>

 <div class="container-fluid mt-3" id="MainContent">
   <center>
  <table border="1px" cellpadding="5px">
    <tr style="background-color:#283843;color:white">
      <th>REGISTRATION</th>
      <th>MODEL</th>
      <th>REVENUE</th>
      <th>CAPACITY</th>
      <th>DISTANCE</th>
      <th>COST/KM</th>
      <th>FUEL TYPE</th>
      <th style="width:700px">DRIVER</th>
      <th>DELETE VEHICLE</th>
      <th>REMOVE DRIVER</th>
      <th style="width:400px">ADD DRIVER</th>
    </tr>
<?php
    $sql = "SELECT * FROM Vehicle WHERE FK_BID = "."'".$_SESSION['BID']."' order by ".$sort." ".$order;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
              <tr>
                <?php echo "<td>".$row["RegNo"]."</td>"; ?>
                <?php echo "<td>".$row["Model"]."</td>"; ?>
                <?php echo "<td>Rs.".($row["Distance"])*($row["costperkm"])."</td>"; ?>
                <?php echo "<td>".$row["Capacity"]."</td>"; ?>
                <?php echo "<td>".$row["Distance"]." KM</td>"; ?>
                <?php echo "<td>Rs.".$row["costperkm"]."</td>"; ?>
                <?php echo "<td>".$row["Fueltype"]."</td>"; ?>
                <?php
                if($row['FK_Driver'] != NULL)
                {
                $sql1 = "SELECT Name FROM Driver WHERE Lic_No=".$row['FK_Driver'];
                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc()
                ?>
                <?php echo "<td>".$row['FK_Driver']."-".$row1['Name']."</td>";}
                else{
                  echo "<td>-</td>";
                }
                 ?>
                <?php echo "<td><a href='method.php?Vehicle=true&Reg=".$row["RegNo"]."'><input type='submit' class='myButton btn1' value='Delete'></a></td>"; ?>
                <?php if($row["FK_Driver"] != NULL){ echo "<td><a href='method.php?Remove=1&Reg=".$row["RegNo"]."'><input type='submit' class='myButton btn1' value='Remove'></a></td>";}else{echo"<td>NA</td>";} ?>

                <?php if($row['FK_Driver'] == NULL) {?>
                  <td>
                    <form <?php echo 'action="AddDriver1.php?Reg='.$row["RegNo"].'"' ?> method="post">
                    <select name="licSelect" style="width:100px;height:30px">
                      <?php
                      $sql2 = "select * from Driver where Lic_No not in(select FK_Driver from Vehicle inner join Driver on Driver.Lic_No=Vehicle.FK_Driver) and FK_BID="."'".$_SESSION["BID"]."'";
                      $result2 = $conn->query($sql2);
                      if ($result2->num_rows > 0) {
                          while($row2 = $result2->fetch_assoc()) {
                            echo "<option>".$row2["Lic_No"]."-".$row2["Name"]."</option>";
                          }
                      }
                      else{
                        echo "<option>No Drivers Available</option>";
                      }
                      ?>
                    </select>
                    <input type="submit" class="btn1" value="Go" style="display:inline-block;">
                    </form>
                  </td>
                <?php }else{echo "<td>NA</td>";} ?>
              </tr>
            <?php
        }
      }else{
        echo "<td colspan=11 style='color:red'>NO VEHICLES CURRENTLY AVAILABLE<a href='home.php'> Add Vehicle?</a></td>";
      }
 ?>
  </table>
</center>
</div>
<p></p>
<script src="bootstrap/js/jquery-1.10.2.js" type="text/javascript"></script>
<script type="text/javascript">
  setTimeout(function(){
    var x = document.getElementById("alertmsg");
    $("#alertmsg").slideUp(800);
  }, 2000);
</script>

<?php include('footer.php') ?>
