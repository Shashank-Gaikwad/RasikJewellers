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
		<script>
			function submit_aboutus(){
      $(document).ready(function(){
			$('form').submit(function(event){
				//Form data variable created
				var formData = {
					name: $('input[name=name]').val(),
					about: $('input[name=about]').val()
				};
				//ajax call
				$.ajax({
					type: 'POST',
					url: 'aboutus1.php',
					data: formData,
					dataType: 'JSON'
				});

				//required to prevent normal form submission
				event.preventDefault();
			});
		});
	  alert('Update successfully');

	}
		</script>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
	</head>
	<body>
		<?php
			include 'header.php';
			include'database_connection.php';
			//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
		?>
		<div class="container">
		<?php
			if($_GET)
			{
				if(isset($_GET['msg']))
				{
					if($_GET['msg']=="success")
					{
						echo"<h4><center>product updated successfully</center></h4>";
					}
				}

				if(isset($_GET['product']))
				{
					$p=$_GET['product'];
				}
			}
		?>
		<a href="adminProduct.php"><button type="button" class="btn btn-info">Admin Product</button></a>
		<h1><center>Update Product</center></h1>
		<div id="update">
		<?php

			$query="select * from masterdata where productId=$p";
			$result=$con->query($query);
			//$result=mysqli_query($con,$query);
			//while($row=mysqli_fetch_array($result))
			while($row=$result->fetch_assoc())
			{
				$pid=$row['productId'];
				$pname=$row['productName'];
				$pmaterial=$row['productMaterial'];
				$ctype=$row['customerType'];
				$ptype=$row['productType'];
				$psubtype=$row['productSubType'];
				$ppurity=$row['purity'];
				$pweight=$row['weight'];
				$prate=$row['rate'];
				$pmakingcharges=$row['makingCharges'];
				$ptax=$row['tax'];
				$pdiscount=$row['discount'];
				$pfinalamount=$row['finalAmount'];
				$mainimage=$row['mainImageUrl'];
				$image1=$row['otherImage1'];
				$image2=$row['otherImage2'];
				$image3=$row['otherImage3'];
				$image4=$row['otherImage4'];
				$poccasion=$row['occasion'];
				$premark1=$row['remark1'];
				$premark2=$row['remark2'];
				$premark3=$row['remark3'];
			}

			echo"
				<form role='form' action='updateProduct1.php' method=POST enctype='multipart/form-data'>
				<input type='hidden' name='pid' value=$p>
<div class='row'>
	<div class='col-md-12'>
		<div class='form-group'>
      <label for='product_name'>Product Name:</label>
      <input type='text' class='form-control' id='product_name' name='product_name' value=$pname>
 </div>
	</div>
</div>";
echo"<div class='row'>
<div class='col-md-6'>
   <div class='form-group'>
  <label for='product_material'>Product Material</label>
  <select class='form-control' id='product_material' name='product_material'>";
	echo"<option>Select</option>";
	if($pmaterial=="Gold")
	{
		echo"<option id='gold' name='gold' selected>Gold</option>";
	}
	else
	echo"<option id='gold' name='gold'>Gold</option>";
    if($pmaterial=="Silver")
	{
		echo"<option id='silver' name='silver' selected>Silver</option>";
	}
	else
	echo"<option id='silver' name='silver'>Silver</option>";

  echo"</select>
</div>
</div>";

echo"<div class='col-md-6'>
   <div class='form-group'>
  <label for='customer_type'>Customer Type</label>
  <select class='form-control' id='customer_type' name='customer_type' value=$ctype>";
	echo"<option>Select</option>";
	if($ctype=="Men")
	{
		echo"<option id='men' name='men' selected>Men</option>";
	}
	else
	echo"<option id='men' name='men'>Men</option>";
    if($ctype=="Women")
	{
		echo"<option id='women' name='women' selected>Women</option>";
	}
	else
    echo"<option id='women' name='women'>Women</option>";
  echo"</select>
</div>
</div>

