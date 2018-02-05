<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme"
                     class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="#"><?php echo $_SESSION['fisrtname'].' '.$_SESSION['lastname'];?></a></h5>
            <ul class="list-inline">
                <li>
                    <a href="profile.php">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>

                <li>
                    <a href="plugin/logout.php" class="text-custom">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>

                <li>
                    <a href="index.php" class="waves-effect <?php if($page == "Home"){echo "active";}  ?>"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="customers.php" class="waves-effect <?php if($page == "Customer"){echo "active";}  ?>"><i class="zmdi zmdi-format-underlined"></i>
                        <span> Customers List </span> </a>
                </li>

                <li>
                    <a href="refundlist.php" class="waves-effect <?php if($page == "Refunds"){echo "active";}  ?>"><i class="zmdi zmdi-format-underlined"></i>
                        <span> Refund List </span> </a>
                </li>

                <li>
                    <a href="transactions.php" class="waves-effect <?php if($page == "Transaction"){echo "active";}  ?>"><i class="zmdi zmdi-format-underlined"></i>
                        <span> Transaction List </span> </a>
                </li>



            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>