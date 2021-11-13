<?php
session_start();
session_destroy();

//echo $_SESSION["user"];
header("location: ../html/login/login.html");

?>