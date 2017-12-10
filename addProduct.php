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

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
</head>
<body>
<?php
	include'header.php';
	include'database_connection.php';
?>
<?php
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
?>
<div class="container">
<?php
	if($_GET)
	{
		if($_GET['id']=="success")
		{
			echo"<h6><center>Product added successfully</center></h6>";
		}
	}
?>
<a href="adminProduct.php"><button type="button" class="btn btn-info">Admin Product</button></a>
<h1><center>Add Product</center></h1>
<form role="form" action="addProduct1.php" method=POST enctype="multipart/form-data">
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
      <label for="product_name">Product Name:</label>
      <input type="text" class="form-control" id="product_name" name="product_name" required>
 </div>
	</div>
</div>
<div class="row">
<div class="col-md-6">
   <div class="form-group">
  <label for="product_material">Product Material</label>
  <select class="form-control" id="product_material" name="product_material" required>
	<option>Select</option>
    <option id="gold" name="gold">Gold</option>
    <option id="silver" name="silver">Silver</option>
  </select>
</div>
</div>

<div class="col-md-6">
   <div class="form-group">
  <label for="customer_type">Customer Type</label>
  <select class="form-control" id="customer_type" name="customer_type" required>
	<option>Select</option>
    <option id="men" name="men">Men</option>
    <option id="women" name="women">Women</option>
  </select>
</div>
</div>

</div>
<br><br>
<div class="row">
<div class="col-md-6">
   <div class="form-group">
  <label for="product_type">Product Type</label>
  <select class="form-control" id="product_type" name="product_type" required>
	<option>Select</option>
    <!--<option id="ptype1" name="ptype1">product type 1</option>
    <option id="ptype2" name="ptype2">product type 2</option>-->
	<option id="Mangalsutra" name="Mangalsutra">Mangalsutra</option>
	<option id="Ring" name="Ring">Ring</option>
	<option id="Earring" name="Earring">Earring</option>
	<option id="Neckless" name="Neckless">Neckless</option>
	<option id="Payal" name="Payal">Payal</option>
	<option id="Nath" name="Nath">Nath</option>
	<option id="Pendent" name="Pendent">Pendent</option>
  </select>
</div>
</div>

<div class="col-md-6">
   <div class="form-group">
  <label for="product_sub_type">Product Sub Type</label>
  <select class="form-control" id="product_sub_type" name="product_sub_type" required>
	<option>Select</option>
    <!--<option id="sub1" name="sub1">sub type 1</option>
    <option id="sub2" name="sub2">sub type 2</option>-->
	<option id="Long" name="Long">Long</option>
	<option id="Short" name="Short">Short</option>
	<option id="Classic" name="Classic">Classic</option>
	<option id="Delux" name="Delux">Delux</option>
	<option id="Gents" name="Gents">Gents</option>
	<option id="Ladies" name="Ladies">Ladies</option>
	<option id="Heart Classic" name="Heart Classic">Heart Classic</option>
	<option id="Engagement Diamond" name="Engagement Diamond">Engagement Diamond</option>
	<option id="Fancy" name="Fancy">Fancy</option>
	<option id="Kolkata" name="Kolkata">Kolkata</option>
	<option id="Kundan" name="Kundan">Kundan</option>
	<option id="Antique" name="Antique">Antique</option>
	<option id="Nice" name="Nice">Nice</option>
	<option id="Stone" name="Stone">Stone</option>
	<option id="Fancy" name="Fancy">Fancy</option>
	<option id="Mahrani" name="Mahrani">Mahrani</option>
	<option id="Round" name="Round">Round</option>
	<option id="none" name="none">none</option>
  </select>
</div>
</div>

</div>
<br><br>
<div class="row">
<div class="col-md-6">
   <div class="form-group">
  <label for="product_material">Purity</label>
  <select class="form-control" id="purity" name="purity" required>
	<option>Select</option>
    <option id="18" name="18">18</option>
  <!--  <option id="20" name="20">20</option>-->
	<option id="22" name="22">22</option>
	<option id="23" name="23">23</option>
	<option id="24" name="24">24</option>
	<option id="100" name="100">100</option>
  </select>
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
      <label for="weight">Weight:</label>
      <input type="text" class="form-control" id="weight" name="weight" required>
 </div>
