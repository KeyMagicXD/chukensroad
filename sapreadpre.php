<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";
$opt="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='red'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
$red=round($sum['total'],2);

$optg="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='green'";
$optresg=$conn->query($optg);
$sumg= mysqli_fetch_assoc($optresg);
$green=round($sumg['total'],2);

$optv="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='violet'";
$optresv=$conn->query($optv);
$sumv= mysqli_fetch_assoc($optresv);
$violet=round($sumv['total'],2);

$opt0="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='0'";
$optres0=$conn->query($opt0);
$sum0= mysqli_fetch_assoc($optres0);
$zero=round($sum0['total'],2);

$opt1="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='1'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
$one=round($sum1['total'],2);

$opt2="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='2'";
$optres2=$conn->query($opt2);
$sum2= mysqli_fetch_assoc($optres2);
$two=round($sum2['total'],2);

$opt3="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='3'";
$optres3=$conn->query($opt3);
$sum3= mysqli_fetch_assoc($optres3);
$three=round($sum3['total'],2);

$opt4="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='4'";
$optres4=$conn->query($opt4);
$sum4= mysqli_fetch_assoc($optres4);
$four=round($sum4['total'],2);

$opt5="SELECT SUM(amount) as total FROM `betting` WHERE status='pending' AND ans='5'";
$optres5=$conn->query($opt5);
$sum5= mysqli_fetch_assoc($optres5);
$five=round($sum5['total'],2);

$opt6="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='6'";
$optres6=$conn->query($opt6);
$sum6= mysqli_fetch_assoc($optres6);
$six=round($sum6['total'],2);

$opt7="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='7'";
$optres7=$conn->query($opt7);
$sum7= mysqli_fetch_assoc($optres7);
$seven=round($sum7['total'],2);

$opt8="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='8'";
$optres8=$conn->query($opt8);
$sum8= mysqli_fetch_assoc($optres8);
$eight=round($sum8['total'],2);

$opt9="SELECT SUM(amount) as total FROM `beconebetting` WHERE status='pending' AND ans='9'";
$optres9=$conn->query($opt9);
$sum9= mysqli_fetch_assoc($optres9);
$nine=round($sum9['total'],2);

?>
<!DOCTYPE html>
<html>
<head><script>
    function time(){
        var countDownDate = Date.parse(new Date) / 1e3;
  var now = new Date().getTime();
  var distance = 60 - countDownDate % 60;
  //alert(distance);
  var i = distance / 60,
   n = distance % 60,
   o = n / 10,
   s = n % 10;
  var minutes = Math.floor(i);
  var seconds = ('0'+Math.floor(n)).slice(-2);
  var sec1= (seconds%100-seconds%10)/10;
var sec2=seconds%10;
  document.getElementById("demo").innerHTML = "<span class='time-sub'>0</span><span class='time-sub'>"+Math.floor(minutes)+"</span><span class='time-sub-dot'>:</span><span class='time-sub'>"+sec1+"</span><span class='time-sub'>"+sec2+"</span>";
    }
                        var interval = setInterval(time, 1000);
                        </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/app.46643acf.css" rel="preload" as="style">
