<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Hôtel des Ingenieurs
    </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
<!-- Menu laterale mobile -->
<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close"> 
        <i class="icon_close"></i>
    </div>

    <div class="header-configure-area">

        <a href="./index.php" class="bk-btn">Booking Now</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <ul>
            <li class="active"><a href="./index.php">Home</a></li>
            <li><a href="#rooms">Rooms</a>
                <ul class="dropdown">
                    <li><a href="./deluxe_superior.php">Deluxe Superior</a></li>
                    <li><a href="./deluxe_presidential.php">Deluxe Presidential</a></li>
                    <li><a href="./suite_ambassador.php">Suite Ambassador</a></li>
                    <li><a href="./suite_des_ingenieurs.php">Suite des Ingénieurs</a></li>
                </ul>
            </li>
            <li><a href="./about-us.html">About Us</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="./myArea.php">My Area</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-tripadvisor"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i>(+39) 366-5439201</li>
        <li><i class="fa fa-envelope"></i> info.hotels@gmail.com</li>
    </ul>
</div>
<!-- fine menu mobile -->

<!-- Navbar -->
<header class="header-section">
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="img/logo2.JPG" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="active"><a href="./index.php">Home</a></li>
                                <li><a href="#rooms">Rooms</a>
                                    <ul class="dropdown">
                                        <li><a href="./deluxe_superior.php">Deluxe Superior</a></li>
                                        <li><a href="./deluxe_presidential.php">Deluxe Presidential</a></li>
                                        <li><a href="./suite_ambassador.php">Suite Ambassador</a></li>
                                        <li><a href="./suite_des_ingenieurs.php">Suite des Ingénieurs</a></li>
                                    </ul>
                                </li>
                                <li><a href="./about-us.html">About Us</a></li>
                                <li><a href="./contact.php">Contact</a></li>
                                <li><a href="./myArea.php">My Area</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- fine Navbar -->

