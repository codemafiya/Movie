<?php
session_start();
?>
<html>
<body>
<div id="page-background">
<img src="images/main%20baclground.jpg" width="100%" height="100%" alt="Smile" /></div>
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
	$t=$_POST['t'];
	$city = $_POST['i'];
?>
<?php
	$sql = "Insert into theatre (theatre_name,city_id) values ('$t','$city')";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		echo "<center>Successfully Inserted<br></center>";
	}
?>
<center><p>Back To <a href="admin.php">Admin Centre</a>
</p></center>
<center><p><a href="logout.php">Logout</a></p></center>
</body>
</html>