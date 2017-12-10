<?php
	session_start();
?>

<html>
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
	<head>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<script type="text/javascript">
		function update_settings(){
      $(document).ready(function(){
			$('form').submit(function(event){
				//Form data variable created
				var formData = {
					name: $('input[name=name]').val(),
					email: $('input[name=email]').val(),
					mobile1: $('input[name=mobile1]').val(),
					mobile2: $('input[name=mobile2]').val(),
					address: $('input[name=address]').val(),
					logo: $('input[name=logoUrl]').val(),
					about: $('input[name=aboutUsText]').val()

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
	  //alert("Update successfully");

	}

	function deleteRecord(id)
	{
		//alert(id);
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
				xmlhttp=new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange=function()
		{
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
						document.getElementById("disply_products").innerHTML=xmlhttp.responseText;
				}
		}
		xmlhttp.open("POST","deleteProduct.php?q="+id,true);
		xmlhttp.send();
	}

	function deleteQuery(id)
	{
		//alert(id);
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
				xmlhttp=new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange=function()
		{
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
						document.getElementById("disply_query").innerHTML=xmlhttp.responseText;
				}
		}
		xmlhttp.open("POST","deleteQuery.php?q="+id,true);
		xmlhttp.send();
	}

	function deleteEnquiry(id)
	{
		//alert(id);
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
				xmlhttp=new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange=function()
		{
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
						document.getElementById("disply_enquiry").innerHTML=xmlhttp.responseText;
				}
		}
		xmlhttp.open("POST","deleteEnquiry.php?q="+id,true);
		xmlhttp.send();
	}
	</script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rasik Jewellers</title>

    </head>

	<body style="background-color:#cccccc;">
		<?php
			include'header.php';
			include'database_connection.php';
			//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error()); include'header.php';
		?>
		<!--<nav class="navbar navbar-default navbar-transparent navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
					<button type="button" style="color: #ffffff;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span >Menu</span>
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars" aria-hidden="true"></span>
					</button>
                    <a class="navbar-brand" href="index.php">Rasik Jewellers</a>
                </div>
				<div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li><a href="Index.php">Home</a></li>
						<li><a href="aboutus.php">About Us</a></li>
						<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Brands
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
							<li><a href="#">Nakshatra</a></li>
							<li><a href="#">Evara</a></li>
						</ul>
						</li>
						<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Rings</a></li>
								<li><a href="#">Earrings</a></li>
								<li><a href="#">Pendants</a></li>
								<li><a href="#">Bangles</a></li>
								<li><a href="#">Bracelets</a></li>
								<li><a href="#">Nacklaces</a></li>
								<li><a href="#">MangalSutra</a></li>
								<li class="divider"></li>
								<li><a href="#">Men's Jewellery</a></li>
								<li><a href="#">Women's Jewellery</a></li>
							</ul>
						</li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
		<br><br><br><br>
		<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Change Website Settings">Website Settings</button>
		<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="See Products">Products</button>
		<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="See Products">News</button>
		<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="See Queries">Query</button>
		<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="See Enquiries">Enquiry</button>-->

		<?php
			$rateQuery="select * from rate where rate_date=CURDATE()";
			$rateResult=mysqli_query($con,$rateQuery);
			$rate_flag=mysqli_num_rows($rateResult);
			if($rate_flag==0)
			{
				echo "<script>alert('Please Update Todays Rates ');</script>";
			}
		?>



		<ul class="nav nav-pills" >
			<!--<a href="#" class="btn btn-info btn-md" role="button">website settings</a>-->
			<li class="active"><a href="adminpage.php" style='background-color:#8a00e6;'>Website Settings</a></li>
			<li><a href="adminProduct.php">Products</a></li>
			<li><a href="adminNews.php">News</a></li>
			<li><a href="adminQuery.php">Query</a></li>
			<li><a href="adminEnquiry.php">Enquiry</a></li>
		</ul>

		<!--<div class="btn-group">
			<button type="button" class="btn btn-primary btn-md">Website Settings</button>
			<button type="button" class="btn btn-primary btn-md">Products</button>
			<button type="button" class="btn btn-primary btn-md">News</button>
			<button type="button" class="btn btn-primary btn-md">Query</button>
			<button type="button" class="btn btn-primary btn-md">Enquiry</button>
		</div>-->

		<div class="container container-content">
			<br><br>


			<div id="websitesettings">
				<div class="panel" style="background-color:white;">
					<div class="panel">
						<div class="row">
							<div class="col-md-12">
								<h1 class="text-center fancy-title"><span>Website Settings</span></h1>
							</div>
						</div>
					</div>

					<?php
						$query="select * from websiteinfo";
						$result=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
							$websiteName=$row['websiteName'];
							$mobileNumber1=$row['mobileNumber1'];
							$mobileNumber2=$row['mobileNumber2'];
							$emailId=$row['emailId'];
							$address=$row['address'];
							$logoUrl=$row['logoUrl'];
							$aboutUsText=$row['aboutUsText'];
							$homePageText=$row['homePageText'];
						}
					?>

					<div class="panel-body">
					<?php
						echo"
						<form>
							<div class='input-group form-group'>
								<span class='input-group-addon' id='name'>Website Name</span>
								<input type='text' name='name' class='form-control' aria-describedby='name' placeholder='Full Name' value='$websiteName' disabled>
							</div>

							<div class='input-group form-group'>
								<span class='input-group-addon' id='email'> &nbsp&nbsp&nbsp&nbsp Email ID &nbsp&nbsp&nbsp&nbsp </span>
								<input type='email' name='email' class='form-control' aria-describedby='email' placeholder='Email ID' value='$emailId'>
							</div>

							<div class='input-group form-group'>
								<span class='input-group-addon' id='phno'> &nbsp Mobile No 1 &nbsp </span>
								<input type='text' name='mobile1' pattern='[0-9]{10}' class='form-control' aria-describedby='mobile1' placeholder='Phone No' value='$mobileNumber1'>
							</div>

							<div class='input-group form-group'>
								<span class='input-group-addon' id='phno'> &nbsp Mobile No 2 &nbsp </span>
								<input type='text' name='mobile2' pattern='[0-9]{10}' class='form-control' aria-describedby='mobile2' placeholder='Phone No' value='$mobileNumber2'>
							</div>


							<div class='input-group form-group'>
								<span class='input-group-addon' id='address'> &nbsp&nbsp&nbsp&nbsp Address &nbsp&nbsp&nbsp&nbsp </span>
								<input type='text' name='address' class='form-control' aria-describedby='address' placeholder='Address' value='$address'>
							</div>

							<div class='input-group form-group'>
								<span class='input-group-addon' id='aboutus'>&nbsp About Us Text</span>
								<input type='text' name='aboutUsText' class='form-control' aria-describedby='aboutus' placeholder='About Us Text' value='$aboutUsText'>
							</div>

							<div class='col-md-6'>
								<button type='submit' class='btn btn-primary btn-lg btn-block' style='background-color:#404040;' onclick='update_settings()'>Update</button>
							</div>
							<div class='col-md-6'>
								<button type='submit' class='btn btn-primary btn-lg btn-block' style='background-color:#404040;'>Cancel</button>
							</div>
						</form>
						";
						?>
					</div>


					<div class="panel-footer">

					</div>
				</div>
			</div>
		</div>
	</body>
</html>
