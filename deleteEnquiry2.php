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
	session_start();
	if (isset($_SESSION['username']))
	{
		//echo 'Welcome'.$_SESSION['username'];
	}
	else
	{
		//echo "Session is in active";
		header('Location: index.php');
	}
	include'database_connection.php';
	if($_GET)
	{
		if($_GET['q'])
		{
			$delete_id=$_GET['q'];
		}
	}
	$query="select productImage from enquiry where enquiryId=$delete_id";
	$result=$con->query($query);
	if($result->num_rows==1)
	{
		while($row=$result->fetch_assoc())
		{
			$attachment=$row['productImage'];
		}
		if($attachment)
			unlink($attachment);
	}
	$query1="delete from enquiry where enquiryId=$delete_id";
	if($con->query($query1))
	{
		echo"<script>window.location='adminEnquiry.php'</script>";
	}
	else
	{
		echo "Error: " . $query1 . "<br>" . $con->error;
	}
?>
