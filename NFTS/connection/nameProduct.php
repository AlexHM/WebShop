<?php
require("connection.php");


try {
   $productName = "select name from products";
   $result = $db->prepare($productName);
   // $name2 = htmlentities(addslashes(1));
   // $result->bindValue(":id", $name2);
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
