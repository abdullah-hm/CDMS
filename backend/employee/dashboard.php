<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['EID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "Employee Dashboard";
include("../AdminLTE/header.php");

?>



    <div class="employee-dashboard">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" >
                        <i class="fas fa fa-user"></i>: Dr <b> <?= $_SESSION['FlName'] ?> </b>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar     elevation-4">
            <!-- Brand Logo -->
            <a href="dashboard.php" class="brand-link">
                <img src="../../images/logo.png" alt="AdminLTE Logo" class="brand-image  elevation-3" style="opacity: .8">
                <span class="brand-text center">Zone Health Care</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link active">

                                <i class=" nav-icon fas fa-tachometer-alt"></i>

                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview menu-close">
                            <a href="all-tests.php" class="nav-link">
                                <i class="nav-icon fa fas fa-file-medical-alt"></i>
                                <p>
                                    Testing
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="new-tests.php" class="nav-link">
                                        <i class="nav-icon fas fa-microscope "></i>
                                        <p>New Tests</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="start-tests.php" class="nav-link">
                                        <i class="nav-icon fas fa-microscope "></i>
                                        <p>Start Tests</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="sample-collected.php" class="nav-link">
                                        <i class="nav-icon fas fa-microscope "></i>
                                        <p>Sample Collected</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="sent-to-lab.php" class="nav-link">
                                        <i class="nav-icon fas fa-microscope "></i>
                                        <p>Sent To Lab</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="report-delivered.php" class="nav-link">
                                        <i class="nav-icon fas fa-microscope "></i>
                                        <p>Testing Report</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="all-tests.php" class="nav-link">
                                        <i class="nav-icon fas fa-microscope "></i>
                                        <p>All Tests</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview menu-close">
                            <a href="vaccinated-details.php" class="nav-link">
                                <i class="nav-icon fas fa-syringe"></i>
                                <p>
                                    Vaccine
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="new-vaccine-app.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus "></i>
                                        <p>New Vaccine App</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="vaccinated-details.php" class="nav-link">
                                        <i class="nav-icon fa fas fa-heartbeat "></i>
                                        <p>Vaccinated Details</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item has-treeview menu-close">
                            <a href="complaint-status.php" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Complaints
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-complaint.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus "></i>
                                        <p>Add Complaint</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="complaint-status.php" class="nav-link">
                                        <i class="nav-icon fas fa-user-cog "></i>
                                        <p>Complaint Status</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="profile.php" class="nav-link ">
                                <i class="nav-icon fas fa-user-edit"></i>
                                <p>
                                  Profile
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="logout.php" class="nav-link ">
                                <i class="nav-icon  fas fa-sign-out-alt "></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Employee Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Employee</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">

                        <?php
                        $empid = $_SESSION['EID'];
                        //Total tests


                        //Assigned tests
                        $query1 = mysqli_query($con, "select * from testrecord where ReportStatus='Assigned' && AssignedtoEmpId='$empid'");
                        $totalassigned = mysqli_num_rows($query1);
                        //On the way for sample collection
                        $query2 = mysqli_query($con, "select * from testrecord where ReportStatus='Start Test' && AssignedtoEmpId='$empid' ");
                        $totalontheway = mysqli_num_rows($query2);
                        //Sample Collected
                        $query3 = mysqli_query($con, "select * from testrecord where ReportStatus='Sample Collected' && AssignedtoEmpId='$empid'");
                        $totalsamplecollected = mysqli_num_rows($query3);
                        //Sent for lab
                        $query4 = mysqli_query($con, "select * from testrecord where ReportStatus='Sent to Lab' && AssignedtoEmpId='$empid' ");
                        $totalsenttolab = mysqli_num_rows($query4);

                        //Report Delivered
                        $query5 = mysqli_query($con, "select * from testrecord where ReportStatus='Delivered' && AssignedtoEmpId='$empid'");
                        $totaldelivered = mysqli_num_rows($query5);

                        $totaltest = $totalassigned + $totalontheway + $totalsamplecollected + $totalsenttolab + $totaldelivered ;

                        $query6 = mysqli_query($con, "select * from vaccine where EID='$empid' and Status='Confirmed'");
                        $totalnewvac = mysqli_num_rows($query6);

                        $query7 = mysqli_query($con, "select * from vaccine where EID='$empid'");
                        $totalvac = mysqli_num_rows($query7);

                        ?>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">

                                    <h3><?php echo $totaltest; ?></h3>

                                    <p>Total Tests</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-virus fa-2x "></i>
                                </div>
                                <a href="all-tests.php" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">

                                <div class="icon">
                                    <i class="fas fa-user fa-2x"></i>
                                </div>
                                <div class="inner">
                                    <h3><?php echo $totalassigned; ?></h3>

                                    <p>New Assigned Tests</p>
                                </div>
                                <a href="new-tests.php" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $totalontheway; ?></h3>
                                    <p>Start To Collect Sample Test</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa fa-calendar-check fa-2x"></i>
                                </div>
                                <a href="start-tests.php" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-purple ">
                                <div class="inner">
                                    <h3><?php echo $totalsamplecollected; ?></h3>

                                    <p>Sample Collected Test</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-prescription-bottle fa-2x"></i>
                                </div>
                                <a href="sample-collected.php" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <h3><?php echo $totalsenttolab; ?></h3>

                                    <p>Send To Lab Test</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-microscope fa-2x"></i>
                                </div>
                                <a href="sent-to-lab.php" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-pink ">
                                <div class="inner">
                                    <h3><?php echo $totaldelivered; ?></h3>

                                    <p>Report Delivered Test</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clipboard-list fa-2x"></i>
                                </div>
                                <a href="report-delivered.php" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-gray ">
                                <div class="inner">
                                    <h3><?php echo $totalnewvac; ?></h3>

                                    <p>New Vaccine Appointments</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-syringe fa-2x"></i>
                                </div>
                                <a href="new-vaccine-app.php" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-red ">
                                <div class="inner">
                                    <h3><?php echo  $totalvac;  ?></h3>

                                    <p>Vaccine Appointments</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-syringe fa-2x"></i>
                                </div>
                                <a href="vaccinated-details.php" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>


<?php include("../AdminLTE/footer.php"); ?>