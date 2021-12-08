<?php
require("connection.php");

$tempCard = 0;
$emaiUSer = "";

try {
    if (isset($_SESSION["ses_user"])) {
        $emaiUSer = $_SESSION["ses_user"];
    }
    if (isset($_COOKIE["cok_guest"])) {
       $tempCard =$_COOKIE["cok_guest"];
    }
    
    $queryUpdateCard = "update bought_products set id_guest= 0, email_user =:email where id_guest = :id_guest";
    $resultUpdateCard = $db->prepare($queryUpdateCard);
    
    $resultUpdateCard->bindValue(":id_guest",$tempCard);
    $resultUpdateCard->bindValue(":email",$emaiUSer);
    $resultUpdateCard->execute();
    unset($_COOKIE['cok_guest']); 
    setcookie("cok_guest", "", time() + -1, "/"); 

} catch (\Throwable $th) {
    echo "Error: ".$th;
}
