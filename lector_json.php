<?php
$file = file_get_contents("file.json"); //lectura del archivo
$json = json_decode($file);

for ($i = 0; $i < count($json->items); $i ++){
    echo $json->items[$i]->name;
}
?>