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
  //echo "Session is in active";
		header('Location: index.php');
}
?>

<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<script type="text/javascript">
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
		</script>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Rasik Jewellers</title>
	</head>
	<body style="background-color:white;">
		<?php
			include'header.php';
			include'database_connection.php';
			//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error()); include'header.php';
		?>

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
			<!--	<a href="#" class="btn btn-info btn-md" role="button">website settings</a>-->
			<li><a href="adminpage.php">Website Settings</a></li>
			<li><a href="adminProduct.php">Products</a></li>
			<li><a href="adminNews.php">News</a></li>
			<li class="active"><a href="adminQuery.php" style='background-color:#404040;'>Query</a></li>
			<li><a href="adminEnquiry.php">Enquiry</a></li>
		</ul>

		<div class="container container-content">
			<div id="query">
				<?php
					$queryId_array=array();
					$customerName_array=array();
					$contactNumber_array=array();
					$emailId_array=array();
					$queryText_array=array();
					$attachment_array=array();
					$count1=0;

					$query1="select * from query";
					$result1=mysqli_query($con,$query1);
					while($row=mysqli_fetch_array($result1))
					{
						$queryId_array[$count1]=$row['queryId'];
						$customerName_array[$count1]=$row['customerName'];
						$contactNumber_array[$count1]=$row['contactNumber'];
						$emailId_array[$count1]=$row['emailId'];
						$queryText_array[$count1]=$row['queryText'];
						$attachment_array[$count1]=$row['attachment'];
						$count1++;
					}
				?>
				<div class='panel'>
					<div class='panel'>
						<div class='row'>
							<div class='col-md-12'>
								<h1 class='text-center fancy-title'><span>Query Section</span></h1>
							</div>
						</div>
					</div>

						<div id="display_query">
							<table class='table'>
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Mobile No</th>
										<th>Email</th>
										<th>Query Text</th>
										<th>Attachment</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
										for($i=0;$i<$count1;$i++)
										{
											echo"
												<tr>
													<td>$queryId_array[$i]</td>
													<td>$customerName_array[$i]</td>
													<td>$contactNumber_array[$i]</td>
													<td>$emailId_array[$i]</td>
													<td>$queryText_array[$i]</td>
													<td><a target='_blank' href='$attachment_array[$i]'><button id=$queryId_array[$i] class='btn btn-info btn-block btn-md'>Attachment</button></a></td>
													<td><a href='deleteQuery2.php?q=$queryId_array[$i]'><button id=$queryId_array[$i] class='btn btn-danger btn-block btn-md'>Delete</button></a></td>
												</tr>
											";
										}
									?>
								</tbody>
							</table>
						</div>

				</div>
			</div>
		</div>
	</body>
</html>
