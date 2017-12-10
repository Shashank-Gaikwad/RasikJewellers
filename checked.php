<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->

		<script type="text/javascript">
			function searchItems(str)
			{
				//alert("received string is "+str);
				var id="shashank";
				var xmlhttp;
				if (window.XMLHttpRequest)
				{
					xmlhttp=new XMLHttpRequest();
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST","searchProducts.php?q="+str, true);
				xmlhttp.send();
			}
		</script>

<title>Rasik Jewellers</title>
</head>
<body style="background-color:#808080;">
<?php include'header.php'; ?>

<?php
	$gold=0;
	$silver=0;
	$rings=0;
	$earrings=0;
	$mangalsutras=0;
	$bracelates_bangles=0;

	if(isset($_POST['gold']))
		$gold=1;
	if(isset($_POST['silver']))
		$silver=1;
	if(isset($_POST['rings']))
		$rings=1;
	if(isset($_POST['earrings']))
		$earrings=1;
	if(isset($_POST['mangalsutras']))
		$mangalsutras=1;
	if(isset($_POST['bracelates']))
		$bracelates_bangles=1;


	$where_flag=0;
	$query_set_flag=0;
	$query="select * from masterdata where";
	$categoryArray=array();
	$categoryArray[0]=$gold;
	$categoryArray[1]=$silver;
	$categoryArray[2]=$rings;
	$categoryArray[3]=$earrings;
	$categoryArray[4]=$mangalsutras;
	$categoryArray[5]=$bracelates_bangles;

	$categoryName=array();
	$categoryName[0]="Gold";
	$categoryName[1]="Silver";
	$categoryName[2]="Ring";
	$categoryName[3]="Earring";
	$categoryName[4]="Mangalsutra";
	$categoryName[5]="Bracelates and Bangles";
?>

<br><br>
	<div id="temp">
	<div class="row">

	<div class="col-md-2" >
	<div class="panel" style="background-color: #454545;">

		<div class="panel-body"  style="background-color: #454545;">
			<form action="checked.php" method=POST>
			<input type="text" class="form-control" placeholder="search.." id="search" name="search" onkeyup="searchItems(this.value)">
			<h5 style="color:white;">
			<div class="checkbox">
  			<?php
				if($gold==1)
				{
					echo"<label><input type='checkbox' id='gold' value='gold' name='gold' checked>Gold</label>";
				}
				else
				{
					echo"<label><input type='checkbox' id='gold' value='gold' name='gold'>Gold</label>";
				}
			?>
			</div>
			<div class="checkbox">
			<?php
				if($silver==1)
				{
					echo"<label><input type='checkbox' id='silver' value='silver' name='silver' checked>Silver</label>";
				}
				else
				{
					echo"<label><input type='checkbox' id='silver' value='silver' name='silver'>Silver</label>";
				}
			?>

			</div>
			<div class="checkbox">
  			<?php
				if($rings==1)
				{
					echo"<label><input type='checkbox' id='rings' value='rings' name='rings' checked>Rings</label>";
				}
				else
				{
					echo"<label><input type='checkbox' id='rings' value='rings' name='rings'>Rings</label>";
				}
			?>
			</div>
			<div class="checkbox">
  			<?php
				if($mangalsutras==1)
				{
					echo"<label><input type='checkbox' id='mangalsutras' value='mangalsutras' name='mangalsutras' checked>Mangalsutras</label>";
				}
				else
				{
					echo"<label><input type='checkbox' id='mangalsutras' value='mangalsutras' name='mangalsutras'>Mangalsutras</label>";
				}
			?>
			</div>
			<div class="checkbox">
  			<?php
				if($earrings==1)
				{
					echo"<label><input type='checkbox' id='earrings' value='earrings' name='earrings' checked>Earrings</label>";
				}
				else
				{
					echo"<label><input type='checkbox' id='earrings' value='earrings' name='earrings'>Earrings</label>";
				}
			?>
			</div>
			<div class="checkbox">
  			<?php
				if($bracelates_bangles==1)
				{
					echo"<label><input type='checkbox' id='bracelates' value='bracelates' name='bracelates' checked>Bracelates & Bangles</label>";
				}
				else
				{
					echo"<label><input type='checkbox' id='bracelates' value='bracelates' name='bracelates'>Bracelates & Bangles</label>";
				}
			?>
			</div>

			<center>
				<button type="submit" class="btn btn-sm" style="background-color:white; color:black;">Show</button>
			</center>
		</div>
		</form>


	</div>
</div>

<div id="mydiv">
<?php
	include'database_connection.php';
	//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());



for($i=0;$i<6;$i++)
{
	if($categoryArray[$i]==1)
	{
		$query_set_flag=1;
		if($where_flag==1)
		{
			if($i<2)
			{
				$temp="or productMaterial='$categoryName[$i]'";
				//$query=strcat($query,$temp);
				$query=$query." ".$temp;
			}
			else
			{
				$temp="or productType='$categoryName[$i]'";
				//$query=strcat($query,$temp);
				$query=$query." ".$temp;
			}
		}
		if($where_flag==0)
		{

			if($i<2)
			{
				$temp="productMaterial='$categoryName[$i]'";
				//$query=strcat($query,$temp);
				$query=$query." ".$temp;
				$where_flag=1;
			}
			else
			{
				$temp="productType='$categoryName[$i]'";
				//$query=strcat($query,$temp);
				$query=$query." ".$temp;
				$where_flag=1;
			}
		}
	}
}
if($query_set_flag==0)
	$query="select * from masterdata";

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
						echo"
		<div class='col-md-4'>

					<ul class='caption-style-2'>
						<li>
							<img src='$image_array[$i]' height='300' width='280'/>
							<a href='details.php?product=$id_array[$i]'>
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
				<center><a href='details.php?product=$id_array[$i]'><h4 style='color:white;'>$name_array[$i]</h4></center></a>
		</div>
		";
					}
				echo"</div>";



?>
</div>
</div>
	</div>
<?php include'footer.php'; ?>
</body>
</html>
