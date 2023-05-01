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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Review</title>
</head>
<body>
    <?php
    function validateEmail($mail) {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return 0;
        }
        else {
            return 1;
        }
    }
    if(!$dbconn){
        $_SESSION['show'] = "<b>Server is not responding<br>message: </b>Impossibile connettersi al database";
        header("Location: error.php");
        die;
    }

    $mail = $_POST['email'];
    $nome = $_POST['name'];
    $msg = $_POST['msg'];
    
    $query = "select * from lab.clienti where email = $1";
    $res = pg_query_params($dbconn, $query, array($mail));
    if(validateEmail($mail)==1){
        echo "Formato mail non valida";
        die;
    }
    if(!($tuple = pg_fetch_array($res,null, PGSQL_ASSOC))){
        
        $_SESSION['show'] = "The given email is not associated to any booking<br>Only customers can leave a review";
        header("Location: error.php");
        die;
    } else {
        $qi = "insert into lab.recensioni(nome, descrizione) values($1, $2)";
        $re = pg_query_params($dbconn, $qi, array($nome, $msg));
        if($re){
            //echo "Your Review has been Saved!";
            $_SESSION['stato'] = "saved";
            
        } else die;
    }
    

    ?>
    <script>window.history.back();</script>
</body>
</html>