<link href="css/chunk-vendors.cf06751b.css" rel="preload" as="style">
<link href="js/chunk-vendors.824d6eef.js" rel="preload" as="script">
<link href="css/chunk-vendors.cf06751b.css" rel="stylesheet">
<link href="css/app.46643acf.css" rel="stylesheet">
<style>
   #copied{
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 50px;
            font-size: 17px;
        }

       

        #copied.show {
            visibility: visible;
            margin-bottom: 205px;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }
    .main-box{
      margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.5s;
            padding-bottom: 80px;
      
      /*width:100%;*/
      /*display:flex;*/
      /*justify-content:center;*/
      /*align-items:center;*/
  }
  .headerbox{
     width:100%;
      display:flex;
      flex-direction:column;
      align-items:center;
  }
  .recharge_box[data-v-309ccc10] {
      /*padding:30px;*/
      /*background:#fff;*/
      /*border-radius:10px;*/
            max-width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow-x: auto;
      
  }
  h1,h2{
      color:#fff;
  }
  .header-box {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
  #main {
    transition: margin-left .5s;
    padding: 16px;
  }
   @media (max-width: 768px){
       .main-box{
           margin-left:0px;
       }
   }
        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }
     
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}
 .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1f1f1f;
            padding-top: 60px;
            overflow-x: hidden;
            transition: all 0.5s;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
            
        }
        .sidenav a {
            padding: 15px 25px;
            font-size: 18px;
            color: white;
            display: block;
            text-decoration: none;
            transition: 0.3s;
        }
        .sidenav a:hover {
             background-color: #f39c12;
            color: #1f1f1f;

        }
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            cursor: pointer;
        }
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
header {
            background-color: #2c3e50;
            color: #fff;
            padding: 15px;
            text-align: center;
            position: relative;
            z-index: 1;
            display:flex;
            height:26px;
            
        }
        header h1 {
            margin: 0;
            font-size: 24px;
        }
         footer {
            text-align: center;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
        }

</style>
</head>
<body>
<header>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        <div style="width:100%;display:flex; justify-content:center;">
        <h1>Wingo Prediction</h1>
        </div>
        
    </header>
    
<!--<div class="topnav" id="myTopnav">-->
<!--  <a href="#home" class="active" >Admin</a>-->
<!-- <a href="admin">Users</a>-->
<!--  <a href="adpass">Password Change </a>-->
<!--  <a href="adwith">Withdraw Requests</a>-->
<!--  <a href="adpre">Next Predition</a>-->
<!--  <a href="rechargeRequests">Recharge Requests</a>-->
<!--  <a href="adreward">Reward Management</a>-->
<!--  <a href="delete">Delete User</a>-->
<!--  <a href="adlogout">Log Out</a>-->

<!--  <a href="javascript:void(0);" class="icon" onclick="myFunction()">-->
<!--    <i class="fa fa-bars"></i>-->
<!--  </a>-->
<!--</div>-->
<div class="sidenav" id="mySidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="admin" class="fa fa-dashboard"> Dashboard</a>
    <a href="users" class="fa fa-users"> Users</a>
    <a href="adduser" class="fa fa-user-plus"> Add User</a>
    <a href="inviterec" class="fa fa-list-alt"> Invite Record</a>
    <a href="adpass" class="fa fa-lock"> Password Change</a>
    <a href="/adpre" class="fa fa-line-chart"> Game Prediction</a>
    <a href="adwith" class="fa fa-money"> Withdraw Requests</a>
    <a href="rechargeRequests" class="fa fa-money"> Recharge Requests</a>
    <a href="rechrec" class="fa fa-history"> Recharge History</a>
    <a href="withrecord" class="fa fa-history"> Withdraw History</a>
    <a href="intrestrecord" class="fa fa-line-chart"> Interest Record</a>
    <a href="upi" class="fa fa-credit-card"> Admin UPI</a>
    <a href="notice" class="fa fa-bell"> Notification</a>
    <a href="gift" class="fa fa-gift"> Gift Card</a>
    <a href="login" class="fa fa-sign-out"> Log Out</a>
</div>
<div class="header-box">
    <h1 id="demo" class="time" style="font-size:20px; color:green;"></h1>
    <h2 style="font-size:20px;padding:10px; text-align:center; color:#000;">fastparity</h2>
