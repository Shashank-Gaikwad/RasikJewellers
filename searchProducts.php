<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<title>Rasik Jewelles</title>
		
		<script type="text/javascript">
			
		</script>
	</head>
	
	
	
		

<?php
	
	$str=$_REQUEST['q'];
	include'database_connection.php';
	//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());

		$query="select * from masterdata where productName like '$str%' or productMaterial like '$str%' or customerType like '$str%' or productType like '$str%' or productSubType like '$str%'";
	
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
				
				//$query="select * from masterdata";
				
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
				echo"<div class='col-md-9'>";
					for($i=0;$i<$count;$i++)
					{
						$pid=$id_array[$i];
						
							
							echo"
		<div class='col-md-4'>
			
					<ul class='caption-style-2'>
						<li>
							<img src='$image_array[$i]' height='300' width='280'/>
							<a href='details.php?product=$pid'>
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
				
		</div>
		";
					}
				echo"</div>";
	
	
	
?>

	
</html>