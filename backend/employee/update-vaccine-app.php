<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['EID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "Update Vaccine Information";
include("../AdminLTE/header.php");

if (isset($_POST['update'])) {
    $vid = intval($_GET['vid']);
    $status =  $_POST['status'];
    $bn = $_POST['batchno'];

    $query = mysqli_query($con, "update vaccine set Status='$status',BatchNo='$bn' where vid='$vid'");

    $ava = "Online";
    $eid = $_SESSION['EID'];
    $query1 = mysqli_query($con, "update employee set Availability='$ava' where eid='$eid'");


    echo '<script>alert("Status successfully Updated.")</script>';
    echo "<script>window.location.href='vaccinated-details.php'</script>";
}

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
                            <h1 class="m-0 text-dark">Employee | Update(Assigned) Vaccine Information</h1>
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


                    <div class="offset-lg-3">
                        <form method="post" name="vaccineupdate">

                            <div class="row">

                                <div class="col-lg-8">

                                    <!-- Basic Card Example -->
                                    <div class="card shadow mb-4">

                                        <?php
                                        $vid = intval($_GET['vid']);
                                        $query = mysqli_query($con, "select * from vaccine where vid='$vid'");
                                        $cnt = 1;

                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>


                                            <div class="card-body">
                                                <div class="form-group col-12">
                                                    <label>Vaccine</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?= $row['VacName']; ?>"
                                                               name="vaccine"
                                                               class="form-control" readonly>
                                                        <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-syringe"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>Dose</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?= $row['Dose']; ?>"
                                                               name="dose"
                                                               class="form-control" readonly>
                                                        <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-sort-numeric-up"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>Place</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?= $row['Place']; ?>"
                                                               name="place"
                                                               class="form-control" readonly>
                                                        <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-location-arrow"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control" required>
                                                        <option value="">Select Status</option>
                                                        <option value="Vaccinated">Vaccinated</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                        <option value="Rejected">Rejected</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>Batch No</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?= $row['BatchNo']; ?>"
                                                               name="batchno"
                                                               class="form-control" placeholder="Enter Batch No"
                                                               required>
                                                        <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-star"></i></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <?php
                                                if ($row['BatchNo'] == '') {
                                                    ?>
                                                    <div class="form-group">
                                                        <br>

                                                        <div class="text-center">
                                                            <button type="submit" value="submit" name="update"
                                                                    class="btn btn-block bg-gradient-info btn-lg ">
                                                                S u b m i t
                                                            </button>
                                                        </div>
                                                    </div>

                                                <?php } ?>

                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>


<?php include("../AdminLTE/footer.php"); ?>