<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}


                        require_once "config.php";
                 
$opt="SELECT SUM(recharge) as total FROM `recharge` WHERE username='".$_SESSION['username']."'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
if($sum['total']==""){
    $bonus=1;
    
}else{
    $bonus=round($sum['total'],2);
}
$opt1="SELECT SUM(amount) as total1 FROM `betting` WHERE username='".$_SESSION['username']."'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
if($sum1['total1']==""){
    $bonus1=0;
    
}else{
    $bonus1=round($sum1['total1'],2);
}
$opt2="SELECT SUM(amount) as total2 FROM `saprebetting` WHERE username='".$_SESSION['username']."'";
$optres2=$conn->query($opt2);
$sum2= mysqli_fetch_assoc($optres2);
if($sum2['total2']==""){
    $bonus2=0;
    
}else{
    $bonus2=round($sum2['total2'],2);
}
$opt3="SELECT SUM(amount) as total3 FROM `emredbetting` WHERE username='".$_SESSION['username']."'";
$optres3=$conn->query($opt3);
$sum3= mysqli_fetch_assoc($optres3);
if($sum3['total3']==""){
    $bonus3=0;
    
}else{
    $bonus3=round($sum['total3'],2);
}
$opt4="SELECT SUM(amount) as total4 FROM `beconebetting` WHERE username='".$_SESSION['username']."'";
$optres4=$conn->query($opt4);
$sum4= mysqli_fetch_assoc($optres4);
if($sum4['total4']==""){
    $bonus4=0;
    
}else{
    $bonus4=round($sum['total4'],2);
}
$opt5="SELECT SUM(amount) as total5 FROM `bonus` WHERE username='".$_SESSION['username']."'";
$optres5=$conn->query($opt5);
$sum5= mysqli_fetch_assoc($optres5);
if($sum5['total5']==""){
    $bonus5=0;
    
}else{
    $bonus5=round($sum['total5'],2);
}
   
                        $sql = "SELECT  account, ifsc,name FROM users  WHERE username='".$_SESSION['username']."'";
                        $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                          // output data of each row
                         $row = $result->fetch_assoc();
                              
                                    }
                         $conn->close();
                         $remain=(0);
?>
<html lang="en" style="font-size: 37.5px;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" 
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="icon.jpeg">
    <?php include 'head.php';?>
    <link href="css/app.46643acf.css" rel="preload" as="style">
    <link href="css/chunk-vendors.cf06751b.css" rel="preload" as="style">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link href="js/chunk-vendors.824d6eef.js" rel="preload" as="script">
    <link href="css/chunk-vendors.cf06751b.css" rel="stylesheet">
    <link href="css/app.46643acf.css" rel="stylesheet">
    <script>
         $(document).ready(function () {
        $("#balancetop").load('balance');
    
        setInterval(function () {
            $("#balancetop").load('balance');
        }, 1000); 
    })
 
 
        </script>
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
        .recharge[data-v-51265586],.van-collapse-item {
            background:#0D0D0D;
            color:#fff;
        }
        .top_text[data-v-51265586],.payment_text[data-v-51265586]{
            color:#F39C12;
        }
        .payment_text[data-v-51265586],.van-radio[data-v-51265586] .text,.payment_box[data-v-51265586] .van-radio__icon--checked .van-icon,.nav_name[data-v-51265586]{
            color:#fff;
        }
        .code_input input[data-v-51265586],.van-collapse-item[data-v-51265586] .van-cell,.password_box .box_border input[data-v-51265586] {
            padding:10px;
            border-radius:10px;
             background:#0D0D0D;
            color:#fff;
        }
        .recharge_box[data-v-51265586]{
            background:#222020;
            margin:50px;
            padding:10px;
            width:auto;
        }
        .van-cell van-cell--clickable van-collapse-item__title{
           background:#222020; 
        }
        @media (max-width: 768px){
            .recharge_box[data-v-51265586]{
            
            margin:20px;
            padding:10px;
            
        }
        }
        </style>
</head>