</div>
<div class="main-box">
      
 <div data-v-309ccc10="" class="recharge">
        <div data-v-309ccc10="" class="recharge_box">
             <h1 style="color:red;">Red:$&nbsp<?php echo $red;?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="color:green;">Green:$&nbsp<?php echo $green;?></span></h1><br>
             
             <div style="font-size:20px;">
             <h1 style="color:purple;">Violet:$&nbsp<?php echo $violet;?></h1><br>
             <h1><span style="color:purple;">zero:$&nbsp<?php echo $zero;?>&nbsp&nbsp</span><span style="color:green;">one:$&nbsp<?php echo $one;?>&nbsp&nbsp</span></h1><br>
             <h1><span style="color:red;">two:$&nbsp<?php echo $two;?>&nbsp&nbsp</span><span style="color:green;">three:$&nbsp<?php echo $three;?>&nbsp&nbsp</span></h1><br>
             <h1><span style="color:red;">four:$&nbsp<?php echo $four;?>&nbsp&nbsp</span><span style="color:#3c0061;">five:$&nbsp<?php echo $five;?>&nbsp&nbsp</span></h1><br>
             <h1><span style="color:red;">six:$&nbsp<?php echo $six;?>&nbsp&nbsp</span><span style="color:green;">seven:$&nbsp<?php echo $seven;?>&nbsp&nbsp</span></h1><br>
             <h1><span style="color:red;">eight:$&nbsp<?php echo $eight;?>&nbsp&nbsp</span><span style="color:green;">nine:$&nbsp<?php echo $nine;?>&nbsp&nbsp</span></h1><br></div>
        <form action="saprepre" id="pre" method="POST" class="form-signup">
                 <h2 style="padding:10px;color:red;>Next Prediction</h2>
            <div data-v-309ccc10="" class="input_box"><img data-v-309ccc10=""
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB00lEQVRoQ+1asS4EURQ97xc0lNSEQqKmp7QNX0CiMTdKq5QzGglfQGNLeltLFISaksYvPJndnWTDbN59s29iJHfaOe/MPWfOnJ3MWwflISKnANaU8BSwB5JHWiKnAWZZduyc62qwKTHe+26e5ycaTpUQEXkBsKghTIx5Jbmk4dQK8RqyEjPJyTp3lqRqRhVIRKKEjAT1K8SvxxhSYNsgJHbmSnyTQh6997dJpqwgcc5tAVgtTzUlpE9yoykRJa+I3AMYxLARITF1OI3Y8VIwIVVOlq1ldyQyZxatkGEWrZBDE85btELGWbRCDlm0fjsQ9RpvP4iREbPWChlmrRVyyFrLWmv4FcXqN/JZsfoNGWb1G3LI6tfq1+q31lNi9Ruyzeo35JDV7/T1e5nn+X5No9XLsiy7cM7tNbY/MprkzHt/p54qEuic2wRwWC5rZH8kcqYk8LYIGd/Zjd7RbTpaWqd7JDslWERuAGxrF7clWp8k534OLSIfAGZjxPx1tJ5JrlQIeQKw/J+EFLN2SPbGolXEqohX1JH6jrwBmI+aYAgeiBGRWiIAvJNc0FxX+xH7CsCOhjAx5prkroZTJaQgGr1aHwCY0RBPifny3p9r/6tVXOsbCz8HUf9wHDEAAAAASUVORK5CYII="
                    alt=""><input data-v-309ccc10="" type="text"  name="username" id="next"
                    placeholder="Enter a number from 0-9"><span data-v-309ccc10="" class="tips_span">Next perdiction</span></div>
           
            <div data-v-309ccc10="" class="input_box_btn"><button data-v-309ccc10="" type="button" onclick="sub()"
                    class="login_btn ripple">Confirm Next Prediction</button></div>
                   
                    
                    </form>
                     <div id="copied">Enter a number from 0-9</div>
            <div data-v-309ccc10="" class="input_box_btn">
                <div data-v-309ccc10="" class="two_btn"></div>
            </div>
        </div>
</div>
</div>
<footer>
        &copy; 2025 AdityaLoot - All Rights Reserved.
    </footer>
<script>
function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }
    
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}


function sub(){
    var p=document.getElementById("next").value;
    if(p==''){
         
       var x = document.getElementById("copied");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000); 
    }else if(-1<p && p<10){
        console.log(p);
     document.getElementById("pre").submit();  
    }else{
         console.log("3");
        var x = document.getElementById("copied");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000); 
    }
    
}

</script>

</body>
</html>