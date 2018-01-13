<?php
	ob_start();
	session_start();
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'movie_booking');
	$tbl_name="users_tbl"; 
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);



	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword'];





	$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$result=mysqli_query($db,$sql);


	$count=mysqli_num_rows($result);

	if($count==1)
	{
		$row = mysqli_fetch_array($result);
		if($row['userlevel']==2)
		{
			$_SESSION["myusername"]= $myusername;
			$_SESSION["mypassword"]= $mypassword;
			header("location:admin.php");
		}
		else
		{
			


			$_SESSION["myusername"]= $myusername;
			$_SESSION["mypassword"]= $mypassword;
			header("location:first.php");
		}
	}
	else 
	{
			echo "Wrong Username or Password";
	}

ob_end_flush();
?>


