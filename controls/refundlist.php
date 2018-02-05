<?php
require "plugin/config.php";
require "plugin/logincheck.php";
$title = "Refunds";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="A fully featured payment system for ecommerce companies">
    <meta name="author" content="Team13">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->
    <title>Escrowsify Pay - <?php echo $title; ?></title>

    <!-- DataTables -->
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- App CSS -->
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.2.0/css/iziToast.css" rel="stylesheet"/>

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
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">Refund List</h4>

                            <table id="datatables" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Customer's Name</th>
                                    <th>Product' Name</th>
                                    <th>Business Name</th>
                                    <th>Amount To Customer</th>
                                    <th>Amount To Merchant</th>
                                    <th>Cancelled Date</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $selectcustomerRegisteration = "SELECT escrowsify_tblrefunds.orderid AS orderidn,escrowsify_tblrefunds.amountcustomer,escrowsify_tblrefunds.amountmerchant,escrowsify_tblrefunds.createdon
                                                                COALESCE((SELECT escrowsify_tblcustomer.firstname,escrowsify_tblcustomer.lastname,escrowsify_tblproduct.productname,
                                                                            escrowsify_orders.tblid,escrowsify_orders.cancelled,escrowsify_orders.created_on FROM escrowsify_orders
                                                                            INNER JOIN escrowsify_tblproduct ON escrowsify_orders.tblid=escrowsify_tblproduct.tblid INNER JOIN escrowsify_tblcustomer
                                                                            ON escrowsify_tblcustomer.tblid = escrowsify_orders.tblid WHERE escrowsify_orders.tblid = orderidn),0) AS TrueCount";
                                $runQuery = mysqli_query($con, $selectcustomerRegisteration);
                                while ($row = mysqli_fetch_array($runQuery)) {
                                    $tblid = $_POST['tblid'];
                                    $firstname = $_POST['firstname'];
                                    $lastname = $_POST['lastname'];
                                    $amountcustomer = $_POST['amountcustomer'];
                                    $amountmerchant = $_POST['amountmerchant'];
                                    $productname = $_POST['productname'];
                                    $createdon = $_POST['createdon'];
                                    ?>
                                    <tr>
                                        <td><?php echo $firstname . ' ' . $lastname; ?></td>
                                        <td><?php echo $productname; ?></td>
                                        <td>Escrowsify Shop</td>
                                        <td><?php echo $amountcustomer; ?></td>
                                        <td><?php echo $amountmerchant; ?></td>>
                                        <td><?php echo $createdon; ?></td>

                                    </tr>
                                <?php } ?>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>Customer's Name</th>
                                    <th>Product' Name</th>
                                    <th>Business Name</th>
                                    <th>Amount To Customer</th>
                                    <th>Amount To Merchant</th>
                                    <th>Cancelled Date</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


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
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- Datatables-->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

<!-- Datatable init js -->
<script src="assets/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.2.0/js/iziToast.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatables').dataTable();

    });

    $(".delefuc").click(function () {
        var useridn = $(this).data("useridn");
        var page = "delefunc";
        var table = "escrowsify_tblcustomer";
        var dataString = "tblid=" + useridn + "page=" + page + "table=" + table;

        iziToast.question({
            timeout: 2000000,
            close: true,
            overlay: true,
            toastOnce: true,
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Are you sure about that? You will not be able to recover this customer',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {
                    $.ajax({
                        type: "POST",
                        url: "plugin/controls.php",
                        data: dataString,
                        cache: false,
                        success: function (result) {
                            if (result) {
                                iziToast.success({
                                    timeout: 5000,
                                    title: 'Done!',
                                    message: "Your customer has been deleted sucessfully. Please wait, the window refresh shortly."
                                });


                                setTimeout(
                                    function () {
                                        location.reload();
                                    }, 5000);
                            }
                        }
                    });
                    instance.hide(toast, {transitionOut: 'fadeOut'}, 'button');

                }, true],
                ['<button>NO</button>', function (instance, toast) {

                    instance.hide(toast, {transitionOut: 'fadeOut'}, 'button');

                }]
            ],
            onClosing: function (instance, toast, closedBy) {
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function (instance, toast, closedBy) {
                console.info('Closed | closedBy: ' + closedBy);
            }
        });

    });


</script>

</body>

</html>