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
$data_in = $_POST['data_in'];
$data_out = $_POST['data_out'];            

if(($data_in == 'mm/dd/yyyy') || ($data_out == 'mm/dd/yyyy')){
    $_SESSION['show'] = "the given Date is not in a valid format ";
    header("Location: error.php");
    die;
}
?>
<!DOCTYPE html>
<html>
    <head>
    <!-- <meta charset="UTF-8"> -->
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
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="index.php#rooms">Rooms</a>
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
                                        <li><a href="./index.php">Home</a></li>
                                        <li><a href="index.php#rooms">Rooms</a>
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
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <h2>AVAILABLE ROOMS</h2>
                            <div class="bt-option">
                                <a href="./index.php">Home</a>
                                <span>Room Selection</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->

        <?php
            if ($dbconn) {

                $guests = intval($_POST['guests']);
                $room = $_POST['room'];
                echo " 
                    <div style='background-color: lightgrey;'><b>Your preferences:</b>
                    <br>  Check-in:  " . $data_in . "  Check-out:  " . $data_out . "  Guests:  " . $guests . "</div><br>";
                //$_SESSION['in'] = $data_in;
                //$_SESSION['out'] = $data_out;
                //$_SESSION['guests'] = $guests;
                //$_SESSION['room'] = $room;
               
                //camere: 1-5 deluxe_superior, 6-9 deluxe_presidential, 10-12 suite_ambassador, 13-14 suite_ingenieurs
                //posti:            3                       4                       4                       6

                $query = null;
                $res = null;
                switch($room){
                    case 'all the rooms':{
                        $query = "select A.id, A.posti, A.nome, A.descrizione from (
                            (select C.id, C.posti, C.nome, C.descrizione from lab.camere C where C.posti >= $1)
                            except
                            (select C.id, C.posti, C.nome, C.descrizione from lab.camere C join lab.prenotazioni P on P.camera = C.id 
                                where ($2 between P.data_in and P.data_out) or ($3 between P.data_in and P.data_out) or ($2 < P.data_in and $3 > P.data_out)
                            )
                        ) as A order by A.id";

                        //recupero stanze libere !!    
                        $res = pg_query_params($dbconn, $query, array($guests, $data_in, $data_out));


                    break;
                    };
                    case 'deluxe_superior':{
                     
                    };
                    case 'deluxe_presidential':{
                       
                    };
                    case 'suite_ambassador':{
                        
                    };
                    case 'suite_ingenieurs':{
                        $query = 
                        "select A.id, A.posti, A.nome, A.descrizione from (
                            (select C.id, C.posti, C.nome, C.descrizione from lab.camere C where C.nome = $1 and C.posti >= $2)
                            except
                            (select C.id, C.posti, C.nome, C.descrizione from lab.camere C join lab.prenotazioni P on P.camera = C.id 
                                where ($3 between P.data_in and P.data_out) or ($4 between P.data_in and P.data_out) or ($3 < P.data_in and $4 > P.data_out)
                            )
                        ) as A order by A.id";
                        
                        //recupero stanze libere !!    
                        $res = pg_query_params($dbconn, $query, array($room, $guests, $data_in, $data_out));
                    break;
                    };
                    default:{
                        $_SESSION['show'] = "The selected room is not allowed ";
                        header("Location: error.php");
                        die;
                    }
                }

                $notti = floor((strtotime($data_out) - strtotime($data_in)) / 86400);
                //echo "<table border=1>";
                $conta = 0;
                $r1 = 0;
                $r2 = 0;
                $r3 = 0;
                $r4 = 0;
                while (($tupla = pg_fetch_array($res, null, PGSQL_ASSOC))!= null) {
                    
                    $cam = $tupla['nome'];
                    switch($cam){
                        case 'deluxe_superior':{
                            $r1++;
                            $prezzo = $notti * 220;
                            echo '<section class="hero-section2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        
                                    </div>
                                    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                                        <div class="booking-form2">
                                            <h3>Deluxe Superior</h3>
                                            <h4 style="color: #cf0707;">Total: ' . $prezzo .'€</h4>
                                            <h5>220€ /night  |  ' . $notti .' nights</h5>
                                            <h6>price for up to 3 guests</h6>
                                            <form action="booking/book.php" method="POST" name="booking">
                                                <input type="number" name="id" value="'. $tupla['id'] .'" style="display:none !important;">
                                                <input type="number" name="notti" value="' . $notti . '" style="display:none !important;">
                                                <input type="number" name="guests" value="' . $guests . '" style="display:none !important;">
                                                <input type="number" name="prezzo" value="' . $prezzo . '" style="display:none !important;">
                                                <input type="text" name="data_out" value="' . $data_out . '" style="display:none !important;">
                                                <input type="text" name="data_in" value="' . $data_in . '" style="display:none !important;">
                                                <button type="submit">Book Now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-slider owl-carousel">
                                <div class="hs-item set-bg" data-setbg="img/room0h.jpg"></div>
                                <div class="hs-item set-bg" data-setbg="img/room01.png"></div>
                                <div class="hs-item set-bg" data-setbg="img/bathSuite1h.jpg"></div>
                            </div>
                            </section>
                            <br>';
                            break;
                        };
                        case 'deluxe_presidential':{
                            $r2++;
                            $prezzo = $notti * 280;
                            echo '<section class="hero-section2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        
                                    </div>
                                    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                                        <div class="booking-form2">
                                            <h3>Deluxe Presidential</h3>
                                            <h4 style="color: #cf0707;">Total: ' . $prezzo .'€</h4>
                                            <h5>280€ /night  |  ' . $notti .' nights</h5>
                                            <h6>price for up to 4 guests</h6>
                                            <form action="booking/book.php" method="POST" name="booking">
                                                <input type="number" name="id" value="'. $tupla['id'] .'" style="display:none !important;">
                                                <input type="number" name="notti" value="' . $notti . '" style="display:none !important;">
                                                <input type="number" name="guests" value="' . $guests . '" style="display:none !important;">
                                                <input type="number" name="prezzo" value="' . $prezzo . '" style="display:none !important;">
                                                <input type="text" name="data_out" value="' . $data_out . '" style="display:none !important;">
                                                <input type="text" name="data_in" value="' . $data_in . '" style="display:none !important;">
                                                <button type="submit">Book Now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-slider owl-carousel">
                                <div class="hs-item set-bg" data-setbg="img/room1h.png"></div>
                                <div class="hs-item set-bg" data-setbg="img/bathSuite1h.jpg"></div>
                                <div class="hs-item set-bg" data-setbg="img/bath0h.jpg"></div>
                            </div>
                            </section>
                            <br>';
                            break;
                        };
                        case 'suite_ambassador':{
                            $r3++;
                            $prezzo = $notti * 350;
                            echo '<section class="hero-section2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        
                                    </div>
                                    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                                        <div class="booking-form2">
                                            <h3>Suite Ambassador</h3>
                                            <h4 style="color: #cf0707;">Total: ' . $prezzo . '€</h4>
                                            <h5>350€ /night  |  ' . $notti .' nights</h5>
                                            <h6>price for up to 4 guests</h6>
                                            <form action="booking/book.php" method="POST" name="booking">
                                                <input type="number" name="id" value="'. $tupla['id'] .'" style="display:none !important;">
                                                <input type="number" name="notti" value="' . $notti . '" style="display:none !important;">
                                                <input type="number" name="guests" value="' . $guests . '" style="display:none !important;">
                                                <input type="number" name="prezzo" value="' . $prezzo . '" style="display:none !important;">
                                                <input type="text" name="data_out" value="' . $data_out . '" style="display:none !important;">
                                                <input type="text" name="data_in" value="' . $data_in . '" style="display:none !important;">
                                                <button type="submit">Book Now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-slider owl-carousel">
                                <div class="hs-item set-bg" data-setbg="img/suite0h.jpg"></div>
                                <div class="hs-item set-bg" data-setbg="img/suite01h.jpg"></div>
                                <div class="hs-item set-bg" data-setbg="img/bath1.jpeg"></div>
                            </div>
                        </section>
                        <br>';
                            break;
                        };
                        case 'suite_ingenieurs':{
                            $r4++;
                            $prezzo = $notti * 500;
                            echo '<section class="hero-section2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        
                                    </div>
                                    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                                        <div class="booking-form2">
                                            <h3>Suite des Ingénieurs</h3>
                                            <h4 style="color: #cf0707;">Total: ' . $prezzo .'€</h4>
                                            <h5>500€ /night  |  ' . $notti .' nights</h5>
                                            <h6>price for up to 6 guests</h6>
                                            <form action="booking/book.php" method="POST" name="booking">
                                                <input type="number" name="id" value="'. $tupla['id'] .'" style="display:none !important;">
                                                <input type="number" name="notti" value="' . $notti . '" style="display:none !important;">
                                                <input type="number" name="guests" value="' . $guests . '" style="display:none !important;">
                                                <input type="number" name="prezzo" value="' . $prezzo . '" style="display:none !important;">
                                                <input type="text" name="data_out" value="' . $data_out . '" style="display:none !important;">
                                                <input type="text" name="data_in" value="' . $data_in . '" style="display:none !important;">
                                                <button type="submit">Book Now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-slider owl-carousel">
                                <div class="hs-item set-bg" data-setbg="img/suite1h.png"></div>
                                <div class="hs-item set-bg" data-setbg="img/suite11h.jpg"></div>            
                                <div class="hs-item set-bg" data-setbg="img/rooftop0h.jpg"></div>
                                <div class="hs-item set-bg" data-setbg="img/bath1.jpeg"></div>
                            </div>
                        </section>
                        <br>';
                            break;
                        };
                        default:{
                            echo "<h3 style='color: red; text-align: center;'>The selected room does not match with the indexed database :(</h3>";
                        }
                            
                    }
                    $conta++;
                }
                if($conta == 0){
                    echo "<div style='text-align: center;'>
                    <h3>We are sorry, there are no rooms available for the selected params</h3>
                    <h4>Try to select different parameters to your preferences</h4></div><br>";
                }
                
            }
            
        ?> 

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
