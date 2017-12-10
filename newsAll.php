<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	</head>
	<?php include'header.php';?>
	<body>
	<?php
		include'database_connection.php';
		//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
	?>
	<?php

	$newsCount=0;
	$newsId_array=array();
	$newsTitle_array=array();
	$newsImage_array=array();
	$newsText_array=array();
	$newsStart_array=array();
	$newsEnd_array=array();
	$newsQuery="select * from news";
	$newsResult=$con->query($newsQuery);
	//$newsResult=mysqli_query($con,$newsQuery);
	//while($row=mysqli_fetch_array($newsResult))
	while($row=$newsResult->fetch_assoc())
	{
		$newsId_array[$newsCount]=$row['newsId'];
		$newsTitle_array[$newsCount]=$row['newsTitle'];
		$newsImage_array[$newsCount]=$row['newsImage'];
		$newsText_array[$newsCount]=$row['newsText'];
		$newsStart_array[$newsCount]=$row['newsStart'];
		$newsEnd_array[$newsCount]=$row['newsEnd'];
		$newsCount++;
	}



	for($i=0;$i<$newsCount;$i++)
	{
		echo"

		<div class='row'>
			<center><h4><a href='newsDetails2.php?news=$newsId_array[$i]'>$newsTitle_array[$i] <a></h4></center>
		</div>

		";
	}

?>
		<footer style="width=100%;">
    <div class="row">
        <div class="col-lg-12">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</footer>
	</body>
</html>
