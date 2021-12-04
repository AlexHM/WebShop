<?php

require("../../connection/connection.php");
require("../../connection/searchUser.php");



try {
    if ($result->rowCount() > 0) {

        if (password_verify($pass,$cryptPass)) {
            if (isset($_POST["remember"])) {
                session_start();
                $_SESSION["user"] = $_POST["email"];
                setcookie("user", $_POST["email"], time() + 60);
                header("location: ../home/home.php");
            } else {
                session_start();
                $_SESSION["user"] = $_POST["email"];
                header("location: ../home/home.php");
            }
        } else {
            header("location: ../login/login.html");
        }  
    }else{
        echo "no hay usuario";
    }
} catch (Exception $e) {
    echo "Connect error Database<br>" . $e;
}
