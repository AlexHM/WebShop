<?php
require("connection.php");

//Recuperamos el id para poder pintar todos los campos
try {
   $productDescription = "select id from products";
   $result = $db->prepare($productDescription);

   $result->execute();

   $id = array();
   $count = 0;
   while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
       $id[$count] = $row['id'];
       $count = $count + 1;
       
   }
} catch (Exception $e) {
   echo "Connect error Database<br>" . $e;
}
?>