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
	$mypassword2=$_POST['mypassword2'];
	$myemail=$_POST['myemail'];



	$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
	$result=mysqli_query($db,$sql);


	$count=mysqli_num_rows($result);

	if($mypassword!="" && $mypassword!="" && $mypassword2!="" && $myemail!="")
	{
		if($count==1)
		{
			echo "User already exist";
		}
		else 
		{
			if($mypassword==$mypassword2)
			{
				$sql="Insert into $tbl_name (username,password,email,userlevel) values ('$myusername','$mypassword','$myemail',1)";
				$result=mysqli_query($db,$sql);
				echo "Sing Up Succesfull<br><br>";
				$_SESSION["myusername"]= $myusername;
				$_SESSION["mypassword"]= $mypassword;
			
				header("location:first.php");
			}
		}
	
	}

	else
	{
		echo "One or more fields are empty";
	}
	ob_end_flush();
?>


