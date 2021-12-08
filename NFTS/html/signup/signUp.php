<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;


require("../../connection/connection.php");
require("../../connection/searchUser.php");
require '../../vendor/autoload.php';







try {


    if ($result->rowCount() > 0) {

        header("location:signUp.html");
    } else {

        //Comprobamos si algún campo está vacío , si los terminos no han sido marcados, o si las contraseñas son diferentes

        if ($_POST["email"] == "" || $_POST["name"] == "" || $_POST["lastname"] == "" || $_POST["user"] == "" || $_POST["password"] == "" ) {
            header("location:signUp.html");
        }
        if (!isset($_POST["userTerms"])) {
            header("location:signUp.html");
        }
        if (strcmp($_POST["password"], $_POST["passConfirm"]) != 0) {
            echo "<script>
                alert('Las contraseñas tienen que ser iguales. Complete el campo correctamente.');
                window.location= 'url.php'
            </script>";
        }

        //Verificación de email
        if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
            echo "No es valido";
        }


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
        
        //////////////////////////////


      

        // $mailer = new PHPMailer(true);
        // try {
        //     //Server settings
        //     $mailer->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        //     $mailer->isSMTP();                                            //Send using SMTP
        //     $mailer->Host       = 'smtp.google.com';                     //Set the SMTP server to send through
        //     $mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
        //     $mailer->Username   = 'dinttaskmob@gmail.com';                     //SMTP username
        //     $mailer->Password   = 'unapajaalacrema';                               //SMTP password
        //     $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        //     $mailer->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        //     //Recipients
        //     $mailer->setFrom('dinttaskmob@gmail.com', 'Mailer');
        //     $mailer->addAddress('alejandrohome94@gmail.com', 'Joe User');     //Add a recipient
           
        
        //     //Content
        //     $mailer->isHTML(true);                                  //Set email format to HTML
        //     $mailer->Subject = 'Here is the subject';
        //     $mailer->Body    = 'This is the HTML message body <b>in bold!</b>';
        //     $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        //     $mailer->send();
        //     echo 'Message has been sent';
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mailer->ErrorInfo}";
        // }
        
       


    }
} catch (Exception $e) {
    echo "Connect error Database<br>" . $e;
}
