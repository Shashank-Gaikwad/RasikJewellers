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
//$con=mysqli_connect("localhost","root","","rasik_jewellers")or die(mysqli_connect_error());

$title=$_POST['title'];
$descr=$_POST['dscr'];
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];


    if (($_FILES['file']['type']=='image/gif') || ($_FILES['file']['type']=='image/jpeg') ||($_FILES['file']['type']=='image/png') ||($_FILES['file']['type']=='image/jpg'))
	{
       //echo $img=$_FILES['file']['name'];

        $target_dir="uploads/images/";
        $target_file=$target_dir.basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
        //echo'<img src='$img' height=100 width=100/>';



	 $insert_query="insert into news(newsTitle,newsImage,newsText,newsStart,newsEnd)values('$title','$target_file','$descr','$sdate','$edate')";
	 //$insert_result=mysqli_query($con,$insert_query);
	 if(mysqli_query($con,$insert_query))
	 {
		echo "<script>window.location='adminNews.php'</script>";
	 }
	 else
	 {
		 echo mysqli_error($con);
	 }


	/*  $fetch_query="select * from news";
      $fetch_result=mysqli_query($con,$fetch_query);

 while($new_result=mysqli_fetch_array($fetch_result))
 {
	echo
	$result_img=$new_result['newsImage'];
	echo'<img src='.$target_file.' hieght=100 width=100/>';

 }*/



	}
	else
	{

		echo "file is not image";
	}

	$current_date=date('y/m/d');

if($current_date<$edate)
{
	//echo "star date=".$sdate;
	//echo "<br>end date=".$edate;
	//echo "<br>title=".$title;
    //echo "<br>desciption=".$descr;

}

else
{

	echo'<h2>News Ended</h2>';

}


?>
