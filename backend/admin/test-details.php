<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['AID'])) {
    header('Location: logout.php');
}
$title = "New Test Detail";
include('../AdminLTE/header.php');
include_once('../include/config.php');

if ($_GET['action'] == 'delete') {
    $ordernumber = intval($_GET['ordernumber']);
    $query = mysqli_query($con, "delete from testrecord where OrderNumber='$ordernumber'");
    echo '<script>alert("Record deleted")</script>';
    echo "<script>window.location.href='new-tests.php'</script>";
}

//Code for Assign to
if (isset($_POST['submit'])) {
    $testid = intval($_GET['tid']);
    $ato = $_POST['assignto'];
    $assignto = explode("-", $ato);
    $aname = $assignto[0];
    $eid = $assignto[1];
    $status = 'Assigned';
    $assigntime = date('d-m-Y h:i:s A', time());
    $ava = "Offline";

    $query = mysqli_query($con, "update testrecord set ReportStatus='$status',AssigntoName='$aname',AssignedtoEmpId='$eid',AssignedTime='$assigntime' where id='$testid'");

    $query1 = mysqli_query($con, "update employee set Availability='$ava' where eid='$eid'");

    echo '<script>alert("Assigned to Employee successfully.")</script>';
    echo "<script>window.location.href='assigned-tests.php'</script>";
}
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
                    <i class="fas fa fa-user"></i> <b> <?= $_SESSION['FlName'] ?> </b>
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
                        <a href="dashboard.php" class="nav-link">

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
                                <a href="add-employee.php" class="nav-link ">
                                    <i class="nav-icon fa fa-plus "></i>
                                    <p>Add Employee</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-employee.php" class="nav-link ">
                                    <i class="nav-icon fas fa-user "></i>
                                    <p>Manage Employee</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview menu-close">
                        <a href="manage-patient.php" class="nav-link ">
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

                    <li class="nav-item has-treeview menu-open">
                        <a href="all-tests.php" class="nav-link active">
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
                    <div class="col-sm-8">
                        <h1 class="m-0 text-dark">ADMIN | Patient Test Detail Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
                            <li class="breadcrumb-item active">Test</li>
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
                                    <h3 class="card-title"><b>Patient Information</b></h3>
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
                                            <th>Profile Reg DateTime</th>
                                            <td><?php echo $row['RegDT']; ?></td>
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
                                                    >
                                                        <button class="btn btn-success align-items-center ">
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
                                    <?php if ($row['AssignedtoEmpId'] == ''):
                                        ?>
                                        <br>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info btn-lg margin" data-toggle="modal"
                                                    data-target="#modal-info">
                                                Assign To
                                            </button>
                                        </div>


                                    <?php else:
                                        $rstatus = $row['ReportStatus'];
                                        if ($rstatus == 'Assigned' || $rstatus == 'On the Way for Collection' || $rstatus == 'Sample Collected' || $rstatus == 'Sent to Lab'):?>

                                        <?php
                                        endif;
                                    endif; ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    <?php } ?>
                    <!-- /.col -->

                    <!-- /.row -->
                </div>

                <div class="row">

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
                                            <th>No</th>
                                            <th>Remark</th>
                                            <th>Status</th>
                                            <th>Remark By</th>
                                            <th>Remark Date</th>

                                            <?php
                                            $cnt = 1;
                                            while ($result = mysqli_fetch_array($ret)){

                                            ?>
                                        </tr>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $result['Remark']; ?></td>
                                            <td><?php echo $result['Status']; ?></td>
                                            <td>Dr <?php echo $result['FullName']; ?></td>
                                            <td><?php echo $result['PostingTime']; ?></td>
                                        </tr>

                                        <?php
                                        $cnt++;
                                        } // End while loop?>

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

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>

<div class="modal fade" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content bg-gray-dark">
            <div class="modal-header">
                <h4 class="modal-title right-align">Assign To</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">

                    <div class="form-group m-3">

                        <select class="select2" type="text" name="assignto"
                                data-placeholder="Select Employee" style="width: 100%" required>
                            <option value="">Select Employee</option>
                            <?php
                            $employees = mysqli_query($con, "select * from employee where Availability='Online'");
                            foreach ($employees as $employee) {

                                if ($employee) {
                                    ?>
                                    <option value="<?= $employee['FullName'] . "-" . $employee['eid']; ?>">
                                        Dr <?= $employee['FullName']; ?> | <?= $employee['MobileNo']; ?></option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="error">All employees are reserved.</option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group offset-md-3  offset-sm-2 col-sm-6 col-md-6">
                        <div class="text-center">
                            <button type="submit" value="submit" name="submit" id="submit"
                                    class="btn btn-block bg-info btn-lg">
                                S u b m i t
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php include('../AdminLTE/footer.php') ?>

