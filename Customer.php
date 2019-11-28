<?php include('head.php');
include('connection.php') ?>
<link rel="stylesheet" href="cs/Cstyle.css">
<div class="container">
  <form action="method.php?Cust=2">
    <label for="fname">Name</label>
    <input type="text" id="fname" name="Cname" placeholder="Your name..">

    <label for="Driver">Driver</label>
    <select id="branch" name="DriverId">
      <?php
      $sql = "select Model,FK_Driver from vehicle,driver where Lic_No = FK_Driver";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<option>".$row["Model"]."-".$row["Name"]."(".$row["FK_Driver"].")"."</option>";
          }
      }
      ?>
    </select>

    <label for="fpick">Pick Loacation</label>
    <input type="text" id="fname" name="Cpick" placeholder="Pick Location..">

    <label for="fdrop">Drop Location</label>
    <input type="text" id="fname" name="Cdrop" placeholder="Frop Location..">

    <label for="fdist">Distance</label>
    <input type="number" id="fname" name="Cdist" placeholder="Distance travelled..">

    <center>
  <div class="feedback">
      <h4 style="color:black">Rating</h4>
      <div class="rating">
        <input type="radio" name="Rate" id="rating-5" value="5" required>
        <label for="rating-5"></label>
        <input type="radio" name="Rate" id="rating-4" value="4" required>
        <label for="rating-4"></label>
        <input type="radio" name="Rate" id="rating-3" value="3" required>
        <label for="rating-3"></label>
        <input type="radio" name="Rate" id="rating-2" value="2" required>
        <label for="rating-2"></label>
        <input type="radio" name="Rate" id="rating-1" value="1" required>
        <label for="rating-1"></label>
        <div class="emoji-wrapper">
          <div class="emoji">
          <?php include('emoji.php') ?>
          <div>
        </div>
      </div>
      </div>
    </div>
  </div>

  <input class="mt-3" type="submit" value="Submit">
  </center>
  </form>
</div>
