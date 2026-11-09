<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
require_once "config.php";
//retrieve the selected results from database   

$query0 =  "SELECT  * FROM users  WHERE refcode='".$_SESSION['usercode']."'";
$query1 =  "SELECT  * FROM users  WHERE refcode1='".$_SESSION['usercode']."'";


// result for method one
$result1 = mysqli_query($conn, $query0);
$result3 = mysqli_query($conn, $query1);

$rowcount=mysqli_num_rows($result1);
$rowcount2=mysqli_num_rows($result3);

//retrieve the selected results from database   
$query = "SELECT * FROM `bonus` WHERE usercode='".$_SESSION['usercode']."' ORDER BY id DESC";  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) {  
    $dataRow = $dataRow."
             <div class='row pt-1 pb-1'>
                                     <div class='col-4 xtl'>$row2[1]</div>
                                    <div class='col' style='display:inline !important;'>$&nbsp$row2[3]</div>
                                    <span>$row2[4]</span>
                                </div>
             

";
    
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
            <div class="col-md-6 col-lg-4 main">
                <div class="row" id="warea">
                    <div class="col-12 nav-top invtab">Invite</div>
                    <div class="col-12 invwc">
                        <div class="row walifo inv">
                            <div class="col-6 xtl">
                                <div class="mt-1 mb-2 tf-12 tfcdg">Agent amount</div>
                                <div class="mt-1 mb-2 tfcdb tfw-6 tffss">$<span class="tf-28 tfw-7"
                                        id="u_com">0.24</span></div>
                            </div>
                            <div class="col-6 jcrdg">
                                <div class="wdcom" onclick="addcom()" id="addcom">Add To Wallet</div>
                            </div>
                        </div>
                    </div>
             
                        <div class="row mt-4 ovfh tfwr mb-56">
                            <div class="col-8 mb-2 tf-16 tfcdb xtl">Income details</div>
                            <div class="col-4 pr-4 mb-2 tfcdg xtr"><span class="mcpl comr"
                                    onclick="comr()">more&gt;</span></div>
                            <div class="col-12" id="insort">
                                <div class="row dflx pt-2 pb-2 inbdb">
                                    <div class="col-2 flh48"><span class="inliri tfw-6 tf-16 tfs-w xtc">LV.2</span>
                                    </div>
                                    <div class="col-6">
                                        <div class="row xtl">
                                            <div class="col-12 tfcdb tf-18">Level-2 Commission</div>
                                            <div class="col-6 tf-16 pt-1 cgray">23-01 06:02</div>
                                            <div class="col-6 tf-16 pt-1 cgray">from 29165</div>
                                        </div>
                                    </div>
                                    <div class="col-4 pr-4 xtr tfcdb tf-18">+$0.24</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" id="open"></div>
                </div>
                <div class="row" id="odrea">
                    <div class="col-12 m-record">
                        <div class="row nav-top auto tfcdg">
                            <div class="col-1 xtl"><span class="nav-back wt"style="padding-top: 45px;" onclick="window.location.href='invite#'"></span></div>
                            <div class="col-10 xtl tfw-6 tf-18 tfs-w">Income Record</div>
                            <div class="col-2"></div>
                            <div class="col-12 pb-4 bgcf tfcdb odtnav">
                                <div class="xtl tfw-6 tf-16">The total number of invites is <span class="tfs-org"
                                        id="tnoinv"><?php echo ($rowcount+$rowcount2); ?></span></div>
                            
                            </div>
                           
                            <div class="col-12 tf-14">
                                <div class="row bgcf">
                                    <div class="col-4 xtl">User</div>
                                    <div class="col-4">Amount</div>
                                    <div class="col-4 xtr">Added at</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mr-0">
                            <div class="col-12 pa-0" id="dtaod">
           
            <div id="level1" style="display:;">
            <?php echo $dataRow;?>
            </div>
                             

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="footer">
                    <div class="col-12 nav-bar">
                        <div class="row">
                            <div class="col-3 nav-tab" id="moxht2b4u" onclick="home()">
                                <div class="hg-36"><span class="icon home" id="home"></span></div>
                                <div class="ttxt">Orange</div>
                            </div>
                            <div class="col-3 nav-tab sel" id="raeiyf2m0" onclick="group()">
                                <div class="hg-36"><span class="icon group sel" id="group"></span></div>
                                <div class="ttxt">Invite</div>
                            </div>
                            <div class="col-3 nav-tab" id="sfrm6bvy" onclick="wallet()">
                                <div class="hg-36"><span class="icon wallet" id="wallet"></span></div>
                                <div class="ttxt">Recharge</div>
                            </div>
                            <div class="col-3 nav-tab" id="mcpnvd2my" onclick="my()">
                                <div class="hg-36"><span class="icon my" id="my"></span></div>
                                <div class="ttxt">My</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="opffp"></div>
                <div class="row" id="anof"></div>
                <div class="row" id="dta_ref"></div>
            </div>
        </div>
    </section>
   
</body>

</html>