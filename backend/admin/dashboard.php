<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['AID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "Admin Dashboard";
include("../AdminLTE/header.php");

?>


    <div class="admin-dashboard">
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
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa fa-user"></i>: <b> <?= $_SESSION['FlName'] ?> </b>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar     elevation-4">
            <!-- Brand Logo -->
            <a href="dashboard.php" class="brand-link">
                <img src="../../images/logo.png" alt="AdminLTE Logo" class="brand-image  elevation-3"
                     style="opacity: .8">
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
                            <a href="manage-employee.php" class="nav-link">
                                <i class="nav-icon fa fa-user-friends"></i>
                                <p>
                                    Employee
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-employee.php" class="nav-link">
                                        <i class="nav-icon fa fa-plus "></i>
                                        <p>Add Employee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="manage-employee.php" class="nav-link">
                                        <i class="nav-icon fas fa-user "></i>
                                        <p>Manage Employee</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="manage-patient.php" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Patient
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-patient.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus "></i>
                                        <p>Add Patient</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="manage-patient.php" class="nav-link">
                                        <i class="nav-icon fa fa-users "></i>
                                        <p>Manage Patient</p>
                                    </a>
                                </li>
                            </ul>
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
                                    <a href="assigned-tests.php" class="nav-link">
                                        <i class="nav-icon fas fa-microscope "></i>
                                        <p>Assigned Tests</p>
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
                            <a href="manage-vaccine.php" class="nav-link">
                                <i class="nav-icon fas fa-syringe"></i>
                                <p>
                                    Vaccine
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-vaccine.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus "></i>
                                        <p>Add Vaccine</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="manage-vaccine.php" class="nav-link">
                                        <i class="nav-icon fas fa-prescription-bottle "></i>
                                        <p>Manage Vaccine</p>
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
                            <a href="manage-news.php" class="nav-link">
                                <i class="nav-icon fas fa-globe-asia"></i>
                                <p>
                                    News
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-news.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus "></i>
                                        <p>Add News</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="published-news.php" class="nav-link">
                                        <i class="nav-icon fas fa-globe"></i>
                                        <p>Published News</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a href="complaints.php" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Complaints
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="contactus.php" class="nav-link ">
                                <i class="nav-icon fas fa-headset"></i>
                                <p>
                                    ContactUs
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
                            <h1 class="m-0 text-dark">Admin Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
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

                    <?php

                    $query1 = mysqli_query($con, "select * from testrecord");
                    $totaltestrecord = mysqli_num_rows($query1);

                    $query2 = mysqli_query($con, "select * from employee");
                    $totalemployee = mysqli_num_rows($query2);

                    $query3 = mysqli_query($con, "select * from patient");
                    $totalpatient = mysqli_num_rows($query3);

                    $query4 = mysqli_query($con, "select * from vaccinetype");
                    $totalvaccine = mysqli_num_rows($query4);

                    $query5 = mysqli_query($con, "select * from complaint");
                    $totalcomplaints = mysqli_num_rows($query5);

                    $query6 = mysqli_query($con, "select * from news");
                    $totalnews = mysqli_num_rows($query6);

                    $query7 = mysqli_query($con, "select * from contactus");
                    $totalcontactus = mysqli_num_rows($query7);

                    $query8 = mysqli_query($con, "select * from vaccine");
                    $totalvacapp = mysqli_num_rows($query8);


                    ?>

                    <div class="row">


                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <a href="all-tests.php">
                                <div class="small-box bg-blue">
                                    <div class="inner">

                                        <h3><?= $totaltestrecord ?></h3>
                                        <p>Total Test Record</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-bookmark"></i>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <a href="vaccinated-details.php">
                                <div class="small-box bg-red ">
                                    <div class="inner">

                                        <h3><?= $totalvacapp ?></h3>
                                        <p>Total Vaccination Appointment</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-syringe"></i>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <a href="manage-employee.php">
                                <div class="small-box bg-pink">
                                    <div class="inner">


                                        <h3><?= $totalemployee ?></h3>
                                        <p>Total Employee</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <a href="manage-patient.php">
                                <div class="small-box bg-orange ">
                                    <div class="inner">


                                        <h3><?= $totalpatient ?></h3>
                                        <p>Total Patient</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa  fa-users"></i>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <a href="manage-vaccine.php">
                                <div class="small-box bg-gradient-green">

                                    <div class="icon">
                                        <i class="fa fa-syringe"></i>
                                    </div>
                                    <div class="inner">


                                        <h3><?= $totalvaccine ?></h3>


                                        <p>Total Vaccine(Type)</p>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <a href="published-news.php">
                                <div class="small-box bg-info">
                                    <div class="inner ">
                                        <h3><?= $totalnews ?></h3>
                                        <p>Total News</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <a href="complaints.php">
                                <div class="small-box bg-gray ">
                                    <div class="inner">

                                        <h3><?= $totalcomplaints ?></h3>
                                        <p>Total Complaints</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-comments"></i>
                                    </div>

                                </div>
                            </a>
                        </div>

                        <div class="no-print col-lg-3 col-6">
                            <!-- small box -->
                            <a href="contactus.php">
                                <div class="small-box bg-yellow ">
                                    <div class="inner">

                                        <h3><?= $totalcontactus ?></h3>
                                        <p>Total ContactUs</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>

                                </div>
                            </a>
                        </div>


                        <!-- ./col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Patients By District</h3>
                                    </div>
                                </div>
                                <div id="display" class="myCustom1">
                                    <?php include("charts/chart-patient.php"); ?>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-lg-6">


                            <div class="card  ">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form name="assignto" method="post">
                                            <table class="table table-bordered text-center" id="dataTable">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Employee</th>
                                                    <th>Availability</th>

                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php $query = mysqli_query($con, "select * from employee");
                                                $cnt = 1;

                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td>Dr <?php echo $row['FullName']; ?></td>

                                                        <?php if ($row['Availability'] == 'Online') { ?>
                                                            <td class="text-green text-bold"><?php echo $row['Availability']; ?></td>
                                                        <?php }else{ ?>
                                                            <td class="text-red text-bold"><?php echo $row['Availability']; ?></td>
                                                        <?php } ?>



                                                    </tr>
                                                    <?php

                                                    $cnt++;

                                                }

                                                ?>

                                                </tbody>


                                            </table>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>


<?php include("../AdminLTE/footer.php"); ?>