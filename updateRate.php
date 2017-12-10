<?php
	session_start();
?>

<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<!--  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>-->

</head>

  <!--<div class="container">
  <a href="adminNews.php"><- News</a>
  </div>-->
<?php
include'header.php';
?>
<div class="container">
<body>
	<div class="container">
    	<a href="adminNews.php"><button type="button" class="btn btn-info">Admin News</button></a>
    </div>
	<br><br>
<?php
include'database_connection.php';
//inserts accepted values




$query="select rate_date,gold,gold1,gold2,gold3,silver from rate order by rate_date desc,gold desc,gold1 desc,gold2 desc,gold3 desc,silver desc limit 2";
$result=$con->query($query);
//$result=mysqli_query($con,$query);
while($row=$result->fetch_assoc())
{
	$last_date=$row['rate_date'];
	$last_gold=$row['gold'];
	$last_goldo=$row['gold1'];
	$last_goldt=$row['gold2'];
	$last_goldn=$row['gold3'];
	$last_silver=$row['silver'];
}
//$con=mysqli_connect('localhost','root','','rates')or die(mysqli_connect_error());
$rate_flag=$_POST['flag'];

echo'<center>';
	echo'<table border="1" cellpadding="1" cellspacing="1">';
	echo"<tr>";
		echo"<td>";
		echo'<table border="1" width="100%" height="210" cellpadding="1" cellspacing="1">';
			echo"<tr>";
				echo"<th>";
				echo"Todays Rate: ";
				echo' Date- '.$rate_date=date('y/m/d');
				echo"</th>";
			echo"</tr>";
			echo"<tr>";
				echo"<td align=center>";
				echo '<br>18krt: '.$gold=$_POST['gold'];
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td align=center>";
				echo '<br>22krt: '.$goldo=$_POST['goldo'];
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td align=center>";
				echo '<br>23krt: '.$goldt=$_POST['goldt'];
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td align=center>";
				echo '<br>24krt: '.$goldn=$_POST['goldn'];
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td align=center>";
				echo '<br>Silver: '.$silver=$_POST['srate'];
				echo"</td>";
			echo"</tr>";
		echo"</table>";
		echo"</td>";

		echo'<td height="100">';
		echo'<table border="1" width="100%" height="210">';
      		echo"<tr>";
      			echo"<th>";
        		echo"Last Rate:";
        		echo' Date: '.$last_date;
        		echo"</th>";
      		echo"</tr>";
      		echo"<tr>";
        		echo"<td align=center>";
        		echo'Rate of 18krt: '.$last_gold;
				echo"</td>";
      		echo"</tr>";
      		echo"<tr>";
        		echo"<td align=center>";
        		echo'Rate of 22krt: '.$last_goldo;
				echo"</td>";
      		echo"</tr>";
      		echo"<tr>";
        		echo"<td align=center>";
        		echo'Rate of 23krt: '.$last_goldt;
				echo"</td>";
      		echo"</tr>";
      		echo"<tr>";
        		echo"<td align=center>";
        		echo'Rate of 24krt: '.$last_goldn;
				echo"</td>";
      		echo"</tr>";
      		echo"<tr>";
        		echo"<td align=center>";
        		echo'Rate of silver: '.$last_silver;
				echo"</td>";
      		echo"</tr>";
    	echo"</table>";
		echo"</td>";

		echo"<td>";
		echo'<table border="1" width="100%" height="210">';
	 			echo"<tr>";
				echo"<th>";
	            echo"Difference In Rate:";
				echo"</th>";
	        echo"</tr>";
	      	echo"<tr>";
	            echo"<td align=center>";
	            echo'Difference of 18krt gold  '.$dif_gold=$gold-$last_gold;
				echo"</td>";
	        echo"</tr>";
	        echo"<tr>";
	        	echo"<td align=center>";
	            echo'Difference of 22krt gold  '.$dif_goldo=$goldo-$last_goldo;
				echo"</td>";
	        echo"</tr>";
	        echo"<tr>";
	            echo"<td align=center>";
	            echo'Difference of 23krt gold  '.$dif_goldt=$goldt-$last_goldt;
				echo"</td>";
	        echo"</tr>";
	        echo"<tr>";
	            echo"<td align=center>";
	            echo'Difference of 24krt gold  '.$dif_goldn=$goldn-$last_goldn;
				echo"</td>";
	        echo"</tr>";
	        echo"<tr>";
	            echo"<td align=center>";
	            echo'Difference of silver  '.$dif_silver=$silver-$last_silver;
				echo"</td>";
	        echo"</tr>";
	        echo"</table>";
			echo"</td>";

			echo "<td>";
			echo'<table border="1" width="100%" height="210">';
				echo"<tr>";
					echo"<th>";
					echo"Increase OR Decrease In Rate:";
					echo"</th>";
		  		echo"</tr>";
				echo"<tr>";
					echo"<td align=center>";
					if($dif_gold<0)
					{
						echo'<br>18krt gold rates down by  '.$dif_gold;
					}
			 		else{
				 		echo'<br>18krt gold rates increases by  '.$dif_gold;
					}
					echo"</td>";
		  		echo"</tr>";
		  		echo"<tr>";
					echo"<td align=center>";
			 		if($dif_goldo<0)
					{
						echo'<br>22krt gold rates down by  '.$dif_goldo;
					}
			 		else{
				 		echo'<br>22krt gold rates increases by  '.$dif_goldo;
					}
					echo"</td>";
		  		echo"</tr>";
		  		echo"<tr>";
					echo"<td align=center>";
			 		if($dif_goldt<0)
					{
						echo'<br>23krt gold rates down by  '.$dif_goldt;
					}
			 		else{
				 		echo'<br>23krt gold rates increases by  '.$dif_goldt;
					}
					echo"</td>";
		  		echo"</tr>";
		  		echo"<tr>";
					echo"<td align=center>";
			 		if($dif_goldt<0)
			 		{
			  			echo'<br>24krt gold rates down by  '.$dif_goldn;
			 		}
			 		else{
			 			echo'<br>24krt gold rates increases by  '.$dif_goldn;
					}
					echo"</td>";
		  		echo"</tr>";
		  		echo"<tr>";
					echo"<td align=center>";
			 		if($dif_silver<0)
					{
						echo'<br>silver rates down by  '.$dif_silver;
					}
			 		else{
				 		echo'<br>silver rates increases by  '.$dif_silver;
					}
					echo"</td>";
		  		echo"</tr>";
		  	echo"</table>";
			echo"</td>";
		echo"</tr>";
	echo"</table>";
