<?php
require("../../cookies/checkSession.php");

if ($flagUser==false) {
header("location:home.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Hola Usuario</h1>
    <a href="../../cookies/destroySession.php">Close session</a>
    
</body>
</html>


