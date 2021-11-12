<?php

require("../../cookies/checkSession.php");

if ($flagUser == false) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME-NOT USER</title>
    </head>

    <body>
        <H1>HOLA PUTO DESCONOCIDO</H1>
    </body>

    </html>
<?php
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME-USER</title>
    </head>

    <body>
        <h1>HOLA USUARIO</h1>

    </body>

    </html>
<?php
}
?>