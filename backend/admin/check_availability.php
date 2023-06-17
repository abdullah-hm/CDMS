<?php

require_once("../include/config.php");
// Check for Branch Code validation


// Employee Email Validation
if (!empty($_POST["EmpMail"])) {
    $email = $_POST["EmpMail"];

    $result = mysqli_query($con, "select * from employee where Email='$email'");
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo '
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-ban"></i>Employee Info already exists.Try Again</h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo '
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-check"></i> Employee Info available for Registration. </h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}

//Patient Email Validation
if (!empty($_POST["PtnMail"])) {
    $email = $_POST["PtnMail"];

    $result = mysqli_query($con, "select * from patient where Email='$email'");
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo '
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-ban"></i>Patient Info already exists.Try Again</h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo '
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-check"></i>Patient Info available for Registration. </h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}

if (!empty($_POST["Admin_Mail"])) {
    $am = $_POST["Admin_Mail"];

    $result = mysqli_query($con, "select * from admin where Email='$am'");
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        echo '
                  <center><h5 style="color:red; font-size: 14px; font-weight: bold">Email Address Not Found..! Contact Admin.</h5></center>
               
        ';
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } elseif($count > 0) {


        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}

//check availability for new vaccine
if (!empty($_POST["vac_name"])) {
    $vn = $_POST["vac_name"];

    $result = mysqli_query($con, "select * from vaccinetype where VacName='$vn'");
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo '
                <div class="alert text-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-ban"></i>Vaccine Name Already Registered.Try New Name.</h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo '
                <div class="alert text-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-check"></i> Vaccine Name Available for Registration. </h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}

?>
