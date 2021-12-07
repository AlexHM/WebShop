<?php
require("connection.php");



$guest =0;
if (isset($_COOKIE["cok_guest"])) {
    $guest = $_COOKIE["cok_guest"];
}

try {
    $queryCardGuest = "select id_product,quantity from bought_products where id_guest = :id_guest";
    $resultCardGuest = $db->prepare($queryCardGuest);
    $resultCardGuest->bindValue(":id_guest",$guest);
    $resultCardGuest->execute();

    $id_productG = array();
    $quantityG = array();
    $countG = 0;

  
    while ($rowG = $resultCardGuest->fetch(PDO::FETCH_ASSOC)) {
        $id_productG[$countG] = $rowG['id_product'];
        $quantityG[$countG] = $rowG['quantity'];
        $countG = $countG + 1;
    }

} catch (\Exception $th) {
    echo "Error: " . $th;
}

?>