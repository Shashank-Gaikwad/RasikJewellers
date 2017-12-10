<?php
	session_start();
?>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

  </head>

<?php include'header.php';
?>
<div class="container">
<body>
	<div class="container">
    	<a href="adminNews.php"><button type="button" class="btn btn-info">Admin News</button></a>
    </div>
	<br><br>
<?php
include'database_connection.php';
//inserts accepted values

//accept Data
$rate_date=$_POST['rate_date'];
$gold=$_POST['gold'];
$goldo=$_POST['goldo'];
$goldt=$_POST['goldt'];
$goldn=$_POST['goldn'];
$silver=$_POST['srate'];
$rate_flag2=$_POST['pre_flag'];
if($rate_flag2==2)
{
	$query1="insert into rate(rate_date,gold,gold1,gold2,gold3,silver) values('$rate_date',$gold,$goldo,$goldt,$goldn,$silver)";
 	$result1=$con->query($query1);
}

 ?>



</body>
</div>
</html>
