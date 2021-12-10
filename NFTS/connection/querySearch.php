<?php
require("connection.php");
require("id.php");



try {
    $searchQuery = "select * from products";
    $resultQuery = $db->prepare($searchQuery);
    $resultQuery->execute();

    $nameP = array();
    $description = array();
    $idP = array();
    $price = array();
    $ref = array();
    $count = 0;

  
    while ($row = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
        $nameP[$count] = $row['name'];
        $description[$count] = $row['description'];
        $price[$count] = $row['price'];
        $idP[$count] = $row['id'];
        $ref[$count] = $row['ref'];
        $count = $count + 1;
    }

} catch (\Exception $th) {
    echo "Error: " . $th;
}
