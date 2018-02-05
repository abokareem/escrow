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
      </li><!-- nav-item -->
      <li class="nav-item">
        <a href="order.php" class="nav-link">
          <i class="icon ion-ios-gear-outline"></i>
          <span>Orders</span>
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
      <div class="dropdown dropdown-notification">
        <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
          <img src="http://qbgrow.com/magen/iot-admin/img/notification.svg" height="24"/>
          <!-- start: if statement -->
          <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
          <!-- end: if statement -->
        </a>
        <div class="dropdown-menu wd-300 pd-0-force">
          <div class="dropdown-menu-header">
            <label>Notifications</label>
            <a href="#">Mark All as Read</a>
          </div><!-- d-flex -->

          <div class="media-list">
            <!-- loop starts here -->
            <a href="#" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="./img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0"><strong class="tx-medium">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <div class="media-list-footer">
              <a href="#" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
            </div>
          </div><!-- media-list -->
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
      <div class="dropdown dropdown-profile">
        <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
          <img src="./img/img3.jpg" class="wd-32 rounded-circle" alt="">
          <span class="logged-name"><span class="hidden-xs-down"><?php echo $_SESSION['merchant_name'] ?></span> <i class="fa fa-angle-down mg-l-3"></i></span>
        </a>
        <div class="dropdown-menu wd-200">
          <ul class="list-unstyled user-profile-nav">
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
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body pd-b-0">
                  <img src="./img/profit.svg" width="60" class="card-icon"/>
                  <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20">Total Made</h6>
                  <h2 class="tx-roboto tx-inverse">
                    <?php
                      $data = $order->getTotalMade();
                      echo ($data['amount'] == "" ? "0.00" : $data['amount']);;
                    ?> 
                    <small>NGN</small>
                  </h2>
                </div><!-- card-body -->
                <div id="rs1" class="ht-50 ht-sm-70 mg-r--1"></div>
              </div><!-- card -->
            </div><!-- col-6 -->
            <div class="col-lg-4">
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
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body pd-b-0">
                  <img src="./img/loss.svg" width="60" class="card-icon"/>
                  <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20">Total Loss</h6>
                  <h2 class="tx-roboto tx-inverse">
                    <?php
                      $data = $order->getTotalLoss();
                      echo ($data['amount'] == "" ? "0.00" : $data['amount']);;
                    ?> 
                    <small>NGN</small>
                  </h2>
                </div><!-- card-body -->
                <div id="rs2" class="ht-50 ht-sm-70 mg-r--1"></div>
              </div><!-- card -->
            </div><!-- col-6 -->
          </div><!-- row -->
        </div>
      </div>


      <div class="row row-sm mg-t-50">
        <div class="col-xl-6">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Delivery Chart</h6>
            <p>The chart shows count of successfull, pending and canceled deliveries</p>
            <div id="morrisDonut1" class="ht-200 ht-sm-250"></div>
          </div><!-- card -->
        </div><!-- col-6 -->

        <div class="col-xl-6 mg-t-25 mg-sm-t-0">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Recent Cancelled Order</h6>
            <p>The table show the list recent cancelled deliveries</p>
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Order Number</th>
                  <th class="wd-15p">Customer ID</th>
                  <th class="wd-20p">Delivery ID</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $data = json_decode($order->getRecentCancelledOrders(), true);
                for ($details=0; $details < count($data); $details++) { 
                  $val = $data[$details];
                  echo "<tr>";
                  echo "<td>".$val['order']."</td>";
                  echo "<td>".$val['customer']."</td>";
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

  <script type="text/javascript">
    <?php
    $data = $order->getTotalCancelled();
    $cancelled = $data['count'];
    $data = $order->getTotalDelivered();
    $delivered = $data['count'];
    $data = $order->getTotalPending();
    $pending = $data['count'];
    ?>
    new Morris.Donut({
      element: 'morrisDonut1',
      data: [
      {label: "Delivered", value: <?php echo $delivered; ?>},
      {label: "Cancelled", value: <?php echo $cancelled; ?>},
      {label: "Pending", value: <?php echo $pending; ?>}
      ],
      colors: ['#384250','#7CBDDF','#5B93D3'],
      resize: true
    });
  </script>


</body>
</html>
