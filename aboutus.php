<?php
	session_start();
?>
<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rasik Jewellers</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
		<!--<link rel="stylesheet" href="mylib/bootstrap/css/bootstrap.min.css">
		<script src="mylib/jquery-2.2.3.min.js"></script>
		<script src="mylib/bootstrap/js/bootstrap.min.js"></script>-->
	</head>
	<body>
	<?php include'header.php';?>
		<div class="container">

			<div class="container container-content" style="padding-top: 0em;">
			<br>
			<div class="panel">
                <div class="row">
    				<div class="col-md-12">
    					<h1 class="text-center fancy-title"><span>About Us</span></h1>
    				</div>
    			</div>
				<div class="panel-body">
					<?php
						include'database_connection.php';
						//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());

						$query="select * from websiteinfo";
						$result=$con->query($query);
						//$result=mysqli_query($con,$query);
						//while($row=mysqli_fetch_array($result))
						while($row=$result->fetch_assoc())
						{
							echo $row['aboutUsText'];
						}
					?>
				</div>
			</div>
		</div>
		</div>
		<footer style="width=100%;">
    <div class="row">
        <div class="col-lg-12">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</footer>
	</body>
</html>
