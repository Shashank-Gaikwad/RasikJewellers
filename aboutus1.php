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


include'database_connection.php';
//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());

$name = $_POST['name'];
$email=$_POST['email'];
$mobile1=$_POST['mobile1'];
$mobile2=$_POST['mobile2'];
$address=$_POST['address'];
$logo=$_POST['logo'];
$about=$_POST['about'];

//$query="update websiteinfo set aboutUsText ='".$about."' where websiteName='".$name."' ";

$query="update websiteinfo set emailId='$email',mobileNumber1='$mobile1',mobileNumber2='$mobile2',address='$address',logoUrl='logo',aboutUsText='$about'";

if($con->query($query)==TRUE)
{
	echo"Updates succesfully";
}
else
{
	echo"Error : " . $con->error;
}

/*if(!mysqli_query($con,$query))
echo 'error'.mysqli_error($con);
else
echo"Updates succesfully";*/




?>