echo'</center>';



//accept Data




if($rate_flag==0)
{
$query1="insert into rate(rate_date,gold,gold1,gold2,gold3,silver) values('$rate_date',$gold,$goldo,$goldt,$goldn,$silver)";
$result1=$con->query($query1);
//$result1=mysqli_query($con,$query1);
}
else
{

	$query1="update rate set gold=$gold, gold1=$goldo, gold2=$goldt, gold3=$goldn, silver=$silver where rate_date=CURDATE()";
	$result1=$con->query($query1);
}

//fetch last rate



$query2="select rate_date,gold,gold1,gold2,gold3,silver from rate order by rate_date desc,gold desc,gold1 desc,gold2 desc,gold3 desc,silver desc limit 	15";
$result2=$con->query($query2);
//$result2=mysqli_query($con,$query2);

//select deata to display in table last 5 records

?>
<center>
 <br>Previous Rates:-<br>
 <table class="table table-hover">
	<thead>
	<tr><th>date</th>
	    <th>Gold Rate for 18Krt</th>
		<th>Gold Rate for 22Krt</th>
		<th>Gold Rate for 23Krt</th>
		<th>Gold Rate for 24Krt</th>
		<th>Silver Rate</th></tr>
       </thead>
 <tbody>


 <?php



 //while($result3=mysqli_fetch_array($result2))
 while($result3=$result2->fetch_assoc())
 {
echo'<tr>';
	 echo'<td>'.$result3['rate_date'].'</td>';
	 echo'<td>'.$result3['gold'].'</td>';
	 echo'<td>'.$result3['gold1'].'</td>';
	 echo'<td>'.$result3['gold2'].'</td>';
	 echo'<td>'.$result3['gold3'].'</td>';
	 echo'<td>'.$result3['silver'].'</td>';
echo'</tr>';

 }
 echo'<tbody></table>';
 //display previous record

