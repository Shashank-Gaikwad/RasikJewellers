
<html>
<head>
  <title>Rasik Jewellers</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<!--<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>-->
</head>

<body>
<?php
include'header.php';
include'database_connection.php';
//$con=mysqli_connect('localhost','root','','rates')or die(mysqli_connect_error());
echo"<center>";
echo"<div class='row'>";
echo"<div class='col-md-12'>";
echo"<div class='panel panel-default'>";
echo"<div class='panel-heading'><center>All Rates:</center></div>";
echo"<div class='panel-body'><center>";
//echo 'date: '.$date=date("y/m/d");
$currentQuery="select * from rate order by rate_date";
$currentResult=$con->query($currentQuery);
//$currentResult=mysqli_query($con,$currentQuery);
//while($row=mysqli_fetch_array($currentResult))
while($row=$currentResult->fetch_assoc())
{
	$mygold18=($row['gold']*10);
	$mygold22=($row['gold1']*10);
  $mygold23=($row['gold2']*10);
	$mygold24=($row['gold3']*10);
	$mysilver=($row['silver']*10);
}

echo"<div class='col-md-3'>";
echo"<div class='panel panel-default'>";
echo"<div class='panel-heading'><center>Todays Rate:</center></div>";
echo"<div class='panel-body'><center>";
//echo 'date: '.$date=date("y/m/d");
echo '<br>For 18krt: '.$gold=$mygold18;
echo '<br>For 22krt: '.$goldo=$mygold22;
echo '<br>For 23krt: '.$goldt=$mygold23;
echo '<br>For 24krt: '.$goldn=$mygold24;
echo '<br>For silver: '.$silver=$mysilver;
echo"</center></div>";
echo"</div>";
echo"</div>";

//echo'</center>';

//accept Data

$query="select rate_date,gold,gold1,gold2,gold3,silver from rate order by rate_date desc,gold desc,gold1 desc,gold2 desc,silver desc limit 2";
$result=$con->query($query);
while($result4=$result->fetch_assoc())
{
	$last_gold=($result4['gold']*10);
	$last_goldo=($result4['gold1']*10);
	$last_goldt=($result4['gold2']*10);
  $last_goldn=($result4['gold3']*10);
	$last_silver=($result4['silver']*10);
}
//$result=mysqli_query($con,$query);

//fetch last rate

$query2="select rate_date,gold,gold1,gold2,gold3,silver from rate order by rate_date desc,gold desc,gold1 desc,gold2 desc,gold3 desc,silver desc limit 5";
$result2=$con->query($query2);
//$result2=mysqli_query($con,$query2);

//select deata to display in table last 5 records

//inserts accepted values

 //while($result4=mysqli_fetch_array($result))


     echo"<div class='col-md-3'>";
     echo"<div class='panel panel-default'>";
     echo"<div class='panel-heading'><center>Last Rate:</center></div>";
     echo"<div class='panel-body'><center>";

       //echo'<br>Date: '.$result4['date'];
	   echo'<br>Rate of 18krt: '.$last_gold;
	   echo'<br>Rate of 22krt: '.$last_goldo;
	   echo'<br>Rate of 23krt: '.$last_goldt;
     echo'<br>Rate of 24krt: '.$last_goldn;
	   echo'<br>Rate of silver: '.$last_silver;

       echo"</center></div>";
       echo"</div>";
       echo"</div>";

       echo"<div class='col-md-3'>";
       echo"<div class='panel panel-default'>";
       echo"<div class='panel-heading'><center>Diiference between Rate:</center></div>";
       echo"<div class='panel-body'><center>";

       echo'<br>Difference of 18krt gold  '.$dif_gold=$gold-$last_gold;
       echo'<br>Difference of 22krt gold  '.$dif_goldo=$goldo-$last_goldo;
        echo'<br>Difference of 23krt gold  '.$dif_goldt=$goldt-$last_goldt;
       echo'<br>Difference of 24krt gold  '.$dif_goldn=$goldn-$last_goldn;
       echo'<br>Difference of silver  '.$dif_silver=$silver-$last_silver;

       echo"</center></div>";
       echo"</div>";
       echo"</div>";
$dif_gold=$gold-$last_gold;
$dif_goldo=$goldo-$last_goldo;
$dif_goldt=$goldt-$last_goldt;
$dif_goldn=$goldn-$last_goldn;
$dif_silver=$silver-$last_silver;
       echo"<div class='col-md-3'>";
       echo "<div class='panel panel-default'>";
       echo "<div class='panel-heading'>Change in Rates</div>";
       echo "<panel-body><center><br>";
       if($dif_gold<0)
       {

	          echo'<br>18krt Gold rates down by  '.$dif_gold;
          }
          else{
	             echo'<br>18krt Gold rates increases by  '.$dif_gold;
             }


             if($dif_goldo<0)
             {

	                echo'<br>22krt Gold rates down by  '.$dif_goldo;
             }
            else
            {
	            echo'<br>22krt Gold rates increases by  '.$dif_goldo;
            }

           if($dif_goldt<0)
           {
	           echo'<br>23krt Gold rates down by  '.$dif_goldt;
           }
          else
          {
	         echo'<br>23krt Gold rates increases by  '.$dif_goldt;
          }

          if($dif_goldt<0)
          {

               echo'<br>24krt Gold rates down by  '.$dif_goldn;
         }
         else
         {
            echo'<br>24krt gold rates increases by  '.$dif_goldn;
        }


        if($dif_silver<0)
        {
	        echo'<br>Silver rates down by  '.$dif_silver;
        }
        else
        {
	       echo'<br>Silver rates increases by  '.$dif_silver;
        }


                           echo"</center></div>
                       </div>
                   </div>";

                           ?>

 <br><h3>Previous Rates:-</h3><br>
 <table class="table table-hover">
	<thead>
	<tr><th>Date</th>
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
	 echo'<td>'.($result3['rate_date']*10).'</td>';
	 echo'<td>'.($result3['gold']*10).'</td>';
	 echo'<td>'.($result3['gold1']*10).'</td>';
	 echo'<td>'.($result3['gold2']*10).'</td>';
   echo'<td>'.($result3['gold3']*10).'</td>';
	 echo'<td>'.($result3['silver']*10).'</td>';
echo'</tr>';

 }
 echo'</tbody></table>';
 //display previous record


echo"</div>";
echo"</div>";
echo"</div>";
echo"</div>";
echo"</center>";
 ?>
	  </body>
	 </html>
