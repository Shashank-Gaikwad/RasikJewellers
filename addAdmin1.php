<html>
	<head>
		<title>Rasik Jewellers</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	</head>
	<body>
		<?php
			include'header.php';
			include'database_connection.php';

			$u=$_POST['username'];
			$p=$_POST['password'];

	$pass=md5($p);
	$query="insert into login(username,password) values('$u','$pass')";
	//$result=mysqli_query($con,$query) or die mysqli_error($con);
	//if(mysqli_query($con,$query))
	if($con->query($query))
	{
		echo"<h4 class='text-center'>Your account is created successfully</h4>";
		echo "<center><a href='index.php' class='btn btn-info' role='button'>Go To Website</a></center>";
	}
	else
	{
		echo "Error : " . $con->error;
	}

		?>
	</body>
</html>
