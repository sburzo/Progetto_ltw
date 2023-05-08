
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

session_start();
$user = $_POST['username'];
$pwd = $_POST['psw'];


$_SESSION['em'] = '';
$_SESSION['pwww'] = '';




    $qi = "select * from lab.clienti where lab.clienti.email = $1";
    $re=pg_query_params($dbconn, $qi, array($user));
    $control = pg_fetch_array($re, null, PGSQL_ASSOC);
    if(!($control)){
        //non è in clienti
        $_SESSION['errore'] = 'errore';   
        header("Location: ./myArea.php");
        die;
        
    } else { // è in clienti

        if($control['pswd'] != '' && !password_verify($pwd, $control['pswd'])){
            //password inserita non è corretta
            $_SESSION['errore'] = 'errore';   
            header("Location: ./myArea.php");
            die;
        }
        $_SESSION['em'] = $user;
        $_SESSION['pwww'] = $pwd;
        // LOGGATO
    }


    

?>
<!DOCTYPE html>

<head>

    <title>Hôtel des Ingénieurs</title>

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
    <div id="unlocker">
        <div class="unlocker">
            <img class="unlocker" src="img/unlock.gif"/>
        </div>
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
                <li class="active"><a href="#">My Area</a>
                    <ul class="dropdown">
                        <li><a href="#">Your Bookings</a></li>
                        <li><a href="#">Your Reviews</a></li>
                        <li><a href="./logout.php">Logout</a></li>
                        <!-- <form action="logout.php" method="POST"><input type="submit" value="Logout"></form> -->
                    </ul>
                </li>
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
                                    <li class="active"><a href="#">My Area</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Your Bookings</a></li>
                                            <li><a href="#">Your Reviews</a></li>
                                            <li><a href="./logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- menu utente loggato -->
                
            </div>
        </div>
    </header>
    <!-- Header End -->

    <h1>welcome</h1>

   

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