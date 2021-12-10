<?php
session_start();
session_destroy();

unset($_COOKIE['cok_card_user']); 
setcookie("cok_user_card", "", time() + -1, "/");

unset($_COOKIE['cok_user']); 
setcookie("cok_user", "", time() + -1, "/");

header("location: ../html/login/login.html");

?>