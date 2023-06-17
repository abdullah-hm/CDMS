<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['EID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "New Vaccine Order";
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
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
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
                            <a href="dashboard.php" class="nav-link ">

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

                        <li class="nav-item has-treeview menu-open">
                            <a href="vaccinated-details.php" class="nav-link active">
                                <i class="nav-icon fas fa-syringe"></i>
                                <p>
                                    Vaccine
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="new-vaccine-app.php" class="nav-link active">
                                        <i class="nav-icon fas fa-plus "></i>
                                        <p>New Vaccine App</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="vaccinated-details.php" class="nav-link ">
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
                            <h1 class="m-0 text-dark">Employee | New(Assigned) Vaccine Appointments</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Employee</a></li>
                                <li class="breadcrumb-item active">Vaccine</li>
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


                        <!-- ./col -->

                        <div class="card col-lg-12 col-sm-12">
                            <div class="card-header ">
                                <h3>List of All Assigned Vaccine Appointments
                                    <a href="#" class="no-print btn btn-warning float-right"
                                       onclick="window.print();"><i
                                                class="fas fa-print"></i> Print
                                    </a>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Patient MobileNo</th>
                                        <th>Vaccine</th>
                                        <th>Dose</th>
                                        <th>Place</th>
                                        <th>Reserved Date</th>
                                        <th>Batch No</th>
                                        <th>Status</th>
                                        <th>App Reg DT</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>


                                    <?php
                                    $eid = $_SESSION['EID'];

                                    $query = mysqli_query($con, "select * from vaccine where EID='$eid' && Status='Confirmed' ");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>


                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row['PtnMobileNo']; ?></td>
                                            <td><?php echo $row['VacName']; ?></td>
                                            <td><?php echo $row['Dose']; ?></td>
                                            <td><?php echo $row['Place']; ?></td>
                                            <td><?php echo $row['DateOfVac']; ?></td>
                                            <td><?php echo $row['BatchNo']; ?></td>
                                            <td><?php echo $row['Status']; ?></td>
                                            <td><?php echo $row['AppDate']; ?></td>
                                            <td class="text-center">

                                                <a href="update-vaccine-app.php?vid=<?php echo $row['vid']; ?>">
                                                    <i class="fas fa-edit" style="color:blue"></i></a>

                                            </td>
                                        </tr>
                                        <?php $cnt++;
                                    } ?>
                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Patient MobileNo</th>
                                        <th>Vaccine</th>
                                        <th>Dose</th>
                                        <th>Place</th>
                                        <th>Reserved Date</th>
                                        <th>Batch No</th>
                                        <th>Status</th>
                                        <th>App Reg DT</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
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