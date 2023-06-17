<?php

require_once("../include/config.php");

// Check for Employee Mail
if (!empty($_POST["Emp_Mail"])) {
    $em = $_POST["Emp_Mail"];

    $result = mysqli_query($con, "select * from employee where Email='$em'");
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

?>
