<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    // PER LA SICUREZZA CSRF
    header("Location: /");
}
else {
    $dbconn = pg_connect("host=localhost port=5432 dbname=LTWphp 
                user=postgres password=adminPG") 
                or die('Could not connect: ' . pg_last_error());
}

$id_cam = $_POST['id'];
$guests = $_POST['guests'];
$prezzo = $_POST['prezzo'];
$data_in = $_POST['data_in'];
$data_out = $_POST['data_out'];
$notti = $_POST['notti'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Hôtel des Ingenieurs</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/hoc.css" type="text/css">
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

        <a href="../index.php" class="bk-btn">Booking Now</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../index.php#rooms">Rooms</a>
                <ul class="dropdown">
                    <li><a href="../deluxe_superior.php">Deluxe Superior</a></li>
                    <li><a href="../deluxe_presidential.php">Deluxe Presidential</a></li>
                    <li><a href="../suite_ambassador.php">Suite Ambassador</a></li>
                    <li><a href="../suite_des_ingenieurs.php">Suite des Ingénieurs</a></li>
                </ul>
            </li>
            <li><a href="../about-us.html">About Us</a></li>
            <li><a href="../contact.php">Contact</a></li>
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
                        <a href="../index.php">
                            <img src="../img/logo2.JPG" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li><a href="../index.php">Home</a></li>
                                <li><a href="../index.php#rooms">Rooms</a>
                                    <ul class="dropdown">
                                        <li><a href="../deluxe_superior.php">Deluxe Superior</a></li>
                                        <li><a href="../deluxe_presidential.php">Deluxe Presidential</a></li>
                                        <li><a href="../suite_ambassador.php">Suite Ambassador</a></li>
                                        <li><a href="../suite_des_ingenieurs.php">Suite des Ingénieurs</a></li>
                                    </ul>
                                </li>
                                <li><a href="../about-us.html">About Us</a></li>
                                <li><a href="../contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- fine Navbar -->

<!-- registration Section Begin -->
<!-- registration Section Begin -->
<section class="room-details-section spad">
<div id="zona-superior">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    
                    <div><img src="img/room0.jpg" alt=""></div>
                                                     
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>Complete Booking</h3>

                            

                        </div>
                       <!--  <h2>220€<span>/Night</span></h2>
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
                        <p class="f-para">Descrizione.....</p> -->
                    </div>
                </div>

                <div class="rd-reviews" id="secAjax">

                </div>             

                <div class="review-add">
                    
                    <form action="gettingSaved.php" method="POST" class="ra-form" onsubmit="return verifica();">
                        <h4>Personal Information</h4>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <input type="text" name="nome" placeholder="Name*">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="cognome" placeholder="Surname*">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" placeholder="Email*">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="tel" placeholder="Tel*">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><hr></div>

                        </div>
                        <h4>Create an Account</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <h5>add a Password to be able to check your bookings</h5>
                            </div>

                            <div class="col-lg-6">
                                <input type="password" name="psw" placeholder="Password">
                            </div>
                            <div class="col-lg-6">
                                <input type="password" name="psw2" placeholder="Redigit the Password">
                            </div>

                        </div>
                        <?php
                            echo '
                            <input type="number" name="camera" value="' . $id_cam . '" style="display:none !important;">
                            <input type="number" name="persone" value="' . $guests . '" style="display:none !important;">
                            <input type="text" name="in" value="' . $data_in . '" style="display:none !important;">
                            <input type="text" name="out" value="' . $data_out . '" style="display:none !important;">
                            ';
                         
                        ?>
                        <div class="row">
                            <div class="col-lg-12"><hr></div>

                        </div>
                        <h4>Card Information</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <h6></h6>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="carta" placeholder="Card Number">

                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="meseExp" name="exp" placeholder="Expiration" value="MM/YYYY" readonly>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="cvv" placeholder="CVV">
                            </div>
                            <div class="col-lg-12">
                                <button type="submit">Done</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Summary</h3>
                    <form >
                        <div class="check-date">
                            <label for="date-in">Check-in:</label>
                            <input type="text" class="date" value="<?php echo $data_in;?>" readonly>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check-out:</label>
                            <input type="text" class="date" value="<?php echo $data_out;?>" readonly>
                        </div>
                        <div class="check-date">
                            <label for="guest">Guests:</label>
                            <input type="text" class="date" value="<?php echo $guests;?>" readonly>
                        </div>
                        <div class="check-date">
                            <label for="nights">Nights:</label>
                            <input type="text" class="date" value="<?php echo $notti;?>" readonly>
                        </div>
                        <div class="check-date">
                            <h4>Total:<h4>
                            <input style="color: #cf0707;" type="text" class="date" value="<?php echo $prezzo;?> €" readonly>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>    
<!-- registration Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="../img/footer-logo.png" alt="">
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
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>