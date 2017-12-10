<?php
	//$a=$_POST['kt1'];
	//$b=$_POST['kt2'];
	//$c=$_POST['kt3'];
	//$data = $_POST['product'];
	//echo"a=$a<br>b=$b<br>c=$c<br>";
	//$con=mysqli_connect('localhost','root','','shashank') or die(mysqli_connect_error());
	//$query="insert into student values(2,'xyz','$data')";

	$a=$_REQUEST['q'];
	echo"a=$a";
	/*if(isset($_REQUEST['kt3']))
		echo"you selected 18kt";
	if(isset($_REQUEST['kt2']))
		echo"you selected 22kt";
	if(isset($_REQUEST['kt1']))
		echo"you selected 24kt";*/

	$x=$_REQUEST['kt1'];
	$y=$_REQUEST['kt2'];
	$z=$_REQUEST['kt3'];

	if (empty($_POST))
        echo"not selected";

	echo"x=$x<br>y=$y<br>z=$z<br>";

	if(isset($_POST['kt3']))
		echo"you selected 18kt";
	if(isset($_POST['kt2']))
		echo"you selected 22kt";
	if(isset($_POST['kt1']))
		echo"you selected 24kt";
	//echo"<script>alert('ajax function is working')</script>";
?>
