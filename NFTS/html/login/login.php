<?php
     session_start();
require("../../connection/connection.php");
require("../../connection/searchUser.php");




try {
    if ($result->rowCount() > 0) {
        
        if (password_verify($pass,$cryptPass)) {
           
            if (isset($_POST["remember"])) {
                setcookie("cok_user_card", $_POST["email"], time() + (1800 * 30), "/"); 
                $_SESSION["ses_user"] = $_POST["email"];
                setcookie("cok_user", $_POST["email"], time() + (1800 * 30), "/"); 
                
               
            } else {
                setcookie("cok_user_card", $_POST["email"], time() + (1800 * 30), "/"); 
                $_SESSION["ses_user"] = $_POST["email"];
            }
            require("../../connection/syncCard.php");
            header("location: ../../../index.php");
        } else {
            header("location: ../login/login.html");
        }  
    }else{
        echo "no hay usuario";
    }
} catch (Exception $e) {
    echo "Connect error Database<br>" . $e;
}
