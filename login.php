<!DOCTYPE html>
<html lang="en">

<head>
    <!--meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1, maximum-scale=1, user-scalable=no" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--page Title-->
    <title>WE FOR YOU - LOGIN</title>
    <!-- Favicon-->
    <link rel="icon" type="image" href="./images/website-favicon.png" sizes="192x192" />

    <!-- Font Awesome CDN (for version 5.x) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Boxicons CDN -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--stylesheet link-->
    <link rel="stylesheet" type="text/css" href="style.css">


    <!--animation (AOS - Animation on scroll) link-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- custom add-ons -->
    <link rel="stylesheet" type="text/css" href="add.css">
    <script src="owl.carousel/owl.carousel.min.js"></script>
    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <style>
        span {
            position: absolute;
            right: 25px;
            transform: translate(0, -50%);
            top: 55%;
            cursor: pointer;
        }

        .fa {
            font-size: 15px;
            color: #7a797e;
        }
    </style>

</head>


<body>

    <!--navigation bar-->
    <div class="container-fluid menu">
        <nav class="navbar navbar-expand-lg my-navbar">
            <a class="navbar-brand " href="./index.php"><img src="./images/website-favicon.png" height="150" width='150' alt="" loading="lazy"></a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link " href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./aboutus.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a href="./events.php" class="nav-link">Events</a>
                    </li>
                    <li class="nav-item">
                        <a href="./internship.php" class="nav-link">Internship</a>
                    </li>
                    <li class="nav-item">
                        <a href="./vol.php" class="nav-link ">Volunteer</a>
                    </li>
                    <li class="nav-item">
                        <a href="./projectaahar.php" class="nav-link">Project Aahar</a>
                    </li>
                    <li class="nav-item">
                        <a href="./contactus.php" class="nav-link">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="./login.php" class="nav-link active">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!--nav bar end-->

    <br>

    <?php
    $login = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbconnect.php';
        session_start();
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "Select * from users where username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: donorpage.php");
        } else {
            $showError = "Invalid Username and Password";
        }
    }

    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Welcome</strong> Admin
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
    <div class="container py-4 my-4 bg-light" style="box-shadow: 2px 2px 2px 2px #777;">
        <section style="background-color: aliceblue;">
            <div class="container ">
                <div class="row ">
                    <div class="col"></div>
                    <div class="col login" data-aos="zoom-in-up" data-aos-easing="ease-in-sine" data-aos-delay="200">
                        <br>
                        <h2>Login
                            <hr class="internship-green-hr">
                        </h2>
                        <form action="login.php" method="post" id="loginform" name="loginform">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Your Username.." aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label><br>
                                <input type="password" class="form-control" id="password" placeholder="Your Password.." name="password">
                                <span>
                                    <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                                </span>
                            </div>
                            <div style="text-align:center">
                                <button type="submit" class="btn btn-outline-success  mt-2 " name="submit">Login</button>
                            </div>
                            <hr>
                            <a href="forgot_password.php" style="color:cornflowerblue">Forgot Password ?</a>
                            <br><br>
                            <p>New User?<a href="signup.php" style="color:cornflowerblue"> Click here to Sign Up</a></p>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </section>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </div>

</body>


<!-------------------------------- footer ------------------------------------------>
<footer id="footer">
    <div class="footer-top pb-4">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-contact" style="height:200px">
                    <img src="./images/website-favicon.png" height="85%">
                </div>
                <div class="col-lg-4 col-md-6 footer-contact" style="height: 200px">
                    <h3 style="color: #009970"><b>Bring Bright Smile</b></h3>
                    <p><a href="https://maps.app.goo.gl/fZkQtg7iQaFNppAcA" target="_blank" style="color: #777777;">
                            Kankarbagh<br>
                            Patna, 800001</a><br><br>

                        <strong>Phone:</strong> <a href="tel:+918969862809" style="color: #777777;">+918969862809</a><br>

                        <strong>Email:</strong> <a href="mailto:info@bigsmile.in" style="color: #777777;">info@bigsmile.in</a><br>
                    </p>
                </div>
                <div class="col-lg-4 pt-4 mt-2">
                    <div class="social-links text-center text-md-right pt-3 pt-md-0">
                        <a href="https://www.facebook.com/aryanschoolhjp/" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                        <a href="https://www.instagram.com/bringbrightsmilefoundation/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                        <!-- <a href="https://www.youtube.com/channel/UCJs3CwS0-UIsYlDkw8TsO0g" class="google-plus" target="_blank"><i class="bx bxl-youtube"></i></a>
              <a href="https://www.linkedin.com/in/mrrahul-rajpurohit-a71123222v" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<button onclick="topFunction()" id="topbtn"><i class="fa fa-arrow-up" aria-hidden="true"></i></button><!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

<!-- navbar animation -->
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > 60) {
                $('.my-navbar').addClass('navbar-scroll');
            } else {
                $('.my-navbar').removeClass('navbar-scroll');
            }
        });
    });
</script>
<!--back to top btn-->
<script type="text/javascript">
    myButton = document.getElementById("topbtn");
    window.onscroll = function() {
        scrollfunction()
    };

    function scrollfunction() {
        if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
            myButton.style.display = "Block";
        } else {
            myButton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<!--Animation on scroll (Aos) link and script-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<script>
    var state = false;

    function toggle() {
        if (state) {
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("eye").style.color = '#7a797e';
            state = false;
        } else {
            document.getElementById("password").setAttribute("type", "text");
            document.getElementById("eye").style.color = '#5887ef';
            state = true;
        }
    }
</script>


</body>

</html>