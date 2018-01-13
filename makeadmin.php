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
  die('Could not connect: ' . mysql_error());
  }
?>
<?php
	$user = $_POST['user'];
	?>
<?php
	$sql = "select * from users_tbl where username='$user'";
	$result= mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	if(	$num==0)
	{
		echo "No such user exist";
	}
	else
	{
	 $sql = "Update users_tbl set userlevel='2' where username='$user'";
	 $result = mysqli_query($con,$sql);
	 if($result)
	 {
		 echo "<center>Selected user was made admin<br></center>";
	 }
	}
?><center><p>Back To <a href="admin.php">Admin Centre</a></center>
</p>
<center><p><a href="logout.php">Logout</a></p></center>

</body>
</html>
