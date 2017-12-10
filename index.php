<?php
	session_start();
?>

<?php
if (isset($_SESSION['username']))
{
//echo 'Welcome'.$_SESSION['username'];
//echo "Session is active";
header('Location: adminpage.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<style>
h3{
    font-size: 20px;
    font-family:Verdana;
    color: #515151;
}

h2{
    font-family:Verdana;
    color: #515151;
}


.carousel-inner {
      background-color:#5c5c5c;
	  max-height: 200px;
}
    .carousel{

		width:100%;

	}
.carousel-caption {
      font-size: 2em;
      right: 10%;
      left: 60%;
      top: 0%;
      bottom: 0%;
      text-align: left;
      text-shadow: none;
     }
.carousel-indicators{
      font-size: 2em;
      bottom: -1%;
      text-align: left;
      text-shadow: none;
        }

/***
 * Bootstrap relies on CSS transitions for animation, which makes it
 * easy to override.  Just add the vertical class to your carousel:
 *
 ***/

.carousel.vertical .carousel-inner {

}
.carousel.vertical .item {
  -webkit-transition: 0.6s ease-in-out top;
  -moz-transition:    0.6s ease-in-out top;
  -ms-transition:     0.6s ease-in-out top;
  -o-transition:      0.6s ease-in-out top;
  left:               0;
}
.carousel.vertical .active,
.carousel.vertical .next.left,
.carousel.vertical .prev.right    { top:0; }
.carousel.vertical .next,
.carousel.vertical .active.right  { top:100%; }
.carousel.vertical .prev,
.carousel.vertical .active.left   { top:-100%; }



.row-fluid .span2NoGutter { width:16.66667%; margin-left:0 } // 100% / 6 col
.row-fluid .span4NoGutter { width:25%; margin-left:0 } // 100% / 4 col
.row-fluid .span3NoGutter { width:33.33333%; margin-left:0 } // 100% / 3 col
}

</style>

<script>

	function showGold(id)
	{
		var xmlhttp;
		//var url='deleteQuery.php?button_id=id';
		if (window.XMLHttpRequest)
		{
				xmlhttp=new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				if(id==1)
					document.getElementById("new_arrival").innerHTML=xmlhttp.responseText;
				if(id==2)
					document.getElementById("marriage").innerHTML=xmlhttp.responseText;
				if(id==3)
					document.getElementById("trending").innerHTML=xmlhttp.responseText;
				}
		}
		xmlhttp.open("POST","showGold.php?q="+id,true);
		xmlhttp.send();
	}

	function showSilver(id)
	{
		var xmlhttp;
		//var url='deleteQuery.php?button_id=id';
		if (window.XMLHttpRequest)
		{
				xmlhttp=new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				if(id==1)
					document.getElementById("new_arrival").innerHTML=xmlhttp.responseText;
				if(id==2)
					document.getElementById("marriage").innerHTML=xmlhttp.responseText;
				if(id==3)
					document.getElementById("trending").innerHTML=xmlhttp.responseText;
				}
		}
		xmlhttp.open("POST","showSilver.php?q="+id,true);
		xmlhttp.send();
	}

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


<body style="background-color:#e6e6e6;">
<?php
	include'header.php';
	include'database_connection.php';
	//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
?>

<!--Navigation bar start-->
<!--<nav class="navbar" style="background-color:white;">
  <div class="container-fluid">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand " href="index.php"  style="color:gray;"><b>Rasik Jewellers</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" >
        <li class="active"><a href="index2.php" style="color:gray;">Home</a></li>
		<li><a href="#" style="color:gray;">Products</a></li>
        <li><a href="aboutus.php" style="color:gray;">About Us</a></li>
        <li><a href="contactus.php" style="color:gray;">Contact Us</a></li>
		<li><a href="enquiry.php" style="color:gray;">Enquiry</a></li>
        <li><a href="#" style="color:gray;" data-toggle="modal" data-target="#myLoginModal"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
      </ul>
    </div>
  </div>-->
