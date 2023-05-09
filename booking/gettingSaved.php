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
//prenotazione
$id_cam = $_POST['camera'];
$guests = $_POST['persone'];
$data_in = $_POST['in'];
$data_out = $_POST['out'];
$notti = $_POST['notti'];

$prezzo = $_SESSION['prezzo'];

//client
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$mail = $_POST['email'];
$tel = $_POST['tel'];
$psw = $_POST['psw'];

//Card
$nCard = $_POST['carta'];
$expi = $_POST['exp'];
$cvv = $_POST['cvv']; 

    //  use PHPMailer\PHPMailer\PHPMailer;
    //  use PHPMailer\PHPMailer\SMTP;
    //  use PHPMailer\PHPMailer\Exception;

    //  require 'PHPMailer/src/Exception.php';
    //  require 'PHPMailer/src/PHPMailer.php';
    //  require 'PHPMailer/src/SMTP.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        /* echo "camera: " . $id_cam. "<br>
                persone: " . $guests. "<br>
                check in: " . $data_in. "<br>
                check out: " . $data_out. "<br>
                nome: " . $nome. "<br>
                cognome: " . $cognome. "<br>
                mail: " . $mail. "<br>
                tel: " . $tel. "<br>
                psw: " . $psw. "<br>
                nCard: " . $nCard. "<br>
                exp: " . $expi. "<br>
                cvv: " . $cvv. "<br>";
        */

        $qi = "select * from lab.clienti where lab.clienti.email = $1";
        $re=pg_query_params($dbconn, $qi, array($mail));
        $control = pg_fetch_array($re, null, PGSQL_ASSOC);

        if(!($control)){//non è in clienti
            if($psw != ''){
                
                // CREA ACCOUNT
                $p = password_hash($psw, PASSWORD_BCRYPT);
                $qi="insert into lab.clienti(nome,cognome,email,telefono,pswd) values ($1,$2,$3,$4,$5)";
                $re=pg_query_params($dbconn, $qi, array($nome, $cognome,$mail,$tel,$p));
            
            } else {
                // NON CREA ACCOUNT
                $qi="insert into lab.clienti(nome,cognome,email,telefono) values ($1,$2,$3,$4)";
                $re=pg_query_params($dbconn, $qi, array($nome, $cognome,$mail,$tel));
            }    
        
            
        } else { // è in clienti

            if($control['pswd'] != '' && !password_verify($psw, $control['pswd'])){
                //password inserita non è corretta
                $_SESSION['show'] = '<div class="bookKO"><h5>wrong password for the given email.<br>leave the password field empty since you already are registered :)</h5></div>';
                //header("Location: ../error.php");
                die;
            }
            //password corretta o == ''
        }


        $qi="select lab.clienti.id from lab.clienti where lab.clienti.email=$1";
        $re=pg_query_params($dbconn, $qi, array($mail));
        $tuple = pg_fetch_array($re);

        $id_cliente = $tuple['id'];


        $qi=" select P.id from lab.prenotazioni P 
                where P.camera = $1 and (
                ($2 between P.data_in and P.data_out) or ($3 between P.data_in and P.data_out) or ($2 < P.data_in and $3 > P.data_out)
            )";
        $re=pg_query_params($dbconn, $qi, array($id_cam,$data_in,$data_out));

        if(!($tuple1 = pg_fetch_array($re, null, PGSQL_ASSOC))){

            $qi="insert into lab.prenotazioni(cliente, camera, persone, data_in, data_out)
                    values ($1, $2, $3, $4, $5)";
            $res = pg_query_params($dbconn, $qi, array($id_cliente, $id_cam, $guests, $data_in, $data_out));
            if($res){

                $query = "select * from lab.clienti where nome='mailUser' and cognome='mailUser'";
                $result = pg_query($dbconn, $query) or die("unable to execute query...: " . pg_last_error());
                if($result = pg_fetch_array($result, null, PGSQL_ASSOC)){
                    $email = new PHPMailer(true);

                    $miaMail = $result['email'];
                    $miaPswd = $result['pswd'];
                    $msg = '<h1>Hi ' . $nome .' ' . $cognome . '</h1><br><h3>Thank You! Your booking has been saved<br> 
                        this is the Summary of your staying at Hotel des Ingenieurs<br>
                        <b>check-in: ' . $data_in . ' | check-out: ' . $data_out . '<br>
                        ' . $notti . ' nights | ' . $guests . ' guests<br></b></h3> 
                        <div style="color: #cf0707"><b>Total: ' . $prezzo . '€</b></div>
                        the bill has been sent on the card number: ' . $nCard . '<br>
                        <h4>Thank you from the Hotel des Ingenieurs,<br> we hope you enjoy your stay</h4><br>Sapienza © 2023';
                    $subj = 'Booking confirmation';
                    try {
                        //Impostazioni server
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                //Debug mode
                        $email->isSMTP();                                       //Invio tramite SMTP
                        $email->Host       = 'smtp.gmail.com';                  //Server SMTP
                        $email->SMTPAuth   = true;                              //Abilita autenticazione SMTP
                        $email->Username   = $miaMail;                          //SMTP username
                        $email->Password   = $miaPswd;                          //SMTP password
                        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    //Abilita TLS implicito
                        $email->Port       = 587;                               //Porta SMTP
                    
                        //Recipients
                        $email->setFrom($miaMail, 'Hotel des Ingenieurs');
                        $email->addAddress($mail, 'Dest');                      //Indirizzo destinatario
                        $email->addReplyTo($miaMail, 'Hotel des Ingenieurs');   //Indirizzo di risposta
                        
                        //Content
                        $email->isHTML(true);                                   //Abilita invio in HTML
                        $email->Subject = $subj;                                //Oggetto 
                        $email->Body    = $msg;          //Corpo email
                        $email->AltBody = $msg;                                 //Testo alternativo
        
                        $email->send();
                        //echo '<h1>Il messaggio è stato inviato con successo</h1>';          
                    
                    } catch (Exception $e) {
                        $_SESSION['mailer'] == 'notsuccessKO';
                    }

                } else {
                    $_SESSION['mailer'] = 'notsuccess';
                }
                

                $_SESSION['success'] = 'success'; 
                header("Location: ../index.php");
                die;

            } else{
                $_SESSION['show'] = "Something went wrong<br>Your booking has not been saved<br>Please try again";
                header("Location: ../error.php");
                die;
            } 
        } else {
            $_SESSION['success'] = 'notsuccess'; 
            header("Location: ../index.php");
            die;
        }
        
    ?>
    
</body>
</html>