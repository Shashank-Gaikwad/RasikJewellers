<?php
	session_start();
?>

<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rasik Jewellers</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
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
			echo"<h6><center>Your enquiry for product submitted successfully</center></h6>";
		}
	}
?>
			<div class="container container-content" style="padding-top: 0em;">
			<br>
			<div class="panel">
                <div class="row">
    				<div class="col-md-12">
    					<h1 class="text-center fancy-title"><span>Product Enquiry</span></h1>
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
											echo"Mobile : $m1 <br>";
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
									<form action="insertEnquiry.php" method=POST enctype="multipart/form-data">
										
										<div class="input-group form-group">
											<span class="input-group-addon" id="name"> &nbsp&nbsp&nbsp&nbsp&nbsp Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </span>
											<input type="text" name="customerName" pattern="[a-zA-Z\ ]+" class="form-control" aria-describedby="customerName" placeholder="Name" required>
										</div>
										
										<div class="input-group form-group">
											<span class="input-group-addon" id="phno"> &nbsp&nbsp Mobile No &nbsp&nbsp&nbsp </span>
											<input type="text" name="contactNumber" pattern="[0-9]{10}" class="form-control" aria-describedby="contactNumber" placeholder="Mobile No" required>
										</div>
										
										<div class="input-group form-group">
											<span class="input-group-addon" id="email"> &nbsp&nbsp&nbsp&nbsp Email ID &nbsp&nbsp&nbsp&nbsp </span>
											<input type="email" name="emailId" class="form-control" aria-describedby="emailId" placeholder="Email ID" required>
										</div>
										
										<div class="input-group form-group">
											<span class="input-group-addon" id="productName">Product Name&nbsp </span>
											<input type="text" name="productName" pattern="[a-zA-Z\ ]+" class="form-control" aria-describedby="productName" placeholder="Product Name" required>
										</div>
										
										<div class="input-group form-group">
											<span class="input-group-addon" id="type"> &nbsp Product Type  </span>
											<input type="text" name="productType" pattern="[a-zA-Z\ ]+" class="form-control" aria-describedby="productType" placeholder="Product Type" required>
										</div>
										
										<div class="input-group form-group">
											<span class="input-group-addon" id="subtype"> &nbsp&nbsp&nbsp Sub Type &nbsp&nbsp&nbsp </span>
											<input type="text" name="productSubType" pattern="[a-zA-Z\ ]+" class="form-control" aria-describedby="productSubType" placeholder="Product Sub Type" required>
										</div>
										
										<div class="input-group form-group">
											<span class="input-group-addon" id="image">Product Image</span>
											<input type="file" name="productImage" class="form-control" aria-describedby="productImage" placeholder="Product Image">
										</div>
										
										<div class="input-group form-group">
											<span class="input-group-addon" id="purity"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Purity &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </span>
											<input type="text" name="purity" pattern="[0-9]*" class="form-control" aria-describedby="purity" placeholder="Purity" required>
										</div>
								
										<div class="input-group form-group">
											<span class="input-group-addon" id="weight"> &nbsp&nbsp&nbsp&nbsp Weight &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </span>
											<input type="text" name="weight" pattern="[0-9]*[.,]?[0-9]+" class="form-control" aria-describedby="weight" placeholder="Weight" required>
										</div>
										
										<div class="input-group form-group">
											<span class="input-group-addon" id="description"> &nbsp Description &nbsp&nbsp </span>
											<input type="text" name="productDescription" class="form-control" aria-describedby="productDescription" placeholder="Product Description" required>
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