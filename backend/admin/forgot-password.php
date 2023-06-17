<?php

session_start();
error_reporting(0);
include('../include/config.php');
$title = "Admin Password Recovery";
include("../include/header.php");


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $np = md5($_POST['npwd']);
    $cp = md5($_POST['cpwd']);
    $mob = $_POST['mobileno'];

    if ($np == $cp) {

        $query = mysqli_query($con, "select * from admin where  Email='$email' and MobileNo='$mob'");
        $ret = mysqli_fetch_array($query);

        if ($ret > 0) {

            $query1 = mysqli_query($con, "update admin set Password='$cp' where Email='$email'");

            echo '  
        <div class="swal-overlay swal-overlay--show-modal" tabindex="-1">
            <div class="swal-modal"><div class="swal-icon swal-icon--success">
                <span class="swal-icon--success__line swal-icon--success__line--long"></span>
                <span class="swal-icon--success__line swal-icon--success__line--tip"></span>

                <div class="swal-icon--success__ring"></div>
            <div class="swal-icon--success__hide-corners"></div>
        </div>
        <div class="swal-title" style="">Successfully Recovered.</div><div class="swal-footer"><div class="swal-button-container">

         </div></div></div></div>
        ';
//        echo "<script>setTimeout(\"location.href = 'dashboard.php';\",1000);</script>";
            header("refresh:1;url=login.php");

        } else {
            echo '
        <div class="swal-overlay swal-overlay--show-modal" tabindex="-1">
        <div class="swal-modal"><div class="swal-icon swal-icon--warning">
            <span class="swal-icon--warning__body">
              <span class="swal-icon--warning__dot"></span>
            </span>
          </div><div class="swal-title" style="">Invalid Credentials.</div><div class="swal-footer"><div class="swal-button-container">

        </div></div></div></div>
        ';

            header("refresh:1;url=forgot-password.php");
        }
    } else {

        echo '
        <div class="swal-overlay swal-overlay--show-modal" tabindex="-1">
        <div class="swal-modal"><div class="swal-icon swal-icon--warning">
            <span class="swal-icon--warning__body">
              <span class="swal-icon--warning__dot"></span>
            </span>
          </div><div class="swal-title" style="">Invalid Credentials.</div><div class="swal-footer"><div class="swal-button-container">

        </div></div></div></div>
        ';

        header("refresh:1;url=forgot-password.php");

    }


}
?>

<script>
    function emailAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'Admin_Mail=' + $("#email").val(),
            type: "POST",
            success: function (data) {
                $("#email-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
</script>

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-gradient-menu preload-transitions 1-column forgot-passowrd-bg  blank-page blank-page"
      data-open="click" data-menu="vertical-gradient-menu" data-col="1-column">


<div class="row">
    <div class="col s12 ">
        <div class="container">
            <div id="login-page" class="row">
                <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card ">
                    <form method="post" name="login">
                        <div class="row">
                            <div class="input-field center-align col s12">
                                <h5 class="ml-4">Zone Health Care</h5>
                                <h5 class="ml-4 font-weight-900">Admin Password Recovery</h5>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input id="email" type="email" name="email" onblur="emailAvailability()" required>
                                <label for="email" class="center-align">Email</label>
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">phone</i>
                                <input type="tel" name="mobileno" maxlength="10" minlength="9" required>
                                <label for="tel" class="center-align">Mobile No</label>
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock</i>
                                <input type="password" name="npwd" minlength="4" required>
                                <label for="password1" class="center-align">Enter New Password</label>
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock</i>
                                <input type="password" name="cpwd" minlength="4" required>
                                <label for="password2" class="center-align">Enter Confirm Password</label>
                            </div>
                        </div>

                        <span id="email-availability-status" style="font-size:12px;"></span>

                        <div class="row">

                            <div class="input-field col s12">
                                <button class="btn waves-effect font-weight-500 waves-light white-text border-round gradient-45deg-deep-orange-orange col s12"
                                        id="submit" type="submit" href="#modal1"
                                        name="submit"><h6 class="margin white-text"> Submit</h6>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <p class="margin medium-small"><a class=" font-weight-900 " href="../index.php">Home
                                        Page</a></p>
                            </div>
                            <div class="input-field col s6 m6 l6">
                                <p class="margin right-align medium-small"><a class="font-weight-900 red-text"
                                                                              href="login.php">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
</div>

<?php include("../include/footer.php"); ?>
