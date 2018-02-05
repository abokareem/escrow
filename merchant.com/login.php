<?php
include './process/config.php';

if($order->is_loggedin() != ""){
  header("location: index.php");
}


if(isset($_GET['logout'])){
  session_destroy();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Meta -->
 <meta name="description" content="Team 13 Merchant Site">
 <meta name="author" content="Team13">


 <title>Escrowsify - Login</title>

 <!-- vendor css -->
 <link href="./lib/font-awesome/css/font-awesome.css" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
 <link href="./lib/Ionicons/css/ionicons.css" rel="stylesheet">  
 <link href="./lib/iziToast/css/iziToast.css" rel="stylesheet">
 <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
 <link href="./lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
 <link href="./lib/datatables/jquery.dataTables.css" rel="stylesheet">

 <!-- main style -->
 <link rel="stylesheet" href="./css/magen-iot-admin.css">
</head>

<body>

  <div class="signpanel-wrapper">
    <div class="signbox">
      <div class="signbox-header">
        <h4>Escrowsify</h4>
        <p class="mg-b-0">Merchant Login</p>
      </div><!-- signbox-header -->
      <div class="signbox-body">
        <form method="POST" id="login">
          <div class="form-group">
            <input type="text" name="email" required="required" placeholder="Email/Username..." class="form-control">
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" required="required" name="password" placeholder="Password..." class="form-control">
          </div><!-- form-group -->
          <button type="submit" class="btn btn-dark btn-block">Login</button>
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
