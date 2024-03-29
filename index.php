<?php

require "partials/_dbConnect.php";
require "partials/_regularExp.php";

session_start();

// Contact form validation and data save process start here
if (isset($_POST['contact_form'])) {
    if (!isset($_SESSION['userEmail'])) {
        echo "<script> alert('!Please Login'); 
        location.href = '_userLogin.php';
        </script>";
    } else {

        $con_username = trim($_POST['con-user-name']);
        $con_user_email = trim($_POST['con-user-email']);
        $con_msg = trim($_POST['msg']);

        $msg_len = strlen($con_msg);
        echo $msg_len;


        // validation email and user name of contact form


        if (!preg_match(userNamePattern, $con_username)) {
            $userNameError = "* Invalid User Name";
        }
        if (!preg_match(emailPattern, $con_user_email)) {
            $userEmailError = "* Invalid Email Id";
        }

        if ($msg_len < 15)
            $contactErrorMsg = "* Massage should be 15 characters";
        else if ($msg_len > 500)
            $contactErrorMsg = "* Massage should be less that 500 characters";

        if (($userNameError == "") && ($userEmailError == "") && ($contactErrorMsg  == "")) {
            $sql = $conn->prepare(
                "INSERT INTO `contact` 
            (`con_user`, `con_email`, `massage`, `create_at`) 
            VALUES (?, ?, ?, NOW())" // NOW() is used to current timestamp
            );

            $sql->bind_param("sss", $con_username, $con_user_email, $con_msg);
            $result = $sql->execute();

            if ($result) {
                echo "<script> alert('Your massage submitted successfully'); 
            location.href = 'index.php';
            </script>";
            } else
                echo "<script> alert('!Network Problem'); </script>";

            $sql->close();
        } else {
            echo "<script> 
            alert('! Something wrong in contact form')
            location.href = 'index.php#contact'
            </script>";
        }
    }
}
// Contact form validation and data save process end here
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        May I Help You - Service provider
    </title>
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Favicon added -->
    <link rel="shortcut icon" href="img/original_logo.png" type="image/x-icon">

</head>

