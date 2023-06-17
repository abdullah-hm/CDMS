<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['PID'])) {
    header('Location: logout.php');
}

include('../include/config.php');
$title = "View Appointment Report Dashboard";
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

                        <li class="nav-item has-treeview menu-open">
                            <a href="view-tests.php" class="nav-link active">
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
                                    <a href="view-tests.php" class="nav-link active">
                                        <i class="nav-icon fa fa-bookmark "></i>
                                        <p>View Test</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item has-treeview menu-close">
                            <a href="view-vaccine.php" class="nav-link">
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
                            <h1>Patient | View Test Appointment Dashboard</h1>
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Test</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class=" col-sm-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Test Results of Order No:
                                        <b><?php echo intval($_GET['oid']); ?></b></h3>
                                    <h3>
                                        <a href="#" class="no-print btn btn-warning float-right"
                                           onclick="window.print();"><i
                                                    class="fas fa-print"></i> Print
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <?php
                        $testid = intval($_GET['tid']);
                        $query = mysqli_query($con, "select * from testrecord
join patient on patient.MobileNo=testrecord.PatientMobileNumber
where  testrecord.id='$testid'");
                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <div class=" col-sm-6 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"><b>Personal Information</b></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <tr>
                                                <th>Full Name</th>
                                                <td><?php echo $row['FullName']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Mobile Number</th>
                                                <td><?php echo $row['MobileNo']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>DOB (Date of Birth)</th>
                                                <td><?php echo $row['Dob']; ?></td>
                                            </tr>


                                            <tr>
                                                <th>Full Address</th>
                                                <td><?php echo $row['Address']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>District</th>
                                                <td><?php echo $row['District']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Profile Reg Date</th>
                                                <td><?php echo $row['RegistrationDate']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class=" col-sm-6 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"><b>Test Information</b></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <tr>
                                                <th>Order Number</th>
                                                <td><?php echo $row['OrderNumber']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Test Type</th>
                                                <td><?php echo $row['TestType']; ?></td>
                                            </tr>


                                            <tr>
                                                <th>Time Slot</th>
                                                <td><?php echo $row['TestTimeSlot']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Report Status</th>
                                                <td><?php if ($row['ReportStatus'] == ''):
                                                        echo "Not Processed yet";
                                                    else:
                                                        echo $row['ReportStatus'];
                                                    endif;

                                                    ?></td>
                                            </tr>


                                            <?php if ($row['AssignedtoEmpId'] != ''): ?>
                                                <tr>
                                                    <th>Assign To</th>
                                                    <td>Dr <?php echo $row['AssigntoName']; ?>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Assigned Date</th>
                                                    <td><?php echo $row['AssignedTime']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if ($row['FinalReport'] != ''): ?>
                                                <tr>
                                                    <th>Report</th>
                                                    <td><a href="../reportfiles/<?php echo $row['FinalReport']; ?>"
                                                        > <button class="btn btn-success align-items-center ">
                                                                Download
                                                            </button>
                                                        </a></td>
                                                </tr>

                                                <tr>
                                                    <th>Report Delivered Time</th>
                                                    <td><?php echo $row['ReportUploadTime']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                        <?php } ?>
                        <!-- /.col -->

                        <?php
                        $orderid = intval($_GET['oid']);
                        $ret = mysqli_query($con, "select * from reporttracking
join employee on employee.eid=reporttracking.RemarkBy
where reporttracking.OrderNumber='$orderid'");
                        $num = mysqli_num_rows($ret);
                        ?>

                        <div class=" col-sm-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title "><b>Test Tracking History</b></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php if ($num > 0) {
                                        ?>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <tr>
                                                <th>Remark</th>
                                                <th>Status</th>
                                                <th>Remark Date</th>
                                                <th>Remark By</th>
                                                <?php while ($result = mysqli_fetch_array($ret)){ ?>
                                            </tr>
                                            <tr>
                                                <td><?php echo $result['Remark']; ?></td>
                                                <td><?php echo $result['Status']; ?></td>
                                                <td><?php echo $result['PostingTime']; ?></td>
                                                <td>Dr <?php echo $result['FullName']; ?></td>
                                            </tr>

                                            <?php } // End while loop?>

                                        </table>
                                        <?php
                                        //end if
                                    } else { ?>
                                        <h4 align="center" style="color:red"> No Tracking history found </h4>
                                    <?php } ?>
                                </div>
                                <!-- /.card-body -->
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