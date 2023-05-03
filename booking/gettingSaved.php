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

                $qi="select * from lab.clienti where lab.clienti.email=$1";
                $re=pg_query_params($dbconn, $qi, array($mail));
                if(!($tuple=pg_fetch_array($re,null, PGSQL_ASSOC))){
                    $qi="insert into lab.clienti(nome,cognome,email,telefono,pswd) values ($1,$2,$3,$4,$5)";
                    $re=pg_query_params($dbconn, $qi, array($nome, $cognome,$mail,$tel,$psw));
                }
                
                $qi="select lab.clienti.id from lab.clienti where lab.clienti.email=$1";
                $re=pg_query_params($dbconn, $qi, array($mail));
                $tuple = pg_fetch_assoc($re);

                $qi="select * from lab.prenotazioni where 
                lab.prenotazioni.camera=$1 and
                lab.prenotazioni.data_in=$2 and
                lab.prenotazioni.data_out=$3";
                $re=pg_query_params($dbconn, $qi, array($id_cam,$data_in,$data_out));

                if(!($tuple1=pg_fetch_array($re,null, PGSQL_ASSOC))){
                
                    $id_cli=$tuple['id']; //recupero id_cli
                    $qi="insert into lab.prenotazioni(cliente,camera,persone,data_in,data_out)
                    values ($1,$2,$3,$4,$5)";
                    $re = pg_query_params($dbconn, $qi, array($id_cli, $id_cam,$guests,$data_in,$data_out));
                    if($re){
                        echo "<br>Your booking has been Saved!";
                        
                        
                    } else die;
                }else{
                    echo"<br>camera gia prenotata in queste date";
                }
                
                

    ?>
    
</body>
</html>