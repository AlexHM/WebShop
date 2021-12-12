<?php
//Archivo para la conexión con la base de datos
$db = new PDO("mysql:host=localhost;dbname=webstore2","root","");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>