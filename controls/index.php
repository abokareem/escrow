<?php
require "plugin/config.php";
require "plugin/logincheck.php";
$title = "Home";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="A fully featured payment system for ecommerce companies">
    <meta name="author" content="Team13">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>Escrowsify Pay - <?php echo $title; ?></title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php
        include "template/topbar.php";
    ?>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <?php
    include "template/leftmenu.php";
    ?>
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Total Customers</h4>

                            <div class="widget-chart-1">
                                <div class="widget-detail-1">
                                    <?php
                                        $customertotQuery = "SELECT COUNT(tblid) AS totcustomer FROM escrowsify_tblcustomer";
                                        $runQuery = mysqli_query($con,$customertotQuery);
                                        $totfetch = mysqli_fetch_array($runQuery);
                                        $tot = $totfetch['totcustomer'];
                                    ?>
                                    <h2 class="p-t-10 m-b-0"> <?php echo $tot; ?> </h2>
                                    <p class="text-muted">Customers</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-6 col-md-6">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Total Transactions</h4>

                            <div class="widget-chart-1">
                                <div class="widget-detail-1">
                                    <?php
                                    $transactiontotQuery = "SELECT COUNT(tblid) AS tootransaction FROM escrowsify_orders";
                                    $runQuerytr = mysqli_query($con,$transactiontotQuery);
                                    $tottransactionfetch = mysqli_fetch_array($runQuerytr);
                                    $tottootransaction = $tottransactionfetch['tootransaction'];
                                    ?>
                                    <h2 class="p-t-10 m-b-0"> <?php echo $tottootransaction; ?> </h2>
                                    <p class="text-muted">Transactions</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->



                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Total Refunds</h4>

                            <div class="widget-chart-1">
                                <div class="widget-detail-1">
                                    <?php
                                    $toorefunsnfetchtotQuery = "SELECT COUNT(tblid) AS toorefuns FROM escrowsify_tblrefunds";
                                    $runQuerytoorefunsnfetchtotQuery = mysqli_query($con,$toorefunsnfetchtotQuery);
                                    $toorefunsnfetch = mysqli_fetch_array($runQuerytoorefunsnfetchtotQuery);
                                    $totoorefunsn = $toorefunsnfetch['toorefuns'];
                                    ?>
                                    <h2 class="p-t-10 m-b-0"> <?php echo $totoorefunsn; ?> </h2>
                                    <p class="text-muted">Refunds</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-6 col-md-6">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Total Payouts</h4>

                            <div class="widget-chart-1">
                                <div class="widget-detail-1">
                                    <?php
                                    $toPayoutsnfetchtotQuery = "SELECT COUNT(tblid) AS Payouts FROM escrowsify_orders WHERE  cancelled=0";
                                    $runQuerytoPayoutsnfetchtotQuery = mysqli_query($con,$toPayoutsnfetchtotQuery);
                                    $toPayoutsnfetch = mysqli_fetch_array($runQuerytoPayoutsnfetchtotQuery);
                                    $toPayoutsn = $toPayoutsnfetch['Payouts'];
                                    ?>
                                    <h2 class="p-t-10 m-b-0"> <?php echo $toPayoutsn; ?> </h2>
                                    <p class="text-muted">Payouts</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>

            </div> <!-- container -->

        </div> <!-- content -->

        <?php
        include "template/footer.php";
        ?>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    <!-- Right Sidebar -->
    <?php
        include "template/notification.php";
    ?>
    <!-- /Right-bar -->

</div>
<!-- END wrapper -->


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

<!--Morris Chart-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>

<!-- Dashboard init -->
<script src="assets/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>