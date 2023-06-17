<?php


session_start();
error_reporting(0);
include('../include/config.php');
$title = "Registration";
include("../include/header.php");



if (isset($_POST['submit'])) {
//getting post values
    $flname = $_POST['flname'];
    $mobile = $_POST['phone'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $dis = $_POST['district'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $query = "insert into patient(FullName,MobileNo,Nic,Dob,Address,District,Email,Password) values('$flname','$mobile','$nic','$dob','$address','$dis','$email','$pwd');";
    $result = mysqli_multi_query($con, $query);
    if ($result) {
        echo '  
        <div class="swal-overlay swal-overlay--show-modal" tabindex="-1">
            <div class="swal-modal"><div class="swal-icon swal-icon--success">
                <span class="swal-icon--success__line swal-icon--success__line--long"></span>
                <span class="swal-icon--success__line swal-icon--success__line--tip"></span>

                <div class="swal-icon--success__ring"></div>
            <div class="swal-icon--success__hide-corners"></div>
        </div>
        <div class="swal-title" style="">Success Registered</div><div class="swal-footer"><div class="swal-button-container">

         </div></div></div></div>
        ';
//        echo "<script>setTimeout(\"location.href = 'dashboard.php';\",1000);</script>";
        header("refresh:2;url=login.php");

    } else {
        echo '
        <div class="swal-overlay swal-overlay--show-modal" tabindex="-1">
        <div class="swal-modal"><div class="swal-icon swal-icon--warning">
            <span class="swal-icon--warning__body">
              <span class="swal-icon--warning__dot"></span>
            </span>
          </div><div class="swal-title" style="">Invalid Details.</div><div class="swal-footer"><div class="swal-button-container">

        </div></div></div></div>
        ';

        header("refresh:2;url=signup.php");
    }
}


?>

    <script>
        function emailAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
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
    <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-gradient-menu preload-transitions 1-column register-bg   blank-page blank-page"
          data-open="click" data-menu="vertical-gradient-menu" data-col="1-column">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <br>
                <br>
                <br>
                <div id="register-page" class="row">
                    <div class="col s12 m6 l6 z-depth-4 card-panel border-radius-6 register-card bg-opacity-9">

                        <form class="reg-form" method="post">

                            <div class="row">

                                <div class="input-field col s12 center-align">
                                    <h5 class="ml-2 ">New Patient Register</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix pt-2">account_circle</i>
                                    <input id="fullname" type="text" name="flname" class="validate" required>
                                    <label for="fullaname">Full Name</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix pt-2">phone</i>
                                    <input id="telephone" type="tel" name="phone" maxlength="10" minlength="9" required>
                                    <label for="telephone">Mobile No</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix pt-2">credit_card</i>
                                    <input id="nic" type="text" minlength="9" maxlength="12" name="nic" required>
                                    <label for="nic">NIC</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix pt-2">event</i>
                                    <input type="text" class="datepicker" id="dob" name="dob" required>
                                    <label for="dob">DOB</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix pt-2">place</i>
                                    <input id="address" type="text" name="address" required>
                                    <label for="address">Address</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <select class="select2 browser-default" name="district" type="text" required>
                                        <option value="">Select District</option>
                                        <?php
                                        $districts = [
                                            'Ampara District',
                                            'Anuradhapura District',
                                            'Badulla District',
                                            'Batticaloa District',
                                            'Colombo District',
                                            'Galle District',
                                            'Gampaha District',
                                            'Hambantota District',
                                            'Jaffna District',
                                            'Kalutara District',
                                            'Kandy District',
                                            'Kegalle District',
                                            'Kilinochchi District',
                                            'Kurunegala District',
                                            'Mannar District',
                                            'Matale District',
                                            'Matara District',
                                            'Monaragala District',
                                            'Mullaitivu District',
                                            'Nuwara Eliya District',
                                            'Polonnaruwa District',
                                            'Puttalam District',
                                            'Ratnapura District',
                                            'Trincomalee District',
                                            'Vavuniya District',
                                        ];

                                        foreach ($districts as $district) {
                                            echo "<option>$district</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix pt-2">mail_outline</i>
                                    <input id="email" type="email" name="email" required onblur="emailAvailability()">
                                    <label for="email">Email</label>
                                </div>


                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix pt-2">lock_outline</i>
                                    <input id="password" type="password" name="pwd" minlength="4" required>
                                    <label for="password">Password</label>
                                </div>
                            </div>


                            <span id="email-availability-status" style="font-size:12px;"></span>


                            <div class="row">

                                <div class="input-field col s12  ">
                                    <button class="btn btn-large waves-effect font-weight-500 waves-light white-text border-round gradient-45deg-indigo-blue col s12"
                                            type="submit" name="submit" id="submit"><h6 class="white-text"> R e g i s t e r</h6>
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin medium-small"><a class=" font-weight-900 " href="../index.php">Home
                                            Page</a></p>
                                </div>
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin medium-small right-align font-weight-900"><a class="red-text" href="login.php">Already have an
                                            account?
                                            Login</a> </p>
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