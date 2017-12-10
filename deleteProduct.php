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

<?php
	include'database_connection.php';
	//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
	$delete_id=$_REQUEST['q'];

	$q="select mainImageUrl,otherImage1,otherImage2,otherImage3,otherImage4 from masterdata where productId=$delete_id";
	$r=$con->query($q);
	//$r=mysqli_query($con,$q);
	//while($ans=mysqli_fetch_array($r))
	while($ans=$r->fetch_assoc())
	{
		$mainimage=$ans['mainImageUrl'];
		$image1=$ans['otherImage1'];
		$image2=$ans['otherImage2'];
		$image3=$ans['otherImage3'];
		$image4=$ans['otherImage4'];
	}

	if($mainimage)
		unlink($mainimage);
	if($image1)
		unlink($image1);
	if($image2)
		unlink($image2);
	if($image3)
		unlink($image3);
	if($image4)
		unlink($image4);


	$query="delete from masterdata where productId=$delete_id";
	$result=$con->query($query);
	//$result=mysqli_query($con,$query);


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


	$query2="select * from masterdata";
	$result2=mysqli_query($con,$query2);
	while($row=mysqli_fetch_array($result2))
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
						<img class='img-responsive center-block' src='$image_array[$i]' height='220' width='220' />
						<div class='col-md-4'>
							<a href='details.php?product=$id_array[$i]'><button id=$id_array[$i] class='btn btn-primary btn-block btn-lg' style='background-color:#404040;'>Details</button></a>
						</div>
						<div class='col-md-4'>
							<a href='updateProduct.php?product=$id_array[$i]'><button class='btn btn-primary btn-block btn-lg' style='background-color:#404040;'>Update</button></a>
						</div>
						<div class='col-md-4'>
							<button id=$id_array[$i] onclick='deleteRecord(this.id)' class='btn btn-primary btn-block btn-lg' style='background-color:#404040;'>Delete</button>
						</div>

					</div>
				</div>
			</div>
		";

	}
?>
