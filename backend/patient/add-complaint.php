<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['PID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "Add Complaint";
include("../AdminLTE/header.php");

if (isset($_POST['submit'])) {
//getting post values

    $mobileno = $_SESSION['MobileNo'];
    $fullname = $_POST['fullname'];
    $complaint = $_POST['complaint'];
    $status = "Pending";
    $user = "Patient";


    $query = "insert into complaint(FullName, MobileNo, User, Complaint, Status) values('$fullname','$mobileno','$user','$complaint','$status')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Complaint added Successfully.")</script>';
        echo "<script>window.location.href='complaint-status.php'</script>";
    } else {
        echo "<script>alert('Complaint went wrong. Please try again.');</script>";
        echo "<script>window.location.href='add-complaint.php'</script>";
    }
}

?>


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
                            <a href="view-tests.php" class="nav-link ">
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
                                    <a href="view-tests.php" class="nav-link ">
                                        <i class="nav-icon fa fa-bookmark "></i>
                                        <p>View Test</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item has-treeview menu-close">
                            <a href="view-vaccine.php" class="nav-link ">
                                <i class="nav-icon fas fa-syringe"></i>
                                <p>
                                    Vaccine
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="new-vaccine.php" class="nav-link">
                                        <i class="nav-icon fa fa-plus "></i>
                                        <p>New Vaccine App</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-vaccine.php" class="nav-link ">
                                        <i class="nav-icon fas fa-syringe "></i>
                                        <p>View Vaccine</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="news.php" class="nav-link ">
                                <i class="nav-icon fas fa-globe"></i>
                                <p>
                                    News
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview menu-open">
                            <a href="complaint-status.php" class="nav-link active">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Complaints
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-complaint.php" class="nav-link active">
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
                            <h1>Patient | Add Complaint</h1>
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Complaint</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">

                    <div class="row">

                        <form method="post" name="addcomplaint">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default offset-6 col-6 col-sm-12">
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Employee</label>
                                            <div class="input-group">
                                                <input type="text"
                                                       name="fullname" value="<?= $_SESSION['FlName']; ?>"
                                                       class="form-control" readonly>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group col-md-12 col-sm-12">
                                            <label>Add Complaint</label>
                                            <div class="input-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"
                                                          name="complaint" required></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group offset-md-3  offset-sm-2 col-sm-6 col-md-6">
                                            <div class="text-center">
                                                <button type="submit" value="submit" name="submit" id="submit"
                                                        class="btn btn-block bg-gradient-info btn-lg ">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>

                            </div>
                            <!-- /.card -->
                        </form>

                        <!-- /.col -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>

<?php include("../AdminLTE/footer.php"); ?>