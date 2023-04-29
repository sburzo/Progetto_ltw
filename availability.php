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
?>
<!DOCTYPE html>
<html>
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
                    <li><a href="index.php#rooms">Rooms</a>
                        <ul class="dropdown">
                            <li><a href="./deluxe_superior.php">Deluxe Superior</a></li>
                            <li><a href="./deluxe_presidential.html">Deluxe Presidential</a></li>
                            <li><a href="./suite_ambassador.html">Suite Ambassador</a></li>
                            <li><a href="./suite_des_ingenieurs.html">Suite des Ingénieurs</a></li>
                        </ul>
                    </li>
                    <li><a href="./about-us.html">About Us</a></li>
                    <li><a href="./contact.html">Contact</a></li>
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
                                                <li><a href="./deluxe_presidential.html">Deluxe Presidential</a></li>
                                                <li><a href="./suite_ambassador.html">Suite Ambassador</a></li>
                                                <li><a href="./suite_des_ingenieurs.html">Suite des Ingénieurs</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="./about-us.html">About Us</a></li>
                                        <li><a href="./contact.html">Contact</a></li>
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
            if ($dbconn) {

                $data_in = $_POST['data_in'];
                $data_out = $_POST['data_out'];
                $guests = intval($_POST['guests']);
                $room = $_POST['room'];
                
                echo "<h3>AVAILABLE ROOMS</h3> <br> 
                    <div style='background-color: lightgrey;'><b>your preferences:</b>
                    <br> check-in: " . $data_in . ", check-out: " . $data_out . ", guests: " . $guests . ", " . $room . "</div>";
                //$_SESSION['in'] = $data_in;
                //$_SESSION['out'] = $data_out;
                //$_SESSION['guests'] = $guests;
                //$_SESSION['room'] = $room;
               
                //camere: 1-5 deluxe_superior, 6-9 deluxe_presidential, 10-12 suite_ambassador, 13-14 suite_ingenieurs
                //posti:            3                       4                       4                       6
                //if()

                $query = null;
                $res = null;
                switch($room){
                    case 'all the rooms':{
                        $query = "select A.id, A.posti, A.nome, A.descrizione from (
                            (select C.id, C.posti, C.nome, C.descrizione from lab.camere C where C.posti >= $1)
                            except
                            (select C.id, C.posti, C.nome, C.descrizione from lab.camere C join lab.prenotazioni P on P.camera = C.id 
                                where ($2 between P.data_in and P.data_out) or ($3 between P.data_in and P.data_out) 
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
                                where ($3 between P.data_in and P.data_out) or ($4 between P.data_in and P.data_out) 
                            )
                        ) as A order by A.id";
                        
                        //recupero stanze libere !!    
                        $res = pg_query_params($dbconn, $query, array($room, $guests, $data_in, $data_out));
                    break;
                    };
                    default:{
                        $_SESSION['show'] = "the selected room is not allowed ";
                        header("Location: error.php");
                        die;
                    }
                }

                echo "<table border=1>";
                while ($tupla = pg_fetch_array($res, null, PGSQL_ASSOC)) {
                    echo "<tr>";
                    foreach ($tupla as $col_name => $value){ 
                        echo "<td>" .$col_name . " : " . $value . "</td>";
                        
                    }
                    echo '<td><div class="rdt-right">
                                    
                        <a href="#">Reserve this Room</a>
                    </div></td>';
                    
                    echo "</tr>";
                }
                echo "</table>";

                /*while($tuple = pg_fetch_array($res, null, PGSQL_ASSOC)){

                    echo $tuple['id'] . " ";
                    echo $tuple['posti'] . "<br>";
                }*/


                /*                
                if (!($tuple = pg_fetch_array($result, null, PGSQL_ASSOC))) {
                    echo "<h1>Non sembra che ti sia registrato/a</h1>
                        <a href=../registrazione/index.html> Clicca qui per farlo </a>";

                } else {

                    //$password = $_POST['inputPassword'];
                    $password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT); //hash della password

                    echo $password;
                    $q2 = "select * from lab.utenti where email = $1 and pswd = $2";
                    $res = pg_query_params($dbconn, $q2, array($email, $password));

                    if (!($tuple = pg_fetch_array($res, null, PGSQL_ASSOC))) {
                        echo "<h1> La password e' sbagliata! </h1>
                            <a href=index.html> Clicca qui per loggarti </a>";
                    }
                    else {
                        $nome = $tuple['nome'];
                        echo "<a href=../welcome.php?name=$nome> Premi qui </a>
                            per inziare a usare il sito";
                    }
                } */
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
