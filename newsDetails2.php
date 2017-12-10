<?php
	session_start();
?>

<html>
  <head>
    <title>Rasik Jewellers</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  </head>
  <body>
    <?php
      include'header.php';
      include'database_connection.php';
    	if($_GET)
    		{
    			if($_GET['news'])
    			{
    				$id=$_GET['news'];
    			}
    		}
      $query="select * from news where newsId=$id";
      $result=mysqli_query($con,$query);
      while($row=mysqli_fetch_array($result))
      {
        $newsId=$row['newsId'];
        $newsTitle=$row['newsTitle'];
        $newsImage=$row['newsImage'];
        $newsText=$row['newsText'];
        $newsStart=$row['newsStart'];
        $newsEnd=$row['newsEnd'];
      }
    ?>
    <br>
    <h2 class="text-center"><?php echo $newsTitle; ?></h2>
    <br>
    <center><img class="thumbnail" src="<?php echo $newsImage; ?>"></center>
    <br>
    <h4 class="text-center"><?php echo $newsText; ?></h4>
  </body>
</html>
<?php include'footer.php'; ?>
