<?php
if (isset($_POST['email'],$_POST['password'],$_POST['username'])) { //si existen 
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS); //variable que guarda el nombre de usuario filtrando carácteres especiales
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); //variable que almacena el correo y lo valida
    $pass = $_POST['pass']; //variable que almacena la contraseña
    
    if (!$email){ 
        //
    } else {
        $pass = password_hash($pass,PASSWORD_DEFAULT); //si el email es validado encriptar la contraseña introducida para almacenarla
    
        include("config.php");
        $bd = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS); //conexión base de datos
        $res = $bd->prepare('INSERT INTO users (email,pass,username) VALUES (:email,:pass,:username)'); //variable que almacena los datos de la tabla seleccionada con las características descritas
    
        $res->execute([ //ejecuta
            ":email" => $email,
            ":pass" => $pass,
            ":username" => $username
        ]);

        //
    }
}