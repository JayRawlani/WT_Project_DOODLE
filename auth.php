<?php
# Authenticate Logged in User

session_start();
if(!isset($_SESSION["Email"])){
header("Location: login.php");
exit(); }
?>