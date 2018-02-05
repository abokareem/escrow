<?php

include_once './process/config.php';

if($order->is_loggedin() != ""){

}else{
  header("location: login.php?logout");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Meta -->
  <meta name="description" content="Escrowsify Merchant Site">
  <meta name="author" content="Team13">


  <title>Escrowsify - Bank</title>

  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

  <!-- vendor css -->
  <link href="./lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="./lib/iziToast/css/iziToast.css" rel="stylesheet">
  <link href="./lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="./lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link href="./lib/datatables/jquery.dataTables.css" rel="stylesheet">
  <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
  <link href="../lib/spectrum/spectrum.css" rel="stylesheet">

  <!-- main style -->
  <link rel="stylesheet" href="./css/magen-iot-admin.css">
</head>

<body>

  <!-- ##### SIDEBAR LOGO ##### -->
  <div class="kt-sideleft-header">
    <div class="kt-logo"><a href="index.php">Escrowsify <small>Merchant</small></a></div>
    <div id="ktDate" class="kt-date-today"></div>
    <div class="input-group kt-input-search">
      <input type="text" class="form-control" placeholder="Search...">
      <span class="input-group-btn mg-0">
        <button class="btn"><i class="fa fa-search"></i></button>
      </span>
    </div><!-- input-group -->
  </div><!-- kt-sideleft-header -->

  <!-- ##### SIDEBAR MENU ##### -->
  <div class="kt-sideleft">
    <label class="kt-sidebar-label">Navigation</label>
    <ul class="nav kt-sideleft-menu">
      <li class="nav-item">
        <a href="index.php" class="nav-link">
          <i class="icon ion-ios-home-outline"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="bank.php" class="nav-link active">
          <i class="icon ion-cash"></i>
          <span>Bank</span>
        </a>
      </li>
    </ul>
  </div><!-- kt-sideleft -->

  <!-- ##### HEAD PANEL ##### -->
  <div class="kt-headpanel">
    <div class="kt-headpanel-left">
      <a id="naviconMenu" href="#" class="kt-navicon d-none d-lg-flex"><img src="http://qbgrow.com/magen/iot-admin/img/menu.svg" width="30"/></a>
      <a id="naviconMenuMobile" href="#" class="kt-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
    </div><!-- kt-headpanel-left -->

    <div class="kt-headpanel-right">
      <div class="dropdown dropdown-profile">
        <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
          <img src="./img/img3.jpg" class="wd-32 rounded-circle" alt="">
          <span class="logged-name"><span class="hidden-xs-down"><?php echo $_SESSION['name']; ?></span> <i class="fa fa-angle-down mg-l-3"></i></span>
        </a>
        <div class="dropdown-menu wd-200">
          <ul class="list-unstyled user-profile-nav">
            <li><a href="edit-profile.php"><i class="icon ion-person"></i> Edit Account</a></li>
            <li><a href="login.php?logout"><i class="icon ion-power"></i> Sign Out</a></li>
          </ul>
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
    </div><!-- kt-headpanel-right -->
  </div><!-- kt-headpanel -->

  <div class="kt-breadcrumb">
    <nav class="breadcrumb">
      <a class="breadcrumb-item" href="index.php">Escrowsify</a>
      <span class="breadcrumb-item active">Bank</span>
    </nav>
  </div><!-- kt-breadcrumb -->

  <!-- ##### MAIN PANEL ##### -->
  <div class="kt-mainpanel">
    <div class="kt-pagetitle">
      <h5>Bank</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">
      <div class="row row-sm">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body pd-b-0">
              <form method="POST" id="addBank">
                <div class="form-group">
                  <select class="form-control select2" name="bankName" data-placeholder="Select Bank">
                    <option label="Choose one"></option>
                    <option value="234003">Access Nigeria</option>
                    <option value="234001">FCMB Nigeria</option>
                    <option value="234007">Providus Nigeria</option>
                    <option value="234010">Sterling Nigeria</option>
                  </select>
                </div><!-- form-group -->
                <div class="form-group">
                  <input type="text" required="required" name="acctName" placeholder="Account Name" class="form-control">
                </div><!-- form-group -->
                <div class="form-group">
                  <input type="text" name="acctNo" required="required" placeholder="Account Number" class="form-control">
                </div><!-- form-group -->
                <button type="submit" class="btn btn-dark">Save</button>
              </form>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col-6 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body pd-b-0">
              <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">Bank Name</th>
                      <th class="wd-15p">Account Number</th>
                      <th class="wd-20p">Account Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $data = json_decode($order->getBanks(), true);
                    for ($details=0; $details < count($data); $details++) { 
                      $val = $data[$details];
                      echo "<tr>";
                      switch ($val['bank']) {
                        case '234001':
                        echo "<td>FCMB Nigeria</td>";
                        break;
                        case '234003':
                        echo "<td>Access Nigeria</td>";
                        break;
                        case '234007':
                        echo "<td>Providus Nigeria</td>";
                        break;

                        default:
                        echo "<td>Sterling Nigeria</td>";
                        break;
                      }
                      echo "<td>".$val['acctNo']."</td>";
                      echo "<td>".$val['acctName']."</td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>  
                </table>
              </div>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- col-6 -->
      </div>

    </div><!-- kt-pagebody -->

  </div><!-- kt-mainpanel -->

  <script src="./lib/jquery/jquery.js"></script>
  <script src="./lib/iziToast/js/iziToast.js"></script>
  <script src="./lib/jquery-ui/jquery-ui.js"></script>
  <script src="./lib/popper.js/popper.js"></script>
  <script src="./lib/bootstrap/bootstrap.js"></script>
  <script src="./lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="./lib/moment/moment.js"></script>
  <script src="./lib/datatables/jquery.dataTables.js"></script>
  <script src="./lib/datatables-responsive/dataTables.responsive.js"></script>
  <script src="./lib/select2/js/select2.min.js"></script>
  <script src="./lib/spectrum/spectrum.js"></script>

  <!-- main script -->
  <script src="./js/magen-iot-admin.js"></script>
  <script src="./js/main.js"></script>

  <script>
    $(function(){

      'use strict';

      $('.select2').select2({
        minimumResultsForSearch: Infinity
      });

    });
  </script>

</body>
</html>
