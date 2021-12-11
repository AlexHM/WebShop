<?php
//Comprobamos si existe la cookie
$flagCookie = true;
if (!isset($_COOKIE["cok_user"])) {
   $flagCookie= false;
}
?>