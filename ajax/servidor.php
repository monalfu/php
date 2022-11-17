<?php
if (isset($_GET['var1'])) echo json_encode([ "json1" => $_GET['var1'] . " from Form1" ]);
if (isset($_POST['var2'])) echo json_encode([ "json2" => $_POST['var2'] . " from Form2" ]);
?>