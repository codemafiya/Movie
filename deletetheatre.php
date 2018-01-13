<?php
session_start();
?>
<html>
<body>
<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'movie_booking'); 

	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if (!$con)
	{
		die('Could not connect: ' . mysqli_error());
	}

?>
<?php
	$t = $_POST['theatre'];
?>
<?php
	$sql = "Delete from theatre where theatre_name='$t'";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		echo "<center>Theatre Removed From Database<br></center>";
	}
?>
<center><p>Back To <a href="admin.php">Admin Centre</a>
</p></center>
<center><p><a href="logout.php">Logout</a></p></center>
</body>
</html>
