<html>
    <body>
    <?php





	$conn = mysql_connect("localhost","orfeas","erevos13" );

	if(! $conn)
	{
		die ("Connection_error:". mysql_error());
	}
		mysql_select_db('testdata',$conn);

		date_default_timezone_set('Europe/Athens') ;
		for ($i=0; $i < 10; $i++)
	 { 
	 		
			$volt=(rand(10, 200)."<br/>");
			echo $volt;
		



        $time =date('Y/m/d H:i:s', time());    //date('H:i:s', time());  gia na vlwpw kai mera kai wra
        
		echo $time. "<br/>";
		// gia na valw xrono prepei na valw varchar stin vasi dedomenon.
		$sql = "INSERT INTO orfeas (volt,cronos) VALUES ('$volt ', '$time')";
		

		if (!mysql_query($sql,$conn))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "1 record added"."<br/>";
	}	
		mysql_close($conn)

        ?>
    </body>
</html>
