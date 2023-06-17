<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['EID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "Employee Profile";
include("../AdminLTE/header.php");


$eid = $_SESSION['EID'];

$query = mysqli_query($con, "select * from employee where eid='$eid'");
$cnt = 1;
while ($row = mysqli_fetch_array($query)) {
    $oldpass = $row['Password'];
    $cnt++;
}


if (isset($_POST['update'])) {
//getting post values


    if ($_POST['pwd']) {
        $pwd = $_POST['pwd'];
    } else {
        $pwd = $oldpass;
    }

    $email = $_POST['mail'];
    $flname = $_POST['flname'];
    $gender = $_POST['gender'];
    $addr = $_POST['addr'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mob'];
    $ava = $_POST['ava'];

    $query = "update employee set FullName='$flname',Gender='$gender',Address='$addr',Nic='$nic',Dob='$dob',MobileNo='$mobile',Availability='$ava',Email='$email',Password='$pwd'  where eid='$eid'";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Employee Profile Updated successfully.")</script>';
        echo "<script>window.location.href='profile.php'</script>";
    } else {
        echo "<script>alert('Employee Profile went wrong. Please try again.');</script>";
        echo "<script>window.location.href='profile.php'</script>";
    }
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
                            <a href="profile.php" class="nav-link active">
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
                            <h1 class="m-0 text-dark">Employee | Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Employee</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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

                        <form method="post" name="addemployee">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <!-- /.card-header -->


                                <div class="card-body">
                                    <div class="row">

                                        <?php
                                        $eid = $_SESSION['EID'];
                                        $query = mysqli_query($con, "select * from employee where eid='$eid'");

                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>

                                            <div class="form-group col-sm-6 col-md-6">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <input type="email"
                                                           name="mail"
                                                           required
                                                           class="form-control" value="<?= $row['Email']; ?>"
                                                           readonly>
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-6 col-md-6">
                                                <label>Password</label>
                                                <div class="input-group">
                                                    <input type="password" placeholder="•••••••"
                                                           name="pwd" minlength="4"
                                                           class="form-control">
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-lock"></i></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group col-sm-6 col-md-6">
                                                <label>Full Name</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $row['FullName']; ?>"
                                                           name="flname"
                                                           class="form-control" required>
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-user"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-6 col-md-6 ">
                                                <label>Gender</label>
                                                <select name="gender" class="form-control" required>
                                                    <?php if ($row['Gender'] == 'Male') { ?>
                                                        <option value="Male" selected>Male</option>
                                                        <option value="Female">Female</option>
                                                    <?php } else { ?>
                                                        <option value="Female" selected>Female</option>
                                                        <option value="Male">Male</option>
                                                    <?php } ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-sm-6 col-md-6">
                                                <label>Address</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $row['Address']; ?>"
                                                           name="addr"
                                                           class="form-control" required>
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-user"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-6 col-md-6">
                                                <label>NIC No</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $row['Nic']; ?>"
                                                           name="nic"
                                                           class="form-control" minlength="4" maxlength="12" required>
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa fa-id-card"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-6 col-md-6">
                                                <label>DOB</label>
                                                <div class="input-group date" id="empdob" data-target-input="nearest">
                                                    <input type="text" name="dob" value="<?= $row['Dob']; ?>"
                                                           class="form-control datetimepicker-input"
                                                           data-target="#empdob" required/>
                                                    <div class="input-group-append" data-target="#empdob"
                                                         data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group col-sm-6 col-md-6">
                                                <label>Contact No</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $row['MobileNo']; ?>"
                                                           name="mob"
                                                           class="form-control" minlength="9" maxlength="10" required>
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fas fa-phone-alt"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6 col-md-6 ">
                                                <label>Availability</label>
                                                <select name="ava" class="form-control" required>
                                                    <?php if ($row['Availability'] == 'Online') { ?>
                                                        <option value="Online" selected>Online</option>
                                                        <option value="Offline">Offline</option>
                                                    <?php } else { ?>
                                                        <option value="Offline" selected>Offline</option>
                                                        <option value="Online">Online</option>
                                                    <?php } ?>

                                                </select>
                                            </div>


                                            <div class="form-group col-sm-6 col-md-6 margin-top">
                                                <br>

                                                <div class="text-center">
                                                    <button type="submit" value="submit" name="update"
                                                            class="btn btn-block bg-gradient-info btn-lg ">
                                                        U p d a t e
                                                    </button>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>

                            </div>
                            <!-- /.card -->
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