<?php

//Verificamos si tiene un código de promoción, si lo tiene se descuentan 50 euros en el archivo buy.php
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

    //Eliminamos el código para que no se pueda repetir
    $deletePromoCode = "delete from promo_code where code = :code";
    $resultDeleteCode = $db->prepare($deletePromoCode);
    $resultDeleteCode->bindValue(":code", $promoCode);
    $resultDeleteCode->execute();
}



?>