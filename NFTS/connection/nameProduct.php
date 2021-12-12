<?php
require("connection.php");

//Obtenemos el nombre de la base de datos para pintarlo en index.php
try {
   $productName = "select name from products";
   $result = $db->prepare($productName);
   $result->execute();

   $names = array();
   $count = 0;
   while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
       $names[$count] = $row['name'];
       $count = $count + 1;
       
   }
} catch (Exception $e) {
   echo "Connect error Database<br>" . $e;
}
?>
