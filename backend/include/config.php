<?php
//time zone
date_default_timezone_set('Asia/Colombo');
$con = mysqli_connect("localhost", "root", "", "zonecare_db");
if (mysqli_connect_errno()) {
    echo "Connection Fail" . mysqli_connect_error();
}

?>