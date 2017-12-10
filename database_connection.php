<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rasik_jewellers";

	$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error)
	{
		die("Connection failed: " . $con->connect_error);
	}

	//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
?>
