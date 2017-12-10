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
	if($_GET)
	{
		if($_GET['product'])
		{
			$delete_id=$_GET['product'];
		}
	}
	$q="select mainImageUrl,otherImage1,otherImage2,otherImage3,otherImage4 from masterdata where productId=$delete_id";
	$r=$con->query($q);
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
	if($con->query($query)==TRUE)
	{
		//echo "<script>window.location='updateProduct.php?msg=success'</script>";
		echo "<script>alert('Product deleted successfully')</script>";
		echo "<script>window.location='adminProduct.php'</script>";

	}
	else
	{
		echo"Error : " . $con->error;
		//echo "Error : " . mysqli_error($con);
	}

?>
