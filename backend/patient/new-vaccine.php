<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['PID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "New Vaccine Appointment Dashboard";
include("../AdminLTE/header.php");

if (isset($_POST['submit'])) {
//getting post values

    $mob = $_SESSION['MobileNo'];
    $vt = $_POST['vaccinetype'];
    $dose = $_POST['dose'];
    $zhc = "ZHC";
    $do_vac = $_POST['appdaytime'];
    $status = "Pending";

    $query = "insert into vaccine(PtnMobileNo,Dose,VacName,Place,DateOfVac,Status) values('$mob','$dose','$vt','$zhc','$do_vac','$status');";
    $result = mysqli_multi_query($con, $query);
    if ($result) {
        echo '<script>alert("Your Vaccine request successfully submitted.")</script>';
        echo "<script>window.location.href='view-vaccine.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href='new-vaccine.php'</script>";
    }
}

?>

    <script>
        function datetimeAvailability() {

            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'datetimevac=' + $("#appdaytime").val(),
                type: "POST",
                success: function (data) {
                    $("#datetime-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {
                }
            });
        }


    </script>

    <div class="patient-dashboard">
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
                    <a class="nav-link" href="logout.php" role="button">
                        <i class="fas fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar   elevation-4">
            <!-- Brand Logo -->
            <a href="dashboard.php" class="brand-link">
                <img src="../../images/logo.png" alt="AdminLTE Logo" class="brand-image  elevation-3"
                     style="opacity: .8">
                <span class="brand-text center">Zone Health Care</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!--                    <a href="#" class="d-block"> --><? //= $_SESSION['login_user'] ?><!--</a>-->

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
                            <a href="view-tests.php" class="nav-link">
                                <i class="nav-icon fas fa-magic"></i>
                                <p>
                                    Test
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="new-test.php" class="nav-link ">
                                        <i class="nav-icon fas fa fa-calendar-plus "></i>
                                        <p>New Test App</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-tests.php" class="nav-link">
                                        <i class="nav-icon fa fa-bookmark "></i>
                                        <p>View Test</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item has-treeview menu-open">
                            <a href="view-vaccine.php" class="nav-link active">
                                <i class="nav-icon fas fa-syringe"></i>
                                <p>
                                    Vaccine
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="new-vaccine.php" class="nav-link active">
                                        <i class="nav-icon fa fa-plus "></i>
                                        <p>New Vaccine App</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-vaccine.php" class="nav-link">
                                        <i class="nav-icon fas fa-syringe "></i>
                                        <p>View Vaccine</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="news.php" class="nav-link">
                                <i class="nav-icon fas fa-globe"></i>
                                <p>
                                    News
                                </p>
                            </a>
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


                        <li class="nav-item has-treeview">
                            <a href="profile.php" class="nav-link ">
                                <i class="nav-icon fas fa fa-user-alt"></i>
                                <p>
                                    Profile
                                </p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <h1>Patient | New Vaccine Appointment Dashboard</h1>
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Vaccine</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <form name="newtesting" method="post">
                        <div class="row">

                            <div class="offset-lg-3 col-lg-6">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Add Vaccine Appoitment</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Vaccine</label>
                                            <select class="form-control" type="text" name="vaccinetype"
                                                    data-placeholder="Select Vaccine Type" style="width: 100%" required>
                                                <option value="">Select Vaccine Type</option>
                                                <?php
                                                $vaccines = mysqli_query($con, "select * from vaccinetype where Status='Available'");
                                                foreach ($vaccines as $vaccine) {

                                                    if ($vaccine) {
                                                        ?>
                                                        <option value="<?= $vaccine['VacName']; ?>"><?= $vaccine['VacName'];; ?></option>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <option value="error">No Vaccine Found</option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Dose</label>
                                            <select class="form-control " id="dose" name="dose" required>
                                                <option value="">Select Dose</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="Booster">Booster</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Time Slot for Test</label>
                                            <input type="datetime-local" id="appdaytime" name="appdaytime"
                                                   class="form-control" title="Select Valid Date and Time"
                                                   required onblur="datetimeAvailability()">
                                        </div>

                                        <span id="datetime-availability-status"></span>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-md btn-block"
                                                   name="submit"
                                                   id="submit">
                                        </div>


                                    </div>

                                </div>

                                <div class="p text-center">
                                    <span><b>Note:</b> Registration hours are available from <b>8AM</b> to <b>5PM</b> </span><br>
                                    <span>Failed to select available time request will be rejected.</span>
                                </div>


                            </div>

                        </div>
                    </form>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>

<?php include("../AdminLTE/footer.php"); ?>