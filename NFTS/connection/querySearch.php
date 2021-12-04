<?php
require("connection.php");




try {
    $searchQuery = "select * from products";
    $resultQuery = $db->prepare($searchQuery);
    $resultQuery->execute();

    $nameP = array();
    $description = array();
    
    $price = array();
    $count = 0;

  
    while ($row = $resultQuery->fetch(PDO::FETCH_ASSOC)) {
        $nameP[$count] = $row['name'];
        $description[$count] = $row['description'];
        $price[$count] = $row['price'];
        $count = $count + 1;
    }

} catch (\Exception $th) {
    echo "Error: " . $th;
}
