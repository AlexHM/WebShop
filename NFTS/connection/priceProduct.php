<?php
require("connection.php");

//Obtenemos el precio de los productos de la base de datos para pintarlo en index.php
try {
   $productPrice = "select price from products";
   $result = $db->prepare($productPrice);

   $result->execute();

   $prices = array();
   $count = 0;
   while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
       $prices[$count] = $row['price'];
       $count = $count + 1;
       
   }
} catch (Exception $e) {
   echo "Connect error Database<br>" . $e;
}
?>