</div>
<br><br>";
echo"<div class='row'>
<div class='col-md-6'>
   <div class='form-group'>
  <label for='product_type'>Product Type</label>
  <select class='form-control' id='product_type' name='product_type' value=$ptype>";
	echo"<option>Select</option>";
	/*if($ptype=="product type 1")
	{
		echo"<option id='ptype1' name='ptype1' selected>product type 1</option>";
	}
	else
	echo"<option id='ptype1' name='ptype1'>product type 1</option>";
    if($ptype=="product type 2")
	{
		echo"<option id='ptype2' name='ptype2' selected>product type 2</option>";
	}
	else
    echo"<option id='ptype2' name='ptype2'>product type 2</option>";*/
	if($ptype=="Mangalsutra")
	{
		echo"<option id='Mangalsutra' name='Mangalsutra' selected>Mangalsutra</option>";
	}
	else
		echo"<option id='Mangalsutra' name='Mangalsutra'>Mangalsutra</option>";
	if($ptype=="Ring")
	{
		echo"<option id='Ring' name='Ring' selected>Ring</option>";
	}
	else
		echo"<option id='Ring' name='Ring'>Ring</option>";
	if($ptype=="Earring")
	{
		echo"<option id='Earring' name='Earring' selected>Earring</option>";
	}
	else
		echo"<option id='Earring' name='Earring'>Earring</option>";
	if($ptype=="Neckless")
	{
		echo"<option id='Neckless' name='Neckless' selected>Neckless</option>";
	}
	else
		echo"<option id='Neckless' name='Neckless'>Neckless</option>";
	if($ptype=="Payal")
	{
		echo"<option id='Payal' name='Payal' selected>Payal</option>";
	}
	else
		echo"<option id='Payal' name='Payal'>Payal</option>";
	if($ptype=="Nath")
	{
		echo"<option id='Nath' name='Nath' selected>Nath</option>";
	}
	else
		echo"<option id='Nath' name='Nath'>Nath</option>";
	if($ptype=="Pendent")
	{
		echo"<option id='Pendent' name='Pendent' selected>Pendent</option>";
	}
	else
		echo"<option id='Pendent' name='Pendent'>Pendent</option>";
  echo"</select>
</div>
</div>";