<body>
    <!-- Navbar code include -->
    <?php require "_userNavbar.php"; ?>

    <!-- Home Section start Here -->
    <main>
        <div class="main-container pad-x">
            <div class="intro">
                <h1>Our Services <span></span></h1>
                <h2 class="heading">Need it fixed? <br> we <span>care</span> to <br> fix it right.</h2>
                <p>Customer's happiness is our aim</p>
                <div class="help-link">
                    <a href="index.php#services" class="button">Services</a>
                    <a href="index.php#contact" class="button">Contacts</a>
                </div>
            </div>
        </div>
    </main>
    <!-- Home Section End Here -->

    <!-- Service section Start Here -->
    <section id="services">
        <div class="section-heading">
            <h1 class="heading center">Our <span class="clip-path">Services</span></h1>
        </div>
        <div class="search-box">
            <h2 class="heading center">Choice a service to get started.</h2>
            <div class="form-element">
                <input type="search" name="search" id="search-service" class="form-input"
                    placeholder="Search for a service (e.g 'Cleaning')">
                <button type="button" class="btn search-btn">Search</button>
            </div>
        </div>

        <div class="service-wrapper">
            <div class="categories-section">
                <h2 class="heading">All Categories</h2>
                <ul>
                    <li><a href="#plumbing" class="cat-link">Plumbing</a></li>
                    <li><a href="#cleaning" class="cat-link">Cleaning</a></li>
                    <li><a href="#electrical" class="cat-link">Electrical</a></li>
                    <li><a href="#appliances" class="cat-link">Appliances Repairs</a></li>
                    <li><a href="#carpentry" class="cat-link">Carpentry</a></li>
                    <li><a href="#emergency" class="cat-link">Emergency</a></li>
                    <li><a href="#painting" class="cat-link">Painting</a></li>
                    <li><a href="#Moving" class="cat-link">Moving</a></li>
                    <li><a href="#" class="cat-link">Landscaping & Gardening</a></li>
                </ul>
            </div>
            <div class="service-info">
                <div class="service-box">
                    <div class="box-container" id="plumbing">
                        <!-- <?php
                        // require "partials/_dbConnect.php";
                        // $sql = "SELECT * FROM services WHERE category_id = 1";
                        // $result = $conn->query($sql);
                        // while ($row = $result->fetch_assoc()) {
                        //     echo '
                        //         <div class="box shadow">
                        //             <div class="box-body">
                        //                 <a href="#">
                        //                     <img src="' . $row["ser_img"] . '" alt="">
                        //                 </a>
                        //             </div>
                        //             <div class="box-title">
                        //                 <p>' . $row["ser_name"] . '</p>
                        //             </div>
                        //         </div>';
                        // }
                        ?> -->
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">

                                    <img src="img/p_service_faucets_replacement.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/p_service_other_plumbing.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/p_service_toilet_trouble.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/service_home_theater_av.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/service_mount_tv.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/service_office_cleaning.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div> 
                    </div>

                    <div class="box-container" id="cleaning">
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">

                                    <img src="img/p_service_faucets_replacement.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/p_service_other_plumbing.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/p_service_toilet_trouble.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/service_home_theater_av.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/service_mount_tv.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                        <div class="box shadow">
                            <div class="box-body">
                                <a href="#">
                                    <img src="img/service_office_cleaning.jpg" alt="">
                                </a>
                            </div>
                            <div class="box-title">
                                <p>Plumbing</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Service section End Here -->


    <!-- Our Best Worker Section Start Here -->
    <section class="pad-x" id="worker-section">
        <div class="section-heading">
            <h1 class="heading center">Our <span class="clip-path">Members</span></h1>
        </div>
        <div class="wrapper">
            <div class="slider-btn" id="prev">Prev</div>
            <div class="slider-btn" id="next">Next</div>
            <div class="slider" id="members-slider">
                <div class="emp-card">
                    <div class="card-img">
                        <img src="img/user/1.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h2>Raj Sharma</h2>

                    </div>
                </div>
                <div class="emp-card">
                    <div class="card-img">
                        <img src="img/user/2.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h2>Raj Sharma</h2>

                    </div>
                </div>
                <div class="emp-card">
                    <div class="card-img">
                        <img src="img/user/3.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h2>Raj Sharma</h2>

                    </div>
                </div>
                <div class="emp-card">
                    <div class="card-img">
                        <img src="img/user/4.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h2>Raj Sharma</h2>

                    </div>
                </div>
                <div class="emp-card">
                    <div class="card-img">
                        <img src="img/user/5.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h2>Raj Sharma</h2>

                    </div>
                </div>
                <div class="emp-card">
                    <div class="card-img">
                        <img src="img/user/6.jpg" alt="">
                    </div>
                    <div class="card-body">
                        <h2>Raj Sharma</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Best Worker Section End Here -->

    <!-- Contact Section Start Here (User's query) -->
    <section id="contact">

        <div class="contact-container pad-x">
            <div class="section-heading">
                <h1 class="heading center">Our <span class="clip-path">Contact</span></h1>
            </div>

            <div class="contact-wrapper">
                <div class="form-side">
                    <div class="form-container">
                        <div class="form-title">
                            <h1 class="heading">Contact Us</h1>

                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-element">
                                <label class="form-label" for="name">Full Name</label>
                                <input class="form-input" type="text" name="con-user-name" id="email" placeholder="Name"
                                    value="<?php if (isset($_POST['contact_form'])) echo $con_username; ?>" required />
                                <small class="err-msg"> <?php echo $userNameError; ?></small>
                            </div>
                            <div class="form-element">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-input" type="email" name="con-user-email" id="email"
                                    placeholder="E-mail"
                                    value="<?php if (isset($_POST['contact_form'])) echo $con_user_email; ?>"
                                    required />
                                <small class="err-msg"> <?php echo $userEmailError; ?></small>
                            </div>

                            <div class="form-element">
                                <label class="form-label" for="phone">Massage</label>
                                <textarea name="msg" id="msg" class="form-input text-area"
                                    placeholder="Describe your thoughts..." required></textarea>
                                <small class="err-msg"> <?php echo $contactErrorMsg; ?></small>
                            </div>
                            <div class="form-element">
                                <input class="form-input button" type="submit" value="Send" name="contact_form"
                                    id="contact-form">
                            </div>
                        </form>


                    </div>
                </div>
                <div class="info-side">
                    <div class="info-container">
                        <h1 class="heading">Info</h1>
                        <div class="about-info">
                            <div class="row">
                                <p>It is very important for us to keep in touch with you, so we are always ready to
                                    answer any question that interests you. Shoot!</p>
                            </div>
                            <div class="row">
                                <p class="info-text"><span>Email: </span> help@mayihelpyou.io</p>
                            </div>
                            <div class="row">
                                <p class="info-text"><span>Phone: </span> +91 000222</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- Contact Section End Here  (User's query)-->

    <!-- Import footer section -->
    <?php require "_footer.php"; ?>


    <!-- Javascript Files -->
    <script src="js/app.js"></script>
    <script src="js/textAnimation.js"></script>
</body>

</html>