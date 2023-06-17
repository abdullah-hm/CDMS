<?php
require_once("../include/config.php");

// Check Availability for patient email address
if (!empty($_POST["email"])) {
    $mail = $_POST["email"];

    $result = mysqli_query($con, "select * from patient where Email='$mail'");
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo '
<div class="col s12">
        <div class="card-alert card red">
                                                    <div class="card-content white-text border-round font-weight-900 center-align">
                                                        <p>ERROR : Email ID already exists. Please try again.</p>
                                                    </div>
     </div>                                           </div>
        ';

        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo '
<div class="col s12">
        <div class="card-alert card green">
                                                    <div class="card-content white-text border-round font-weight-900 center-align">
                                                        <p>SUCCESS : Email ID available for Registration.</p>
                                                    </div>
                                                </div>
                                                </div>
        ';
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}

//check availability for new testing

if (!empty($_POST["datetimetest"])) {
    $dt = $_POST["datetimetest"];

    $result = mysqli_query($con, "select * from testrecord where TestTimeSlot='$dt'");
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo '
                <div class="alert text-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-ban"></i>Date & Time is Already Booked. Please Try New date & time.</h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo '
                <div class="alert text-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-check"></i> Date and Time is available for Booking. </h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}

//check availability for new vaccine
if (!empty($_POST["datetimevac"])) {
    $dt = $_POST["datetimevac"];

    $result = mysqli_query($con, "select * from vaccine where DateOfVac='$dt'");
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo '
                <div class="alert text-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-ban"></i>Date & Time is Already Booked.Try New date & time.</h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {

        echo '
                <div class="alert text-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h6><i class="icon fas fa-check"></i> Date and Time is available for Booking. </h6>
                </div>
        ';
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}


?>
