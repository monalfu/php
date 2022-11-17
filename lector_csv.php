<?php
$csv = [];
$file = fopen("file.csv","r"); //conexión con el archivo
$keys = fgets($file); //lectura de la primera linea para extraer las claves junto con la linea 5 de código
$columns = explode(";",$keys);

do {
    $row = explode(";",fgets($file));
    array_push($csv, array_combine($columns,$row)); //añadir a la array $csv la combinación 
} while (!feof($file)); //mientras no esté al final del archivo

for ($i = 0; $i < count($csv); $i++){
    //bucle que hará mostrar en el echo el name de cada item
    echo $csv[$i]['name'];
}
?>