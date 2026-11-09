<?php 

$json_string= file_get_contents('php://input');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'selimdem_selimxpro');
define('DB_PASSWORD', 'selimdem_selimxpro');
define('DB_NAME', 'selimdem_selimxpro');
// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//payment gateway callback page

$res=json_decode($json_string,true);
  if ($res['status']=="success") {
  $dec =openssl_decrypt($res['data'], 'AES-128-ECB', "NmduZnhwOWw3aA==");
  $resp=json_decode($dec,true);
    $cust_mobile=$resp['cust_mobile'];
$amt=$resp['amt'];
$utr=$resp['utr'];
$trxnote=$resp['trxnote'];
$order_date=$resp['order_date'];
$orderid=$resp['orderid'];

////////balance add logic goes here


$upi="amin@king.upi";
$rand=$orderid;

if ($amt>=1) {
$sql1 = "INSERT INTO recharge (username, recharge,status,upi,utr,rand) VALUES ('$cust_mobile', '$amt','Successfull','$upi','$utr','$rand')";
                
$conn->query($sql1);

mysqli_query($conn,"update users set balance=balance+'$amt' where username='$cust_mobile'");
mysqli_query($conn,"update recharge set status='Successfull',utr='$utr',upi='$upi' where username='$cust_mobile'");
}





////////balance add logic goes here
  }

?>



