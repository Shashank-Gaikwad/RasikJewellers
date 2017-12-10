<?php
	session_start();
?>

<?php
include'database_connection.php';
//$con=mysqli_connect('localhost','root','','rasik_jewellers') or die(mysqli_connect_error());
if(isset($_POST['bttLogin']))
{
	$username=$_POST['username'];
	$p=$_POST['password'];
	$password=md5($p);
/*
         if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
         echo "Please select a Captcha <a href='http://shreesai.info'>click here</a>";
          exit;
        }
        $secretKey = "6LfI-BwTAAAAACoG9NEEvPs9BqmzDGsxBg4PHtf1";
        $ip = $_SERVER['shreesai.info'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are spammer !';
        } else {*/


	$query="select * from login where username='$username' and password='$password'";
	$result=$con->query($query);
	//$result=mysqli_query($con,'select * from login where username="'.$username.'" and password="'.$password.'"');
	//if(mysqli_num_rows($result)==1)
	if($result->num_rows==1)
	{
		$_SESSION['username']=$_POST['username'];
	header('Location: adminProduct.php');
	}
	else
	{
		echo "Invalid username or password. Try again <a href='index.php'>click here</a>";

	}
    // }
}

if(isset($_GET['action']))
{
//	echo "testing";
	session_unset();
	session_destroy();
	header('Location: index.php');
}

?>