//echo"Last Rate:<br>";

 //while($result4=mysqli_fetch_array($result))
 //while($result4=$result->fetch_assoc())
 //{
       //echo'<br>Date: '.$last_date;
	   //echo'<br>Rate of 18krt: '.$last_gold;
	   //echo'<br>Rate of 22krt: '.$last_goldo;
	   //echo'<br>Rate of 23krt: '.$last_goldt;
		 //echo'<br>Rate of 24krt: '.$last_goldn;
	   //echo'<br>Rate of silver: '.$last_silver;



//echo"<br><br><br>";
//echo'<br>Difference of 18krt gold  '.$dif_gold=$gold-$last_gold;
//echo'<br>Difference of 22krt gold  '.$dif_goldo=$goldo-$last_goldo;
//echo'<br>Difference of 23krt gold  '.$dif_goldt=$goldt-$last_goldt;
//echo'<br>Difference of 24krt gold  '.$dif_goldn=$goldn-$last_goldn;
//echo'<br>Difference of silver  '.$dif_silver=$silver-$last_silver;

//echo'<br><br>';
//if($dif_gold<0)
//{

//	echo'<br>18krt gold rates down by  '.$dif_gold;
//}
// else{
//	 echo'<br>18krt gold rates increases by  '.$dif_gold;
// }


 //if($dif_goldo<0)
//{

//	echo'<br>22krt gold rates down by  '.$dif_goldo;
//}
 //else{
	// echo'<br>22krt gold rates increases by  '.$dif_goldo;
 //}



// if($dif_goldt<0)
//{

//	echo'<br>23krt gold rates down by  '.$dif_goldt;
//}
 //else{
	// echo'<br>23krt gold rates increases by  '.$dif_goldt;
 //}
 //if($dif_goldt<0)
 //{

  //echo'<br>24krt gold rates down by  '.$dif_goldn;
 //}
 //else{
 	//echo'<br>24krt gold rates increases by  '.$dif_goldn;
 //}


 //if($dif_silver<0)
//{

