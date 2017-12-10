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
	$pcustomerName=$_POST['name'];
	$pcontactNumber=$_POST['mobile1'];
	$pemailId=$_POST['email'];
	$pqueryText=$_POST['queryText'];

	//echo"my file=".$_FILES['attach'];
	//if(isset($_FILES['attach']))
	if($_FILES['attach']['tmp_name'])
	{

			if($_FILES['attach']['error']>0)
			{
				echo "Error:".$_FILES['attach']['error']."<br>";
				//print_r($_FILES['attach']['error']);
			}
			else
			{
				$name=$_FILES['attach']['name'];
				echo"filename=$name";
				$target_dir = "images/";
				$target_file = $target_dir.basename($_FILES['attach']['name']);
				if(file_exists($target_file))
				{
					echo "<script>alert('file with this name already exists in target directory');</script>";
					echo "<script>window.location='contactus.php'</script>";
				}
				else
				{
					move_uploaded_file($_FILES['attach']['tmp_name'], $target_file);
				}
			}
	}

	//if(isset($_FILES['attach']))
	if($_FILES['attach']['tmp_name'])
	{
		//$query="insert into query(customerName,contactNumber,emailId,queryText,attachment) values('$pcustomerName','$pcontactNumber','$pemailId','$pqueryText','$target_file')";
		$query=$con->prepare("insert into query(customerName,contactNumber,emailId,queryText,attachment) values(?,?,?,?,?)");
		$query->bind_param("sssss",$pcustomerName,$pcontactNumber,$pemailId,$pqueryText,$target_file);
		//$query->execute();
	}
	else
	{
		//$query="insert into query(customerName,contactNumber,emailId,queryText) values('$pcustomerName','$pcontactNumber','$pemailId','$pqueryText')";
		$query=$con->prepare("insert into query(customerName,contactNumber,emailId,queryText)values(?,?,?,?)");
		$query->bind_param("ssss",$pcustomerName,$pcontactNumber,$pemailId,$pqueryText);
		//$query->execute();
	}

	//if(mysqli_query($con,$query))
	//if($con->query($query))
	if($query->execute())
	{
		echo"<script>window.location='contactus.php?id=success';</script>";
	}
	else
	{
		echo "Error : " . mysqli_error($con);
	}
?>
