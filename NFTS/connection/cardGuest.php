<?php
require("connection.php");



$guest = 0;
$user = "";

//Pintamos el carrito en buy.php siendo o usuario o invitado
if (isset($_COOKIE["cok_user_card"])) {
    $user = $_COOKIE["cok_user_card"];
}
if (isset($_COOKIE["cok_guest"])) {
    $guest = $_COOKIE["cok_guest"];
}

try {
//
    $selectProductsBuy = "";
    // bloque invitado
    if (isset($_COOKIE["cok_guest"])) {
        $selectProductsBuy = "select * from bought_products B join products P on B.id_product = P.id where id_guest= :id_guest";
        $resultJoinCard = $db->prepare($selectProductsBuy);
        $resultJoinCard->bindValue(":id_guest", $_COOKIE["cok_guest"]);
        $resultJoinCard->execute();
        $id_productB = array();
        $nameB = array();
        $descriptionB = array();
        $quantityB = array();
        $priceB = array();
        $imageB = array();
        $countB = 0;

        while ($rowB = $resultJoinCard->fetch(PDO::FETCH_ASSOC)) {
            $id_productB[$countB] = $rowB['id_product'];
            $nameB[$countB] = $rowB['name'];
            $descriptionB[$countB] = $rowB['description'];
            $priceB[$countB] = $rowB['price'];
            $imageB[$countB] = $rowB['image'];
            $quantityB[$countB] = $rowB['quantity'];
            $countB = $countB + 1;
        }
    } else {
        // bloque usuario
        $selectProductsBuy2 = "select * from bought_products B join products P on B.id_product = P.id where email_user= :email";
        $resultJoinCard2 = $db->prepare($selectProductsBuy2);
        $resultJoinCard2->bindValue(":email", $user);
        $resultJoinCard2->execute();
        $id_productB = array();
        $nameB = array();
        $descriptionB = array();
        $quantityB = array();
        $priceB = array();
        $imageB = array();
        $countB = 0;

        while ($rowB = $resultJoinCard2->fetch(PDO::FETCH_ASSOC)) {
            $id_productB[$countB] = $rowB['id_product'];
            $nameB[$countB] = $rowB['name'];
            $descriptionB[$countB] = $rowB['description'];
            $priceB[$countB] = $rowB['price'];
            $imageB[$countB] = $rowB['image'];
            $quantityB[$countB] = $rowB['quantity'];
            $countB = $countB + 1;
        }
    }
} catch (\Exception $th) {
    echo "Error: " . $th;
}
