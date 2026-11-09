<?php

require_once "config.php";

$username = $newpassword = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['newpassword'])))
    {
        $err = "Please enter username + password";
        echo($err);
    }
    else{
        $username = trim($_POST['username']);
       
        $newpassword = trim($_POST['newpassword']);
    }
require_once "config.php";
$un=trim($_POST["username"]);
$otp=trim($_POST["otp"]);
$query0 =  "SELECT  username FROM verify  WHERE otp='$otp' ORDER BY id DESC";
$result3 =$conn->query($query0);
$row3 = mysqli_fetch_assoc($result3);
$verun=$row3['username'];
if($un==$verun){

if(empty($err))
{
   
$sql = "UPDATE users SET password='$newpassword' WHERE username='$username'";

$conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo '<h1  style="text-align: center;">password changed sucessfully</h1>';
} else {
    echo '<h1  style="text-align: center;" >Verification Code Error</h1>';
}
   


}}
}else{
    echo"otp Error";
}

?>