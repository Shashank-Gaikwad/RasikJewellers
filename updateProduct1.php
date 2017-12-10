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
	$pid=$_POST['pid'];
	$pname=$_POST['product_name'];
	$pmaterial=$_POST['product_material'];
	$ctype=$_POST['customer_type'];
	$ptype=$_POST['product_type'];
	$psubtype=$_POST['product_sub_type'];
	$ppurity=$_POST['purity'];
	$pweight=$_POST['weight'];
	//$prate=$_POST['rate'];
	$pmakingcharges=$_POST['making_charges'];
	$ptax=$_POST['tax'];
	$pdiscount=$_POST['discount'];
	//$pfinalamount=$_POST['final_amount'];
	$poccasion=$_POST['occasion'];
	$premark1=$_POST['remark1'];
	$premark2=$_POST['remark2'];
	$premark3=$_POST['remark3'];


	$rateQuery="select * from rate order by rate_date";
	$rateResult=$con->query($rateQuery);
	//$rateResult=mysqli_query($con,$rateQuery);
	//while($row=mysqli_fetch_array($rateResult))
	while($row=$rateResult->fetch_assoc())
	{
		$date=$row['rate_date'];
		$gold=$row['gold'];
		$gold1=$row['gold1'];
		$gold2=$row['gold2'];
		$gold3=$row['gold3'];
		$silver=$row['silver'];
	}
	if($pmaterial=='Gold')
	{
		if($ppurity==18)
			$prate=$gold;
		if($ppurity==22)
			$prate=$gold1;
		if($ppurity==23)
			$prate=$gold2;
		if($ppurity==24)
			$prate=$gold3;
	}
	if($pmaterial=='Silver')
	{
		$prate=$_POST['rate'];
	}



	$amount=($prate*$pweight);
	$amount=$amount+($pmakingcharges*$pweight);
	$amount=$amount+($amount * ($ptax/100));
	$amount=$amount-($amount * ($pdiscount/100));
	$pfinalamount=$amount;



	$mainimage=$_POST['mi'];
	$image1=$_POST['i1'];
	$image2=$_POST['i2'];
	$image3=$_POST['i3'];
	$image4=$_POST['i4'];


	$query="update masterdata set productName='$pname', productMaterial='$pmaterial', customerType='$ctype', productType='$ptype', productSubType='$psubtype', purity=$ppurity, weight=$pweight, rate=$prate, makingCharges=$pmakingcharges, tax=$ptax, discount=$pdiscount, finalAmount=$pfinalamount, occasion='$poccasion', remark1='$premark1', remark2='$premark2', remark3='$premark3' where productId=$pid";
	//if(mysqli_query($con,$query))
	if($con->query($query)==TRUE)
	{
		//echo "<script>window.location='updateProduct.php?msg=success'</script>";
		echo "<script>alert('Product updated successfully')</script>";
		echo "<script>window.location='adminProduct.php'</script>";

	}
	else
	{
		echo"Error : " . $con->error;
		//echo "Error : " . mysqli_error($con);
	}
?>
