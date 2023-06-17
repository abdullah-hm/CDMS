<?php


session_start();
error_reporting(0);

include('MaterialzeCSS/header-section.php');

include_once('backend/include/config.php');

//$_SESSION = $_SERVER['REMOTE_ADDR'];
//$userip = $_SESSION;

if (isset($_POST['submit'])) {
//getting post values

    $fname = $_POST['fname'];
    $mnumber = $_POST['mobileno'];
    $message = $_POST['message'];
    $status = "Pending";
    $query = "insert into contactus(message,fname,contactno,status) values('$message','$fname','$mnumber','$status')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Your Message Has Been Successfully Sent.")</script>';
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }

}
?>


    <section id="home-section" class="parallax-container">

        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="images/background1.jpg"> <!-- random image -->
                    <div class="caption center-align">
                        <h2>Stay Safe.<br>
                            <i class="large material-icons">security</i></h2>
                    </div>
                </li>

                <li>
                    <img src="images/background2.jpg"> <!-- random image -->
                    <div class="caption center-align">
                        <h2>Take Proper Medical Advice.<br>
                            <i class="large material-icons">business</i></h2>
                    </div>
                </li>

                <li>
                    <img src="images/background4.jpg"> <!-- random image -->
                    <div class="caption center-align">
                        <h2>Stay Home.<br>
                            <i class="large material-icons">home</i></h2>
                    </div>
                </li>

            </ul>
        </div>

    </section>

    <!-- Section: Icon Boxes -->
    <section id="menu-section" class="section section-icons grey lighten-4 center">
        <div class="container">
            <div class="row">
                <h4 class="center">
                    <span class="teal-text">Covid-19</span> Symptoms</h4>
                <div class="col s12 m4">
                    <div class="card-panel center">
                        <i class="material-icons large teal-text">local_hotel</i>
                        <h4>High Fever 2-14 days!</h4>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card-panel">
                        <i class="material-icons large teal-text">sentiment_dissatisfied</i>
                        <h4>Dry Cough 2-14 days!</h4>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card-panel">
                        <i class="material-icons large teal-text">record_voice_over</i>
                        <h4>Shortness of breath!</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="parallax-container valign-wrapper">

        <div class="container">
            <div class="center row col s3">

                <h3>About Covid19</h3>
            </div>
            <div class="center row col s12">
                <p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.
                    Most people infected with the COVID-19, virus will experience mild to moderate, respiratory illness
                    & recover without requiring special treatment. Older people and those with underlying medical
                    problem like cardiovascular disease.
                    The COVID-19 virus spread primarily through droplet of saliva or discharge from the nose when an
                    infected person coughs or sneezes so it’s important that you also practice respiratory
                    etiquette.</p>
            </div>

        </div>

        <div class="parallax"><img src="images/background3.jpg" alt="Unsplashed background img 3"></div>
    </section>


    <section id="prevention-section" class="section section-popular scrollspy">
        <div class="container">
            <div class="row">
                <h4 class="center">
                    <span class="teal-text">Covid19</span> Prevention</h4>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="https://png.pngtree.com/png-vector/20201225/ourlarge/pngtree-vector-cartoon-hand-washing-decoration-png-image_2621919.jpg"
                                 alt="">
                            <!--                            <span class="card-title">Nova Scotia</span>-->
                        </div>
                        <div class="card-content center-align">
                            <h5><b> Wash your Hands</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="https://www.fda.gov/files/n95_front.png" alt="">

                        </div>

                        <div class="card-content center-align">
                            <h5><b> Wear A Face mask</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="https://images.assetsdelivery.com/compings_v2/tatianasun/tatianasun2005/tatianasun200500074.jpg"
                                 alt="">
                        </div>

                        <div class="card-content center-align">
                            <h5><b>1M Distance</b></h5>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id="contact-us" class="contactus-section">
        <div class="container" style="margin-top:20px;">
            <div class="card-panel z-depth-5">
                <div class="row">
                    <div class="col s12 m6">


                        <h4 class="center"> Contact Us</h4>
                        <div class="row">


                                <form class="col s12 m12 form-section-area" name="add-feedback" method="post">
                                    <div class="row">
                                        <div class="input-field col s12 m12">
                                            <i class="mdi-action-account-circle prefix"></i>
                                            <input name="fname" id="icon_prefix" type="text" class="validate" required>
                                            <label for="icon_prefix">Name</label>
                                        </div>

                                        <div class="input-field col s12 m12">
                                            <i class="mdi-communication-email prefix"></i>
                                            <input id="icon_email" type="text" name="mobileno" minlength="9"
                                                   maxlength="10" class="validate" required>
                                            <label for="icon_email">Contact Number</label>
                                        </div>

                                        <div class="input-field col s12 m12">
                                            <i class="mdi-editor-mode-edit prefix"></i>
                                            <textarea name="message" id="icon_prefix2" class="materialize-textarea"
                                                      required></textarea>
                                            <label for="icon_prefix2">Comments</label>
                                        </div>

                                        <div class="col s12 m12 center-align">
                                            <button class="btn waves-effect waves-light center" id="submit" type="submit"
                                                    name="submit">Submit
                                                <i class="mdi-content-send"></i>
                                            </button>
                                        </div>


                                    </div><!--row-->

                                </form>



                        </div><!--row-->


                    </div><!--col-->


                    <div class="col s12 m5 offset-m1">


                        <p>
                            <a href="tel:0777511882">0777 511 882</a>, <br>
                            729/4 Zone Road Waduwegama 11670, <br>
                            Malwana, Sri Lanka
                        </p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15841.341506971974!2d80.0026694!3d6.9697033!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc0384a0d05764345!2sZone%20Health%20Care!5e0!3m2!1sen!2slk!4v1644839009010!5m2!1sen!2slk"
                                width="350" height="350" style="border:0;" ></iframe>

                    </div>

                </div><!--row-->
            </div><!--card-->
        </div><!--conatiner-->
    </section>

<?php include('MaterialzeCSS/footer-section.php') ?>