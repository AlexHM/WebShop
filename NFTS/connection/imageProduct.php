<?php
require("connection.php");

//Pintamos todas las imágenes de los productos
try {
    $productName = "select image from products";
    $result = $db->prepare($productName);
    // $name2 = htmlentities(addslashes(1));
    // $result->bindValue(":id", $name2);
    $result->execute();

    $images = array();
    $count = 0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $images[$count] = $row['image'];
        $count = $count + 1;
    }
} catch (Exception $e) {
    echo "Connect error Database<br>" . $e;
}
