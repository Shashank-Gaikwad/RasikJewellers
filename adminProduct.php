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
			function deleteRecord(id)
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
						document.getElementById("disply_products").innerHTML=xmlhttp.responseText;
					}
				}
				alert('Product deleted');

				xmlhttp.open("POST","deleteProduct.php?q="+id,true);
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
			<li class="active"><a href="adminProduct.php" style='background-color:#404040;'>Products</a></li>
			<li><a href="adminNews.php">News</a></li>
			<li><a href="adminQuery.php">Query</a></li>
			<li><a href="adminEnquiry.php">Enquiry</a></li>
		</ul>

		<div class="container container-content">

			<div id="product">
				<div class="panel" style="background-color: white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center fancy-title"><span>Products</span></h1>
                        </div>
                    </div>
				</div>
				<div class="row">
					<a href="addProduct.php"><button class='btn btn-primary btn-md'>Add Product</button></a>
				</div>
				<br><br>
				<div id="disply_products">
					<?php

						$count=0;
						$id_array=array();
						$name_array=array();
						$material_array=array();
						$customer_array=array();
						$type_array=array();
						$subtype_array=array();
						$purity_array=array();
						$weight_array=array();
						$rate_array=array();
						$charges_array=array();
						$tax_array=array();
						$discount_array=array();
						$amount_array=array();
						$occasion_array=array();
						$remark1_array=array();
						$remark2_array=array();
						$remark3_array=array();

						$query="select * from masterdata";
						$result=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
							$id_array[$count]=$row['productId'];
							$name_array[$count]=$row['productName'];
							$material_array[$count]=$row['productMaterial'];
							$customer_array[$count]=$row['customerType'];
							$type_array[$count]=$row['productType'];
							$subtype_array[$count]=$row['productSubType'];
							$purity_array[$count]=$row['purity'];
							$weight_array[$count]=$row['weight'];
							$rate_array[$count]=$row['rate'];
							$charges_array[$count]=$row['makingCharges'];
							$tax_array[$count]=$row['tax'];
							$discount_array[$count]=$row['discount'];
							$amount_array[$count]=$row['finalAmount'];
							$image_array[$count]=$row['mainImageUrl'];
							$occasion_array[$count]=$row['occasion'];
							$remark1_array[$count]=$row['remark1'];
							$remark2_array[$count]=$row['remark2'];
							$remark3_array[$count]=$row['remark3'];
							$count++;
						}


						for($i=0;$i<$count;$i++)
						{
							$pid=$id_array[$i];

							echo"
								<div class='col-md-4'>
									<div class='panel panel-primary'>
										<div class='panel-heading' style='background-color:#404040;'>
											<h3 class='text-center' style='font-size: 20px; color:white;'>$name_array[$i]</h3>
										</div>
										<div class='panel-body'>
											<img class='center-block' src='$image_array[$i]' height=200 width=200 /></br>
											<div class='col-md-4'>
												<a href='details.php?product=$id_array[$i]'><button id=$id_array[$i] class='btn btn-info btn-block btn-md' text-align:center;'>Detail</button></a>
											</div>
											<div class='col-md-4'>
												<a href='updateProduct.php?product=$id_array[$i]'><button class='btn btn-warning btn-block btn-md' text-align:center;'>Edit</button></a>
											</div>
											<div class='col-md-4'>
												<a href='deleteProduct2.php?product=$id_array[$i]'><button class='btn btn-danger btn-block btn-md' text-align:center;'>Delete</button></a>
											</div>
										</div>
									</div>
								</div>
							";
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>
