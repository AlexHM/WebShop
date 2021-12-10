<?php

if (isset($_COOKIE["cok_guest"])) {
        $queryItemCard = "Select * from bought_products where id_guest = :id_guest";
        $resultItemCard = $db->prepare($queryItemCard);
        $resultItemCard->bindValue(":id_guest",$_COOKIE["cok_guest"]);
        $resultItemCard->execute();
        $countItem = $resultItemCard->rowCount();
                                        
}else{
    if (isset($_COOKIE["cok_user_card"])) {
        $queryItemCard = "Select * from bought_products where id_guest = :id_guest";
        $resultItemCard = $db->prepare($queryItemCard);
        $resultItemCard->bindValue(":id_guest",$_COOKIE["cok_user_card"]);
        $resultItemCard->execute();
        $countItem = $resultItemCard->rowCount();
    }
}