echo"<div class='col-md-6'>
   <div class='form-group'>
  <label for='product_sub_type'>Product Sub Type</label>
  <select class='form-control' id='product_sub_type' name='product_sub_type' value=$psubtype>";
	echo"<option>Select</option>";
	/*if($psubtype=="sub type 1")
	{
		echo"<option id='sub1' name='sub1' selected>sub type 1</option>";
	}
	else
		echo"<option id='sub1' name='sub1'>sub type 1</option>";
    if($psubtype=="sub type 2")
	{
		echo"<option id='sub2' name='sub2' selected>sub type 2</option>";
	}
	else
    	echo"<option id='sub2' name='sub2'>sub type 2</option>";*/
	if($psubtype=="Long")
	{
		echo"<option id='Long' name='Long' selected>Long</option>";
	}
	else
		echo"<option id='Long' name='Long'>Long</option>";
	if($psubtype=="Short")
	{
		echo"<option id='Short' name='Short' selected>Short</option>";
	}
	else
		echo"<option id='Short' name='Short'>Short</option>";
	if($psubtype=="Classic")
	{
		echo"<option id='Classic' name='Classic' selected>Classic</option>";
	}
	else
		echo"<option id='Classic' name='Classic'>Classic</option>";
	if($psubtype=="Delux")
	{
		echo"<option id='Delux' name='Delux' selected>Delux</option>";
	}
	else
		echo"<option id='Delux' name='Delux'>Delux</option>";
	if($psubtype=="Gents")
	{
		echo"<option id='Gents' name='Gents' selected>Gents</option>";
	}
	else
		echo"<option id='Gents' name='Gents'>Gents</option>";
	if($psubtype=="Ladies")
	{
		echo"<option id='Ladies' name='Ladies' selected>Ladies</option>";
	}
	else
		echo"<option id='Ladies' name='Ladies'>Ladies</option>";
	if($psubtype=="Heart Classic")
	{
		echo"<option id='Heart Classic' name='Heart Classic' selected>Heart Classic</option>";
	}
	else
		echo"<option id='Heart Classic' name='Heart Classic'>Heart Classic</option>";
	if($psubtype=="Engagement Diamond")
	{
		echo"<option id='Engagement Diamond' name='Engagement Diamond' selected>Engagement Diamond</option>";
	}
	else
		echo"<option id='Engagement Diamond' name='Engagement Diamond'>Engagement Diamond</option>";
	if($psubtype=="Kolkata")
	{
		echo"<option id='Kolkata' name='Kolkata' selected>Kolkata</option>";
	}
	else
		echo"<option id='Kolkata' name='Kolkata'>Kolkata</option>";
	if($psubtype=="Kundan")
	{
		echo"<option id='Kundan' name='Kundan' selected>Kundan</option>";
	}
	else
		echo"<option id='Kundan' name='Kundan'>Kundan</option>";
	if($psubtype=="Antique")
	{
		echo"<option id='Antique' name='Antique' selected>Antique</option>";
	}
	else
		echo"<option id='Antique' name='Antique'>Antique</option>";
	if($psubtype=="Nice")
	{
		echo"<option id='Nice' name='Nice' selected>Nice</option>";
	}
	else
		echo"<option id='Nice' name='Nice'>Nice</option>";
	if($psubtype=="Stone")
	{
		echo"<option id='Stone' name='Stone' selected>Stone</option>";
	}
	else
		echo"<option id='Stone' name='Stone'>Stone</option>";
	if($psubtype=="Fancy")
	{
		echo"<option id='Fancy' name='Fancy' selected>Fancy</option>";
	}
	else
		echo"<option id='Fancy' name='Fancy'>Fancy</option>";
	if($psubtype=="Mahrani")
	{
		echo"<option id='Mahrani' name='Mahrani' selected>Mahrani</option>";
	}
	else
		echo"<option id='Mahrani' name='Mahrani'>Mahrani</option>";
	if($psubtype=="Round")
	{
		echo"<option id='Round' name='Round' selected>Round</option>";
	}
	else
		echo"<option id='Round' name='Round'>Round</option>";
	if($psubtype=="none")
	{
		echo"<option id='none' name='none' selected>none</option>";
	}
	else
		echo"<option id='none' name='none'>none</option>";

  echo"</select>
</div>
</div>

</div>
<br><br>";
echo"<div class='row'>
<div class='col-md-6'>
   <div class='form-group'>
  <label for='product_material'>Purity</label>
  <select class='form-control' id='purity' name='purity' value=$ppurity>";
	echo"<option>Select</option>";
	if($ppurity==18)
	{
		echo"<option id='18' name='18' selected>18</option>";
	}
	else
	echo"<option id='18' name='18'>18</option>";
  /*  if($ppurity==20)
	{
		echo"<option id='20' name='20' selected>20</option>";
	}
	else
	echo"<option id='20' name='20'>20</option>";*/
    if($ppurity==22)
	{
		echo"<option id='22' name='22' selected>22</option>";
	}
	else
	echo"<option id='22' name='22'>22</option>";
	if($ppurity==23)
	{
		echo"<option id='23' name='23' selected>23</option>";
	}
	else
	echo"<option id='23' name='23'>23</option>";
	if($ppurity==24)
	{
		echo"<option id='24' name='24' selected>24</option>";
	}
	else
	echo"<option id='24' name='24'>24</option>";
	if($ppurity==100)
	{
		echo"<option id='100' name='100' selected>100</option>";
	}
	else
	echo"<option id='100' name='100'>100</option>";
  echo"</select>
</div>
</div>";
echo"
<div class='col-md-6'>
 <div class='form-group'>
      <label for='weight'>Weight:</label>
      <input type='text' class='form-control' id='weight' name='weight' value=$pweight>
 </div>
</div>