//	echo'<br>silver rates down by  '.$dif_silver;
//}
 //else{
	// echo'<br>silver rates increases by  '.$dif_silver;
 //}





 //}

	$productCount=0;
	$productId_array=array();
	$productName_array=array();
	$productMaterial_array=array();
	$customerType_array=array();
	$productType_array=array();
	$productSubType_array=array();
	$purity_array=array();
	$weight_array=array();
	$rate_array=array();
	$makingCharges_array=array();
	$tax_array=array();
	$discount_array=array();
	$finalAmount_array=array();
	$mainImageUrl_array=array();
	$otherImage1_array=array();
	$otherImage2_array=array();
	$otherImage3_array=array();
	$otherImage4_array=array();
	$occasion_array=array();
	$remark1_array=array();
	$remark2_array=array();
	$remark3_array=array();

	$productQuery="select * from masterdata";
	$productResult=$con->query($productQuery);
	//$productResult=mysqli_query($con,$productQuery);
	//while($row=mysqli_fetch_array($productResult))
	while($row=$productResult->fetch_assoc())
	{
		$productId_array[$productCount]=$row['productId'];
		$productName_array[$productCount]=$row['productName'];
		$productMaterial_array[$productCount]=$row['productMaterial'];
		$customerType_array[$productCount]=$row['customerType'];
		$productType_array[$productCount]=$row['productType'];
		$productSubType_array[$productCount]=$row['productSubType'];
		$purity_array[$productCount]=$row['purity'];
		$weight_array[$productCount]=$row['weight'];
		$rate_array[$productCount]=$row['rate'];
		$makingCharges_array[$productCount]=$row['makingCharges'];
		$tax_array[$productCount]=$row['tax'];
		$discount_array[$productCount]=$row['discount'];
		$finalAmount_array[$productCount]=$row['finalAmount'];
		$mainImageUrl_array[$productCount]=$row['mainImageUrl'];
		$otherImage1_array[$productCount]=$row['otherImage1'];
		$otherImage2_array[$productCount]=$row['otherImage2'];
		$otherImage3_array[$productCount]=$row['otherImage3'];
		$otherImage4_array[$productCount]=$row['otherImage4'];
		$occasion_array[$productCount]=$row['occasion'];
		$remark1_array[$productCount]=$row['remark1'];
		$remark2_array[$productCount]=$row['remark2'];
		$remark3_array[$productCount]=$row['remark3'];
		$productCount++;
	}

	$currentQuery="select * from rate order by rate_date";
	$currentResult=$con->query($currentQuery);
	//$currentResult=mysqli_query($con,$currentQuery);
	//while($row=mysqli_fetch_array($currentResult))
	while($row=$currentResult->fetch_assoc())
	{
		$mygold18=$row['gold'];
		$mygold22=$row['gold1'];
		$mygold23=$row['gold2'];
		$mygold24=$row['gold3'];
		$mysilver=$row['silver'];
	}
	//$mygold18=$mygold18;
	//$mygold22=$mygold22;
	//$mygold23=$mygold23;
	//$mygold24=$mygold24;
	//$mysilver=$mysilver;

	$update18k="update masterdata set rate=$mygold18 where productMaterial='Gold' and purity=18";
	$result18k=$con->query($update18k);
	//$result18k=mysqli_query($con,$update18k);

	$update22k="update masterdata set rate=$mygold22 where productMaterial='Gold' and purity=22";
	$result22k=$con->query($update22k);
	//$result22k=mysqli_query($con,$update22k);

	$update23k="update masterdata set rate=$mygold23 where productMaterial='Gold' and purity=23";
	$result23k=$con->query($update23k);
	//$result23k=mysqli_query($con,$update23k);

	$update24k="update masterdata set rate=$mygold24 where productMaterial='Gold' and purity=24";
	$result24k=$con->query($update24k);
	//$result24k=mysqli_query($con,$update24k);

	$updateSilver="update masterdata set rate=$mysilver where productMaterial='Silver'";
	$resultSilver=$con->query($updateSilver);
	//$resultSilver=mysqli_query($con,$updateSilver);

	//$updateProduct="update masterdata set finalAmount=rate+makingCharges";
	//$updateResult=$con->query($updateProduct);
	//$updateResult=mysqli_query($con,$updateProduct);
	$productCount=0;
	$productQuery="select * from masterdata";
	$productResult=$con->query($productQuery);
	//$productResult=mysqli_query($con,$productQuery);
	//while($row=mysqli_fetch_array($productResult))
	while($row=$productResult->fetch_assoc())
	{
		$productId_array[$productCount]=$row['productId'];
		$productName_array[$productCount]=$row['productName'];
		$productMaterial_array[$productCount]=$row['productMaterial'];
		$customerType_array[$productCount]=$row['customerType'];
		$productType_array[$productCount]=$row['productType'];
		$productSubType_array[$productCount]=$row['productSubType'];
		$purity_array[$productCount]=$row['purity'];
		$weight_array[$productCount]=$row['weight'];
		$rate_array[$productCount]=$row['rate'];
		$makingCharges_array[$productCount]=$row['makingCharges'];
		$tax_array[$productCount]=$row['tax'];
		$discount_array[$productCount]=$row['discount'];
		$finalAmount_array[$productCount]=$row['finalAmount'];
		$mainImageUrl_array[$productCount]=$row['mainImageUrl'];
		$otherImage1_array[$productCount]=$row['otherImage1'];
		$otherImage2_array[$productCount]=$row['otherImage2'];
		$otherImage3_array[$productCount]=$row['otherImage3'];
		$otherImage4_array[$productCount]=$row['otherImage4'];
		$occasion_array[$productCount]=$row['occasion'];
		$remark1_array[$productCount]=$row['remark1'];
		$remark2_array[$productCount]=$row['remark2'];
		$remark3_array[$productCount]=$row['remark3'];
		$productCount++;
	}
	for($i=0;$i<$productCount;$i++)
	{
		$id=$productId_array[$i];
		$prate=$rate_array[$i];
		$pweight=$weight_array[$i];
		$pmcharges=$makingCharges_array[$i];
		$ptax=$tax_array[$i];
		$pdiscount=$discount_array[$i];

		$amount=($prate*$pweight);
		$amount=$amount+($pmcharges*$pweight);
		$amount=$amount+($amount * ($ptax/100));
		$amount=$amount-($amount * ($pdiscount/100));
		$famount=$amount;

		$updateProduct="update masterdata set finalAmount=$famount where productId=$id";
		$updateResult=$con->query($updateProduct);
	}

 ?>



</body>
</div>
</html>
