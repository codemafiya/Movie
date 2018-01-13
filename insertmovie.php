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
	$tbl_name="users_tbl"; 

	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if (!$con)
	{
		die('Could not connect: ' . mysqli_error());
	}

?>
<?php
	$movieid = $_POST['movieid'];
	$moviename = $_POST['moviename'];
	$tid = $_POST['tid'];
	$cid = $_POST['cid'];
	$date = $_POST['date'];
	$st = $_POST['st'];	
	$price = $_POST['price'];
	$status = $_POST['status'];	
?>
<?php
	$sql = "Insert into movie (movie_id,movie_name,theatre_id,city_id,date,showtiming,price,status) values ('$movieid','$moviename','$tid','$cid','$date','$st','$price','$status')";
	$result = mysqli_query($con,$sql);
	$i=1;
	while($i<13)
	{
		$sql = "Insert into seats (seat,movie_id,theatre_id,date,time,status) values ('$i','$movieid','$tid','$date','$st','not booked')";
		$result = mysqli_query($con,$sql);
		$i++;
	}
?>
<p>Back To <a href="admin.php">Admin Centre</a>
</p>
<p><a href="logout.php">Logout</a></p>
</body>
</html>
