<?php

require("../../connection/connection.php");
require("../../connection/searchUser.php");




try {
    


if ($result->rowCount() > 0) {

    if (isset($_POST["remember"])) {
    header("location: ../home/home.html");
         
    }else{
        header("location: ../home/home.html");
         
    }
    
}else{
    echo "no existe";
}





} catch (Exception $e) {
    echo "Connect error Database<br>". $e;
}




?>