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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Review</title>
</head>
<body>
    <?php
    if(!$dbconn){
        echo "Impossibile connettersi al database";
        header("Location: error.html");
        die;
    }

    $mail = $_POST['email'];
    $nome = $_POST['name'];
    $msg = $_POST['msg'];

    $query = "select * from lab.clienti where email = $1";
    $res = pg_query_params($dbconn, $query, array($mail));
    if(!($tuple = pg_fetch_array($res,null, PGSQL_ASSOC))){
        header("Location: error.html");
        echo "The given email is not associated to any booking<br>";
        die;
    } else {
        $qi = "insert into lab.recensioni(nome, descrizione) values($1, $2)";
        $re = pg_query_params($dbconn, $qi, array($nome, $msg));
        if($re){
            echo "Your Review has been Saved!<br>";
            
        } else die;
    }
    

    ?>
</body>
</html>