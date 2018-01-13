<?php
session_start();
?>
<?php

	$city=htmlspecialchars($_GET['q']);
	
	

	$_SESSION['city']=$city;
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'movie_booking');

	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if (!$db)
	{
		die('Could not connect: ' . mysqli_error());
	}



	$sql="SELECT * FROM movie WHERE city_id = '".$city."' and status='Now Showing' group by movie_name";

	$result = mysqli_query($db,$sql);

	echo "<select name ='movie' id ='movie' onchange=\"showdate(this.value)\">";
	echo "<option value=\"\">--Select Movie--</option>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value=".$row['movie_id'].">".$row['movie_name']." </option> ";

	}
		echo "</select>";


	mysqli_close($db);
?>