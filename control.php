<html>

<head>
    <link rel="stylesheet" type="text/css" href="smart_meter.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <header> Control the relay</header>
</head>
<body>

<?php
  echo "<div align= 'center''control_led'</div>";
 $port = fopen("/dev/ttyUSB0", "w+");
  sleep(2);
  ?>
  
  
<form action="control.php" method="post"><br/><br/>
<input class="w3-btn w3-black w3-border w3-round-large" type="submit" name="turn" value="on">
</form>

<form action="control.php" method="post">
<input class="w3-btn w3-black w3-border w3-round-large" type="submit" name="turn" value="off">
</form><br/><br/>
<a class="w3-btn w3-black w3-border w3-round-large"  href ="index.html">return</a><br/><br/><br/><br/>


<?php 
  
  if($_POST['turn']== "on")
  {
    echo "<br/>turned on<br/>";
    fwrite($port, "n");
  }
  if($_POST['turn']== "off")
  {
    echo "<br/>turned off<br/>";
    fwrite($port, "f");
  }
  
      fclose($port);
  



?>
</body>
</html>