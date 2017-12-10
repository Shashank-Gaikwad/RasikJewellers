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
		<script type="text/javascript">
			function deleteNews(id)
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
						document.getElementById("disply_news").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST","deleteNews.php?q="+id,true);
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
			<li class="active"><a href="adminNews.php" style='background-color:#404040;'>News</a></li>
			<li><a href="adminQuery.php">Query</a></li>
			<li><a href="adminEnquiry.php">Enquiry</a></li>
			<!--<li><a href="updateRate.php">Rate</a></li>-->
		</ul>
		<div class="container container-content">
		<div id="news">
				<div class="panel" style="background-color:white;">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center fancy-title"><span>News</span></h1>
                        </div>
                    </div>
				</div>

				<div class="row">
					<table width="100%">
						<tbody>
						<tr>
							<td>
					<button class="btn btn-primary btn-md"  data-toggle="modal" data-target="#postNews">Post News</button>
							</td>
							<td align="center">
					<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#pgoldRate">Previous Gold Rates</button>
							</td>
							<td align="right">
					<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#goldRate">Update Gold Rates</button>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
				<br><br>
				<div id="display_news">
					<?php
						$newsCount=0;
						$newsId_array=array();
						$newsTitle_array=array();
						$newsImage_array=array();
						$newsText_array=array();
						$newsStart_array=array();
						$newsEnd_array=array();
						$newsQuery="select * from news";
						$newsResult=mysqli_query($con,$newsQuery);
						while($row=mysqli_fetch_array($newsResult))
						{
							$newsId_array[$newsCount]=$row['newsId'];
							$newsTitle_array[$newsCount]=$row['newsTitle'];
							$newsImage_array[$newsCount]=$row['newsImage'];
							$newsText_array[$newsCount]=$row['newsText'];
							$newsStart_array[$newsCount]=$row['newsStart'];
							$newsEnd_array[$newsCount]=$row['newsEnd'];
							$newsCount++;
						}

						for($i=0;$i<$newsCount;$i++)
						{
							echo"
								<div class='col-md-4'>
									<div class='panel panel-primary'>
										<div class='panel-heading' style='background-color:#404040;'>
											<h3 class='text-center' style='color:white'> $newsTitle_array[$i] <span class='glyphicon glyphicon-calendar' style='float:right; color:white;' >$newsStart_array[$i]</span></h3>
										</div>
										<div class='panel-body'>
											<center><img class='center-block' src='$newsImage_array[$i]' height='220' width='220' /></center>
										</div>
										<div class='panel-footer'>
										<div class='row'>
											<div class='col-md-6'>
												<a href='newsDetails.php?news=$newsId_array[$i]' style='color:white;'><button class='btn btn-info btn-block btn-md'>Details</button></a>
											</div>
											<div class='col-md-6'>
												<a href='deleteNews2.php?q=$newsId_array[$i]'><button id=$newsId_array[$i] class='btn btn-danger btn-block btn-md'>Delete</button></a>
											</div>
										</div>
										</div>
									</div>
								</div>
							";
						}
					?>

					<div class="modal fade" id="goldRate" role="dialog">
						<div class="modal-dialog">

						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<center><h2 class="modal-title">Enter Rate Details:</h2></center>
								</div>
								<div class="modal-body">
									<!--<p>Some text in the modal.</p>-->
									<form role="form" class="form-horizontal" method="POST" action="updateRate.php">

									<?php

										if($rate_flag==0)
										{
											echo"


												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='srate'>Date</label>
													<div class='col-xs-6'>
														<input type= 'date' class='form-control' name='date' id='date' placeholder='Date'>
													</div>
												</div>


												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='gold'>18 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='gold' id='gold' placeholder='Rate for 18krt' required>
													</div>
												</div>


												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='goldo'>22 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='goldo' id='goldo' placeholder='Rate for 22krt' required>
													</div>
												</div>

												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='goldt'>23 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='goldt' id='goldt' placeholder='Rate for 23krt' required>
													</div>
												</div>

												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='goldn'>24 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='goldn' id='goldn' placeholder='Rate for 24krt' required>
													</div>
												</div>


												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='srate'>Silver</label>
													<div class='col-xs-6'>
														<input type='silver' class='form-control' name='srate' id='srate' placeholder='Rate for silver'>
													</div>
												</div>

												<input type='hidden' name='flag' id='flag' value=$rate_flag>
											";
										}
										else
										{
											$q="select * from rate where rate_date= CURDATE()";
											$r=$con->query($q);
											while($row=$r->fetch_assoc())
											{
												$g18=$row['gold'];
												$g22=$row['gold1'];
												$g23=$row['gold2'];
												$g24=$row['gold3'];
												$s=$row['silver'];
											}
											echo"



												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='gold'>18 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='gold' id='gold' placeholder='Rate for 18krt' value=$g18>
													</div>
												</div>


												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='goldo'>22 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='goldo' id='goldo' placeholder='Rate for 22krt' value=$g22>
													</div>
												</div>

												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='goldt'>23 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='goldt' id='goldt' placeholder='Rate for 23krt' value=$g23>
													</div>
												</div>

												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='goldn'>24 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='goldn' id='goldn' placeholder='Rate for 24krt' value=$g24>
													</div>
												</div>


												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='srate'>Silver</label>
													<div class='col-xs-6'>
														<input type='silver' class='form-control' name='srate' id='srate' placeholder='Rate for silver' value=$s>
													</div>
												</div>

												<input type='hidden' name='flag' id='flag' value=$rate_flag>
											";
										}
									?>
									<center>
										<button type="submit" class="btn btn-default">Submit</button>
										<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
									</center>
									</form>
								</div>
							</div>
						</div>
					</div>


                    <!--New entered code-->

					<div class="modal fade" id="pgoldRate" role="dialog">
						<div class="modal-dialog">

						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<center><h2 class="modal-title">Previous Rate Details:</h2></center>
								</div>
								<div class="modal-body">
									<!--<p>Some text in the modal.</p>-->
									<form role="form" class="form-horizontal" method="POST" action="update_previous.php">

									<?php


											$q="select * from rate where rate_date= CURDATE()";
											$r=$con->query($q);
											while($row=$r->fetch_assoc())
											{
												$g18=$row['gold'];
												$g22=$row['gold1'];
												$g23=$row['gold2'];
												$g24=$row['gold3'];
												$s=$row['silver'];
											}
											  $rate_flag2=2;
											echo"

											<div class='form-group form-group-xs'>
												<label class='col-xs-3 control-label' for='srate'>Date</label>
												<div class='col-xs-6'>
													<input type= 'date' class='form-control' name='rate_date' id='rate_date' placeholder='Date'>
												</div>
											</div>

												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='gold'>18 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='gold' id='gold' placeholder='Rate for 18krt' value=$g18>
													</div>
												</div>


												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='goldo'>22 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='goldo' id='goldo' placeholder='Rate for 22krt' value=$g22>
													</div>
												</div>

												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='goldt'>23 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='goldt' id='goldt' placeholder='Rate for 23krt' value=$g23>
													</div>
												</div>

												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='goldn'>24 Krt(Gold)</label>
													<div class='col-xs-6'>
														<input type='numeric' class='form-control' name='goldn' id='goldn' placeholder='Rate for 24krt' value=$g24>
													</div>
												</div>


												<div class='form-group form-group-xs'>
													<label class='col-xs-3 control-label' for='srate'>Silver</label>
													<div class='col-xs-6'>
														<input type='silver' class='form-control' name='srate' id='srate' placeholder='Rate for silver' value=$s>
													</div>
												</div>

												<input type='hidden' name='pre_flag' id='pre_flag' value=$rate_flag2>
											";

									?>
									<center>
										<button type="submit" class="btn btn-default">Submit</button>
										<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
									</center>
									</form>
								</div>
							</div>
						</div>
					</div>



					<div class="modal fade" id="postNews" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add News</h4>
								</div>
								<div class="modal-body">
									<!--<p>Some text in the modal.</p>-->

									<form class="form-horizontal" role="form" method="POST" action="postNews.php" enctype="multipart/form-data">

										<div class="form-group">
											<label class="control-label col-xs-3" for="title">Title:</label>
											<div class="col-xs-8">
												<input type="text" class="form-control" name="title" id="title" placeholder="Enter News Title" required>
											</div>
										</div>


										<div class="form-group">
											<label class="control-label col-xs-3" for="dscr">Descreption:</label>
											<div class="col-xs-8">
												<input type="text" class="form-control" name="dscr" id="dscr" placeholder="Enter Descreption" required>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-xs-3" for="sdate">Start date:</label>
											<div class="col-xs-8">
												<input type="date" class="form-control" name="sdate" id="sdate" placeholder="Enter Start Date" required>
											</div>
										</div>


										<div class="form-group">
											<label class="control-label col-xs-3" for="edate">End Date:</label>
											<div class="col-xs-8">
												<input type="date" class="form-control" name="edate" id="edate" placeholder="Enter End Date" required>
											</div>
										</div>


										<div class="form-group">
											<label class="control-label col-xs-3" for="img">Upload Image:</label>
											<div class="col-xs-8">
												<input type="file" class="form-control" name="file" id="file" required>
											</div>
										</div>

										<center>
											<div class="form-group">
												<div class="col-xs-offset-3 col-xs-6">
													<button type="submit" class="btn btn-default">Submit</button>
													<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
												</div>
											</div>
										</center>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