</nav>
<!--Navigation ends-->





<div class="row">

 <div class='col-md-2'>
 <div class="panel" style="padding:3%; height:152px;background-color:#e6e6e6;">
	<center>
	<img src="images/mylogo1.png"  height="152" width="200" style="width:80%; max-height:200px;"/>
    </center>
 </div>
</div>



  <div class='col-md-7' id="news">
	<div class='panel' style="padding:3%; height:152px;background-color: #e6e6e6; color:#990099;">
	<div class='panel-heading'>
	<center>स्व. रसिकलाल मोहनलाल बोरा यांची विश्वसनीय पेढी</center>
	</div>
      <div class='panel-body'>
	<marquee>
		<h3><img src='images/hallmark.png' height='45px'>हॉलमार्क प्रमाणित सोने-चांदीचे दागिने देणारे कर्जत तालुक्यातील एकमेव दालन</h3>
		<br><br>
    </marquee>

	</div>
	</div>
</div>
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
	$gold=$gold*10;
	$gold1=$gold1*10;
	$gold2=$gold2*10;
	$gold3=$gold3*10;
	$silver=$silver*10;
?>
  <div class='col-md-3'>
	<div class='panel' style='background-color:#e6e6e6;'>


      <div class='panel-body'>
	  <center><h5 style="color:#990099;"><b>TODAYS RATE</b></h5></center>
    <center><!--<b style="color:#990099;">Gold Rate: 18Kt <i class='fa fa-inr'><?php echo"$gold/-";?></i></b><br>
				<b style="color:#990099;">Gold Rate: 22Kt <i class='fa fa-inr'><?php echo"$gold1/-";?></i></b><br>
				<b style="color:#990099;">Gold Rate: 23Kt <i class='fa fa-inr'><?php echo"$gold2/-";?></i></b><br>-->
				<b style="color:#990099;">GOLD: 24Kt: <i class='fa fa-inr'> <?php echo"$gold3/-";?></i></b><br>
	          <b style="color:#990099;">SILVER: <i class='fa fa-inr'> <?php echo"$silver/-";?></i></b><br><br>
	 <a href="rates.php"><button type="button" class="btn primary btn-sm" style="background-color:#990099; color:white;"><b>DETAILS<b></button></a></center>




	</div>
	</div>
</div>

</div>




 <!--carosuel start-->
<div class="row">
<div class="col-md-2" >
	<div class="panel">

		<div class="panel-body"  style="background-color: #e6e6e6;">
			<form action="checked.php" method=POST>
			<input type="text" class="form-control" style="color:#990099;" placeholder="SEARCH" id="search" name="SEARCH" onkeyup="searchItems(this.value)">
			<h5 style="color:#990099;">
			<!--<div class="checkbox">
  			<label><input type="checkbox" id="men" value="men" name="men">Men</label>
			</div>
			<div class="checkbox">
  			<label><input type="checkbox" id="women" value="women" name="women">Women</label>
			</div>-->
			<div class="checkbox">
  			<label><input type="checkbox" id="gold" value="gold" name="gold"><b>Gold</b></label>
			</div>
			<div class="checkbox">
  			<label><input type="checkbox" id="silver" value="silver" name="silver"><b>Silver</b></label>
			</div>
			<div class="checkbox">
  			<label><input type="checkbox" id="rings" value="rings" name="rings"><b>Rings</b></label>
			</div>
			<div class="checkbox">
  			<label><input type="checkbox" id="mangalsutras" value="mangalsutras" name="mangalsutras"><b>Mangalsutras</b></label>
			</div>
			<div class="checkbox">
  			<label><input type="checkbox" id="earrings" value="earrings" name="earrings"><b>Earrings</b></label>
			</div>
			<div class="checkbox">
  			<label><input type="checkbox" id="bracelates" value="bracelates" name="bracelates"><b>Bracelates & Bangles</b></label>
			</div>
			<!--<div class="checkbox">
  			<label><input type="checkbox" id="24" value="24" name="kt24">24Kt</label>
			</div>
			<div class="checkbox">
  			<label><input type="checkbox" id="22" value="22" name="kt22" >22Kt</label>
			</div>
			<div class="checkbox">
  			<label><input type="checkbox" id="20" value="20" name="kt20" >20Kt</label>
			</div>
			<div class="checkbox">
  			<label><input type="checkbox" id="18" value="18" name="kt18" >18Kt</label>
			</div>-->
			<center>
			<button type="submit" class="btn btn-sm" style="background-color:#990099; color:white;"><b>SHOW</b></button>
			</center>
		</div>
		</form>


	</div>
