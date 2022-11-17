<?php
include("config.php");
$bd = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS); //conecta con la base de datos
$con = $bd->prepare('SELECT nombres FROM tabla');
$con->execute();
$res = $con->fetchAll(PDO::FETCH_ASSOC); //lectura de datos

for ($i = 0; $i < count($res); $i ++){
    echo $res[$i]['nombres'];
}
?>