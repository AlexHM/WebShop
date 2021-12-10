<?php

$promoCode= "";

$flagPromo = false;
if (isset($_POST["promoCode"])) {
    $promoCode = $_POST["promoCode"];
}

$queryPromoCode = "select * from promo_code where code = :code";
$resultPromoCode = $db->prepare($queryPromoCode);
$resultPromoCode->bindValue(":code", $promoCode);
$resultPromoCode->execute();

if ($resultPromoCode->rowCount()>0) {
    $flagPromo = true;

    $deletePromoCode = "delete from promo_code where code = :code";
    $resultDeleteCode = $db->prepare($deletePromoCode);
    $resultDeleteCode->bindValue(":code", $promoCode);
    $resultDeleteCode->execute();
}



?>