<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['AID'])) {
    header('Location: logout.php');
}
$title = "Manage Patient";
include('../AdminLTE/header.php');
include_once('../include/config.php');

if ($_GET['action'] == 'delete') {
    $pid = intval($_GET['pid']);
    $query = mysqli_query($con, "delete from patient where pid='$pid'");
    echo '<script>alert("Record deleted")</script>';
    echo "<script>window.location.href='manage-patient.php'</script>";
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
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" >
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
                    <li class="nav-item has-treeview menu-open">
                        <a href="manage-patient.php" class="nav-link active">
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
                                <a href="manage-patient.php" class="nav-link active">
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
                        <h1 class="m-0 text-dark">ADMIN | Patient Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
                            <li class="breadcrumb-item active">Patient</li>
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
                            <h3>List of All Patient
                                <a href="reports/export-patient-data.php" class="no-print btn btn-success float-right"><i
                                    class="fas fa-file-excel"></i> Export
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class=" table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FullName</th>
                                    <th>Address</th>
                                    <th>District</th>
                                    <th>NIC</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>MobileNo</th>
                                    <th>Email</th>
                                    <th>Reg DateTime</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $query = mysqli_query($con, "select * from patient");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row['FullName']; ?></td>
                                        <td><?php echo $row['Address']; ?></td>
                                        <td><?php echo $row['District']; ?></td>
                                        <td><?php echo $row['Nic']; ?></td>
                                        <td><?php echo $row['Dob']; ?></td>
                                        <td><?php echo $row['Gender']; ?></td>
                                        <td><a href="tel:<?php echo $row['MobileNo']; ?>"><?php echo $row['MobileNo']; ?></a></td>
                                        <td><?php echo $row['Email']; ?></td>
                                        <td><?php echo $row['RegDT']; ?></td>
                                        <td class="text-center">

                                            <a href="edit-patient.php?pid=<?php echo $row['pid']; ?>">
                                                <i class="fas fa-edit" style="color:blue"></i>
                                            </a>&nbsp;|&nbsp;

                                            <a href="manage-patient.php?pid=<?php echo $row['pid']; ?>&&action=delete"
                                               onclick="return confirm('Do you really want to delete this record?');">
                                                <i class="fas fa fa-trash " aria-hidden="true" style="color:red"
                                                   title="Delete this record"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php $cnt++;
                                } ?>
                                </tbody>
                                <tfoot>
                                <tr>

                                    <th>ID</th>
                                    <th>FullName</th>
                                    <th>Address</th>
                                    <th>District</th>
                                    <th>NIC</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>MobileNo</th>
                                    <th>Email</th>
                                    <th>Reg DateTime</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>

<?php include('../AdminLTE/footer.php') ?>

