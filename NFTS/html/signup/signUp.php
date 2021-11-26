<?php


require("../../connection/connection.php");
require("../../connection/searchUser.php");





try {


    if ($result->rowCount() > 0) {

        header("location:signUp.html");
    } else {

        //Comprobamos si algún campo está vacío, si los terminos no han sido marcados, o si las contraseñas son diferentes

        if ($_POST["email"] == "" || $_POST["name"] == "" || $_POST["lastname"] == "" || $_POST["user"] == "" || $_POST["password"] == "") {
            header("location:signUp.html");
        }
        if (!isset($_POST["userTerms"])) {
            header("location:signUp.html");
        }
        if (strcmp($_POST["password"], $_POST["passConfirm"]) != 0) {
            header("location:signUp.html");
        }

        //Verificación de email
        if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
            echo "No es valido";
        }


        $query = "insert into users (email,name,lastname,username,password) values (:email,:name,:lastname,:username,:password)";
        $result = $db->prepare($query);

        $email2 = htmlentities(addslashes($_POST["email"]));
        $name = htmlentities(addslashes($_POST["name"]));
        $lastname = htmlentities(addslashes($_POST["lastname"]));
        $username = htmlentities(addslashes($_POST["user"]));
        $pass = htmlentities(addslashes($_POST["password"]));

        $cryptPass= password_hash($pass,PASSWORD_DEFAULT);

        $result->bindValue(":email", $email2);
        $result->bindValue(":name", $name);
        $result->bindValue(":lastname", $lastname);
        $result->bindValue(":username", $username);
        $result->bindValue(":password", $cryptPass);
        $result->execute();
        
       


    }
} catch (Exception $e) {
    echo "Connect error Database<br>" . $e;
}
