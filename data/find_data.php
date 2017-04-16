

<?php
//display error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//set the date format
date_default_timezone_set('Europe/Athens');
//setting header to json
//header('Content-Type: application/json');

//include function
include('function/rec.php');



//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'erevos13');
define('DB_NAME', 'watt');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}


//query to get data from the table for the last 10 min
$query = sprintf("SELECT * FROM consumption  WHERE date_time BETWEEN (NOW() - INTERVAL 10 MINUTE) AND
	NOW()");

	
//execute query
$result = $mysqli->query($query);
	//manw ena pinaka gia na valw ta dedomena mesa
	$data = array(); 
	$time_is_on = array();

// loop to store the values
while($row = $result -> fetch_array(MYSQLI_ASSOC)){	
	if ($row['watt'] >= 0) {
		//vazw to dedomena mesa se ena array
		
		$consum  =  $row['watt'];
		$time = $row['date_time'];
	}
	if ($row['watt'] < 70) {
		$time_is_on = $row['date_time'] ;
	}


	
}

//arry gia to pote ksekinise kai pote stamatise
		
		$con_time = new timeIsOn;
		$con_time->date_time($consum);
		
	//edw prospathw na vrw tis time an teriazoun me autes apo tin vasei dedomenon 	
			/*
		$con_watt = new consumption;		
		$con_watt->lamp($consum, $time);
		$con_watt->heater($consum, $time);
		$con_watt->all_devices($consum, $time);
		*/

		



	

	


	


	
	



$result -> free();
//free memory associated with result


//close connection
$mysqli->close();

//now print the data
//print json_encode($data);
?>

