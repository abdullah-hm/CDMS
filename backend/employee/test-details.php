<?php
session_start();
error_reporting(0);


if (!isset($_SESSION['EID'])) {
    header('Location: logout.php');
}
include('../include/config.php');
$title = "View Tests Details";
include("../AdminLTE/header.php");

//Code for Take Action
if (isset($_POST['takeaction'])) {
    $orderid = intval($_GET['oid']);
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $rby = $_SESSION['EID'];
    $ava = "Online";
//For delivered Status
    if ($status == 'Delivered'):
        $uploadtime = date('d-m-Y h:i:s A', time());
//For checking the image type
        $reportfile = $_FILES["report"]["name"];
// get the image extension
        $extension = substr($reportfile, strlen($reportfile) - 4, strlen($reportfile));
// allowed extensions
        $allowed_extensions = array(".doc", ".docx", ".png", ".jpg", ".pdf", ".PDF");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only doc/ docx/ jpg/ png/ pdf format allowed');</script>";
        } else {
//rename the image file
            $newreportfile = $orderid . md5($reportfile) . $extension;
// Code for move image into directory
            move_uploaded_file($_FILES["report"]["tmp_name"], "../reportfiles/" . $newreportfile);
            $query = mysqli_query($con, "insert into reporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
            $query2 = mysqli_query($con, "update testrecord set ReportStatus='$status',FinalReport='$newreportfile',ReportUploadTime='$uploadtime' where OrderNumber='$orderid'");
            $query3 = mysqli_query($con, "update employee set Availability='$ava' where eid='$rby'");
            echo '<script>alert("Status updated successfully")</script>';
            echo "<script>window.location.href='dashboard.php'</script>";
        }

// For other status
    else:
        $query = mysqli_query($con, "insert into reporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
        $query2 = mysqli_query($con, "update testrecord set ReportStatus='$status' where OrderNumber='$orderid'");
        echo '<script>alert("Status updated successfully")</script>';
        echo "<script>window.location.href='dashboard.php'</script>";
    endif;

}

?>

<div class="employee-dashboard">
    <!-- Navbar -->
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
                        <a href="dashboard.php" class="nav-link">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
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
                        <a href="manage-vaccine.php" class="nav-link">
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
                        <h1 class="m-0 text-dark">Employee | View Test Details Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Employee</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

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
                                    <br>

                                    <?php if ($row['AssignedtoEmpId'] == ''):
                                        ?>

                                        <div class="form-group">
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                                    data-target="#assignto">Assign To
                                            </button>
                                        </div>

                                    <?php else:
                                        $rstatus = $row['ReportStatus'];
                                        if ($rstatus == 'Assigned' || $rstatus == 'Start Test' || $rstatus == 'Sample Collected' || $rstatus == 'Sent to Lab'):?>
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                                    data-target="#takeaction">Take Action
                                            </button>
                                        <?php
                                        endif;
                                    endif; ?>
                                </div>
                                <!-- /.card-body -->

                            </div>
                        </div>

                    <?php } ?>
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


<!-- Take Action Modal -->
<div id="takeaction" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content bg-gradient-info">
            <div class="modal-header">
                <h4 align="left">Take Action</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form method="post" enctype="multipart/form-data">



                    <p><select class="form-control" name="status" id="status" required="true">
                            <option value="">Select Action</option>
                            <?php
                            $query1 = mysqli_query($con, "select ReportStatus from testrecord where OrderNumber='$orderid'");
                            while ($result = mysqli_fetch_array($query1)):
                                $reportstatus = $result['ReportStatus'];
                            endwhile;
                            ?>

                            <?php if ($reportstatus == 'Assigned'): ?>
                                <option value="Start Test">Start Test</option>
                            <?php elseif ($reportstatus == 'Start Test'): ?>
                                <option value="Sample Collected">Sample Collected</option>
                            <?php elseif ($reportstatus == 'Sample Collected'): ?>
                                <option value="Sent to Lab">Sent to Lab</option>
                            <?php elseif ($reportstatus == 'Sent to Lab'): ?>
                                <option value="Delivered">Delivered</option>
                            <?php endif; ?>

                        </select></p>
                    <p id='reportfile'> Report <span
                                style="color:white; font-size:12px;">(Doc and PDF format allowed)</span>
                        <input type="file" name="report" id="report">

                    </p>

                    <div class="input-group mb-3">
                        <select class="form-control select" name="remark"
                                data-placeholder="Select Status" style="width: 100%" required="true">

                            <option value="">Select Remark Status</option>
                            <option value="Start To Collect The Sample">Start To Collect The Sample</option>
                            <option value="Sample Test Collected Successfully">Sample Test Collected</option>
                            <option value="Sample Test Sent To The Lab">Sample Test Sent To Lab</option>
                            <option value="Covid Positive">Covid19 Positive</option>
                            <option value="Covid Negative">Covid19 Negative</option>
                        </select>

                    </div>


                    <input type="submit" class="btn btn-success btn-user btn-block" name="takeaction"
                           id="submit"></p>


                </form>
            </div>
            </div>

        </div>
    </div>


    <?php include("../AdminLTE/footer.php"); ?>

