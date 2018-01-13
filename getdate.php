<?php
session_start();
?>
<?php
echo $movieid=$_GET["q"];
echo $cityid= $_SESSION['city'];
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'movie_booking');

	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }



$sql="SELECT * FROM movie WHERE movie_id = '".$movieid."' and status='Now Showing' and city_id='$cityid' group by date";

$result = mysqli_query($con,$sql);

	 echo "<select name ='date' id ='date'>";
	 echo "<option value=\"\">--Select Date--</option>";
while($row = mysqli_fetch_array($result))
  {
	  
	 echo "<option value=".$row['date'].">".$row['date']." </option> ";
  }
		echo "</select>";


mysqli_close($con);
?>