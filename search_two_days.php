
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form action="search_two_days.php" method="post">
	<input type="text" name="firts_day" placeholder="firts_day">
	<input type="text" name="second_day" placeholder="second_day">
	<input type="text" name="Kwatt" placeholder="Kwatt">
	<input type="submit" value="submit" name="submit">

</form>

<?php
	$cost_kwatt= $_POST['Kwatt'];
	

	//when the botton is push then exec the rest.
	if (isset($_POST['submit'])) 
{
		
	
	$con = mysql_connect("localhost","root","erevos13" );

	if(! $con)
	{
		die ("Connection_error:". mysql_error());
	}
		mysql_select_db('watt',$con);

	 $sql = "SELECT * FROM consumption WHERE (date_time BETWEEN '$_POST[firts_day]' AND '$_POST[second_day]') ";
	  $mydata = mysql_query($sql,$con);
	  
	  while($record = mysql_fetch_array($mydata))
            {
            	
               echo 'Data record of cunsamption: '.$record['date_time'].' / '.'volt: '.$record['watt'].'<br/><br/>';
               $sum  +=$record['watt'];
               
               echo 'Cost of Kwatt is: '.$cost_kwatt.' and the sum is:'.$sum.' the result is:'.$sum*$cost_kwatt.'<br/><br/>';
                
            }
            mysql_close($connect);

            
}
?>



</form>
</body>
</html>