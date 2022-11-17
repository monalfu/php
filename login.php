<?php
session_start(); //activador de sesión

if (isset($_POST['email'],$_POST['pass'])){         
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { //si el correo puesto no es un formato de correo correcto
        echo "Error: formato de correo electrónico incorrecto";
    } else {     //si es válido conecta con la base de datos para ver si existe dentro
        include ("config.php"); 
        
        $bd = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS);
        $con = $bd->prepare("SELECT * FROM users WHERE email=:correo");
        $con->execute([
            ":correo" => $_POST['email'] //variable con texto limpio
        ]);
        $res = $con->fetchAll(PDO::FETCH_ASSOC); 

        if (count($res) != 1){
            //en el caso de que no exista $res no tendrá ningún valor y si hay +1 es porque está duplicado
        } else {  
            $contra1 = $_POST['pass'];
            $contra2 = $res[0]['pass'];
            if (!password_verify($contra1, $contra2)) {
                //
            } else {
                //
                $_SESSION['id'] = $res[0]['id'];
            }
        }
    }
}
?>