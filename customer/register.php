<?php
include './process/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="author" content="vueghost">


  <title>Escrowsify - Register</title>

  <!-- vendor css -->
  <link href="./lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="./lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="./lib/iziToast/css/iziToast.css" rel="stylesheet">
  <link href="./lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

  <!-- magen-iot-admin CSS -->
  <link rel="stylesheet" href="./css/magen-iot-admin.css">
</head>

<body>

  <div class="signpanel-wrapper">
    <div class="signbox signup">
      <div class="signbox-header">
        <h4>Escrowsify</h4>
        <p class="mg-b-0">Customer</p>
      </div><!-- signbox-header -->
      <div class="signbox-body">
        <form method="POST" id="register">
          <div class="row row-xs">
            <div class="col-sm">
              <div class="form-group">
                <input type="text" name="firstname" required class="form-control" placeholder="Firstname...">
              </div><!-- form-group -->
            </div><!-- col -->
            <div class="col-sm">
              <div class="form-group">
                <input type="text" name="lastname" required class="form-control" placeholder="Lastname...">
              </div><!-- form-group -->
            </div><!-- col -->
          </div><!-- row -->

          <div class="row row-xs">
            <div class="col-sm">
              <div class="form-group">
                <input type="email" name="email" required class="form-control" placeholder="Email...">
              </div><!-- form-group -->
            </div><!-- col -->
            <div class="col-sm">
              <div class="form-group">
                <input type="text" name="phone" required class="form-control" placeholder="Phone Number...">
              </div><!-- form-group -->
            </div><!-- col -->
          </div><!-- row -->

          <div class="row row-xs">
            <div class="col-sm">
              <div class="form-group">
                <input type="text" name="username" required class="form-control" placeholder="Username...">
              </div><!-- form-group -->
            </div><!-- col -->
            <div class="col-sm">
              <div class="form-group">
                <input type="password" name="password" required class="form-control" placeholder="Password...">
              </div><!-- form-group -->
            </div><!-- col -->
          </div><!-- row -->

          <div class="form-group">
            <input type="text" name="address" required class="form-control" placeholder="Address..">
          </div><!-- form-group -->

          <button type="submit" class="btn btn-dark btn-block">Sign Up</button>
          <div class="tx-center bd pd-10 mg-t-40">Already a member? <a href="login.php">Sign In</a></div>
        </form>
      </div><!-- signbox-body -->
    </div><!-- signbox -->
  </div><!-- signpanel-wrapper -->

  <script src="./lib/jquery/jquery.js"></script>
  <script src="./lib/popper.js/popper.js"></script>
  <script src="./lib/bootstrap/bootstrap.js"></script>  
  <script src="./lib/iziToast/js/iziToast.js"></script>
  <script src="./js/main.js"></script>
</body>
</html>
