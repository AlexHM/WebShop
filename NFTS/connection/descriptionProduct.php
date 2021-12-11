<?php
require("connection.php");


try {
   $productDescription = "select description from products";
   $result = $db->prepare($productDescription);

   $result->execute();

   $descriptions = array();
   $count = 0;
   while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
       $descriptions[$count] = $row['description'];
       $count = $count + 1;
       
   }
} catch (Exception $e) {
   echo "Connect error Database<br>" . $e;
}
?>