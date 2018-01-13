<?php
ini_set("session.use_only_cookies","0");
session_start();
$name=$_SESSION['rajan'];
$_SESSION['count']=$_SESSION['count']+1;
echo $_SESSION['count'];
echo $name;
?>