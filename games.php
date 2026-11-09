<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
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
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <title>TcsClubs Mall</title>
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
    background-color: rgba(255, 165, 0, 0.88);
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
   <script>
         $(document).ready(function () {
        $("#balancetop").load('balance');
    
        setInterval(function () {
            $("#balancetop").load('balance');
        }, 1000); 
    })
 
   
        </script>
</head>

<body>
  <section class="container-fluid">
    <div class="row mcas">
      <div class="col-md-6 col-lg-4 main">
        <div class="row" id="warea">
          <div class="col-12">
            <div class="row walifo">
              <div class="col-6 xtl">
                <div class="mt-1 mb-2 tf-16">Rs.</div>
                <div class="mt-1 mb-2 tfw-6 tffss tf-12"><span class="tf-24 tfw-7" id="u_bal"><span id = "balancetop">0.00</span></span>rupee</div>
                <div class="mt-1 tf-16">ID:<span id="u_id"><?php echo  $_SESSION['id']?></span></div>
              </div>
              <div class="col-6 jcrdg">
                <div class="rc-wal" onclick="window.location.href='/recharge';">Recharge</div>
                <div class="wd-bal" onclick="window.location.href='/withdraw';">Withdraw</div>
              </div>
            </div>
          </div>
          <div class="col-12 mb-56">
            <div class="row tf-12 tfcdb tfw-7 1wtj0ep pbt-18">


              <div class="col-6 pdr5">
                <div  onclick="comingsoon()" class="icard"><img src="/images/ludo.png"></div>
                <div class="comsoon">Coming Soon</div>
              </div>
              <div class="col-6 pdl5" onclick="goanb()">
                <div  onclick="comingsoon()" class="icard"><img src="/images/avsb.png">
                  <div class="comsoon">Coming Soon</div>
                </div>
              </div>
              
              <div class="col-6 pdr5">
                <div  onclick="comingsoon()" class="icard" onclick="gorout()"><img src="/images/roulette-logo.png">
                  <div class="comsoon" style=" right: 5px; ">Coming Soon</div>
                  
                  
                </div>
              </div>
               <div class="col-6 pdl5">
                <div  onclick="comingsoon()" class="icard"><img src="/images/car.png"></div>
                 <div class="comsoon" >Coming Soon</div>
               
              </div>
              <div class="col-6 pdr5">
                  <div  onclick="comingsoon()" class="icard"><img src="/images/dice.png"></div>
                  <div class="comsoon" >Coming Soon</div>
                </div>



            </div>
          </div>
        </div>
        <div class="row" id="odrea"></div>
        <div class="row" id="footer">
          <div class="col-12 nav-bar">
            <div class="row">
              <div class="col-3 nav-tab sel" id="moxht2b4u" onclick="window.location.href='/games';">
                <div class="hg-36"><span class="icon home sel" id="home"></span></div>
                <div class="ttxt">Games</div>
              </div>
              <div class="col-3 nav-tab" id="raeiyf2m0" onclick="window.location.href='/invite';">
                <div class="hg-36"><span class="icon group" id="group"></span></div>
                <div class="ttxt">Invite</div>
              </div>
              <div class="col-3 nav-tab" onclick="window.location.href='/win';"">
                <div class="hg-36"><span class="icon wing" id="wing"></span></div>
                <div class="ttxt">Win</div>
              </div>
              <div class="col-3 nav-tab" id="sfrm6bvy" onclick="window.location.href='/recharge';">
                <div class="hg-36"><span class="icon wallet" id="wallet"></span></div>
                <div class="ttxt">Recharge</div>
              </div>
              <div class="col-3 nav-tab" id="mcpnvd2my" onclick="window.location.href='/me';">
                <div class="hg-36"><span class="icon my" id="my"></span></div>
                <div class="ttxt">My</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="opffp"></div>
        <div class="row" id="anof"></div>
        <div class="row" id="dta_ref"></div>
        <div id="snackbar" class="van-toast van-toast--middle van-toast--text" style="z-index: 2009;display:none "><div class="van-toast__text">Coming Soon</div></div>
      </div>
    </div>
    <script>
  function comingsoon(){
  document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
  }
  
  </script>
  </section>
 
</body>


</html>