<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: me#");
    exit;
}

require_once "config.php";
$un=trim($_POST["username"]);
$otp=trim($_POST["otp"]);
$query0 =  "SELECT  username FROM verify  WHERE otp='$otp'";
$result3 =$conn->query($query0);
$row3 = mysqli_fetch_assoc($result3);
$verun=$row3['username'];
if($un==$verun){
    

// Define variables and initialize with empty values
$username = $password =  "";
$username_err = $password_err =  "";


// Processing form data when form is submitted

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


if(empty($err))
{
   
$sql = "UPDATE users SET password='$newpassword' WHERE username='$username'";


if ($conn->query($sql)) {
      echo "<script>
     document.addEventListener('DOMContentLoaded', function(event) { 
     
                 document.getElementById('snackbar').innerHTML='Password change success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
});
                
     
                </script>";
                    header("location: login#");
} else {
     echo "<script>
     document.addEventListener('DOMContentLoaded', function(event) { 
     
                 document.getElementById('snackbar').innerHTML='Somthing went wrong try again';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
});
                
     
                </script>";
}
   


}
}

}else{
     echo "<script>
     document.addEventListener('DOMContentLoaded', function(event) { 
     
                 document.getElementById('snackbar').innerHTML='Incorrect OTP';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
});
                
     
                </script>";
}

?>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
  <meta http-equiv="expires" content="1">
  <meta name="google" value="notranslate">
  <meta name="msapplication-TileColor" content="#fff">
  <meta name="theme-color" content="#fff">
  <meta name="msapplication-navbutton-color" content="#fff">
  <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
  <meta name="description" content="Make money with us.">
  <link rel="shortcut icon" href="/icons/fevicon.png" type="image/x-icon">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/light.css">
  <link rel="stylesheet" href="/css/dropzone.css">
  <title>OWNER BY SANJU</title>
  <style>
      .van-toast {
    position: fixed;
    top: 50%;
    left: 50%;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    box-sizing: content-box;
    width: 88px;
    max-width: 70%;
    min-height: 88px;
    padding: 16px;
    color: #fff;
    font-size: 14px;
    line-height: 20px;
    white-space: pre-wrap;
    text-align: center;
    word-wrap: break-word;
    background-color: rgba(50, 50, 51, .88);
    border-radius: 8px;
    -webkit-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, -50%, 0);
}
.van-toast--html, .van-toast--text {
    width: -webkit-fit-content;
    width: fit-content;
    min-width: 96px;
    min-height: 0;
    padding: 8px 12px;
}
  </style>
</head>

<body>
  <section class="container-fluid">
    <div class="row mcas">
      <div class="col-md-6 col-lg-4 main lr">
        <div class="row nav-top">
          <div class="col-1 xtl"><span class="nav-back wt ghlg6j" style="padding-top: 45px;"></span></div>
          <div class="col-10 xtl tfw-6 tf-18 tfs-w" onclick="window.location.href='/login';" id="navt">Forgot Password</div>
        </div>
        <div class="row">
          <div class="col-12 pt-2 pb-4 mb-2">
            <img src="/icon.jepg" height="120">
            <div class="tfw-7 tf-24" style="color: #0000cd;">TcsClubs Mall</div>
          </div>
          <div class="col-12 vrgj89b">
            <div class="row">
              <div class="col-12">
                <div class="col-12">
                    <form action="" id="createuser" method="POST" >
                  <div class="row ma-10">
                       
                    <div class="col-12 inpbcx mt-2 mb-2"><span class="xicon tfw-6 tf-18">+91</span><input id="num" type="tel"
                        class="xbox nmob" name="username" maxlength="10" placeholder="Mobile Number" autocomplete="off"></div>
                    <div class="col-12 inpbcx mt-2 mb-2"><span class="xicon lock"></span><input id="pass" name="newpassword" type="text"
                        class="xbox pin npas" maxlength="21" placeholder="New Password (min 6 char.)" autocomplete="off">
                    </div>
                    <div class="col-8 inpbcx mt-2 mb-2"><input type="tel" name="otp" id="otp" class="xbox nop" maxlength="6"
                        placeholder="Enter OTP" autocomplete="off"></div>
                    <div class="col-4 pa-0 mt-2 mb-2">
                      <div onclick="sendcode()" id="otpbtn" class="GROTP">Get OTP</div>
                    </div>
              
                    <div class="col-12 pa-0 mt-2 mb-2">
                      <div id="btn" onclick="sub()" class="btn-main newuser">Change Password</div>
                    </div>
                      </form>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div id="snackbar" class="van-toast van-toast--middle van-toast--text" style="z-index: 2009;display:none "><div class="van-toast__text">OTP SENT</div></div>
        <div class="row dta_ref"></div>
      </div>
    </div>
  </section>
   <script>
     setInterval(function () { 
  if(document.getElementById("pass").value.length>5 && document.getElementById("num").value.length==10 && document.getElementById("otp").value.length>3){
      document.getElementById("btn").className="btn-main sign act";
  }else{
      document.getElementById("btn").className="btn-main sign";
       
  }
     }, 300);
     
       let timerOn = true;

function timer(remaining) {
  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('otpbtn').innerHTML = m + ':' + s;
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
  }
  
  // Do timeout stuff here
  document.getElementById('otpbtn').innerHTML="RESEND"
   document.getElementById("otpbtn").onclick = sendcode();
}


      
     function sendcode(){
         var number=document.getElementById("num").value;
         if(number!=null && number.length==10){
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.open("GET", "otp?num="+number, true);
             xmlhttp.send();
             timer(60);
             document.getElementById('otpbtn').removeAttribute("onclick");
             document.getElementById("snackbar").innerHTML="OTP SENT ";
               document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
     
  
         }else{
                 document.getElementById("snackbar").innerHTML="Mobile Number is required";
          document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
     
  
         }
         
     }
     
   
      
  </script>
  <script type='text/JavaScript'>



function sub() {
      document.getElementById('createuser').submit();      
}

</script>
 

</body>

</html>