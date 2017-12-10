
 <?php
	include'database_connection.php';
	$str=$_REQUEST['q'];
// $con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
	$productCount=0;
	$productId_array=array();
	$productName_array=array();
	$productMaterial_array=array();
	$customerType_array=array();
	$productType_array=array();
	$productSubType_array=array();
	$purity_array=array();
	$weight_array=array();
	$rate_array=array();
	$makingCharges_array=array();
	$tax_array=array();
	$discount_array=array();
	$finalAmount_array=array();
	$mainImageUrl_array=array();
	$otherImage1_array=array();
	$otherImage2_array=array();
	$otherImage3_array=array();
	$otherImage4_array=array();
	$occasion_array=array();
	$remark1_array=array();
	$remark2_array=array();
	$remark3_array=array();

	if($str==1)
		$productQuery="select * from masterdata where remark1='new' and productMaterial='Gold'";
	if($str==2)
		$productQuery="select * from masterdata where remark2='marriage' and productMaterial='Gold'";
	if($str==3)
		$productQuery="select * from masterdata where remark3='trend' and productMaterial='Gold'";
	$productResult=$con->query($productQuery);
	//$productResult=mysqli_query($con,$productQuery);
	//while($row=mysqli_fetch_array($productResult))
	while($row=$productResult->fetch_assoc())
	{
		$productId_array[$productCount]=$row['productId'];
		$productName_array[$productCount]=$row['productName'];
		$productMaterial_array[$productCount]=$row['productMaterial'];
		$customerType_array[$productCount]=$row['customerType'];
		$productType_array[$productCount]=$row['productType'];
		$productSubType_array[$productCount]=$row['productSubType'];
		$purity_array[$productCount]=$row['purity'];
		$weight_array[$productCount]=$row['weight'];
		$rate_array[$productCount]=$row['rate'];
		$makingCharges_array[$productCount]=$row['makingCharges'];
		$tax_array[$productCount]=$row['tax'];
		$discount_array[$productCount]=$row['discount'];
		$finalAmount_array[$productCount]=$row['finalAmount'];
		$mainImageUrl_array[$productCount]=$row['mainImageUrl'];
		$otherImage1_array[$productCount]=$row['otherImage1'];
		$otherImage2_array[$productCount]=$row['otherImage2'];
		$otherImage3_array[$productCount]=$row['otherImage3'];
		$otherImage4_array[$productCount]=$row['otherImage4'];
		$occasion_array[$productCount]=$row['occasion'];
		$remark1_array[$productCount]=$row['remark1'];
		$remark2_array[$productCount]=$row['remark2'];
		$remark3_array[$productCount]=$row['remark3'];
		$productCount++;
	}

	for($i=0;$i<$productCount;$i++)
	{
		echo"
		<div class='col-md-3'>

					<ul class='caption-style-2'>
						<li>
							<img src='$mainImageUrl_array[$i]' height='300' width='280'/>
							<a href='details.php?product=$productId_array[$i]'>
							<div class='caption'>
								<div class='blur'>
								</div>
								<div class='caption-text'>
									<h1>$productName_array[$i]</h1>
									<i class='fa fa-inr'>$finalAmount_array[$i]</i>
								</div>
							</div>
							</a>
						</li>
					</ul>
				<center><a href='details.php?product=$productId_array[$i]'><h4 style='color:white;'>$productName_array[$i]</h4></center></a>
		</div>
		";
	}
?>
