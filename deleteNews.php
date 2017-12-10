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

	$q="select attachment from news where newsId=$delete_id";
	$r=$con->query($q);
	while($ans=$r->fetch_assoc())
	{
		$attachment=$ans['attachment'];
	}
	if($attachment)
		unlink($attachment);

		$query="delete from nese where newsId=$delete_id";
		$result=$con->query($query);

		$count=0;
		$newsId_array=array();
		$newsTitle_array=array();
		$newsImage_array=array();
		$newsText_array=array();
		$newsStart_array=array();
		$newsEnd_array=array();

		$query2="select * from news";
		$result2=$con->query($query);
		while($row=$result2->fetch_assoc())
		{
			$newsId_array[$count]=$row['newsId'];
			$newsTitle_array[$count]=$row['newsText'];
			$newsImage_array[$count]=$row['newsImage'];
			$newsText_array[$count]=$row['newsText'];
			$newsStart_array[$count]=$row['newsStart'];
			$newsEnd_array[$count]=$row['newsEnd'];
			$count++;
		}
		for($i=0;$i<$count;$i++)
		{
			echo"
				<div class='col-md-4'>
					<div class='panel panel-primary'>
						<div class='panel-heading' style='background-color:#404040;'>
							<h3 class='text-center' style='color:white'> $newsTitle_array[$i] <span class='glyphicon glyphicon-calendar' style='float:right; color:white;' >$newsStart_array[$i]</span></h3>
						</div>
						<div class='panel-body'>
							<center><img src='$newsImage_array[$i]' height='220' width='220' /></center>
						</div>
						<div class='panel-footer'>
						<div class='row'>
							<div class='col-md-6'>
								<a href='newsDetails.php?news=$newsId_array[$i]' style='color:white;'><button class='btn btn-primary btn-block btn-lg' style='background-color:#404040;'>Details</button></a>
							</div>
							<div class='col-md-6'>
								<button id=$newsId_array[$i] onclick='deleteNews(this.id)' class='btn btn-primary btn-block btn-lg' style='background-color:#404040;'>Delete</button>
							</div>
						</div>
						</div>
					</div>
				</div>
			";
		}
