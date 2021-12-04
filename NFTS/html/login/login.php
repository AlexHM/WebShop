<?php
     session_start();
require("../../connection/connection.php");
require("../../connection/searchUser.php");



try {
    if ($result->rowCount() > 0) {

        if (password_verify($pass,$cryptPass)) {
            if (isset($_POST["remember"])) {
           
                $_SESSION["ses_user"] = $_POST["email"];
                setcookie("cok_user", $_POST["email"], time() + (86400 * 30), "/"); // Un día de duración 
               
            } else {
                $_SESSION["user"] = $_POST["email"];
            }
            header("location: ../home/home.php");
        } else {
            header("location: ../login/login.html");
        }  
    }else{
        echo "no hay usuario";
    }
} catch (Exception $e) {
    echo "Connect error Database<br>" . $e;
}
