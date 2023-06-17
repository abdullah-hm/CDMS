<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Zone Health Care</title>


    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="MaterialzeCSS/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="MaterialzeCSS/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="MaterialzeCSS/css/homepage.css" type="text/css" rel="stylesheet" media="screen,projection"/>


</head>

<body>

<section class="navigation-section ">

    <nav class="navigation-body " role="navigation">
        <div class="nav-wrapper  container ">
            <a id="logo-container" href="index.php" class="brand-logo"> <img src="images/logo.png">
                <span class="teal-text"><h5><b>Zone Health</b></h5></span>
            </a>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down  ">
                <li><a href="index.php#home-section"> <i class="material-icons">home</i>About</a></li>
                <li><a href="index.php#menu-section"><i class="material-icons">bookmark_border</i>Symptoms</a></li>
                <li><a href="index.php#prevention-section"><i class="material-icons">book</i>Prevention</a></li>
                <li><a href="index.php#contact-us"><i class="material-icons">location_city</i>Contact Us</a></li>
                <li><a href="backend/patient/signup.php"><i class="material-icons">person_add</i>SignUp</a></li>
                <li>
                <a class='dropdown-trigger ' href='#' data-target='dropdown1'>&nbsp;<i class="material-icons">person_pin</i>&nbsp;&nbsp;Sign-In&nbsp;</a> </li>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='text-bold dropdown-content text-black '>
                    <li><a href="backend/admin/login.php"><i class="material-icons">person_pin</i>Admin Login</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="backend/employee/login.php"><i class="material-icons">person</i>Employee Login</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="backend/patient/login.php"><i class="material-icons">person_outline</i>Patient Login</a></li>
                    <li class="divider" tabindex="-1"></li>
                </ul>

            </ul>


            <ul id="nav-mobile" class="sidenav">
                <li><a href="index.php#home-section"> <i class="material-icons">home</i>About</a></li>
                <li><a href="index.php#menu-section"><i class="material-icons">bookmark_border</i>Symptoms</a></li>
                <li><a href="index.php#prevention-section"><i class="material-icons">book</i>Prevention</a></li>
                <li><a href="index.php#contact-us"><i class="material-icons">location_city</i>Contact Us</a></li>
                <li><a href="backend/patient/signup.php"><i class="material-icons">person_add</i>SignUp</a></li>
                <li><a href="backend/admin/login.php"><i class="material-icons">person_pin</i>Admin Login</a></li>
                <li><a href="backend/employee/login.php"><i class="material-icons">person</i>Employee Login</a></li>
                <li><a href="backend/patient/login.php"><i class="material-icons">person_outline</i>Patient Login</a></li>

            </ul>

        </div>
    </nav>

</section>
