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
  

$sql3 = "SELECT * FROM users WHERE balance>='1000'";
$result3 =$conn->query($sql3);

//display the retrieved result on the webpage  
while ($row3 = mysqli_fetch_array($result3)) {  
$user=$row3['username'];
$balance=$row3['balance'];
$intrest=(0.80/100*$balance);
    $addwin0="UPDATE users SET balance= balance +($intrest) WHERE username=$user And balance>='1000'";
    $conn->query($addwin0);
$rec="INSERT INTO intrest (username,amount) VALUES ($user,$intrest)";
$conn->query($rec);
    
}


?>