</div>
<div id="mydiv">
<div class="col-md-10">
<div class='panel' style="width:100%;">
      <div class='panel-body'>

<!--<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:210px; width:100%;">

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>

    </ol>


    <!--<div class="carousel-inner" role="listbox">
    </div>-->


    <!--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>-->

<?php
	$deleteNews="delete from news where newsEnd<CURDATE()";
	$newsResult=$con->query($deleteNews);
	$newsCount=0;
//  $newsId_array=array();
//	$newsTitle_array=array();
//	$newsImage_array=array();
//	$newsText_array=array();
//	$newsStart_array=array();
//	$newsEnd_array=array();

	$newsQuery="select * from news";
	$newsResult=$con->query($newsQuery);
	$newsResult=mysqli_query($con,$newsQuery);
	while($row=mysqli_fetch_array($newsResult))
	while($row=$newsResult->fetch_assoc())
	{
		//alret("hello");
		$newsId_array[$newsCount]=$row['newsId'];
		$newsTitle_array[$newsCount]=$row['newsTitle'];
		$newsImage_array[$newsCount]=$row['newsImage'];
		$newsText_array[$newsCount]=$row['newsText'];
		$newsStart_array[$newsCount]=$row['newsStart'];
		$newsEnd_array[$newsCount]=$row['newsEnd'];
		$newsCount++;
	}

?>
  <div id='carousel-demo' class='carousel slide' data-ride='carousel' data-interval='5000' style="height:210px; width:100%;">
 <!-- Indicators -->
  <ol class='carousel-indicators'>
  <?php
	for($i=0;$i<$newsCount;$i++)
	{
		if($i==0)
		{
			echo"<li data-target='#carousel-demo' data-slide-to='$i' class='active'></li>";
		}
		else
		{
			echo"<li data-target='#carousel-demo' data-slide-to='$i'></li>";
		}
	}
  ?>

  </ol>

  <!-- Sliding images statring here -->
   <div class='carousel-inner'>
   <?php
		for($i=0;$i<$newsCount;$i++)
		{
			if($i==0)
			{
				echo"
				<div class='item active'>
      <img src='$newsImage_array[$i]' style='width:30%; max-height:200px;' alt='banana'>
      <div class='carousel-caption'>
       <a href='newsDetails2.php?news=$newsId_array[$i]' style='color:gold;'><h2>$newsTitle_array[$i]</h2></a>
       <p>$newsText_array[$i]</p>
      </div>
    </div>
				";
			}
			else
			{
				echo"
				<div class='item'>
      <img src='$newsImage_array[$i]' style='width:30%; max-height:200px;' alt='banana'>
      <div class='carousel-caption'>
       <a href='newsDetails.php?news=$newsId_array[$i]' style='color:gold;'><h2>$newsTitle_array[$i]</h2></a>
       <p>$newsText_array[$i]</p>
      </div>
    </div>
				";
			}
		}
   ?>


  </div>
  <!-- Next / Previous controls here -->
  <a class="left carousel-control" href="#carousel-demo" data-slide="prev" style="width:5%">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-demo" data-slide="next" style="width:5%">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  </div>
<div class="row">
	<center><a href="newsAll.php"><button class='btn btn-sm' style="background-color:#990099; color:white;"><b>SEE ALL NEWS</b></button></a></center>
 </div>
