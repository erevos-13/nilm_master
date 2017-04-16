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
define('DB_NAME', 'devices');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}


//query to get data from the table
$query = sprintf("SELECT * FROM consumption  WHERE date_time BETWEEN (NOW() - INTERVAL 7 DAY) AND
	NOW()");

	
//execute query
$result = $mysqli->query($query);


