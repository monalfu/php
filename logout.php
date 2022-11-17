<?php
session_start();
unset($_SESSION['id']);
$_SESSION = []; //borra la matriz, borrando todo lo de la sesión. el destroy no lo borra todo
header ("Location: index.php");
?>