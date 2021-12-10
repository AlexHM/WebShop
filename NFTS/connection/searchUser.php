<?php
require("connection.php");

$email= $_POST["email"];
$pass= $_POST["password"];
$cryptPass= password_hash($pass,PASSWORD_DEFAULT);

 try {
    $query = "select email from users where email= :email";
    $result= $db->prepare($query);
    $email2=htmlentities(addslashes($email));
    $result->bindValue(":email",$email2);
    $result->execute();  
 } catch (Exception $e) {
    echo "Connect error Database<br>". $e;
}


try {
   $query = "select password from users where password= :password";
   $result2= $db->prepare($query);
   $password=htmlentities(addslashes($pass));
   $result2->bindValue(":password",$password);
   $result2->execute();  
} catch (Exception $e) {
   echo "Connect error Database<br>". $e;
}



?>