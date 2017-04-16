<html>
<head>
	<style>
		#view{
			text-align: center;
		}
	</style>
		<title>Smart Meter</title>
	<link rel="stylesheet" type="text/css" href="smart_meter.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<header >Smart Meter Real Time</header>
<body>




<div id=view>
<form style="padding-top: 20px;" action="view.php" method="post">
<input type="submit" name="submit" value="View Watt">
</form>
<textarea rows="1" cols="15">
<?php

include 'connect.php';
if(isset($_POST['submit'])){echo "Watt:"." ". $read;}?>
</textarea>

<div style="padding-top: 20px; padding-bottom: 20px;">
<a class="w3-btn w3-black w3-border w3-round-large" href="index.html">Return</a>
</div>


</div>

</body>
</html>