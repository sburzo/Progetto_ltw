<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    
    <title>Deluxe Superior</title>

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
    <link rel="stylesheet" href="css/hoc.css" type="text/css">
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
                <li><a href="./index.php">Home</a></li>
                <li  class="active"><a href="index.php#rooms">Rooms</a>
                    <ul class="dropdown">
                        <li><a href="./deluxe_superior.php">Deluxe Superior</a></li>
                        <li><a href="./deluxe_presidential.php">Deluxe Presidential</a></li>
                        <li><a href="./suite_ambassador.php">Suite Ambassador</a></li>
                        <li><a href="./suite_des_ingenieurs.php">Suite des Ingénieurs</a></li>
                    </ul>
                </li>
                <li><a href="./about-us.html">About Us</a></li>
                <li><a href="./contact.php">Contact</a></li>
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
                    <div class="col-lg-2">
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
                                    <li><a href="./index.php">Home</a></li>
                                    <li class="active"><a href="index.php#rooms">Rooms</a>
                                        <ul class="dropdown">
                                            <li><a href="./deluxe_superior.php">Deluxe Superior</a></li>
                                            <li><a href="./deluxe_presidential.php">Deluxe Presidential</a></li>
                                            <li><a href="./suite_ambassador.php">Suite Ambassador</a></li>
                                            <li><a href="./suite_des_ingenieurs.php">Suite des Ingénieurs</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./about-us.html">About Us</a></li>
                                    <li><a href="./contact.php">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- fine Navbar -->
                      
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Deluxe Superior</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
    <div id="zona-superior">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        
                        <div><img src="img/room0.jpg" alt=""></div>
                                                         
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>Deluxe Superior</h3>

                                <!-- <div class="rdt-right">
                                    
                                    <a href="#">Booking Now</a>
                                </div> -->

                            </div>
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
                            <p class="f-para">Descrizione.....</p>
                        </div>
                    </div>

                    <div class="rd-reviews" id="secAjax">

                    </div> 
                    <button id="all_rev" class="revi">All the Reviews</button>
                    <div><br></div>

                    <div class="review-add">
                        <h4>Write your Review</h4>
                        <h5 id="statoRev" class="statoRev">
                            <?php
                                                        
                                if(isset($_SESSION['stato'])){
                                    if($_SESSION['stato'] == 'saved')
                                        echo "Your Review has been Saved!";
                                    
                                    
                                    //$_SESSION['stato'] == '';
                                }session_unset();
                            ?>
                        </h5>
                        <form action="leaveReview.php" method="POST" class="ra-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Nome*">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="email" placeholder="Email*">
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <h5>Review:</h5>
                                        
                                    </div>
                                    <textarea name="msg" placeholder="Your Review"></textarea>
                                    <button type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
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
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Rooms:</label>
                                <select id="room" name="room">
                                    <option value="deluxe_superior">Deluxe Superior</option>
                                </select>
                            </div>
                            <button type="submit">Check avalibility</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </section>
    <!-- Room Details Section End -->

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
    <script src="gestioneAjax.js"></script>

</body>

</html>