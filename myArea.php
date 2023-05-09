
<?php
session_start();
?>
<!DOCTYPE html>

<head>

    <title>Hôtel des Ingénieurs - MyArea</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <script src="js/index.js"></script>

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

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>

        <div class="header-configure-area">

            <a href="#" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./index.php#rooms">Rooms</a>
                    <ul class="dropdown">
                        <li><a href="./deluxe_superior.php">Deluxe Superior</a></li>
                        <li><a href="./deluxe_presidential.php">Deluxe Presidential</a></li>
                        <li><a href="./suite_ambassador.php">Suite Ambassador</a></li>
                        <li><a href="./suite_des_ingenieurs.php">Suite des Ingénieurs</a></li>
                    </ul>
                </li>
                <li><a href="./about-us.html">About Us</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <li class="active"><a href="./myArea.php">My Area</a></li>
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
            <li><i class="fa fa-phone"></i> (12) 345 67890</li>
            <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
        </ul>s
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
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
                                    <li><a href="./index.php#rooms">Rooms</a>
                                        <ul class="dropdown">
                                            <li><a href="./deluxe_superior.php">Deluxe Superior</a></li>
                                            <li><a href="./deluxe_presidential.php">Deluxe Presidential</a></li>
                                            <li><a href="./suite_ambassador.php">Suite Ambassador</a></li>
                                            <li><a href="./suite_des_ingenieurs.php">Suite des Ingénieurs</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./about-us.html">About Us</a></li>
                                    <li><a href="./contact.php">Contact</a></li>
                                    <li class="active"><a href="./myArea.php">My Area</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <?php
        if(isset($_SESSION['out']) && $_SESSION['out'] != ''){
            echo '<div id="control"><h3>You are now logged out</h3></div>';
            $_SESSION['out'] = '';
        }
    ?>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Login</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>Personal Area</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cent">
            <img src="img/user.png" width="15%">
                <?php
                    if(isset($_SESSION['errore']) && $_SESSION['errore'] != ''){
                        echo '<div id="control">email or password not correct<br>
                        otherwise, there is no account for the given credentials</div>';
                        $_SESSION['errore'] = '';
                    }
                ?>
            <br> 
        </div>
    </div>

    <section class="room-details-section spad">
<div id="zona-superior">
    <div class="container">
        <div class="row">
            <div class="col">        
                <div class="review-add">
                    <form action="private.php" method="POST" class="ra-form" name="login_form" onSubmit="return verifyLogin();">
                            <div class="d-flex justify-content-center">
                                <div class="">
                                    <input type="email" name="username" placeholder="Email *"  value="<?php  
                                        if(isset($_SESSION['em']) && $_SESSION['em'] != '')
                                            echo $_SESSION['em'];
                                        ?>" required>                        
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="">
                                    <input type="password" name="psw" placeholder="Password *" value="<?php  
                                        if(isset($_SESSION['pwww']) && $_SESSION['pwww'] != '')
                                            echo $_SESSION['pwww'];
                                        ?>" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class=" primary-btn " >Login</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>    
<!-- registration Section End -->
    <!-- Breadcrumb Section End -->
    
                    <br>
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
</body>

</html>