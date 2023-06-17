<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['AID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "Add Vaccine Dashboard";
include("../AdminLTE/header.php");



if (isset($_POST['submit'])) {
//getting post values

    $vn = $_POST['vacname'];
    $country = $_POST['country'];
    $status = $_POST['ava'];

    $query = "insert into vaccinetype(VacName,Country,Status) values('$vn','$country','$status');";
    $result = mysqli_multi_query($con, $query);
    if ($result) {
        echo '<script>alert("Vaccine successfully Added.")</script>';
        echo "<script>window.location.href='manage-vaccine.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href='add-vaccine.php'</script>";
    }
}

?>

    <script>
        function vacnameAvailability() {

            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'vac_name=' + $("#vacname").val(),
                type: "POST",
                success: function (data) {
                    $("#vacname-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {
                }
            });
        }


    </script>

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
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" >
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
                            <a href="dashboard.php" class="nav-link ">

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
                        <li class="nav-item has-treeview menu-open">
                            <a href="manage-vaccine.php" class="nav-link active">
                                <i class="nav-icon fas fa-syringe"></i>
                                <p>
                                    Vaccine
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-vaccine.php" class="nav-link active">
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
                            <h1 class="m-0 text-dark">ADMIN | Add Vaccine</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
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
                    <form name="newvaccine" method="post">
                        <div class="row">

                            <div class="offset-lg-3 col-lg-6">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Add Vaccine Details</h6>
                                    </div>
                                    <div class="card-body">




                                        <div class="form-group">
                                            <label>Vaccine</label>
                                            <input type="text" placeholder="Enter Vaccine Name" id="vacname" name="vacname"
                                                   class="form-control" title="Enter Vaccine Name"
                                                   required onblur="vacnameAvailability()">
                                        </div>

                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" placeholder="Enter Vaccine Country" id="country" name="country"
                                                   class="form-control" title="Enter Vaccine country"
                                                   required>
                                        </div>

                                        <div class="form-group">
                                            <label>Availability</label>
                                            <select name="ava" class="form-control" required>
                                                <option value="">Select Availability</option>
                                                <option value="Available">Available</option>
                                                <option value="Unavailable">Unavailable</option>
                                            </select>
                                        </div>

                                        <span id="vacname-availability-status"></span>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-md btn-block"
                                                   name="submit"
                                                   id="submit">
                                        </div>


                                    </div>

                                </div>




                            </div>

                        </div>
                    </form>
                    <!-- /.row -->
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>


<?php include("../AdminLTE/footer.php"); ?>