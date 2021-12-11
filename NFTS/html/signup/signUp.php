<?php

require("../../connection/connection.php");
require("../../connection/searchUser.php");



/*
* En el lado cliente, se comprueban que los datos se hayan rellenado al completo, nunca se realizaria el envio de 
* informacion si esta no ha sido rellenada. En el lado servidor, comprobaremos que ambos password son iguales. En
* caso contrario, devolveriamos al formualario. En caso correcto, redireccionamos al home con la sesion iniciada.
*/

try {
    if ($result->rowCount() > 0) {
        echo "<script>
                alert('Ya existe un usuario con esas credenciales');
                window.location= 'signUp.html'
            </script>";
        
    } else {
        
        if (strcmp($_POST['password'], $_POST['passwordconfirm']) !== 0) {
            echo "<script>
                alert('Las contraseñas tienen que ser iguales. Complete el campo correctamente.');
                window.location= 'signUp.html'
            </script>";
        } else{
            $query = "insert into users (email,name,lastname,username,password,country,city,address,postal) values (:email,:name,:lastname,:username,:password,:country,:city,:address,:postal)";
            $result = $db->prepare($query);
    
            $email2 = htmlentities(addslashes($_POST["email"]));
            $name = htmlentities(addslashes($_POST["name"]));
            $lastname = htmlentities(addslashes($_POST["lastname"]));
            $username = htmlentities(addslashes($_POST["user"])); 
            $pass = htmlentities(addslashes($_POST["password"]));
            $country = htmlentities(addslashes($_POST["country"]));
            $city = htmlentities(addslashes($_POST["city"]));
            $adress = htmlentities(addslashes($_POST["address"]));
            $postalcode = htmlentities(addslashes($_POST["postal"]));
    
            //Encriptando la contrasña
            $cryptPass= password_hash($pass,PASSWORD_DEFAULT);
    
            $result->bindValue(":email", $email2);
            $result->bindValue(":name", $name);
            $result->bindValue(":lastname", $lastname);
            $result->bindValue(":username", $username);
            $result->bindValue(":password", $cryptPass);
            $result->bindValue(":country", $country);
            $result->bindValue(":city", $city);
            $result->bindValue(":address", $adress);
            $result->bindValue(":postal", $postalcode);
            $result->execute();


            header("location:../../../index.php");
        }
    }
} catch (Exception $e) {
    echo "Connect error Database<br>" . $e;
}