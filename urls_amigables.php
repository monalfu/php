<?php
$root = "/";
$uri = $_SERVER['REQUEST_URI'];
$dir = substr($uri,strlen($root));
$links = explode("/",$dir);

$methods = ["pagina1","pagina2","pagina3"]; //establecer páginas

if ($links[0] == ""){
    $pag = "portada";
} else if (!in_array($links[0],$methods)){
    $pag = "error";
} else {
    $pag = $links[0];
}

include($pag . ".php");
?>