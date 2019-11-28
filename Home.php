<?php
  session_start();
  if(!isset($_SESSION["Uname"]))
  {
    echo "<script type='text/javascript'>window.top.location='index.php';</script>";
  }
  include('head.php');
  include('connection.php');

  $totalRating = $totalDrivers = $totalVehicles = $Revenue = $Dist = 0;

  $sql = "SELECT Rating from Driver where FK_BID ="."'".$_SESSION['BID']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $totalRating = $totalRating + $row["Rating"];
          $totalDrivers = $totalDrivers + 1;
      }
  }
  $sql = "SELECT Costperkm,Distance from Vehicle where FK_BID ="."'".$_SESSION['BID']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $Revenue = $Revenue + ($row["Costperkm"] * $row["Distance"]);
          $totalVehicles = $totalVehicles + 1;
      }
  }

 ?>

 <style media="screen">
 .col{
   margin: 5px;
 }
 .Upcol{
   width: 150px;
   height: 150px;
   margin: 0px 10px 0px 10px;
 }
 .topText{
   position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}
 #pass{
   display: block;
   margin-top: 7px;
   width: 300px;
 }
 #NameSpan{
   float: left!important;
   width: 200px;
 }
 input , select{
   width: 100%;
   padding: 2px 2px;
   margin: 4px 0;
   box-sizing: border-box;
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
	padding:10px 20px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
  }
  .myButton:hover {
  	background-color:#5cbf2a;
  }
  .myButton:active {
  	position:relative;
  	top:1px;
  }

 </style>
<div class="container">
  <center>
  <div class="row mt-3">
    <div class="col Upcol" style="background-color:tomato">
      <div class="topText">
        <h5>Revenue</h5>
        <?php echo "<h3>Rs.".round($Revenue,2)."</h3>" ?>
      </div>
    </div>
    <div class="col Upcol" style="background-color:orange">
      <div class="topText">
          <h5>Vehicles</h5>
            <?php echo "<h3>".$totalVehicles."</h3>" ?>
      </div>
    </div>
    <div class="col Upcol" style="background-color:dodgerblue">
      <div class="topText">
          <h5>Drivers</h5>
          <?php echo "<h3>".$totalDrivers."</h3>" ?>
      </div>
    </div>
    <div class="col Upcol" style="background-color:slateblue">
      <div class="topText">
          <h5>Rating</h5>
          <?php echo "<h3>".round(($totalRating/$totalDrivers),2)."</h3>" ?>
      </div>
    </div>
  </div>
</center>
</div>
<center>
<div class="container mt-3">
  <div class="row">
    <div class="col" style="border:1px solid black">
      <h4 style="margin-top:10px;">Add a Driver</h4>
      <form  method="post" action="AddDriver.php">
      <span id="NameSpan">LICENCE NUM:</span><input id="pass" type="number" name="LIC"  style="margin-top:30px;">
      <span id="NameSpan">DRIVER'S NAME:</span><input id="pass" type="text" name="Dname" >
      <span id="NameSpan">DRIVER'S SAL :</span><input id="pass" type="number" name="Sal" >
      <span id="NameSpan">JOINING MONTH:</span><input id="pass" type="text" name="Month" >
      <span id="NameSpan">JOINING YEAR</span><input id="pass" type="number" name="Year" >
      <span id="NameSpan">DRIVER RATING:</span><input id="pass" type="number" name="Rating" step="0.01" >
      <span id="NameSpan">BRANCH ID:</span><select name="Ftype" id="pass" disabled>
        <?php echo "<option>".$_SESSION["BID"]."-".$_SESSION["Branch"]."</option>"; ?>
      </select>
      <button type="submit" class="myButton mb-3 mt-3" name="button">SUBMIT</button>
      </form>
    </div>
    <div class="col" style="border:1px solid black">
      <h4 style="margin-top:10px;">Add a Vehicle</h4>
      <form  method="post" action="addVehicle.php">
        <span id="NameSpan">REG NUMBER:</span><input class="input10" id="pass" type="number" name="Reg" required style="margin-top:30px;">
        <span id="NameSpan">MODEL:</span><input id="pass" type="text" name="model" required>
        <span id="NameSpan">CAPACITY:</span><input id="pass" type="number" name="capacity" required>
        <span id="NameSpan">DISTANCE:</span><input id="pass" type="number" name="dist" required>
        <span id="NameSpan">COST/KM:</span><input id="pass" type="number" name="costper" step="0.01"  required>
        <span id="NameSpan">FUEL TYPE:</span><select name="Ftype" id="pass">
          <option>Petrol</option>
          <option>Diesel</option>
          <option>CNG</option>
        </select>
        <span id="NameSpan">DRIVER:</span><select name="FDkey" id="pass">
        <?php
        $sql = "select * from Driver where Lic_No not in(select FK_Driver from Vehicle inner join Driver on Driver.Lic_No=Vehicle.FK_Driver) and FK_BID="."'".$_SESSION["BID"]."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<option>".$row["Lic_No"]."-".$row["Name"]."</option>";
            }
        }
        ?>
        <option>1.NULL</option>
      </select>
        <button type="submit" class="myButton mb-3 mt-3" name="button">SUBMIT</button>
      </form>
    </div>
  </div>

</div>
</center>
<?php include('footer.php') ?>
</body>
</head>
