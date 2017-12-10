<?php
	session_start();
?>

<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<script type="text/javascript">
	function image_click(image_id){
		var small_image = document.getElementById(image_id);
		small_image.setAttribute("border", "2px");

		var child = document.getElementById("myid");
		document.getElementById("image_div").removeChild(child);
		var image = document.createElement("img");
		image.setAttribute("height", "570");
		image.setAttribute("width", "820");
		image.setAttribute("class", "img-responsive");
		image.setAttribute("src", image_id);
		image.setAttribute("id", "myid");
		document.getElementById("image_div").appendChild(image);
	}
</script>
<style>
th,td
{
	color:white;
}
</style>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<!-- <link rel="stylesheet" href="mylib/bootstrap/css/bootstrap.min.css">
<script src="mylib/jquery-2.2.3.min.js"></script>
<script src="mylib/bootstrap/js/bootstrap.min.js"></script> -->
<title>Rasik Jewelles</title>
</head>
<body style="background-color:#808080;">
	<?php include 'header.php'; ?>
	<br>
	<!-- <div class="row" style="background-color: rgba(0, 0, 0, 0.2);">
		<div class="col-md-2"><br><img class="responsive" alt="logo" width="125px" height="125px" /><br></div>
		<div class="col-md-10"><center><h2>Ideal Jewellery</h2></center></div>
	</div> -->
	<div class="container">
		<a href="adminProduct.php"><button type="button" class="btn btn-info">Admin Product</button></a>
</div>
	<br><br>
<div class="container">
	<?php
	if($_GET)
	{
		if($_GET['product'])
		{
			$pid=$_GET['product'];
		}
	}
	include'database_connection.php';
	//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
	$image_count=0;
	$image_array=array();
	$query="select * from masterdata where productId=$pid";
	$result=$con->query($query);
	//$result=mysqli_query($con,$query);
	//while($row=mysqli_fetch_array($result))
	while($row=$result->fetch_assoc())
	{
		$productId=$row['productId'];
		$productName=$row['productName'];
		$productMaterial=$row['productMaterial'];
		$customerType=$row['customerType'];
		$productType=$row['productType'];
		$productSubType=$row['productSubType'];
		$purity=$row['purity'];
		$weight=$row['weight'];
		$rate=$row['rate'];
		$makingCharges=$row['makingCharges'];
		$tax=$row['tax'];
		$discount=$row['discount'];
		$finalAmount=$row['finalAmount'];
		$mainImageUrl=$row['mainImageUrl'];
		if($mainImageUrl!=NULL)
		{
			$image_array[$image_count]=$mainImageUrl;
			$image_count++;
		}
		$image1=$row['otherImage1'];
		if($image1!=NULL)
		{
			$image_array[$image_count]=$image1;
			$image_count++;
		}
		$image2=$row['otherImage2'];
		if($image2!=NULL)
		{
			$image_array[$image_count]=$image2;
			$image_count++;
		}
		$image3=$row['otherImage3'];
		if($image3!=NULL)
		{
			$image_array[$image_count]=$image3;
			$image_count++;
		}
		$image4=$row['otherImage4'];
		if($image4!=NULL)
		{
			$image_array[$image_count]=$image4;
			$image_count++;
		}
		$occasion=$row['occasion'];
		$remark1=$row['remark1'];
		$remark2=$row['remark2'];
		$remark3=$row['remark3'];
	}

	echo"<div class='row'>
		<div class='col-md-4'>
			<h3 style='color:white;'>$productName</h3>
			<div class='row'>
				<table class='table'>
			    <tbody>
			      <tr>
			        <td>Product Type</td>
			        <td>$productType</td>
			      </tr>
						<tr>
				        <td>Weight(in gm)</td>
				        <td>$weight</td>
				      </tr>
				   <tr>
			        <td>Customer Type</td>
			        <td>$customerType</td>
			      </tr>
			      <tr>
			        <td>Purity</td>
			        <td>$purity</td>
			      </tr>
			      <tr>
			        <td>Rate</td>
			        <td>$rate</td>
			      </tr>
			      <tr>
			        <td>Making Charges</td>
			        <td>$makingCharges</td>
			      </tr>
						<tr>
				        <td>Discount</td>
				        <td>$discount</td>
				      </tr>
			      <tr>
			        <td>Tax</td>
			        <td>$tax</td>
			      </tr>
				  <tr>
			        <td>Final Amount</td>
			        <td>$finalAmount</td>
			      </tr>";
						if($occasion!=NULL)
						{
							echo"
							<tr>
									<td>Occasion</td>
									<td>$occasion</td>
								</tr>
							";
						}
						if($remark1!=NULL)
						{
							echo"
								<tr>
									<td>Remark 1</td>
									<td>$remark1</td>
								</tr>
							";
						}
						if($remark2!=NULL)
						{
							echo"
								<tr>
									<td>Remark 2</td>
									<td>$remark2</td>
								</tr>
							";
						}if($remark3!=NULL)
						{
							echo"
								<tr>
									<td>Remark 3</td>
									<td>$remark3</td>
								</tr>
							";
						}
				  echo"
			    </tbody>
			  </table>
			  <br>

			  <h4 style='color:white;'>Price:<font color='white'> Rs. $finalAmount</font></h4>


			</div>
		</div>
		<div class='col-md-8'>
		<center>
			<img alt='img' src='$mainImageUrl' height='417' width='417'><br>
			<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' style='background-color:#404040;'>View Gallery</button>
		</center>
		</div>
	</div>";
?>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Gallery</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-md-12" id="image_div">
          	<img alt="img" src=<?php echo"$mainImageUrl";?> class="img-thumbnail" id="myid" height='570' width='820'>
          	</div>
          </div>

		<div class='row'>
          	<div class='col-md-12'>
			<?php
				for($i=0;$i<$image_count;$i++)
				{
					echo"<img id='$image_array[$i]' alt='img' src='$image_array[$i]' class='img-thumbnail' height='100px' width='100px' onclick='image_click(this.id)'>";
				}
			?>

          	</div>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<br>
<?php include 'footer.php'; ?>
