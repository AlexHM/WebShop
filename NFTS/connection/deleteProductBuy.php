<?php
require("connection.php");

//Eliminamos los productos del carrito 
$idPHidden = "";
$guest = 0;
$user = "";

if (isset($_POST["idPHidden"])) {
    $idPHidden=$_POST["idPHidden"];
    
}
if (isset($_COOKIE["cok_user_card"])) {
    $user = $_COOKIE["cok_user_card"];
}
if (isset($_COOKIE["cok_guest"])) {
    $guest = $_COOKIE["cok_guest"];
}

try {
    //Preguntamos si estamos indentificados o no y dependiendo de la respuesta eliminamos sobre usuario o guest
    $deleteproduct = "";
    if (isset($_COOKIE["cok_guest"])) {
        $deleteproduct = "delete from bought_products where id_guest = :id_guest and id_product = :id";
        $resultDelete1 = $db->prepare($deleteproduct);
        $resultDelete1->bindValue(":id_guest", $_COOKIE["cok_guest"]);
        $resultDelete1->bindValue(":id", $idPHidden);
        $resultDelete1->execute();
      
    } else {

        $deleteproduct2 = "delete from bought_products where email_user= :email and id_product = :id";
        $resultDelete2 = $db->prepare($deleteproduct2);
        $resultDelete2->bindValue(":email", $user);
        $resultDelete2->bindValue(":id", $idPHidden);
        $resultDelete2->execute();

    }
} catch (\Exception $th) {
    echo "Error: " . $th;
}

header("location:../html/buy/buy.php");
