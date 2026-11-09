<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
require_once "config.php";

// mysql select query

$query1 = "SELECT * FROM `recharge` WHERE username='".$_SESSION['username']."' ";


// result for method one

// result for method two 
$result1 = mysqli_query($conn, $query1);

$dataRow = "";
$number_of_result = mysqli_num_rows($result1);  
$results_per_page = 10;  

  
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

//determine which page number visitor is currently on  
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  
 
//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page;  

//retrieve the selected results from database   
$query = "SELECT * FROM `recharge` WHERE username='".$_SESSION['username']."' ORDER BY id DESC" ;  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) { 
   
    if($row2[3]==successfull){
      $colour="gr";   
    }elseif($row2[3]==failed){
         $colour="rd";
    }else{
        $colour="gry";
    }
    $dataRow = $dataRow."<div class='row bsbr-5 mr-0 mar-b10 pb-2 tfcrd' style='background: ghostwhite;'>
	<div class='col-6 xtl pl-0'><span class='rcscpv tfs-w bg$colour '>$row2[3]</span></div>
	<div class='col-6 pt-1 xtr tf-14 pt-2'>$row2[4]</div>
	<div class='col-6 pt-2'>
		<div class='row xtl'>
			<div class='col-12'><span class='upi lar'></span></div>
			<div class='col-12 pt-2 ovfh'></div>
		</div>
	</div>
	<div class='col-6 pt-2'>
		<div class='row xtl'>
			<div class='col-12 xtr tfw-7 tf-20 tfcdb'>$<span class='tf-28'> $row2[2]</span></div>
			<div class='col-12 pt-2 tf-14 xtr'>Tran Id:$row2[0] </div>
		</div>
	</div>
</div>
 
    

";
    
}




?>
<html>
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
      html,
body{
  width: 100%;
  height: 100vh;
}
  </style>
</head><body>
<section class="container-fluid">
<div class="pa-0 mt-2 mb-2"><div class="btn-main act" onclick="window.location.href='me#'">Recharge</div></div><div class="mt-4 tf-16 tfcdg" id="rcann"></div></div><div class="col-12 m-record"><div class="row nav-top auto tfcdg"><div class="col-1 xtl"><span class="nav-back wt" style="padding-top: 45px;"  onclick="window.location.href='me#'"></span></div><div class="col-10 xtl tfw-6 tf-18 tfs-w">Recharge Record</div><div class="col-2"></div></div><div class="row"><div class="col-12 mt-2" id="dtaod">




<?php echo $dataRow;?>




</div></div></div></div></div>
			<div class="row" id="odrea"></div>
			<div class="row" id="footer"><div class="col-12 nav-bar"><div class="row"><div class="col-3 nav-tab" id="moxht2b4u" onclick="home()"><div class="hg-36"><span class="icon home" id="home"></span></div><div class="ttxt"></div></div><div class="col-3 nav-tab" id="raeiyf2m0" onclick="group()"><div class="hg-36"><span class="icon group" id="group"></span></div><div class="ttxt">Invite</div></div><div class="col-3 nav-tab sel" id="sfrm6bvy" onclick="wallet()"><div class="hg-36"><span class="icon wallet sel" id="wallet"></span></div><div class="ttxt">Recharge</div></div><div class="col-3 nav-tab" id="mcpnvd2my" onclick="my()"><div class="hg-36"><span class="icon my" id="my"></span></div><div class="ttxt">My</div></div></div></div></div>
			<div class="row" id="opffp"></div>
			<div class="row" id="anof"></div>
			<div class="row" id="dta_ref"></div>
		</div>
	</div>
</section>
</body></html>