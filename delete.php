
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

$id = $_POST['id_rec'];
$qi = "delete from lab.recensioni where id = $1";
        $re = pg_query_params($dbconn, $qi, array($id));
        if($re){
            //FATTO
            
            
            
            //$_POST['username'] = $_SESSION['em'];
            //$_POST['psw'] = $_SESSION['pwww'];
            //header("Location: ./private.php");
            //die;

        } else { 
            $_SESSION['show'] = "Unknown error occurred during connection query";
            header("Location: ./error.php");
            die;
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style = "display: none !important;">
        <form action="private.php" method="POST" id="myForm">
        <input type="email" name="username" placeholder="Email *" value="<?php  
                        if(isset($_SESSION['em']) && $_SESSION['em'] != '')
                            echo $_SESSION['em'];
                    ?>">  
        <input type="password" name="psw" placeholder="Password *" value="<?php  
                        if(isset($_SESSION['pwww']) && $_SESSION['pwww'] != '')
                            echo $_SESSION['pwww'];
                    ?>">        
        <input type="submit">              
        </form>
    </div>
    <script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
</body>
</html>