<body style="font-size: 36px;">
    <div data-v-51265586="" class="recharge">
        <?php include 'include/headernew.php'?>
        <!--<nav data-v-51265586="" class="top_nav">-->
        <!--    <div data-v-51265586="" class="left"><a href="/me"><img data-v-51265586=""-->
        <!--            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACexIHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOaxTo85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAABJRU5ErkJggg=="-->
        <!--            alt=""></a><span data-v-51265586="">Withdrawal</span></div>-->
        <!--    <div data-v-51265586="" class="right"><a href="/withdrawrec"><img data-v-51265586=""-->
        <!--            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAA30lEQVRoQ+2YUQ7CMAxD65uxkyFOxjhZEAeATKndocz7j1P7JVpVjCYfmvgYNvJvJE3EREQJeLREwZZlr0MkIu7lmIiFAB6/5FIiEfEcY9yIZ6pI7QA2G/kk0IlIjx2pDPQZNemyn3GoSk8bqaSmrDERZboVbROppKasSYl0+rP70kgcJd9+iWGukUqXfc0x5rvYyHyGXAUT4eY5r2Yi8xlyFVIioge6F4CdaeWIEcVda7ORLxgvRUTxQLd+R5gLqdRKR0vZnKltI8w0GVomwkiRqWEizDQZWibCSJGp8QahV0QzxiHkWgAAAABJRU5ErkJggg=="-->
        <!--            alt=""></a></div>-->
        <!--</nav>-->
        <form action="sub" id="wform" method="post">
           
        <div data-v-51265586="" class="recharge_box">
            <p data-v-51265586="" class="top_text">Balance: ₹ <span data-v-51265586="" id = "balancetop" ></span></p>
            
            <div data-v-51265586="" class="code_input_box">
        
                <div data-v-51265586="" class="code_input"><img data-v-51265586=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFwmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0xNFQxMTowMzoxNSswODowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMC0wNy0xNFQxMTowMzoxNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMTRUMTE6MDM6MTUrMDg6MDAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZmMyMzc2MDgtMmQ0NC01NjQ0LWFlZTAtNTA0NGRlYWJmYzFhIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6YTk3OWMxMWMtZmZjYi1lOTQ1LTg2ODMtYmNi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"
                        alt=""><input data-v-51265586="" id="withdraw" type="text" name="withdraw" placeholder="Enter withdrawal amount"></div>
                        
                          
            </div>
            <br>
                        <div style="padding:10px;"><span>Fee:&nbsp₹&nbsp</span><span id="fee">0.00</span><span>,to Account:&nbsp₹&nbsp</span> <span id="famount">0.00</span></div>
            
        
            <div data-v-51265586="" class="payment_box">
                <p data-v-51265586="" class="payment_text">Payout</p>
                <div data-v-51265586="" role="radiogroup" class="van-radio-group">
                    <div data-v-51265586="" role="radio" tabindex="0" aria-checked="true" class="van-radio">
                        <div class="van-radio__icon van-radio__icon--square van-radio__icon--checked"><i
                                class="van-icon van-icon-success">
                                <!---->
                            </i></div><span class="van-radio__label"><span data-v-51265586=""
                                class="text">Bankcard</span></span>
                    </div>
                </div>
            </div>
            <div data-v-51265586="" class="add_card">
                <div data-v-51265586="" class="van-collapse van-hairline--top-bottom">
                <div data-v-51265586="" class="van-collapse-item">
                    <div role="button" onclick="fun()" tabindex="0" aria-expanded="false" class="van-cell van-cell--clickable van-collapse-item__title" style="background:transparent;">
                        <div class="van-cell__title"><img data-v-51265586="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABaElEQVRoQ+1ZO07DQBCdOQhSLkEfLkCfjgopBZ1HchnqWblIBRWpcgFaJLhIquQYlidyFEfGARPLO/aymW29fm/fvNnfLEIkDSPRASYkNCfNEXNEKQI/plaappM8zydKnL1gi6LYZFm2bYKcCSGiJQA89WLT//mdme/rNN+EENEjALzqj6M/g4gsnHPPFVJTyBsAPBw/fvWnU0GYHlF3zHzzm5BPADh0FJE751xQYpIkmSJiOcZDY+aTEU1HTIhKEjVAr96RxRBR7sqBiKdxXTRHuhKM0d+EjBH1Nk5z5L86EtSuXgtidUSxnX30zLr6nd1Ov1o5aKmlfbEiojUi3rY5KCIfzDwv+wTrSCkEAGZ/pOKLCRnqzm6OhFZ8iMmRqobWOt+ZeRX0qtV14wx2+TUhoU12TUfqReyuPEP3by1ix/GsUIY0ioeeKjeieHobOtF98dk7u69I+sIxR3xF0heOOeIrkr5w9v4wfUJPH/TeAAAAAElFTkSuQmCC" alt=""><div data-v-51265586="" id="set" class="nav_name">Select Bank Card</div></div><i class="van-icon van-icon-arrow van-cell__right-icon"><!----></i></div>
                        <div id="down" class="van-collapse-item__wrapper" style="display:none;"><div class="van-collapse-item__content">
                <div data-v-51265586="" id="bank" onclick="set()"class="nav_content"><?php echo $row["name"];?> <?php echo substr($row["account"],1,3);?>****<?php echo substr($row["account"],8,3);?></div><div data-v-51265586="" class="nav_content"  onclick="window.location.href='bank'" >Add Bank Card</div></div></div></div></div></div>
        
           <script>
             let selected=0;
             console.log(selected);
               function fun(){
                   

      var x =document.getElementById('down');
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function set(){
    document.getElementById('down').style.display = "none";
    document.getElementById('set').innerHTML=document.getElementById('bank').innerHTML;
    selected="1"
    console.log(selected);
}
 
           </script>
       
       
            <div id="copied">Minimum withdraw $ 200</div>
            <div data-v-51265586="" class="add_card">
                <div data-v-51265586="" class="van-collapse van-hairline--top-bottom">
                    <div data-v-51265586="" class="van-collapse-item">
                        <div role="button" tabindex="0" aria-expanded="false"
                            class="van-cell van-cell--clickable van-collapse-item__title">
                          
                       
                        </div>
                    </div>
                </div>
            </div>
            <div data-v-51265586="" class="password_box">
                <div data-v-51265586="" class="box_border"><img data-v-51265586=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MTo0NyswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZWJiNmY0NGYtOTJhOS1lYzRi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"
                        alt=""><input data-v-51265586="" type="password" name="password" placeholder="Enter your login password"></div>
            </div>
            
            <div data-v-51265586="" class="recharge_btn"><button type="button" onclick="sub()" data-v-51265586="">Withdrawal</button></div>

        </div></form>
 <!--          	<div data-v-405e9a63="" data-v-4af9315c="" class="footer">-->
	<!--<ul data-v-405e9a63="" class="nav_foot">-->
	<!--			<li data-v-405e9a63="" onclick="window.location.href='indexlogin'"  class=""><img data-v-405e9a63=""-->
	<!--					src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToxOTozOCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzE6NDErMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzE6NDErMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NmY2M2YzNjUtMzkyZS1mMzRj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"-->
	<!--					alt=""><span data-v-405e9a63="">Home</span></li>-->
 <!--                   <li data-v-405e9a63="" onclick="window.location.href='search'" class=""><img data-v-405e9a63=""-->
 <!--                       src="data:image/png;base64,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"-->
 <!--                       alt=""><span data-v-405e9a63="">Search</span></li>-->
			
	<!--			<li data-v-405e9a63="" onclick="window.location.href='win'" class=""><img data-v-405e9a63=""-->
	<!--					src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADF0lEQVRoQ+1aO2gUURQ9Nx8mYCfYiR+w0EbsTMD4qyVqwA/aGBG7FUdm3jYBYxOYeS+OmE6IBoL4Az9gk8L4BbVSUlkIiXY2dkKEZK9MSGR8O7PzdXeKmXLn3nvOub/d91hCwse2bU5oWqiZlJKSBExk5AeqhCRJZwubqiJRySl9a3WKYM6Oa3KnSkjRKc0Zr6pIzgQW7h5akbDd3alZSsqlElJ4b0QETFORTwD2BON0dXVtdRzne/CzsrRWvV7f0mg0vmm6P/utdQfAOU3IoOM470oqZF+j0XirCZn2hQgAjvbikZTyZBmF2Lb9EMAJjW+dhBBDzPxMb1EiOu+6rl+t1acMrSWEGGHm2yFcj66eRyzLek1E+zWDX8x8RCn1qgxCLMs6SETPAWwI8mTmN0qpA+tCjhPR45DFsUBEV1zXfdrJigghjjHzdQDbdY7MPKyUevL3hGjb9n0ApyK2oD9cg+1auRpOK+wHUsrTvv1fIUKIfmZ+3yGymWCJaMB13Q//CFmblb1EdAvA7kyR2+c0z8wXlVIf1yGbLh9M09zY09NzE8DZ9vFKhXR3eXn5kud5P4NekbcolmVdBXA4ZJulQi3K2N9OAOaUUtfCYsZeB5mmuaO7u/vQmqjVwWrXw8z+AppbWVl56Xne11a4sUKCzrZtLwDY1iYhi1LKpnUbhZ1KSNQ36/8Qpv+yiMNIJaRWqxl9fX1f2lCVxaWlpZ2Tk5O/4wREbq04R38JENFYnF2e98w8FjXUhbTWehAhhMfMl/OQjSREdMN1XTNt7FStpQ1+0zkmLXiI/bSUciRLnMxCfLCwQ1kWEr4PM08ppS5k9c8lxAe1LOsMEY0C2JWFBDPPMrM3MTExm8U/87CHgdVqtU2GYYwS0TCAzQkJvWDme0qpqYT2Lc1yVyQY3V/PhmEMEFE/gAEAQxr6PICZ3t7emfHx8R9FCCi0ImGEwtZ0lrWaVGyhFQmCVkKSlkCzqyoSl7iqteIyFPG+aq24xFWtFZehqrVaZKjoa9Skf9cIo5Rr2CshEVWuKhK8xM6yLMrUWn8AMZSO49QGBtUAAAAASUVORK5CYII="-->
	<!--					alt=""><span data-v-405e9a63="">Win</span></li>-->
	<!--			<li data-v-405e9a63="" onclick="window.location.href='me'"  class="active"><img data-v-405e9a63=""-->
	<!--					src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToyMDoxOSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzM6MDYrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzM6MDYrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6YzI0MGRmNzQtY2FmMy00MjQx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"-->
	<!--					alt=""><span data-v-405e9a63="">My</span></li>-->
	<!--		</ul>-->
	<!--	</div>       -->
		<div data-v-74fec56a="" data-v-51265586="" id ="loading"  class="loading" style="display: none;">
            <div data-v-74fec56a="" class="v-dialog v-dialog--persistent" style="width: 300px; display: block;">
                <div data-v-74fec56a="" data-v-5197ff2a="" class="v-card v-sheet theme--dark teal">
                    <div data-v-74fec56a="" data-v-5197ff2a="" class="v-card__text"><span
                            data-v-74fec56a="">Loading</span>
                        <div data-v-74fec56a="" data-v-5197ff2a="" role="progressbar" aria-valuemin="0"
                            aria-valuemax="100" class="v-progress-linear mb-0" style="height: 7px;">
                            <div data-v-74fec56a="" class="v-progress-linear__background white"
                                style="height: 7px; opacity: 0.3; width: 100%;"></div>
                            <div data-v-74fec56a="" class="v-progress-linear__bar">
                                <div data-v-74fec56a=""
                                    class="v-progress-linear__bar__indeterminate v-progress-linear__bar__indeterminate--active">
                                    <div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate long white">
                                    </div>
                                    <div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate short white">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/chunk-vendors.824d6eef.js"></script>

    </script>
       
      <script>
    
    setInterval(function () { 
        var x=document.getElementById("withdraw").value;
        document.getElementById("fee").innerHTML=4/100*x;
        document.getElementById("famount").innerHTML=x-4/100*x;
        }, 300);
        function sub(){ 
            console.log(selected);
            if(selected==1){
                if(<?php echo $row["account"];?> =="1111111111"){
                var y = document.getElementById("copied");
                 y.innerHTML="Add Bankcard to withdraw";
         y.className = "show";
         setTimeout(function () {
             y.className = y.className.replace("show", "");
         }, 3000);
                
            }else{
                 if(<?php echo $bonus;?> =="0" || <?php echo $bonus;?>==""){
         var y = document.getElementById("copied");
                 y.innerHTML="Need first recharge of $500 to withdraw";
         y.className = "show";
         setTimeout(function () {
             y.className = y.className.replace("show", "");
         }, 3000);
            }else{
                       if(<?php echo $remain;?> >=0){
                  var x=document.getElementById("withdraw").value;
            if(x<200){
                var y = document.getElementById("copied");
                y.innerHTML="Minimum withdraw 200";
         y.className = "show";
         setTimeout(function () {
             y.className = y.className.replace("show", "");
         }, 3000);

            }else{
                document.getElementById("wform").submit();
            }
            }else{
                 var y = document.getElementById("copied");
                 y.innerHTML="you to bet <?php echo $remain;?> more to withdraw";
         y.className = "show";
         setTimeout(function () {
             y.className = y.className.replace("show", "");
         }, 3000);
            }
            }
           
            }}else{
                var y = document.getElementById("copied");
                 y.innerHTML="select Bankcard";
         y.className = "show";
         setTimeout(function () {
             y.className = y.className.replace("show", "");
         }, 3000);
                
            }
            
          
        } 
   
    </script>
          <script>
    if(<?php echo $row["account"];?> =="1111111111") {
        document.getElementById("bank").style.display= "none";
                            
    } else {
        document.getElementById("bank").style.display= "";          
    }

    
  

    
   
    </script>
       
       
      </body>

</html>