</div>
<br><br>
<div class='row'>
	<div class='col-md-6'>
 <div class='form-group'>
      <label for='rate'>Rate:</label>
      <input type='text' class='form-control' id='rate' name='rate' value=$prate readonly>
 </div>
</div>

<div class='col-md-6'>
 <div class='form-group'>
      <label for='making_charges'>Making charges:</label>
      <input type='text' class='form-control' id='making_charges' name='making_charges' value=$pmakingcharges>
 </div>
</div>
</div>
<br><br>
<div class='row'>
	<div class='col-md-6'>
 <div class='form-group'>
      <label for='tax'>Tax:</label>
      <input type='text' class='form-control' id='tax' name='tax' value=$ptax>
 </div>
</div>

<div class='col-md-6'>
 <div class='-group'>
      <label for='discount'> Discount:</label>
      <input type='text' class='form-control' id='discount' name='discount' value=$pdiscount>
 </div>
</div>
</div>
<br><br>
<div class='row'>
	<div class='col-md-6'>
 <div class='form-group'>
      <label for='final_amount'>Final Amount:</label>
      <input type='text' class='form-control' id='final_amount' name='final_amount' value=$pfinalamount disabled>
 </div>
</div>

<div class='col-md-6'>
 <div class='form-group'>
      <label for='occansion'> Occasion:</label>
      <input type='text' class='form-control' id='occasion' name='occasion' value=$poccasion>
 </div>
</div>
</div>
<br><br>
<div class='row'>
	<div class='col-md-6'>
 <div class='form-group'>
      <label for='remark1'>Remark 1:</label>
      <input type='text' class='form-control' id='remark1' name='remark1' value=$premark1>
 </div>
</div>

<div class='col-md-6'>
 <div class='form-group'>
      <label for='remark2'> Remark 2:</label>
      <input type='text' class='form-control' id='remark2' name='remark2' value=$premark2>
 </div>
</div>
</div>
<br><br>
<div class='row'>
	<div class='col-md-6'>
 <div class='form-group'>
      <label for='remark3'>Remark 3:</label>
      <input type='text' class='form-control' id='remark3' name='remark3' value=$premark3>
 </div>
</div>

<div class='col-md-6'>
 <div class='form-group'>
      <label for='file'> Main Image:</label>
      <input type='file' class='form-control' id='file' name='file' value=$mainimage disabled>
	  <input type='hidden' id='mi' name='mi' value=$mainimage>
 </div>
</div>
</div>

<br><br>

<div class='row'>
	<div class='col-md-6'>
 <div class='form-group'>
      <label for='image1'>Image 1:</label>
      <input type='file' class='form-control' id='image1' name='image1' disabled>
	  <input type='hidden' id='i1' name='i1' value=$image1>
 </div>
</div>

<div class='col-md-6'>
 <div class='form-group'>
      <label for='image2'> Image 2:</label>
      <input type='file' class='form-control' id='image2' name='image2' disabled>
	  <input type='hidden' id='i2' name='i2' value=$image2>
 </div>
</div>
</div>

<br><br>

<div class='row'>
	<div class='col-md-6'>
 <div class='form-group'>
      <label for='image3'>Image 3:</label>
      <input type='file' class='form-control' id='image3' name='image3' disabled>
	  <input type='hidden' id='i3' name='i3' value=$image3>
 </div>
</div>

<div class='col-md-6'>
 <div class='form-group'>
      <label for='image4'> Image 4:</label>
      <input type='file' class='form-control' id='image4' name='image4' disabled>
	  <input type='hidden' id='i4' name='i4' value=$image4>
 </div>
</div>
</div>

<br><br>
<div class='row'>
	<div class='col-md-6'>
		<button type='submit' class='btn btn-primary' style='background-color:#393939;'>Update</button>
	</div>
	<div class='col-md-6'>
		<button type='reset' class='btn btn-primary' style='background-color:#393939;'>Reset</button>
	</div>
</div>
</form>";

		?>
		</div>
			</div>
		<?php include 'footer.php'; ?>
	</body>
</html>
