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
	$pcustomerName=$_POST['customerName'];
	$pcontactNumber=$_POST['contactNumber'];
	$pemailId=$_POST['emailId'];
	$pproductName=$_POST['productName'];
	$pproductType=$_POST['productType'];
	$pproductSubType=$_POST['productSubType'];
	//$pproductImage=$_POST['productImage'];
	$ppurity=$_POST['purity'];
	$pweight=$_POST['weight'];
	$pproductDescription=$_POST['productDescription'];

	//if(isset($_FILES['productImage']))
	if($_FILES['productImage']['tmp_name'])
	{
		if (($_FILES['productImage']['type']=='image/gif') || ($_FILES['productImage']['type']=='image/jpeg') ||($_FILES['productImage']['type']=='image/png') || ($_FILES['productImage']['type']=='image/jpg'))
		{
			if($_FILES['productImage']['error']>0)
			{
				echo "Error:".$_FILES['productImage']['error']."<br>";
			}
			else
			{
				//echo "hello";
				//echo"<script>alert('hello');</script>";

				$name=$_FILES['productImage']['name'];
				//echo "file name=".$_FILES['file']['name'];
				$target_dir = "images/";
				$target_file = $target_dir.basename($_FILES['productImage']['name']);
				if(file_exists($target_file))
				{
					echo "<script>alert('file with this name already exists in target directory');</script>";
					echo "<script>window.location='enquiry.php'</script>";
				}
				else
				{
					move_uploaded_file($_FILES['productImage']['tmp_name'], $target_file);
					/*$q="select * from homepageimages";
					$r=mysqli_query($con,$q);
					$r1=mysqli_num_rows($r);
					$id=$r1+1;
					echo"id=$id";*/
					//$query="insert into masterdata(imageUrl) values('$target_file')";
					//$result=mysqli_query($con,$query) or die(mysqli_error($con));
				}
			}
		}
		else
		{
			//echo "file is not image";
			//echo "<script>alert('unsupported file format');</script>";

		}
	}

	//if(isset($_FILES['attach']))
	if($_FILES['productImage']['tmp_name'])
	{
		$query=$con->prepare("insert into enquiry(customerName,contactNumber,emailId,productName,productType,productSubType,productImage,purity,weight,productDescription) values(?,?,?,?,?,?,?,?,?,?)");
		$query->bind_param("sssssssids",$pcustomerName,$pcontactNumber,$pemailId,$pproductName,$pproductType,$pproductSubType,$pproductImage,$ppurity,$pweight,$pproductDescription);
	}
	else
	{
		$query=$con->prepare("insert into enquiry(customerName,contactNumber,emailId,productName,productType,productSubType,purity,weight,productDescription) values(?,?,?,?,?,?,?,?,?)");
		$query->bind_param("ssssssids",$pcustomerName,$pcontactNumber,$pemailId,$pproductName,$pproductType,$pproductSubType,$ppurity,$pweight,$pproductDescription);
	}


	//$query="insert into enquiry(customerName,contactNumber,emailId,productName,productType,productSubType,productImage,purity,weight,productDescription) values('$pcustomerName','$pcontactNumber','$pemailId','$pproductName','$pproductType','$pproductSubType','$target_file',$ppurity,$pweight,'$pproductDescription')";
	//if(mysqli_query($con,$query))
	//if($con->query($query))
	if($query->execute())
	{
		echo"<script>window.location='enquiry.php?id=success';</script>";
	}
	else
	{
		echo "Error : " . mysqli_error($con);
	}
?>
