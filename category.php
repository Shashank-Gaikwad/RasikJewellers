<?php
	session_start();
?>
<html>
	<head>
		<title>Rasik Jewellers</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body style='background-color:#808080;'>
		<?php include'header.php';?>
		<?php
			if($_GET)
			{
				if($_GET['category'])
				{
					$cat=$_GET['category'];
				}
				if($_GET['subcategory'])
				{
					$sub=$_GET['subcategory'];
				}
			}
		?>
		<div id="disply_products">
		<?php
		include'database_connection.php';
		//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
		//echo "category=$cat<br>";
		//echo "subcategory=$sub<br>";
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

				if($sub=="none")
				{
					if($cat=="Gold" || $cat=="Silver" || $cat=="Diamond" || $cat==18 || $cat==20 || $cat==24 || $cat=="Men" || $cat=="Women")
					{
						if($cat=="Gold" || $cat=="Silver" || $cat=="Diamond")
						{
							$query="select * from masterdata where productMaterial='$cat'";
						}
						if($cat==18 || $cat==20 || $cat==24)
						{
							$query="select * from masterdata where purity='$cat'";
						}
						if($cat=="Men" || $cat=="Women")
						{
							$query="select * from masterdata where customerType='$cat'";
						}
					}
					else
					{
						$query="select * from masterdata where productType='$cat'";
					}
				}
				else
				{
					$query="select * from masterdata where productType='$cat' and productSubType='$sub'";
				}

				//$query="select * from masterdata where productName='$cat' or productMaterial='$cat' or customerType='$cat' or productType='$cat' or productSubType='$cat'";
				$result=$con->query($query);
				//$result=mysqli_query($con,$query);
				//while($row=mysqli_fetch_array($result))
				while($row=$result->fetch_assoc())
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
		<div class='col-md-3'>

					<ul class='caption-style-2'>
						<li>
							<img src='$image_array[$i]' height='300' width='280'/>
							<a href='details.php?product=$id_array[$i]'>
							<div class='caption'>
								<div class='blur'>
								</div>
								<div class='caption-text'>
									<h1>$name_array[$i]</h1>
									<i class='fa fa-inr'>$amount_array[$i]</i>
								</div>
							</div>
							</a>
						</li>
					</ul>

					<center><a href='details.php?product=$id_array[$i]'><h4 style='color:white;'>$name_array[$i]</h4></center></a>
		</div>
		";


			}

		?>

		</div>
	</body>
</html>
