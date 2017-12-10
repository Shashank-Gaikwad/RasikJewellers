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
	$delete_id=$_REQUEST['q'];

	$q="select attachment from query where queryId=$delete_id";
	$r=$con->query($q);
	//$r=mysqli_query($con,$q);
	//while($ans=mysqli_fetch_array($r))
	while($ans=$r->fetch_assoc())
	{
		$queryAttachment=$ans['attachment'];
	}
	if($queryAttachment)
		unlink($queryAttachment);
	$query="delete from query where queryId=$delete_id";
	$result=mysqli_query($con,$query);

	$count1=0;
	$queryId_array=array();
	$customerName_array=array();
	$contactNumber_array=array();
	$emailId_array=array();
	$queryText_array=array();
	$attachment_array=array();

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

	echo"
	<table class='table'>
		<thead>
		<tr>
			<th><center>ID</center></th>
			<th><center>Name</center></th>
			<th><center>Mobile No</center></th>
			<th><center>Email</center></th>
			<th><center>Query Text</center></th>
			<th><center>Attachment</center></th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		";

		for($i=0;$i<$count1;$i++)
		{
			echo"
			<tr>
				<td>$queryId_array[$i]</td>
				<td>$customerName_array[$i]</td>
				<td>$contactNumber_array[$i]</td>
				<td>$emailId_array[$i]</td>
				<td>$queryText_array[$i]</td>
				<td><a target='_blank' href='$attachment_array[$i]'>Attachment</a></td>
				<td><button id=$queryId_array[$i] class='btn btn-primary btn-block btn-md' style='background-color:#404040;' onclick='deleteQuery(this.id)'>Delete</button></td>
			</tr>
			";
		}
		echo"
		</tbody>
	</table>
		";

?>
