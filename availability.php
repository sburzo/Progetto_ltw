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
    </head>
    <body>
        <?php
            if ($dbconn) {

                $data_in = $_POST['data_in'];
                $data_out = $_POST['data_out'];
                $guests = intval($_POST['guests']);
                $room = $_POST['room'];
                
                //    echo "the selected room is not allowed ";
                //    header("Location: error.html");
                //    die;
                
                echo "<h1>CAMERE DISPONIBILI <br>Buonasera :)</h1> <br> $data_in , $data_out , $guests , $room  <br>";
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
                    case 'tutte le camere':{
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
                        echo "the selected room is not allowed ";
                        header("Location: error.html");
                        die;
                    }
                }

                echo "<table border=1>";
                while ($tupla = pg_fetch_array($res, null, PGSQL_ASSOC)) {
                    echo "<tr>";
                    foreach ($tupla as $col_name => $value){ 
                        echo "<td>" .$col_name . " : " . $value . "</td>";
                    }
                    
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
    </body>
</html>