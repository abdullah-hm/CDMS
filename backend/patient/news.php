<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['PID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "News Dashboard";
include("../AdminLTE/header.php");


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
                            <a href="news.php" class="nav-link active">
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
                            <h1>Patient | News Dashboard</h1>
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">News</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-12" id="accordion">

                                <?php

                                $query = mysqli_query($con, "select * from news where status='Yes'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="card card-primary card-outline">
                                        <a class="d-block w-100" data-toggle="collapse" href="#collapse<?= $cnt; ?>">
                                            <div class="card-header">
                                                <h4 class="card-title w-50">
                                                    <?php echo $cnt; ?>.<?php echo $row['variant']; ?>
                                                </h4>

                                                <h4 class="card-title w-50 text-right text-red">
                                                     Published: <?php echo $row['pubdate']; ?>
                                                </h4>
                                            </div>
                                        </a>
                                        <div id="collapse<?= $cnt; ?>" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php echo $row['infor']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $cnt++;
                                } ?>
                                </tbody>

                            </div>
                        </div>

                    </section>


                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>

<?php include("../AdminLTE/footer.php"); ?>