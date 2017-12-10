<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	</head>
	<?php include'header.php';?>

	<div class="container">
	<body>
		<div class="container">
		<a href="adminNews.php"><button type="button" class="btn btn-info">Admin News</button></a>
		</div>
		<br><br>
	<?php
		include'database_connection.php';
		//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
	?>
	<?php
	if($_GET)
	{
		if($_GET['news'])
		{
			$id=$_GET['news'];
		}
	}

	$newsQuery="select * from news where newsId=$id ";
	$newsResult=$con->query($newsQuery);
	//$newsResult=mysqli_query($con,$newsQuery);
	//while($row=mysqli_fetch_array($newsResult))
	while($row=$newsResult->fetch_assoc())
	{
		$newsId=$row['newsId'];
		$newsTitle=$row['newsTitle'];
		$newsImage=$row['newsImage'];
		$newsText=$row['newsText'];
		$newsStart=$row['newsStart'];
		$newsEnd=$row['newsEnd'];
	}
	echo"
	<div class='row'>
			<div class='col-md-6'>
				<div class='panel panel-default'>
					<div class='panel-header'>
						<center><h3> $newsTitle <span class='glyphicon glyphicon-calendar' style='float:right;' >$newsStart</span></h3></center>
					</div>
					<div class='panel-body'>
						<center><img src='$newsImage' height='400' width='400' /></center>
					</div>
				</div>
			</div>
			<div class='col-md-6'>
				<p>
					$newsText
				</p>
			</div>
		</div>
	";
?>
		<footer style="width=100%;">
    <div class="row">
        <div class="col-lg-12">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</footer>
	</body>
</div>
</html>
