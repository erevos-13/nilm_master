<html>
    <body>
    <?php


	
	




	include 'connect.php';
	
	
	
	$conn = mysql_connect("localhost","root","erevos13" );
	
	if(! $conn)
	{
		die ("Connection_error:". mysql_error());
	}
		mysql_select_db('watt',$conn);
		

	# code...
		$start = microtime(true);
		for ($i=0; $i <59 ; $i++) 
	{
		
		date_default_timezone_set('Europe/Athens') ;
		
        $date_time = date('Y/m/d H:i:s', time());   //mporw na valw kai date('H:i:s', time());  gia na vlwpw kai mera kai wra
		echo $date_time."<br/>";
		$watt = round($read);
		echo $watt;
		 
 
		// gia na valw xrono prepei na valw varchar stin vasi dedomenon.
		$sql = "INSERT INTO consumption (watt,date_time ) VALUES ('$watt','$date_time' )";
        


		if (!mysql_query($sql,$conn))
		  {
		  die('Error: ' . mysql_error());
		  }
		  time_sleep_until($start + $i + 1);
	}

		echo "1 record added";
		 
		mysql_close($conn)

				
	

        ?>   
    </body>
</html>
