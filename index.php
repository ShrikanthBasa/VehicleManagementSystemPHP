<?php session_start();
if(isset($_SESSION["Uname"]))
{
  echo "<script type='text/javascript'>window.top.location='Home.php';</script>";
}
?>
<?php include('head.php') ?>
<?php include('connection.php') ?>
<link rel="stylesheet" type="text/css" href="login/css/util.css">
<link rel="stylesheet" type="text/css" href="login/css/main.css">
<div class="container-fluid backImg" style="background-image:url('images/banner1.jpg');">
    <div class="row">
      <div class="col">
        <center>

        </center>
      </div>
      <div class="col">
        <center>

        </center>
      </div>
      <div class="col mt-5">
        <div class="wrap-login100" id="AdminF" style="display:none">
  				<form class="login100-form validate-form" method="post">
            <span class="login100-form-title p-b-48">
  						Admin Login
  					</span>
  					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
  						<input class="input100" id="mail" type="text" name="email" pattern=".+@gmail.com" required>
  						<span class="focus-input100" data-placeholder="Admin Email"></span>
  					</div>

  					<div class="wrap-input100 validate-input" data-validate="Enter password">
  						<input class="input100" id="pass" type="password" name="pass" required>
  						<span class="focus-input100" data-placeholder="Password"></span>
  					</div>
  					<p id="alertmsg" style="color:red"></p>
  					<div class="container-login100-form-btn">
  						<div class="wrap-login100-form-btn">
  							<div class="login100-form-bgbtn"></div>
  							<button class="login100-form-btn">
  								Login
  							</button>
  						</div>
  					</div>
            </form>
            <a href="#" onclick="change('AdminF')" style="float:right;margin-top:10px">User Login?</a>
  					</div>

            <div class="wrap-login100" id="UserF">
      				<form class="login100-form validate-form" method="post">
                <span class="login100-form-title p-b-48">
      						User Login
      					</span>
      					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
      						<input class="input100" id="mail" type="text" name="Cemail" pattern=".+@gmail.com" required>
      						<span class="focus-input100" data-placeholder="User Email"></span>
      					</div>

      					<div class="wrap-input100 validate-input" data-validate="Enter password">
      						<input class="input100" id="pass" type="password" name="Cpass" required>
      						<span class="focus-input100" data-placeholder="Password"></span>
      					</div>
      					<p id="alertmsg2" style="color:red"></p>
      					<div class="container-login100-form-btn">
      						<div class="wrap-login100-form-btn">
      							<div class="login100-form-bgbtn"></div>
      							<button class="login100-form-btn">
      								Login
      							</button>
      						</div>
      					</div>
                </form>
                <a href="#" onclick="change('UserF')" style="float:right;margin-top:10px">Admin Login?</a>
      					</div>


        </div>
  			</div>
        </div>

      <script type="text/javascript">
        function change(div)
        {
          var x = document.getElementById(div);
          document.getElementById("AdminF").style.display= "block";
          document.getElementById("UserF").style.display= "block";
          x.style.display = "None";
        }
      </script>

    <?php
    // define variables and set to empty values

    $Password = $pass = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
      $email = $_POST["email"];
      $pass = $_POST["pass"];
      $sql = "SELECT Bpass,BranchName,BranchID FROM Branch WHERE BEmail="."'".$email."'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $Password = $row["Bpass"];
              $bname = $row["BranchName"];
              $Bid = $row["BranchID"];
          }
          if($Password == $pass)
          {
            $_SESSION['Uname']=$email;
            $_SESSION['Branch']=$bname;
            $_SESSION['BID']=$Bid;
             echo "<script type='text/javascript'>window.top.location='Home.php';</script>";
              exit;
          }
          else {
              echo "<script type='text/javascript'>document.getElementById('alertmsg').innerHTML='Wrong Password';</script>";
          }
      } else {
          echo "<script type='text/javascript'> document.getElementById('alertmsg').innerHTML='Email is not Registered'; </script>";
      }
      $conn->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Cemail"])) {
      $email = $_POST["Cemail"];
      $pass = $_POST["Cpass"];
      $sql = "SELECT email,CID,pass FROM clogin WHERE email="."'".$email."'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $Password = $row["pass"];
          }
          if($Password == $pass)
          {
            $_SESSION['CUST']= $row["CID"];
             echo "<script type='text/javascript'>window.top.location='userHome.php';</script>";
              exit;
          }
          else {
              echo "<script type='text/javascript'>document.getElementById('alertmsg2').innerHTML='Wrong Password';</script>";
          }
      }
      else{
        echo "<script type='text/javascript'> document.getElementById('alertmsg2').innerHTML='Email is not Registered'; </script>";
      }
    }

    ?>

  <?php include('footer.php') ?>
