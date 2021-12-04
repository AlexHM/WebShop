<?php
$flagSession = true;
session_start();
if (!isset($_SESSION["ses_user"])) {
   $flagSession= false;
}
?>