</div>
</div>
</div>
</div>
</div>
  <!--Horizental Carousel-->



 <!--First container ends-->


 <?php
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

	$productQuery="select * from masterdata";
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
?>

  <!--Second container start-->
<div class="container" style="width:100%;">
<div class="row">

</div>
<div class="row">

<center><h4 style="color:#990099;"><b><u>New Arrival Items</u></b></h4></center>
<div class='row'>
<div class="col-md-4">
<div class="col-md-4">
<button class="btn btn primary btn-block btn-md" style="float:middle; color:white; background-color:#990099;" onclick="showGold(1)">GOLD</button>
</div>
<div class="col-md-4">
<button class="btn btn primary btn-block btn-md" style="float:middle; color:white; background-color:#990099;" onclick="showSilver(1)">SILVER</button>
</div>
</div>
</div>
<br>
<div id="new_arrival">
 <?php
 $productCount=0;
 $productQuery="select * from masterdata where remark1='new'";
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
		//if($i==$productCount || $i==4)
			//break;
		echo"
		<div class='col-md-3'>

					<ul class='caption-style-2'>
						<li>
							<img src='$mainImageUrl_array[$i]' height='300' width='280'/>
							<a href='details.php?product=$productId_array[$i]'>
							<div class='caption'>
								<div class='blur'>
								</div>
								<div class='caption-text' style='color:white;'>
									<h1>$productName_array[$i]</h1>
									<i class='fa fa-inr'>$finalAmount_array[$i]</i>
								</div>
							</div>
							</a>
						</li>
					</ul>
					<center><a href='details.php?product=$productId_array[$i]'><h4 style='color:#990099;'>$productName_array[$i]</h4></center></a>
		</div>
		";
	}
 ?>
</div>
</div>
</div>
<hr></hr>
<div class="container" style="width:100%;">
<div class="row">

</div>
<div class="row">

<p><center><h4 style="color:#990099;"><b><u>Marriage</u></b></h4></center></p>
<div class='row'>
<div class="col-md-4">
<div class="col-md-4">
<button class="btn btn primary btn-block btn-md" style="float:middle; color:white; background-color:#990099;" onclick="showGold(2)">GOLD</button>
</div>
<div class="col-md-4">
<button class="btn btn primary btn-block btn-md" style="float:middle; color:white; background-color:#990099;" onclick="showSilver(2)">SILVER</button>
</div>
</div>
</div>
<br>
<div id="marriage">
 <?php
 $productCount=0;
  $productQuery="select * from masterdata where remark2='marriage'";
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
		//if($i==$productCount || $i==4)
			//break;
		echo"
		<div class='col-md-3'>

					<ul class='caption-style-2'>
						<li>
							<img src='$mainImageUrl_array[$i]' height='300' width='280'/>
							<a href='details.php?product=$productId_array[$i]'>
							<div class='caption'>
								<div class='blur'>
								</div>
								<div class='caption-text' style='coler:white;'>
									<h1>$productName_array[$i]</h1>
									<i class='fa fa-inr'>$finalAmount_array[$i]</i>
								</div>
							</div>
							</a>
						</li>
					</ul>
<center><a href='details.php?product=$productId_array[$i]'><h4 style='color:#990099;'>$productName_array[$i]</h4></center></a>
		</div>
		";
	}
 ?>
</div>
</div>
</div>
<hr></hr>
<div class="container" style="width:100%;">
<div class="row">

</div>
<div class="row">

