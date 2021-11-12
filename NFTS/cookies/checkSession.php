<?php
$flagUser = true;
session_start();
if (!isset($_SESSION["user"])) {
   $flagUser= false;
}
?>