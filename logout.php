<?php
session_start();
session_destroy();

session_start();
$_SESSION['out'] = 'out';
header('Location: ./myArea.php');

?>
