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

	$q="select productImage from enquiry where enquiryId=$delete_id";
	$r=$con->query($q);
	//$r=mysqli_query($con,$q);
	//while($ans=mysqli_fetch_array($r))
	while($ans=$r->fetch_assoc())
	{
		$enquiryImage=$ans['productImage'];
	}
	if($queryAttachment)
		unlink($enquiryImage);
	$query="delete from enquiry where enquiryId=$delete_id";
	$result=$con->query($query);
	//$result=mysqli_query($con,$query);

	$enquiryId_array=array();
	$customerName_array=array();
	$contactNumber_array=array();
	$emailId_array=array();
	$productName_array=array();
	$productType_array=array();
	$productSubType_array=array();
	$productImage_array=array();
	$purity_array=array();
	$weight_array=array();
	$productDescription_array=array();
	$count2=0;

	$query2="select * from enquiry";
	$result2=$con->query($query2);
	//$result2=mysqli_query($con,$query2);
	//while($row=mysqli_fetch_array($result2))
	while($row=$result2->fetch_assoc())
	{
		$enquiryId_array[$count2]=$row['enquiryId'];
		$customerName_array[$count2]=$row['customerName'];
		$contactNumber_array[$count2]=$row['contactNumber'];
		$emailId_array[$count2]=$row['emailId'];
		$productName_array[$count2]=$row['productName'];
		$productType_array[$count2]=$row['productType'];
		$productSubType_array[$count2]=$row['productSubType'];
		$productImage_array[$count2]=$row['productImage'];
		$purity_array[$count2]=$row['purity'];
		$weight_array[$count2]=$row['weight'];
		$productDescription_array[$count2]=$row['productDescription'];
		$count2++;
	}

	echo"
	<table class='table'>
		<thead>
			<th>Customer Name</th>
			<th>Contact Number</th>
			<th>Email</th>
			<th>Product Name</th>
			<th>Product Type</th>
			<th>Product Sub Type</th>
			<th>Product Images</th>
			<th>Purity</th>
			<th>Weight</th>
			<th>Product Description</th>
			<th></th>
		</thead>
		<tbody>
	";

	for($i=0;$i<$count2;$i++)
	{
		echo"
		<tr>
			<td>$customerName_array[$i]</td>
			<td>$contactNumber_array[$i]</td>
			<td>$emailId_array[$i]</td>
			<td>$productName_array[$i]</td>
			<td>$productType_array[$i]</td>
			<td>$productSubType_array[$i]</td>
			<td><img src=$productImage_array[$i] height=200 width=200></td>
			<td>$purity_array[$i]</td>
			<td>$weight_array[$i]</td>
			<td>$productDescription_array[$i]</td>
			<td><button id=$enquiryId_array[$i] class='btn btn-primary btn-block btn-md' style='background-color:#404040;' onclick='deleteEnquiry(this.id)'>Delete</button></td>
		</tr>
		";
	}

	echo"
		</tbody>
	</table>
	";
?>
