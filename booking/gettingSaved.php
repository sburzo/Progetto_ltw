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

//prenotazione
$id_cam = $_POST['camera'];
$guests = $_POST['persone'];
//$prezzo = $_POST['prezzo'];
$data_in = $_POST['in'];
$data_out = $_POST['out'];
//$notti = $_POST['notti'];

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
        echo "camera: " . $id_cam. "<br>
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

    ?>
    
</body>
</html>