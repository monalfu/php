<?php
session_start(); //Iniciar una nueva o reanudar una sesión existente. Funciona como acivador

$idiomas = ["es","ca","en"];

if (isset($_GET['idioma'])){ //se ha pedido un idioma?
    if (!in_array($_GET['idioma'],$idiomas)){ //si el idioma pedido no se encuentra dentro de las opciones mostras idioma por defecto
        idiomaPorDefecto();
    } else { //si hay y existe define la constante LANG con el idioma seleccionado
        define("LANG",$_GET['idioma']);    
    }
    $_SESSION['idioma'] = LANG; //abre la sesión del idioma seleccionado
} else { //si no pide un idioma 
    if (!isset($_SESSION['idioma'])){ //si no hay un idioma pedido anteriormente
        idiomaPorDefecto();
    } else { //si no poner el idioma guardado anteriomente
        define("LANG",$_SESSION['idioma']);
    }
}

function idiomaPorDefecto(){
    global $idiomas; //hacer global una variable definida anteriormente. Diferencia con JS
    $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2); //extrae el idioma del servidor y coge las 2 primeras letras 
    if (!in_array($idioma,$idiomas)){ //si el idioma de servidor no pertenece a las opciones de la variable idiomas, poner en español
        define("LANG","es");
    } else { //si no establecer el idioma del servidorç
        define("LANG",$idioma);
    }
}
?>