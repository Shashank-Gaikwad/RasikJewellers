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

	$pmaterial=$_POST['product_material'];
	$pname=$_POST['product_name'];
	$ctype=$_POST['customer_type'];
	$ptype=$_POST['product_type'];
	$pstype=$_POST['product_sub_type'];
	$purity=$_POST['purity'];
	$weight=$_POST['weight'];
	//$rate=$_POST['rate'];
	$mcharges=$_POST['making_charges'];
	$tax=$_POST['tax'];
	$discount=$_POST['discount'];
	//$famount=$_POST['final_amount'];
	$poccasion=$_POST['occasion'];
	$remark1=$_POST['remark1'];
	$remark2=$_POST['remark2'];
	$remark3=$_POST['remark3'];


	$mainimage_flag=0;
	$image1_flag=0;
	$image2_flag=0;
	$image3_flag=0;
	$image4_flag=0;

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
		if($purity==18)
			$rate=$gold;
		if($purity==22)
			$rate=$gold1;
		if($purity==23)
			$rate=$gold2;
		if($purity==24)
			$rate=$gold3;

	}
	if($pmaterial=='Silver')
	{
		$rate=$silver;
	}

	$amount=($rate*$weight);
	$amount=$amount+($mcharges*$weight);
	$amount=$amount+($amount * ($tax/100));
	$amount=$amount-($amount * ($discount/100));
	$famount=$amount;

	//if(isset($_FILES['mainimage']))
	if($_FILES['mainimage']['tmp_name'])
	{
		if (($_FILES['mainimage']['type']=='image/gif') || ($_FILES['mainimage']['type']=='image/jpeg') ||($_FILES['mainimage']['type']=='image/png') || ($_FILES['mainimage']['type']=='image/jpg'))
		{
			if($_FILES['mainimage']['error']>0)
			{
				echo "Error:".$_FILES['mainimage']['error']."<br>";
			}
			else
			{
				$name=$_FILES['mainimage']['name'];
				//echo "file name=".$_FILES['file']['name'];
				$target_dir = "images/";
				$target_file = $target_dir.basename($_FILES['mainimage']['name']);
				if(file_exists($target_file))
				{
					echo "<script>alert('Product added successfully');</script>";
					echo "<script>window.location='addProduct.php'</script>";
				}
				else
				{
					move_uploaded_file($_FILES['mainimage']['tmp_name'], $target_file);
				}
			}
		}
		else
		{
			//echo "file is not image";
			echo "<script>alert('unsupported file format');</script>";
			echo"<script>window.location='addProduct.php';</script>";
		}
	}


	//if(isset($_FILES['image1']))
	if($_FILES['image1']['tmp_name'])
	{
		if (($_FILES['image1']['type']=='image/gif') || ($_FILES['image1']['type']=='image/jpeg') ||($_FILES['image1']['type']=='image/png') || ($_FILES['image1']['type']=='image/jpg'))
		{
			if($_FILES['image1']['error']>0)
			{
				echo "Error:".$_FILES['image1']['error']."<br>";
			}
			else
			{
				//echo "hello";
				//echo"<script>alert('hello');</script>";

				$name=$_FILES['image1']['name'];
				//echo "file name=".$_FILES['file']['name'];
				$target_dir = "images/";
				$target_file1 = $target_dir.basename($_FILES['image1']['name']);
				if(file_exists($target_file1))
				{
					echo "<script>alert('file with this name already exists in target directory');</script>";
					echo "<script>window.location='addProduct.php'</script>";
				}
				else
				{
					move_uploaded_file($_FILES['image1']['tmp_name'], $target_file1);

				}
			}
		}
		else
		{
			//echo "file is not image";
			echo "<script>alert('unsupported file format');</script>";
			echo"<script>window.location='addProduct.php';</script>";
		}
	}

	//if(isset($_FILES['image2']))
	if($_FILES['image2']['tmp_name'])
	{
		if (($_FILES['image2']['type']=='image/gif') || ($_FILES['image2']['type']=='image/jpeg') ||($_FILES['image2']['type']=='image/png') || ($_FILES['image2']['type']=='image/jpg'))
		{
			if($_FILES['image2']['error']>0)
			{
				echo "Error:".$_FILES['image2']['error']."<br>";
			}
			else
			{
				$name=$_FILES['image2']['name'];
				//echo "file name=".$_FILES['file']['name'];
				$target_dir = "images/";
				$target_file2 = $target_dir.basename($_FILES['image2']['name']);
				if(file_exists($target_file2))
				{
					echo "<script>alert('file with this name already exists in target directory');</script>";
					echo "<script>window.location='addProduct.php'</script>";
				}
				else
				{
					move_uploaded_file($_FILES['image2']['tmp_name'], $target_file2);
				}
			}
		}
		else
		{
			//echo "file is not image";
			echo "<script>alert('unsupported file format');</script>";
			echo"<script>window.location='addProduct.php';</script>";
		}
	}


	//if(isset($_FILES['image3']))
	if($_FILES['image3']['tmp_name'])
	{
		if (($_FILES['image3']['type']=='image/gif') || ($_FILES['image3']['type']=='image/jpeg') ||($_FILES['image3']['type']=='image/png') || ($_FILES['image3']['type']=='image/jpg'))
		{
			if($_FILES['image3']['error']>0)
			{
				echo "Error:".$_FILES['image3']['error']."<br>";
			}
			else
			{
				$name=$_FILES['image3']['name'];
				//echo "file name=".$_FILES['file']['name'];
				$target_dir = "images/";
				$target_file3 = $target_dir.basename($_FILES['image3']['name']);
				if(file_exists($target_file3))
				{
					echo "<script>alert('file with this name already exists in target directory');</script>";
					echo "<script>window.location='addProduct.php'</script>";
				}
				else
				{
					move_uploaded_file($_FILES['image3']['tmp_name'], $target_file3);
				}
			}
		}
		else
		{
			//echo "file is not image";
			echo "<script>alert('unsupported file format');</script>";
			echo"<script>window.location='addProduct.php';</script>";
		}
	}




	//if(isset($_FILES['image4']))
	if($_FILES['image4']['tmp_name'])
	{
		if (($_FILES['image4']['type']=='image/gif') || ($_FILES['image4']['type']=='image/jpeg') ||($_FILES['image4']['type']=='image/png') || ($_FILES['image4']['type']=='image/jpg'))
		{
			if($_FILES['image4']['error']>0)
			{
				echo "Error:".$_FILES['image4']['error']."<br>";
			}
			else
			{
				$name=$_FILES['image4']['name'];
				//echo "file name=".$_FILES['file']['name'];
				$target_dir = "images/";
				$target_file4 = $target_dir.basename($_FILES['image4']['name']);
				if(file_exists($target_file4))
				{
					echo "<script>alert('file with this name already exists in target directory');</script>";
					echo "<script>window.location='addProduct.php'</script>";
				}
				else
				{
					move_uploaded_file($_FILES['image4']['tmp_name'], $target_file4);
				}
			}
		}
		else
		{
			//echo "file is not image";
			echo "<script>alert('unsupported file format');</script>";
			echo"<script>window.location='addProduct.php';</script>";
		}
	}


	if($_FILES['mainimage']['tmp_name'])
		$mainimage_flag=1;

	if($_FILES['image1']['tmp_name'])
		$image1_flag=1;

	if($_FILES['image2']['tmp_name'])
		$image2_flag=1;

	if($_FILES['image3']['tmp_name'])
		$image3_flag=1;

	if($_FILES['image4']['tmp_name'])
		$image4_flag=1;

	if($mainimage_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,occasion,remark1,remark2,remark3)
											 values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image1_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage1,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file1','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image2_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage2,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file2','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image3_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage3,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file3','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image4_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage4,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file4','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image1_flag==1 && $image2_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage1,otherImage2,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file1','$target_file2','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image1_flag==1 && $image3_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage1,otherImage3,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file1','$target_file3','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image1_flag==1 && $image4_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage1,otherImage4,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file1','$target_file4','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image2_flag==1 && $image3_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage2,otherImage3,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file2','$target_file3','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image2_flag==1 && $image4_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage2,otherImage4,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file2','$target_file4','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image3_flag==1 && $image4_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage3,otherImage4,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file3','$target_file4','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image1_flag==1 && $image2_flag==1 && $image3_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage1,otherImage2,otherImage3,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file1','$target_file2','$target_file3','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image1_flag==1 && $image2_flag==1 && $image4_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage1,otherImage2,otherImage4,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file1','$target_file2','$target_file4','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image1_flag==1 && $image3_flag==1 && $image4_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage1,otherImage3,otherImage4,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file1','$target_file3','$target_file4','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image2_flag==1 && $image3_flag==1 && $image4_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage2,otherImage3,otherImage4,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file2','$target_file3','$target_file4','$poccasion','$remark1','$remark2','$remark3')";
	if($mainimage_flag==1 && $image1_flag==1 && $image2_flag==1 && $image3_flag==1 && $image4_flag==1)
	$query="insert into masterdata(ProductName,productMaterial,customerType,productType,productSubType,purity,weight,rate,makingCharges,tax,discount,finalAmount,mainImageUrl,otherImage1,otherImage2,otherImage3,otherImage4,occasion,remark1,remark2,remark3)
	                     values('$pname','$pmaterial','$ctype','$ptype','$pstype',$purity,'$weight','$rate','$mcharges','$tax','$discount','$famount','$target_file','$target_file1','$target_file2','$target_file3','$target_file4','$poccasion','$remark1','$remark2','$remark3')";
	//$result=mysqli_query($con,$query) or die mysqli_error($con);
	if(mysqli_query($con,$query))
	{
		echo"<script>window.location='addProduct.php?id=success';</script>";
	}
	else
	{
		echo "Error : " . mysqli_error($con);
	}

?>
