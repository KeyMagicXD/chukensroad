<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";
  $username=$_GET['un'];
  $amount=$_GET['am'];
  $utr=$_GET['utr'];
  $first=0;


$opt="SELECT SUM(recharge) as total FROM `recharge` WHERE username='$username' AND status='successfull'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);


$win="select refcode FROM `users` WHERE  username='$username' ";
$result3 =$conn->query($win);
$row3 = mysqli_fetch_assoc($result3);
$refcode=$row3['refcode'];


//reward functionality

$query =  "SELECT recharge FROM recharge WHERE username='$username' AND status='successfull'";
$result3 =$conn->query($query);
$first_recharge = mysqli_num_rows($result3);

if ($first_recharge > 0) {

}else{

if($amount==500){
          $reward_r=150;
        
    }elseif($amount==1000){
          $reward_r=200;
        
    }elseif($amount==3000){
          $reward_r=400;
        
    }elseif($amount==4000){
          $reward_r=500;
        
    }elseif($amount==5000){
          $reward_r=600;
        
    }elseif($amount==10000){
          $reward_r=1100;
        
    }elseif($amount==50000){
          $reward_r=5000;
        
    }elseif($amount==100000){
          $reward_r=10000;
        
    }else{
          $reward_r=(20/100)*$amount;
        
    }

$adb1="UPDATE users SET balance= balance +$reward_r WHERE usercode='$refcode'";
$conn->query($adb1);

}

//////reward functionality end



//bonus functionality
if($sum['total']=="" or $sum['total']=="0"){

      $bonus=0;
   
      $first=0;

$adb="UPDATE users SET balance= balance +$bonus WHERE usercode='$refcode'";
$conn->query($adb);


$addbrec="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$username','$refcode','$bonus','1')";
$conn->query($addbrec);
    
}



$addwin00="UPDATE recharge SET status='successfull' WHERE username='$username' AND recharge='$amount' AND utr='$utr'";
$conn->query($addwin00);

if($conn->query($addwin00)){
    
    $addwin0="UPDATE users SET balance= balance +($amount)+$first WHERE username='$username'";
   
    if($conn->query($addwin0)){
        header("location: rechargeRequests");
    }
}else{
    echo"FAILED";
}
?>