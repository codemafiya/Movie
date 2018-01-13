<?php
session_start();
?>
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<div id="page-background"><img src="images/main%20baclground.jpg" width="100%" height="100%" alt="Smile">
<p>
  <?php
	$username=$_SESSION['myusername'];
	$movie = $_POST['movie4'];
	$date = $_POST['date'];
	$stime = $_POST['stime'];
	$tname = 	$_POST['theatre'];
	$seat = $_POST['seat'];
	$sql = "select * from theatre where theatre_name='$tname'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$tid = $row['theatre_id'];
	
	$sql = "select price from movie where movie_id='$movie' and theatre_id='$tid' and date='$date' and showtiming='$stime'";
	$result =mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$price = $row['price'];
	
	$sql = "Insert into booked (username,seat,movie_id,theatre_id,date,time,price) values ('$username','$seat','$movie','$tid','$date','$stime','$price')";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		echo "Ticket booked succesfully";
	}
	else
		echo "Some Problem occured";

	$sql = "Update seats set status='booked' where seat=".$_POST['seat']." and movie_id='$movie' and theatre_id='$tid' and date='$date' and time='$stime'";
	$result = mysqli_query($con,$sql);
?>
</p>
</div>
</body>
</head>
</html>