<?php
if(isset($_SESSION['success'])){
    if($_SESSION['success'] == 'success'){
        echo '<div class="bookok"><h5>Your Booking has been saved.<br> check your email for the confirmation</h5></div><br>';
        $_SESSION['success'] = "";
    }
    if($_SESSION['success'] == 'notsuccess'){
        echo '<div class="bookKO"><h5>We are Sorry. The selected room has already been booked.<br> try again to see if there are other available rooms</h5></div><br>';
        $_SESSION['success'] = "";
    }    
}
if(isset($_SESSION['mailer'])){
    if($_SESSION['mailer'] == 'notsuccess'){
        echo '<div class="bookKO"><h5>email not sent</h5></div><br>';
        $_SESSION['mailer'] = "";
    }
    if($_SESSION['mailer'] == 'notsuccessKO'){
        echo '<div class="bookKO"><h5>email not sent.<r>server has been unable to send the email</h5></div><br>';
        $_SESSION['mailer'] = "";
    }
}
?>



    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Hôtel des Ingenieurs</h1>
                        <a href="#services" class="primary-btn">Discover now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Book your room</h3>
                        <form action="availability.php" method="post" onSubmit="return validaform();" name="check_avalaibility"><!-- form prenotazione -->
                            <div class="check-date">
                                <label for="date-in">Check-in:</label>
                                <input type="text" name="data_in" class="date-input" id="date-in" value="mm/dd/yyyy">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check-out:</label>
                                <input type="text" name="data_out" class="date-input" id="date-out" value="mm/dd/yyyy">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest" name="guests">
                                    <option value="1">1 Adult</option>
                                    <option value="2">2 Adults</option>
                                    <option value="3">3 Adults</option>
                                    <option value="4">4 Adults</option>
                                    <option value="5">5 Adults</option>
                                    <option value="6">6 Adults</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Rooms:</label>
                                <select id="room" name="room">
                                    <option value="all the rooms" selected>- All Rooms -</option>
                                    <option value="deluxe_superior">Deluxe Superior</option>
                                    <option value="deluxe_presidential">Deluxe Presidential</option>
                                    <option value="suite_ambassador">Suite Ambassador</option>
                                    <option value="suite_ingenieurs">Suite des Ingenieurs</option>

                                </select>
                            </div>
                            <button type="submit">Check avalibility</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/index/1.jpeg"></div>
            <div class="hs-item set-bg" data-setbg="img/index/2.jpeg"></div>
            <div class="hs-item set-bg" data-setbg="img/index/3.jpeg"></div>
            <div class="hs-item set-bg" data-setbg="img/index/5.jpeg"></div>
        </div>
    </section>

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>Sapienza University Luxury Hotel</h2>
                        </div>
                        <p class="f-para">A Sapienza Group Hotel. Engineered by Students</p>
                        <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p>
                        <a href="./about-us.html" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="img/rooftop.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="img/ext1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <a name="services"></a>
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>Discover Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Travel Plan</h4>
                        <p>Discover our Travel Plans in site, and let yourself be overwhelmed by the amazing history of the Most Beautiful city of the world.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Catering Service</h4>
                        <p>For your special occasions, we are delighted to accomplish your needs with top rated catering services. Discover the offer with our concierge.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>Room Service</h4>
                        <p>For any occurrence, our Room Service is available h24 and ready to accomplish any requests. The guests comfort is our mission.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>Laundry</h4>
                        <p>An inconvenient during dinner is not a problem, call the concierge and let us take care of the issue for you.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Hire Driver</h4>
                        <p>Car Service ready h24 to take you wherever your vacation or business trip brings you.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-012-cocktail"></i>
                        <h4>Bar & Drink</h4>
                        <p>Our Rooftop Bar is open everyday from 6am to 1am. Don't be afraid to ask for yor favourite Food or Drink.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <a name="rooms">
        <section class="hp-room-section">
            <div class="container-fluid">
                <div class="hp-room-items">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="hp-room-item set-bg " data-setbg="img/room0.jpg">
                                <div class="hr-text">
                                    <h3>Deluxe Superior</h3>
                                    <h2>220€<span>/Night</span></h2>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Size:</td>
                                                <td>56 ft</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max 3 guests</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Bed:</td>
                                                <td>King Beds</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Services:</td>
                                                <td>Wifi, Television, Bathroom,...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="./deluxe_superior.php" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hp-room-item set-bg" data-setbg="img/room1.png">
                                <div class="hr-text">
                                    <h3>Deluxe Presidential</h3>
                                    <h2>280€<span>/Night</span></h2>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Size:</td>
                                                <td>60 ft</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max 4 guests</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Bed:</td>
                                                <td>King Beds</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Services:</td>
                                                <td>Wifi, Television, Bathroom,...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="./deluxe_presidential.php" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hp-room-item set-bg" data-setbg="img/suite0.jpg">
                                <div class="hr-text">
                                    <h3>Suite Ambassador</h3>
                                    <h2>350€<span>/Night</span></h2>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Size:</td>
                                                <td>85 ft</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max 4 guests</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Bed:</td>
                                                <td>King Beds</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Services:</td>
                                                <td>Wifi, Television, Bathroom,...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="./suite_ambassador.php" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="hp-room-item set-bg" data-setbg="img/suite1.png">
                                <div class="hr-text">
                                    <h3>Suite des Ingénieurs</h3>
                                    <h2>500€<span>/Night</span></h2>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Size:</td>
                                                <td>90 ft</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max 6 guests</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Bed:</td>
                                                <td>King Beds</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Services:</td>
                                                <td>Wifi, Television, Bathroom,...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="./suite_des_ingenieurs.php" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</a>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <a name="reviews">
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title"><br><br>
                        <span>Reviews</span>
                        <h2>Testimonials</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        
                        <?php
                            $dbconn = pg_connect("host=localhost port=5432 dbname=LTWphp 
                                user=postgres password=adminPG") 
                                 or die('Could not connect: ' . pg_last_error());

                            if($dbconn){
                                $query = "select * from lab.recensioni";
                                $res = pg_query($dbconn, $query);
                                $cont = 0;
                                while($tuple = pg_fetch_array($res, null, PGSQL_ASSOC)){
                                    $n = $tuple['nome'];
                                    $d = $tuple['descrizione'];
                                    echo '<div class="ts-item">
                                    <p>' . $d . ' </p>
                                    <div class="ti-author">
        
                                        <h5>' . $n . '</h5>
                                    </div>
                                    <img src="img/testimonial-logo.png" alt="">
                                    </div>';
                                    $cont++;
                                }
                                if($cont == 0){
                                    echo '<div class="ts-item"> There are no available testimonials</div>';
                                }

                            } else {
                                echo '<div class="ts-item"> There are no available testimonials
                                        </div>';
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </section>
    <!-- Testimonial Section End -->
    

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="img/footer-logo.png" alt="">
                                </a>
                            </div>
                            <p>Discover our World</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contact Us</h6>
                            <ul>
                                <li>(+39) 366-5439201</li>
                                <li>info.hotels@hotmail.it</li>
                                <li>Viale dello Scalo S. Lorenzo, 82, Rome</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">

                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- Footer Section End -->


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
</body>

</html>

