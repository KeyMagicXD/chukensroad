<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login");
}
require_once "config.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
if(!empty($_POST['upi'])){
 $upi=$_POST['upi'];
 $amount=$_POST['amount'];
 $mid=rand(1111111,99999999);
 $bill=rand(1111,9299999249);
  $data = array(
    
    "CLIENTID"=>"21122000169",
  "USERNAME"=>"AAJGB00169",
  "PASSWORD"=>"FGZ0VWUJ",
    "amount"=>$amount,
    "payerVa"=>$upi,
    "note"=>"Recharge Payment",
    "merchantTranId"=>$mid,
    "billNumber"=>$bill
  
  );
  
  $apiurl     = 'https://api.paytfy.com/api/HitUPIPay/RequestUPIColl';
  $data_array = json_encode( $data );
  $curl       = curl_init();
  curl_setopt( $curl, CURLOPT_URL, $apiurl );
  curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt( $curl, CURLOPT_POSTFIELDS, $data_array );
  curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ) );
  $result = curl_exec( $curl );
  $err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    $sql1 = "INSERT INTO recharge (username, recharge,status,upi,mid) VALUES ('".$_SESSION['username']."', '$amount','inprocess','$upi','$mid')";
                
$conn->query($sql1);
    $res=json_decode( $result, true ) ;
   $data=array_values( $res[0]);
   
   $status=$data[3];
   if($status=="Transaction initiated"){
    header("location: /rechargeverify?am=$amount&mid=$mid");
   }else{
        echo "<h1 style='font-size:60px'>ERROR PLEASE TRY AGAIN</h1>";
   }
}
	
 
  curl_close( $curl );
}else{
    echo "<h1 style='font-size:80px'>NO UPI FOUND</h1>";
}
}
?>
