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
		<!--<script src="js/jquery-2.2.3.js"></script>
        <script src="js/bootstrap.js"></script>
		<script src="js/select2.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>

        <script src="js/jquery.scrollex.min.js"></script>
        <script src="js/parallax.min.js"></script>
		<script src="js/contact.js"></script>

        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/font-awesome.css" />
		<link rel="stylesheet" href="css/select2.min.css" />

		<link rel="stylesheet" href="css/select2-bootstrap.min.css" />
        <link rel="stylesheet" href="css/common.css" />
        <link rel="stylesheet" href="css/contact.css" />-->
		<!--<link rel="stylesheet" href="mylib/bootstrap/css/bootstrap.min.css">
		<script src="mylib/jquery-2.2.3.min.js"></script>
		<script src="mylib/bootstrap/js/bootstrap.min.js"></script>-->
	</head>
	<body>
	<?php
		include'header.php';
		include'database_connection.php';

		$query="select mobileNumber1, mobileNumber2, emailId, address from websiteinfo";
		$result=$con->query($query);
		while($row=$result->fetch_assoc())
		{
			$m1=$row['mobileNumber1'];
			$m2=$row['mobileNumber2'];
			$e=$row['emailId'];
			$a=$row['address'];
		}
	?>
		<div class="container">
		<?php
	if($_GET)
	{
		if($_GET['id']=="success")
		{
			echo"<h6><center>Your query submitted successfully</center></h6>";
		}
	}
?>
			<div class="container container-content" style="padding-top: 0em;">
			<br>
			<div class="panel">
                <div class="row">
    				<div class="col-md-12">
    					<h1 class="text-center fancy-title"><span>Contact Us</span></h1>
    				</div>
    			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-primary">
								<div class="panel-body">
									<div class="col-md-6"><img src="images/mylogo1.png" height=200 width=200></div>
									<div class="col-md-6"><h3>Rasik Jewellers</h3></div>
									<div class="row">
										<?php
											echo"Address : $a <br>";
											echo"Mobile : $m1 / $m2 <br>";
											echo"Email : $e <br>";
										?>
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-body">
										<div id="map-canvas" class="col-md-12 map-container">

										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-primary">
								<div class="panel-body">
									<form action="insertQuery.php" method=POST enctype="multipart/form-data">

										<div class="input-group form-group">
											<span class="input-group-addon" id="name">&nbsp&nbsp&nbsp&nbsp Name* &nbsp&nbsp&nbsp&nbsp&nbsp</span>
											<input type="text" name="name" pattern="[a-zA-Z\ ]+" class="form-control" aria-describedby="name" placeholder="Name" required>
										</div>

										<div class="input-group form-group">
											<span class="input-group-addon" id="phno">&nbsp Mobile No* &nbsp</span>
											<input type="text" name="mobile1" pattern="[0-9]{10}" class="form-control" aria-describedby="mobile" placeholder="Mobile No" required>
										</div>

										<div class="input-group form-group">
											<span class="input-group-addon" id="email">&nbsp&nbsp Email ID* &nbsp&nbsp&nbsp</span>
											<input type="email" name="email" class="form-control" aria-describedby="email" placeholder="Email ID" required>
										</div>

										<div class="input-group form-group">
											<span class="input-group-addon" id="address">Query Text* &nbsp&nbsp</span>
											<textarea rows="5" name="queryText" class="form-control" aria-describedby="queryText" placeholder="Query" required></textarea>
										</div>

										<div class="input-group form-group">
											<span class="input-group-addon" id="phno">Attachment&nbsp&nbsp</span>
											<input type="file" name="attach" class="form-control" aria-describedby="attachment" placeholder="Attachment">
										</div>

										<div class="col-md-6">
											<button type="submit" class="btn btn-primary btn-block" style='background-color:#404040;'>Submit</button>
										</div>

										<div class="col-md-6">
											<button type="reset" class="btn btn-primary btn-block" style='background-color:#404040;'>Cancel</button>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="map-canvas" class="col-md-12 map-container">

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
