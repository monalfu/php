<?php
header('Access-Control-Allow-Origin: *'); //encabezado de respuesta indica si la respuesta se puede compartir con el código de solicitud del origen dado, con * como comodín

$root = "/";
$uri = $_SERVER['REQUEST_URI'];
$dir = substr($uri,strlen($root));
$links = explode("/",$dir);

$json = "error"; //control de fallos

switch ($links[0]){
    case "metodo1":
        $json = [ "clave1" => "valor1" ];
        break;
    case "metodo2":
        $json = [ "clave2" => "valor2" ];
        break;
    case "metodo3":
        $json = [ "clave3" => "valor3" ];
        break;
}

header("Content-Type: application/json"); //establece cabecera de la linea 24. Útil para api públicas para dar más información al programador que la vaya a usar
echo json_encode($json);
?>