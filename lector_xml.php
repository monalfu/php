<?php
$xml = simplexml_load_file("file.xml"); //lee y devuelve en un objeto
for ($i = 0; $i < count($xml); $i++){
    echo $xml->items[$i]->name;
}
?>