</div>

</div>
<br><br>
<?php
	$r=$silver;
	if(isset($_POST['purity']))
	{
		if($_POST['purity']==18)
			$r=$gold;
		if($_POST['purity']==22)
			$r=$gold1;
		if($_POST['purity']==23)
			$r=$gold2;
		if($_POST['purity']==24)
			$r=$gold3;
	}

?>
<div class="row">
	<div class="col-md-6">
 <div class="form-group">
      <label for="rate">Rate:</label>
      <input type="text" class="form-control" id="rate" name="rate" value="<?php echo"18k=$gold \t 22k=$gold1 \t 23k=$gold2 \t 24k=$gold3 \t silver=$silver";?>" readonly>
 </div>
</div>

<div class="col-md-6">
 <div class="form-group">
      <label for="making_charges">Making charges: </label>
      <input type="text" class="form-control" id="making_charges" name="making_charges" required>
 </div>
</div>
</div>
<br><br>
<div class="row">
	<div class="col-md-6">
 <div class="form-group">
      <label for="tax">Tax: %</label>
      <input type="text" class="form-control" id="tax" name="tax" required>
 </div>
</div>

<div class="col-md-6">
 <div class="form-group">
      <label for="discount"> Discount: %</label>
      <input type="text" class="form-control" id="discount" name="discount" required>
 </div>
</div>
</div>
<br><br>
<div class="row">
	<div class="col-md-6">
 <div class="form-group">
      <label for="final_amount">Final Amount:</label>
      <input type="text" class="form-control" id="final_amount" name="final_amount" disabled>
 </div>
</div>

<div class="col-md-6">
 <div class="form-group">
      <label for="occansion"> Occasion:</label>
      <input type="text" class="form-control" id="occasion" name="occasion">
 </div>
</div>
</div>
<br><br>
<div class="row">
	<div class="col-md-6">
 <div class="form-group">
      <label for="remark1">Remark 1:</label>
      <input type="text" class="form-control" id="remark1" name="remark1">
 </div>
</div>

<div class="col-md-6">
 <div class="form-group">
      <label for="remark2"> Remark 2:</label>
      <input type="text" class="form-control" id="remark2" name="remark2">
 </div>
</div>
</div>
<br><br>
<div class="row">
	<div class="col-md-6">
 <div class="form-group">
      <label for="remark3">Remark 3:</label>
      <input type="text" class="form-control" id="remark3" name="remark3">
 </div>
</div>

<div class="col-md-6">
 <div class="form-group">
      <label for="mainimage"> Main Image:</label>
      <input type="file" class="form-control" id="mainimage" name="mainimage" required>
 </div>
</div>
</div>
<br><br>
<div class='row'>
	<div class='col-md-6'>
 <div class='form-group'>
      <label for='image1'>Image 1:</label>
      <input type='file' class='form-control' id='image1' name='image1'>
 </div>
</div>

<div class='col-md-6'>
 <div class='form-group'>
      <label for='image2'> Image 2:</label>
      <input type='file' class='form-control' id='image2' name='image2'>
 </div>
</div>
</div>

<br><br>

<div class='row'>
	<div class='col-md-6'>
 <div class='form-group'>
      <label for='image3'>Image 3:</label>
      <input type='file' class='form-control' id='image3' name='image3'>
 </div>
</div>

<div class='col-md-6'>
 <div class='form-group'>
      <label for='image4'> Image 4:</label>
      <input type='file' class='form-control' id='image4' name='image4'>
 </div>
</div>
</div>

<br><br>
<div class="row">
	<div class="col-md-6">
		<button type="submit" class="btn btn-primary" style="background-color:#393939;">Submit</button>
	</div>
	<div class="col-md-6">
		<button type="reset" class="btn btn-primary" style="background-color:#393939;">Reset</button>
	</div>
</div>
<br><br>

</form>
<?php include 'footer.php'; ?>
</div>

</body>
</html>