<p><center><h4 style="color:#990099;"><b><u>Trending</u></b></h4></center></p>
<div class='row'>
<div class="col-md-4">
<div class="col-md-4">
<button class="btn btn primary btn-block btn-md" style="float:middle; color:white; background-color:#990099;" onclick="showGold(3)">GOLD</button>
</div>
<div class="col-md-4">
<button class="btn btn primary btn-block btn-md" style="float:middle; color:white; background-color:#990099;" onclick="showSilver(3)">SILVER</button>
</div>
</div>
</div>
<br>
<div id="trending">
 <?php
 $productCount=0;
  $productQuery="select * from masterdata where remark3='trend'";
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
		//if($i==$productCount || $i==4)
			//break;
		echo"
		<div class='col-md-3'>

					<ul class='caption-style-2'>
						<li>
							<img src='$mainImageUrl_array[$i]' height='300' width='280'/>
							<a href='details.php?product=$productId_array[$i]'>
							<div class='caption'>
								<div class='blur'>
								</div>
								<div class='caption-text' style='color:white;'>
									<h1>$productName_array[$i]</h1>
									<i class='fa fa-inr'>$finalAmount_array[$i]</i>
								</div>
							</div>
							</a>
						</li>
					</ul>
<center><a href='details.php?product=$productId_array[$i]'><h4 style='color:#990099;'>$productName_array[$i]</h4></center></a>
		</div>
		";
	}
 ?>
</div>
</div>

</div><!--Second container ends-->


<!--third container start-->
<div class="container" style=" width:100%;">
<div class="row">

<br>
<br>
<br>
<div class='col-md-2'>

</div>

<!--<div class='col-md-4'>
	<div class='panel'>
	 <div class="panel-heading"><center><h4><b>History</b></h4></center></div>
      <div class='panel-body'>

        <p>
          In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
        </p>

        <p>
          In future we afasdfsfsdgsgsgs  safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
        </p>
        <p>
          In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
        </p>
        <p>
          In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
        </p>
        <p>
          In future we afasdfsfsdgsgsgs  safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
        </p>
        <p>
          In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
        </p>
        <p>
          In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
        </p>
        <p>
          In future we afasdfsfsdgsgsgs
        </p>

	</div>
	</div>
</div>

<div class='col-md-4'>
	<div class='panel'>
	 <div class="panel-heading"><center><h4><b>Future</b></h4></center></div>
      <div class='panel-body'>


       <p>
         In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
       </p>

       <p>
         In future we afasdfsfsdgsgsgs  safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
       </p>
       <p>
         In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
       </p>
       <p>
         In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
       </p>
       <p>
         In future we afasdfsfsdgsgsgs  safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
       </p>
       <p>
         In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
       </p>
       <p>
         In future we afasdfsfsdgsgsgs safsghjkjhkh dgfgdffdg safsghjkjhkh dgfgdffdg
       </p>
       <p>
         In future we afasdfsfsdgsgsgs
       </p>


	</div>
	</div>
</div>-->


<div class='col-md-2'>

</div>
</div>
</div>
<!--third container ends-->

<hr></hr>
<!--forth container start-->
<!--<div class="container" style="width:100%;">
<div class="row">
<center><h3><b>Our Branches At</b></h3></center>


<div class="col-md-1">
</div>


<div class='col-md-3'>
<h4><u>Mumbai</u></h4>
<li class="divider"></li>
<p>--Rasik Jwellers--</p>
<p> Akshay collony,</p>
<p>opp. Abhishek Tower,Barve Road,</p>
<p>MUmbai 188012.</p>
</div>

<div class='col-md-3'>
<h4><u>Pune</u></h4>
<li class="divider"></li>
<p>--Rasik Jwellers--</p>
<p>B-10 Rahul Nagar,</p>
<p>Near HDFC Bank,Karve Road,</p>
<p>Pune 411012.</p>

</div>

<div class='col-md-3'>
<h4><u>Nashik</u></h4>
<li class="divider"></li>
<p>--Rasik Jwellers--</p>
<p>B-10 Rahul Nagar,</p>
<p>Near HDFC Bank,Karve Road,</p>
<p>Nashik 677012.</p>
</div>


<div class="col-md-2">
</div>

</div>-->
<!--forth container ends-->

<!--
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
 new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'mr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
-->


<!--footer starts-->
<footer style="width=100%;">
    <div class="row">
        <div class="col-lg-12">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</footer>
<!--footer ends-->

</body>
</html>
