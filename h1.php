<?php
ini_set("session.use_only_cookies","0");
session_start();
$_SESSION['rajan']="rajan";
header("location:h2.php");
?>