<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'selimdem_selimxpro');
define('DB_PASSWORD', 'selimdem_selimxpro');
define('DB_NAME', 'selimdem_selimxpro');
// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}


$year = date("Y"); 
$month = date("m"); 
$day = date("d"); 
$lastperiodid=$year.$month.$day.sprintf("%03d",000);
$last=$lastperiodid;
echo $last;
$lstperiodid=$year.$month.$day.sprintf("%04d",0000);
$last2=$lstperiodid;
$sql1="UPDATE period SET period=$last WHERE id=1";
$conn->query($sql1);
echo "<br>$last2";
$sql2="UPDATE beconeperiod SET period=$last2 WHERE id=1";
$conn->query($sql2);


?>