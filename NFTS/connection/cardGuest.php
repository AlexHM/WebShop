<?php
require("connection.php");




$guest =0;
$user ="";

if (isset($_SESSION["ses_user"])) {
    $user = $_SESSION["ses_user"];
}
if (isset($_COOKIE["cok_guest"])) {
    $guest = $_COOKIE["cok_guest"];
}

try {
    
    $selectProductsBuy = "";
    if (isset($_COOKIE["cok_guest"])) {
        $selectProductsBuy = "select * from bought_products B join products P on B.id_product = P.id where id_guest= :id_guest";
        $resultJoinCard = $db->prepare($selectProductsBuy);
        $resultJoinCard->bindValue(":id_guest",$_COOKIE["cok_guest"]);
    }else{
       
        $selectProductsBuy = "select * from bought_products B join products P on B.id_product = P.id where email_user= :email";
        $resultJoinCard = $db->prepare($selectProductsBuy);
        $resultJoinCard->bindValue(":email",$user);
        $resultJoinCard->execute();
    }
   

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

} catch (\Exception $th) {
    echo "Error: " . $th;
}
