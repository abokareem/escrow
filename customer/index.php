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


  <title>Escrowsify - Dashboard</title>

  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

  <!-- vendor css -->
  <link href="./lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="./lib/iziToast/css/iziToast.css" rel="stylesheet">
  <link href="./lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="./lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link href="./lib/morris.js/morris.css" rel="stylesheet">
  <link href="./lib/datatables/jquery.dataTables.css" rel="stylesheet">

  <!-- main style -->
  <link rel="stylesheet" href="./css/magen-iot-admin.css">
  <style type="text/css">
    .click{
      padding: 7px;
      cursor: pointer;
      border-radius: 100%;
    }

    .red{
      background-color: #ff0000;
      color: white;
    }

    .green{
      background-color: #00ff00;
      color: white;
    }
  </style>
</head>

<body>

  <!-- ##### SIDEBAR LOGO ##### -->
  <div class="kt-sideleft-header">
    <div class="kt-logo"><a href="index.php">Escrowsify <small>Customer</small></a></div>
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
        <a href="index.php" class="nav-link active">
          <i class="icon ion-ios-home-outline"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="bank.php" class="nav-link">
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
          <span class="logged-name"><span class="hidden-xs-down"><?php echo $_SESSION['name'] ?></span> <i class="fa fa-angle-down mg-l-3"></i></span>
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
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>
  </div><!-- kt-breadcrumb -->

  <!-- ##### MAIN PANEL ##### -->
  <div class="kt-mainpanel">
    <div class="kt-pagetitle">
      <h5>Dashboard</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

      <div class="row row-sm">
        <div class="col-lg-12">
          <div class="row row-sm">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body pd-b-0">
                  <img src="./img/cash.svg" width="60" class="card-icon"/>
                  <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20">Total Money Spent</h6>
                  <h2 class="tx-roboto tx-inverse">
                    <?php
                    $data = $order->getTotalSpent();
                    echo ($data['amount'] == "" ? "0.00" : $data['amount']);;
                    ?> 
                    <small>NGN</small>
                  </h2>
                </div><!-- card-body -->
                <div id="rs1" class="ht-50 ht-sm-70 mg-r--1"></div>
              </div><!-- card -->
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body pd-b-0">
                  <img src="./img/pending.svg" width="60" class="card-icon"/>
                  <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20">Amount in escrow</h6>
                  <h2 class="tx-roboto tx-inverse">
                    <?php
                    $data = $order->getEscrowAmount();
                    echo ($data['amount'] == "" ? "0.00" : $data['amount']);;
                    ?> 
                    <small>NGN</small>
                  </h2>
                </div><!-- card-body -->
                <div id="rs1" class="ht-50 ht-sm-70 mg-r--1"></div>
              </div><!-- card -->
            </div><!-- col-6 -->
          </div><!-- row -->
        </div>
      </div>


      <div class="row row-sm mg-t-50">
        <div class="col-xl-8">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Deliveries</h6>
            <p>The table show the list of both pending, cancelled and successful deliveries</p>
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Order Number</th>
                  <th class="wd-20p">Delivery</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $data = json_decode($order->getOrders(), true);
                for ($details=0; $details < count($data); $details++) { 
                  $val = $data[$details];
                  echo "<tr>";
                  echo "<td>".$val['order']."</td>";
                  echo "<td>".$val['delivery']."</td>";
                  echo "<td>".$val['status']."</td>";
                  switch ($val['status']) {
                    case 'pending':
                      echo "<td> <i id='cancelOrder' data-id='".$val['order']."' class='click red fa fa-close mg-r-20'></i> <i id='completeOrder' data-id='".$val['order']."' class='click green fa fa-check'></i></td>";
                      break;
                    
                    default:
                      echo "<td> - </td>";
                      break;
                  }
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div><!-- card -->
        </div><!-- col-6 -->

        <div class="col-xl-4 mg-t-25 mg-sm-t-0">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Recent Cancelled Order</h6>
            <p>The table show the list recent cancelled deliveries</p>
            <table id="datatable2" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Order Number</th>
                  <th class="wd-20p">Delivery</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $data = json_decode($order->getRecentCancelledOrders(), true);
                for ($details=0; $details < count($data); $details++) { 
                  $val = $data[$details];
                  echo "<tr>";
                  echo "<td>".$val['order']."</td>";
                  echo "<td>".$val['delivery']."</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div><!-- card -->
        </div><!-- col-6 -->
      </div><!-- row -->

    </div><!-- kt-pagebody -->

  </div><!-- kt-mainpanel -->

  <script src="./lib/jquery/jquery.js"></script>
  <script src="./lib/iziToast/js/iziToast.js"></script>
  <script src="./lib/popper.js/popper.js"></script>
  <script src="./lib/bootstrap/bootstrap.js"></script>
  <script src="./lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="./lib/moment/moment.js"></script>
  <script src="./lib/datatables/jquery.dataTables.js"></script>
  <script src="./lib/datatables-responsive/dataTables.responsive.js"></script>
  <script src="./lib/raphael/raphael.min.js"></script>
  <script src="./lib/morris.js/morris.js"></script>

  <!-- main script -->
  <script src="./js/magen-iot-admin.js"></script>
  <script src="./js/main.js"></script>

</body>
</html>
