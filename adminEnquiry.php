<?php
	session_start();
?>

<?php
if (isset($_SESSION['username']))
{
//echo 'Welcome'.$_SESSION['username'];
}
else
{
  echo "Session is in active";
		header('Location: index.php');
}
?>

<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<script type="text/javascript">
			function deleteEnquiry(id)
	{
		//alert(id);
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
				xmlhttp=new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange=function()
		{
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
						document.getElementById("disply_enquiry").innerHTML=xmlhttp.responseText;
				}
		}
		xmlhttp.open("POST","deleteEnquiry.php?q="+id,true);
		xmlhttp.send();
	}
		</script>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Rasik Jewellers</title>
	</head>
	<body style="background-color:white;">
		<?php
			include'header.php';
			include'database_connection.php';
			//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error()); include'header.php';
		?>

		<?php
			$rateQuery="select * from rate where rate_date=CURDATE()";
			$rateResult=mysqli_query($con,$rateQuery);
			$rate_flag=mysqli_num_rows($rateResult);
			if($rate_flag==0)
			{
				echo "<script>alert('Please Update Todays Rates ');</script>";
			}
		?>



		<ul class="nav nav-pills" >
			<!--	<a href="#" class="btn btn-info btn-md" role="button">website settings</a>-->
			<li><a href="adminpage.php">Website Settings</a></li>
			<li><a href="adminProduct.php">Products</a></li>
			<li><a href="adminNews.php">News</a></li>
			<li><a href="adminQuery.php">Query</a></li>
			<li class="active"><a href="adminEnquiry.php" style='background-color:#404040;'>Enquiry</a></li>
		</ul>

		<div class="container container-content">
			<div id="enquiry">
				<?php
					$enquiryId_array=array();
					$customerName_array=array();
					$contactNumber_array=array();
					$emailId_array=array();
					$productName_array=array();
					$productType_array=array();
					$productSubType_array=array();
					$productImage_array=array();
					$purity_array=array();
					$weight_array=array();
					$productDescription_array=array();
					$count2=0;

					$query2="select * from enquiry";
					$result2=mysqli_query($con,$query2);
					while($row=mysqli_fetch_array($result2))
					{
						$enquiryId_array[$count2]=$row['enquiryId'];
						$customerName_array[$count2]=$row['customerName'];
						$contactNumber_array[$count2]=$row['contactNumber'];
						$emailId_array[$count2]=$row['emailId'];
						$productName_array[$count2]=$row['productName'];
						$productType_array[$count2]=$row['productType'];
						$productSubType_array[$count2]=$row['productSubType'];
						$productImage_array[$count2]=$row['productImage'];
						$purity_array[$count2]=$row['purity'];
						$weight_array[$count2]=$row['weight'];
						$productDescription_array[$count2]=$row['productDescription'];
						$count2++;
					}
				?>

					<div class="panel">
						<div class="row">
							<div class="col-md-12">
								<h1 class="text-center fancy-title"><span>Enquiry Section</span></h1>
							</div>
						</div>
					</div>
					<div id="display_enquiry">
						<table class="table">
							<thead>
							<tr>
								<th>Customer Name</th>
								<th>Contact Number</th>
								<th>Email</th>
								<th>Product Name</th>
								<th>Product Type</th>
								<th>Product Sub Type</th>
								<th>Product Images</th>
								<th>Purity</th>
								<th>Weight</th>
								<th>Product Description</th>
								<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									for($i=0;$i<$count2;$i++)
									{
										echo"
											<tr>
												<td>$customerName_array[$i]</td>
												<td>$contactNumber_array[$i]</td>
												<td>$emailId_array[$i]</td>
												<td>$productName_array[$i]</td>
												<td>$productType_array[$i]</td>
												<td>$productSubType_array[$i]</td>
												<td><img src=$productImage_array[$i] height=200 width=200></td>
												<td>$purity_array[$i]</td>
												<td>$weight_array[$i]</td>
												<td>$productDescription_array[$i]</td>
												<td><a href='deleteEnquiry2.php?q=$enquiryId_array[$i]'><button id=$enquiryId_array[$i] class='btn btn-primary btn-block btn-md' style='background-color:#404040;'>Delete</button></a></td>
											</tr>
										";
									}
								?>
							</tbody>
						</table>
					</div>

			</div>
		</div>
	</body>
</html>
