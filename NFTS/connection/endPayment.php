<?php
require("connection.php");
$errorPayment = "<a href='../login/login.html'>Please, log In before to complete the payment</a>";
$totalPayment = 0;
$flagPayment = false;
if (isset($_COOKIE["cok_user_card"])) {
    $flagPayment = true;
}

if ($flagPayment) {
    $queryChangeTable = "select * from bought_products B join products P on B.id_product = P.id where B.email_user =:email";
    $resultChangeTable = $db->prepare($queryChangeTable);
    $resultChangeTable->bindValue(":email", $_COOKIE["cok_user_card"]);
    $resultChangeTable->execute();


    
    $countC = 0;

    $queryInsertUser_products = "insert into user_products (id_product,name,price,quantity,email_user) values (:id,:name,:price,:quantity,:email)";

    while ($rowC = $resultChangeTable->fetch(PDO::FETCH_ASSOC)) {
        $id_productC[$countC] = $rowC['id_product'];
        $nameC[$countC] = $rowC['name'];
        $priceC[$countC] = $rowC['price'];
        $quantityC[$countC] = $rowC['quantity'];
        $email_userC[$countC] = $rowC['email_user'];
        $countC = $countC + 1;

        $resultInsertUser_table = $db->prepare($queryInsertUser_products);
        $resultInsertUser_table->bindValue(":id", $rowC['id_product']);
        $resultInsertUser_table->bindValue(":name", $rowC['name']);
        $resultInsertUser_table->bindValue(":price",$rowC['price']);
        $resultInsertUser_table->bindValue(":quantity", $rowC['quantity']);
        $resultInsertUser_table->bindValue(":email", $_COOKIE["cok_user_card"]);
        $resultInsertUser_table->execute();
    }

    $deleteBoughtProducts = "delete from bought_products where email_user = :email";
    $resultDeleteBoughtProducts = $db->prepare($deleteBoughtProducts);
    $resultDeleteBoughtProducts->bindValue(":email", $_COOKIE["cok_user_card"]);
    $resultDeleteBoughtProducts->execute();

    ////Descargar la factura
    require("printTicket.php");


}
