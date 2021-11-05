<?php

require("../../connection/connection.php");
$email= $_POST["email"];
$pass= $_POST["password"];



try {
    

$query = "select * from users where email= :email and password= :password";
$result= $db->prepare($query);

$email2=htmlentities(addslashes($email));
$pass2=htmlentities(addslashes($pass));

$result->bindValue(":email",$email2);
$result->bindValue(":password",$pass2);

$result->execute();

if ($result->rowCount() > 0) {

    if (isset($_POST["remember"])) {
    header("location: ../home/home.html");
    echo "recuerda sesion";       
    }else{
        header("location: ../home/home.html");
        echo "no recuerda sesion"; 
    }
    
}else{
    echo "no existe";
}





} catch (Exception $e) {
    echo "Connect error Database<br>". $e;
}




?>