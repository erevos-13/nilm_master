<?php
/*edw se eauto einai ig ana mporesw na vlepw tis times se ena pinaka kai na prostheto gia ena mina */


if(isset($_POST['submit']))
{
    
    $cost_kwatt= $_POST['cost_Kwatt'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `consumption` WHERE (date_time BETWEEN '$_POST[firts_day]' AND '$_POST[second_day]')";             //CONCAT(`volt`, `date_time`)LIKE '%".$search."%'";
    $search_result = filterTable($query);
    
    
}


// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "erevos13", "watt");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="smart_meter.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <title>Data Retrive</title>
    <header>
        Collect Data
    </header>
    <style>
      table,tr,th,td{
        border: 2px solid white;
      }  
body{
    background-color: #404040;
    color: white;
}
.center {
    margin: auto;
    width: 50%;
    padding: 1px;
    text-align: center;
    background-color: #525161;
}

    </style>
</head>
<body>
<br/>
<form action="search_add.php" method="post">
    <center style="background-color: #404040">Insert the Value of KWatt: <input type="text" name="cost_Kwatt" placeholder="Kwatt Cost"><br/><br/>
    
    <input type="text" name="firts_day" placeholder="first day YYYY/MM/DD">
    <input type="text" name="second_day" placeholder="second day YYYY/MM/DD"><br/><br/>
    <input type="submit" class="w3-btn w3-black w3-border w3-round-large" name="submit">
    <a  href="index.html" class="w3-btn w3-black w3-border w3-round-large">return</a><br/></center>



<! Edw kalo ksana tin mysql gia na kanw ton polaplasismo olon ton watt me to kostos ton Kwatt >
    <center><br/><?php  
        if(isset($_POST['submit']))
{
        $con = mysql_connect('localhost', 'root', 'erevos13');
        mysql_select_db("watt", $con);
        $sql = "SELECT SUM(watt) AS value_watt FROM cunsamption ";
        $mydata = mysql_query($sql,$con);
        $rec = mysql_fetch_assoc($mydata);

        $sum_watt = $cost_kwatt * $rec['value_watt'];
        $foat_sum_watt = number_format($sum_watt,2);
          echo "Total cost of Kwatt:".' '. $foat_sum_watt;            
            
}?></center>
    <br/><br/>
    
    <table class="center">
        <tr>
            <th>watt</th>
            <th>Data and Time</th>
            <th>sum of watt</th>
            <th>Kwatt cost</th>
        </tr>
        <!edw vazoume ta apotelesmata apo tin mysql>
<?php
    //in here a set the value of the var sum.
    //And then i set the while loop for me to retive tha data and saw. 
 $sum=0; 
    while ($row = mysqli_fetch_array($search_result)):?>
    <tr>
        <td><?php echo $row['watt']; ?></td>
        <td><?php echo $row['date_time']; ?></td>
        <td><?php $sum  +=$row['watt']; echo $sum;?></td>
        <td><?php echo $sum*$cost_kwatt ;?></td> 
    

    </tr>
    <?php endwhile;?>



    </table>

</form>




</body>
</html>