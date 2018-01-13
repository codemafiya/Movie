<?php
define('servername','localhost');
define('user','localhost');
define('pass','localhost');
$con=mysqli_connect($servername,$user,$pass);
if(!$con)
{
	die("failed:" . mysqli_connect_error());
}
$s="create database db1";
if(mysqli_query($con,$sql))
{
	echo "database created";
}
?>