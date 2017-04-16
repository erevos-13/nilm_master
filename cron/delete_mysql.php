  <!DOCTYPE html>
  <html>
  
  <body>
  <?php
	
	
	
	
	$conn = mysql_connect("localhost","root","erevos13" );
	
	if(! $conn)
	{
		die ("Connection_error:". mysql_error());
	}
		mysql_select_db('watt',$conn);
			

		 
		
		$sql = "DELETE FROM consumption WHERE  watt = 0  ";
        
		if (!mysql_query($sql,$conn))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "1 record delete";
		 
		mysql_close($conn)
        ?>   
  </body>
  </html>
 