<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
require_once "config.php";
   
$opt="SELECT SUM(amount) as total FROM `bonus` WHERE usercode='".$_SESSION['usercode']."'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
if($sum['total']==""){
    $bonus=0;
    
}else{
    $bonus=round($sum['total'],2);
}
$opt1="SELECT SUM(balance) as total1 FROM `users` WHERE refcode='".$_SESSION['usercode']."' OR refcode1='".$_SESSION['usercode']."' OR refcode2='".$_SESSION['usercode']."'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
if($sum1['total1']==""){
    $tbal=0;
    
}else{
    $tbal=$sum1['total1'];
}                      
                        
$query0 =  "SELECT  * FROM users  WHERE refcode='".$_SESSION['usercode']."'";
$query1 =  "SELECT  * FROM users  WHERE refcode1='".$_SESSION['usercode']."'";
$query2 =  "SELECT  * FROM users  WHERE refcode2='".$_SESSION['usercode']."'";

// result for method one
$result1 = mysqli_query($conn, $query0);
$result3 = mysqli_query($conn, $query1);
$result4 = mysqli_query($conn, $query2);
$rowcount=mysqli_num_rows($result1);
$rowcount2=mysqli_num_rows($result3);
$rowcount3=mysqli_num_rows($result4);


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
$query = "SELECT *FROM users WHERE refcode='".$_SESSION['usercode']."' ORDER BY id DESC LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) {  
    
    $query =  "SELECT recharge FROM recharge WHERE username=$row2[1] AND status='successfull' ORDER BY id ASC";
$result3 =$conn->query($query);
$row3 = mysqli_fetch_assoc($result3);
$amount=$row3['recharge'];

 if($amount==500){
          $first=150;
        
    }elseif($amount==1000){
          $first=200;
        
    }elseif($amount==3000){
          $first=400;
        
    }elseif($amount==4000){
          $first=500;
        
    }elseif($amount==5000){
          $first=600;
        
    }elseif($amount==10000){
          $first=1100;
        
    }elseif($amount==50000){
          $first=5000;
        
    }elseif($amount==100000){
          $first=10000;
        
    }else{
          $first=(20/100)*$amount;
        
    }

    $dataRow = $dataRow."
     
            <div data-v-aa6d4f0a='' class='child_items'>
                <div data-v-aa6d4f0a='' class='child_item'>$row2[0]</div>
                <div data-v-aa6d4f0a='' class='child_item'>91$row2[1]</div>
                <div data-v-aa6d4f0a='' class='child_item'>0</div>
                <div data-v-aa6d4f0a='' class='child_item'> $first</div>
            </div>
             

";
    
}



$dataRow1 = "";
$number_of_result1 = mysqli_num_rows($result3);  
$results_per_page1 = 10;  

  
//determine the total number of pages available  
$number_of_page1 = ceil ($number_of_result1 / $results_per_page1);  

//determine which page number visitor is currently on  
if (!isset ($_GET['page1']) ) {  
    $page1 = 1;  
} else {  
    $page1 = $_GET['page1'];  
}  
 
//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result1 = ($page1-1) * $results_per_page1;  

//retrieve the selected results from database   
$query5 = "SELECT *FROM users WHERE refcode1='".$_SESSION['usercode']."' ORDER BY id DESC LIMIT " . $page_first_result1 . ',' . $results_per_page1;  
$result5 = mysqli_query($conn, $query5);  
  
//display the retrieved result on the webpage  
while ($row21 = mysqli_fetch_array($result5)) {
    $query0 =  "SELECT  recharge FROM recharge  username='$row21[1]' AND status='successfull' ORDER BY id DESC";
$result3 =$conn->query($query0);
$row3 = mysqli_fetch_assoc($result3);
$amount=$row3['recharge'];

           if($amount==500){
          $first=150;
        
    }elseif($amount==1000){
          $first=200;
        
    }elseif($amount==3000){
          $first=400;
        
    }elseif($amount==4000){
          $first=500;
        
    }elseif($amount==5000){
          $first=600;
        
    }elseif($amount==10000){
          $first=1100;
        
    }elseif($amount==50000){
          $first=5000;
        
    }elseif($amount==100000){
          $first=10000;
        
    }else{
          $first=(20/100)*$amount;
        
    }
    $dataRow1 = $dataRow1."
    
            <div data-v-aa6d4f0a='' class='child_items'>
                <div data-v-aa6d4f0a='' class='child_item'>$row21[0]</div>
                <div data-v-aa6d4f0a='' class='child_item'>91$row21[1]</div>
                <div data-v-aa6d4f0a='' class='child_item'> 0</div>
                <div data-v-aa6d4f0a='' class='child_item'> $first</div>
            </div>
             

";
    
}


$dataRow2 = "";
$number_of_result2 = mysqli_num_rows($result4);  
$results_per_page2 = 10;  

  
//determine the total number of pages available  
$number_of_page2 = ceil ($number_of_result2 / $results_per_page2);  

//determine which page number visitor is currently on  
if (!isset ($_GET['page2']) ) {  
    $page2 = 1;  
} else {  
    $page2 = $_GET['page2'];  
}  
 
//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result2 = ($page2-1) * $results_per_page2;  

//retrieve the selected results from database   
$query6 = "SELECT *FROM users WHERE refcode2='".$_SESSION['usercode']."' ORDER BY id DESC LIMIT " . $page_first_result2 . ',' . $results_per_page2;  
$result6 = mysqli_query($conn, $query6);  
  
//display the retrieved result on the webpage  
while ($row22 = mysqli_fetch_array($result6)) {  
     $query0 =  "SELECT  recharge FROM recharge  username='$row22[1]' AND status='successfull' ORDER BY id DESC";
$result3 =$conn->query($query0);
$row3 = mysqli_fetch_assoc($result3);
$amount=$row3[recharge];

           if($amount==500){
          $first=150;
        
    }elseif($amount==1000){
          $first=200;
        
    }elseif($amount==3000){
          $first=400;
        
    }elseif($amount==4000){
          $first=500;
        
    }elseif($amount==5000){
          $first=600;
        
    }elseif($amount==10000){
          $first=1100;
        
    }elseif($amount==50000){
          $first=5000;
        
    }elseif($amount==100000){
          $first=10000;
        
    }else{
          $first=(20/100)*$amount;
        
    }
    $dataRow2 = $dataRow2."
     
          
            <div data-v-aa6d4f0a='' class='child_items'>
                <div data-v-aa6d4f0a='' class='child_item'>$row22[0]</div>
                <div data-v-aa6d4f0a='' class='child_item'>91$row22[1]</div>
                <div data-v-aa6d4f0a='' class='child_item'> 0</div>
                <div data-v-aa6d4f0a='' class='child_item'>$first</div>
            </div>
             

";
    
}


?>
<!DOCTYPE html>

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
  <script src="js/invite.js" type="text/javascript"></script>
  <link href="js/chunk-vendors.824d6eef.js" rel="preload" as="script">
  <link href="css/chunk-vendors.cf06751b.css" rel="stylesheet">
  <link href="css/app.46643acf.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <style>
    body{
       background: #0D0D0D;
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
     
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  /*background-color: #dddddd;*/
  background-color: #0D0D0D;
}
.promotion[data-v-aa6d4f0a]{
    background-color: #0D0D0D;
}





/* Add a black background color to the top navigation bar */
.topnav {
  overflow: hidden;
  /*background-color: #e9e9e9;*/
   background: #0D0D0D;
}
.top_nav[data-v-aa6d4f0a]{
    background:transparent;
    box-shadow:none;
}
/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 1px 16px;
  text-decoration: none;
  font-size: 17px;
}
.level_list .layout li ol[data-v-aa6d4f0a]{
    color:#222020;
}
/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the "active" element to highlight the current page */
.topnav a.active {
  background-color: #2196F3;
  color: white;
}

/* Style the search box inside the navigation bar */
.topnav input[type=text] {
  float: right;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}

/* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 6;
    padding: 11px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
}

/* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #1f1f1f;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header .logo {
            font-size: 24px;
            color: #f39c12;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .nav-links a:hover {
            color: #f39c12;
        }

        .menu-bar {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                background-color: #1f1f1f;
                position: absolute;
                top: 50px;
                right: 20px;
                width: 200px;
                border-radius: 8px;
                padding: 10px;
            }

            .nav-links.active {
                display: flex;
            }

            .menu-bar {
                display: block;
                color: #fff;
            }
        }
        
        .menu-section {
            padding: 20px;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #292929;
            border-radius: 8px;
            cursor: pointer;
        }

        .menu-item i {
            font-size: 20px;
            color: #f39c12;
        }
    
        .container[data-v-aa6d4f0a], 
.level_box[data-v-aa6d4f0a] {
    background-color: #292929;
    color: #fff;
    padding: 20px;
    border-radius: 10px;
    margin: 50px;
    width: auto;
}
.van-tabs, 
.van-tabs--line {
    margin: 50px; /* Default margin for desktop */
    margin-bottom: auto; /* To keep the bottom margin unchanged */
}

/* Media query for mobile screens */
@media (max-width: 768px) {
    .van-tabs, 
    .van-tabs--line {
        margin: 20px; /* All margins for mobile */
    }
}

/* Media query for mobile screens */
@media (max-width: 768px) {
    .container[data-v-aa6d4f0a], 
    .level_box[data-v-aa6d4f0a] {
        margin: 20px;
    }
}
.container[data-v-aa6d4f0a] {
    display: flex;
    justify-content: flex-start;
    padding: 20px; /* Optional: add some padding */
}

.headline {
    display: flex; /* Use flexbox for horizontal alignment */
    align-items: center; /* Center items vertically */
    color: #f39c12;
}
.pagination .page_box .page[data-v-aa6d4f0a]{
    color:#fff;
}
.size-6 {
    width: 24px; /* Set width */
    height: 24px; /* Set height */
    margin-right: 8px; /* Optional: add space between the icon and text */
}

.pagination{
background:#222020;
color:#ffff;
}
.wrapper[data-v-aa6d4f0a]{
    background:#222020;
    color:#F39C12;
    font-weight:bold;
    font-size:20px;
}
        .openlink button[data-v-aa6d4f0a]{
           background: #F39C12;
           color:#fff;
        }
        .child_items[data-v-aa6d4f0a]{
            background-color:#1F1F1F; color:#fff;
        }
        .van-tab--active{
            background: #f39c12;
        }
        .custom-button {
    background-color: #F39C12; /* Purple background */
    color: white; /* White text */
    border: none; /* Remove border */
    border-radius: 5px; /* Rounded corners */
    padding-top: 5px; /* Vertical and horizontal padding */
    padding-bottom: 5px;
    font-size: 16px; /* Font size */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease; /* Smooth transition for background color */
    
    padding-right:30px;
    padding-left:30px;
    justify-content:flex-end;
    margin-left:auto;
}
@media (max-width: 600px) {
    .custom-button {
        padding: 5px 10px; /* Reduced vertical and horizontal padding for mobile */
        font-size: 14px; /* Reduced font size for mobile */
    }
}

    </style>
    <script>
        function l1(){
            document.getElementById("l1").className="van-tab van-tab--active";
            document.getElementById("l2").className="van-tab";
            document.getElementById("l3").className="van-tab";
            
            document.getElementById("level1").style.display="";
            document.getElementById("level2").style.display="none";
            document.getElementById("level3").style.display="none";
            
        }
        function l2(){
            document.getElementById("l1").className="van-tab";
            document.getElementById("l2").className="van-tab van-tab--active";
            document.getElementById("l3").className="van-tab";
            
            document.getElementById("level1").style.display="none";
            document.getElementById("level2").style.display="";
            document.getElementById("level3").style.display="none";
            
        }
        function l3(){
            document.getElementById("l1").className="van-tab";
            document.getElementById("l2").className="van-tab";
            document.getElementById("l3").className="van-tab van-tab--active";
            
            document.getElementById("level1").style.display="none";
            document.getElementById("level2").style.display="none";
            document.getElementById("level3").style.display="";
            
        }
    </script>
    
 

</head >

      <body style="font-size: 36px;">
        <div data-v-aa6d4f0a="" class="promotion">
            <?php include 'include/headernew.php'?>
          <!--<nav data-v-aa6d4f0a="" class="top_nav">-->
          <!--  <div data-v-aa6d4f0a="" class="left">-->
              <!--  <a href="me"><img data-v-aa6d4f0a=""-->
              <!--src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACexIHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOaxTo85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAABJRU5ErkJggg=="-->
              <!--alt=""></a><span data-v-aa6d4f0a="">Promotion</span>-->
          <!--    </div>-->
          <!--  <div onclick="window.location.href='/bonus';" data-v-aa6d4f0a="" class="right"><button class="custom-button">Reward</button></div>-->
          <!--</nav>-->
          <div data-v-aa6d4f0a="" class="pro_content">
            <div data-v-aa6d4f0a="" class="container">
             
              <div data-v-aa6d4f0a="" class="headline">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
  <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM9 7.5A.75.75 0 0 0 9 9h1.5c.98 0 1.813.626 2.122 1.5H9A.75.75 0 0 0 9 12h3.622a2.251 2.251 0 0 1-2.122 1.5H9a.75.75 0 0 0-.53 1.28l3 3a.75.75 0 1 0 1.06-1.06L10.8 14.988A3.752 3.752 0 0 0 14.175 12H15a.75.75 0 0 0 0-1.5h-.825A3.733 3.733 0 0 0 13.5 9H15a.75.75 0 0 0 0-1.5H9Z" clip-rule="evenodd" />
</svg>

              Bonus: 
              <span data-v-aa6d4f0a=""> <?php echo $bonus?></span>₹</div>
             <button onclick="window.location.href='/bonus';" class="custom-button">Reward</button>
            </div>
            <div data-v-aa6d4f0a="" class="level_box">
              <div data-v-aa6d4f0a="" class="level_content">
                <div data-v-aa6d4f0a="" class="level_list">
                  <ul data-v-aa6d4f0a="" class="layout">
                    <li data-v-aa6d4f0a="">
                      <ol data-v-aa6d4f0a="" style="color:#fff">
                        Total People
                      </ol>
                      <ol data-v-aa6d4f0a="" class="two_ol"  style="color:#F39C12">
                        <?php echo ($rowcount+$rowcount2+$rowcount3); ?>
                      </ol>
                    </li>
                    <li data-v-aa6d4f0a="">
                      <ol data-v-aa6d4f0a="" style="color:#fff">
                        Contribution
                      </ol>
                      <ol data-v-aa6d4f0a="" class="two_ol" style="color:#F39C12" >
                        ₹&nbsp
                    <?php echo $bonus?>
                        <!--<?php echo round($tbal,2);?>-->
                      </ol>
                    </li>
                  </ul>
                  <div data-v-aa6d4f0a="" class="layout_bot">
                    <div data-v-aa6d4f0a="" class="bot_list">
                      <p data-v-aa6d4f0a="" class="titles" style="color:#fff;font-weight: bold;font-size: 20px;">My Promotion Code</p>
                      <p data-v-aa6d4f0a="" class="answer" style="color:#F39C12"> <?php echo  $_SESSION['usercode']?></p>
                    </div>
                    <div data-v-aa6d4f0a="" class="bot_list">
                       
                      <p data-v-aa6d4f0a="" class="titles" style="color:#fff;font-weight: bold; font-size: 20px;">My Promotion Link</p>
                      <p data-v-aa6d4f0a="" id ="link"  class="answer heights"style="color:#F39C12">
                   https://selimdemo.site/register?r_code=<?php echo  $_SESSION['usercode']?>
                      </p>
                    </div>
                  </div>
                  <div data-v-aa6d4f0a="" class="openlink"><button data-v-aa6d4f0a=""
                  id ="copy" onclick="copyToClipboard()" class="tag-read ripplegrey">
                    Copy Link
                  </button></div>
                </div>
              </div>
            </div>
       
         <div data-v-aa6d4f0a="" class="van-tabs van-tabs--line" >
    <div class="van-tabs__wrap van-hairline--top-bottom" style="background:#1F1F1F;color:#fff;">
        <div role="tablist" class="van-tabs__nav van-tabs__nav--line" style="background:#1F1F1F;color:#fff;">
            <div id="l1"role="tab" onclick="l1()" class="van-tab van-tab--active" ><span class="van-tab__text van-tab__text--ellipsis">Level 1（<?php echo $rowcount; ?>）</span></div>
            <div id="l2"role="tab" onclick="l2()" class="van-tab"><span class="van-tab__text van-tab__text--ellipsis">Level 2（<?php echo $rowcount2; ?>）</span></div>
            <div style="display:;" id="l3"role="tab" onclick="l3()" class="van-tab"><span class="van-tab__text van-tab__text--ellipsis">Level 3（<?php echo $rowcount3; ?>）</span></div>
            <div class="van-tabs__line"
                style="width: 0px; transform: translateX(62.5px) translateX(-50%); height: 0px; border-radius: 0px; transition-duration: 0.3s; style="background:#1F1F1F;color:#fff;">
            </div>
        </div>
    </div>
    
<!--    <div class="topnav">-->
<!--  <input  type="text" placeholder=" 🔍 Search..">-->
  
<!--</div>-->
    
    <div class="van-tabs__content" style="background:#1F1F1F;">
        <div data-v-aa6d4f0a="" role="tabpanel" class="van-tab__pane" style="background:#1F1F1F;">
         
            <div data-v-aa6d4f0a="" class="child_items" style="background:#222020; color:#fff;">
                <div data-v-aa6d4f0a="" class="child_item">ID</div>
                <div data-v-aa6d4f0a="" class="child_item">Phone</div>
                <div data-v-aa6d4f0a="" class="child_item">Water reward</div>
                <div data-v-aa6d4f0a="" class="child_item">First reward</div>
            </div>
            <div id="level1" style="background:#222020; color:#fff;" >
            <?php echo $dataRow;?>
            <?php echo '<div data-v-aa6d4f0a="" class="pagination" >
                <ul data-v-aa6d4f0a="" class="page_box">
                    <li data-v-aa6d4f0a="" class="page"><span data-v-aa6d4f0a="">'.(1+($page-1)*10).'-'.($page*10).'</span> of '.$number_of_page.'
                    </li>';
              if ( $page ==1 ) {  
    echo'<a href="#"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow-left"><!----></i></a><a href="invite?page='.($page+1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow"><!----></i></a></li></ul></div>';
} else {  
     echo'<a href="invite?page='.($page-1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow-left"><!----></i></a><a href="invite?page='.($page+1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow"><!----></i></a></li></ul></div>';
}  ?>
           </div>
           <div id="level2" style="display:none;">
            <?php echo $dataRow1;?>
            <?php echo '<div data-v-aa6d4f0a="" class="pagination">
                <ul data-v-aa6d4f0a="" class="page_box">
                    <li data-v-aa6d4f0a="" class="page"><span data-v-aa6d4f0a="">'.(1+($page1-1)*10).'-'.($page1*10).'</span> of '.$number_of_page1.'
                    </li>';
              if ( $page1 ==1 ) {  
    echo'<a href="#"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow-left"><!----></i></a><a href="invite?page1='.($page1+1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow"><!----></i></a></li></ul></div>';
} else {  
     echo'<a href="invite?page1='.($page1-1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow-left"><!----></i></a><a href="invite?page1='.($page1+1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow"><!----></i></a></li></ul></div>';
}  ?>
           </div>
           <div id="level3" style="display:none;">
           <?php echo $dataRow2;?>
            <?php echo '<div data-v-aa6d4f0a="" class="pagination">
                <ul data-v-aa6d4f0a="" class="page_box">
                    <li data-v-aa6d4f0a="" class="page"><span data-v-aa6d4f0a="">'.(1+($page2-1)*10).'-'.($page2*10).'</span> of '.$number_of_page2.'
                    </li>';
              if ( $page2 ==1 ) {  
    echo'<a href="#"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow-left"><!----></i></a><a href="invite?page2='.($page2+1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow"><!----></i></a></li></ul></div>';
} else {  
     echo'<a href="invite?page2='.($page2-1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow-left"><!----></i></a><a href="invite?page2='.($page2+1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow"><!----></i></a></li></ul></div>';
}  ?>
           </div>
            <!---->
           
        </div>
        <div data-v-aa6d4f0a="" role="tabpanel" class="van-tab__pane" style="display: none;">
            <!---->
        </div>
        <div data-v-aa6d4f0a="" role="tabpanel" class="van-tab__pane" style="display: none;">
            <!---->
        </div>
    </div>
</div>
 <!--      	<div data-v-405e9a63="" data-v-4af9315c="" class="footer">-->
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
	<!--	</div>-->
          <div data-v-74fec56a="" data-v-aa6d4f0a=""  id ="loading"  class="loading" style="display: none;">
            <div data-v-74fec56a="" class="v-dialog v-dialog--persistent" style="width: 300px; display: block;">
              <div data-v-74fec56a="" data-v-5197ff2a="" class="v-card v-sheet theme--dark teal">
                <div data-v-74fec56a="" data-v-5197ff2a="" class="v-card__text"><span data-v-74fec56a="">Loading</span>
                  <div data-v-74fec56a="" data-v-5197ff2a="" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                    class="v-progress-linear mb-0" style="height: 7px;">
                    <div data-v-74fec56a="" class="v-progress-linear__background white"
                      style="height: 7px; opacity: 0.3; width: 100%;"></div>
                    <div data-v-74fec56a="" class="v-progress-linear__bar">
                      <div data-v-74fec56a=""
                        class="v-progress-linear__bar__indeterminate v-progress-linear__bar__indeterminate--active">
                        <div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate long white"></div>
                        <div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate short white"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div data-v-aa6d4f0a="" class="notice_zz" id="notice" >
            <div data-v-aa6d4f0a="" class="wrapper" style="max-height: 70vh;">
              <p data-v-aa6d4f0a="" class="tz_title">Notice</p>
              <p data-v-aa6d4f0a="" class="tz_info">When your friends trade, you will also receive a 30% commission.
                Therefore, the more friends you invite, the higher your commission. There is a fixed income every day, the
                commission is permanent, but the reward is only onceWhen they make money, they will invite their friends to
                join them, and then you can get a 20% commission. In this way, your team can spread quickly. Therefore, I hope
                everyone can use our platform to make money, make money, and make money!When they make money, they will invite
                their friends to join them, and then you can get a 20% commission. In this way, your team can spread quickly.
                Therefore, I hope everyone can use our platform to make money, make money, and make money!Level 1 commission:
                Friends who join through your own link belong to your level, when they trade, you will get 30% commission.Tier
                2 commission: Friends who join through your friend link belong to your secondary commission. When they trade,
                you can get 20% commission.Level 3 commission: Friends who join through friends of friends belong to your
                level 3. When they trade, you get 10% commission.Promotional rewards: 10% bonus amount for the first recharge
                after the first-level lower level joins. If your friend joins through your invitation and recharges 1000 for
                the first time, you will get 200</p>
              <div data-v-aa6d4f0a="" class="tz_close"><button data-v-aa6d4f0a="" id="close">CLOSE</button></div>
            </div>
          </div>
       
        </div>

         <div id="snackbar" class="van-toast van-toast--middle van-toast--text" style="z-index: 2009;display:none "><div class="van-toast__text">success</div></div>
         <script>
   
     
    console.log("Invitation Link Created");
    function copyToClipboard(text) {
var inputc = document.body.appendChild(document.createElement("input"));
inputc.value =document.getElementById("link").innerHTML;
inputc.focus();
inputc.select();
document.execCommand('copy');
inputc.parentNode.removeChild(inputc);
  document.getElementById("snackbar").innerHTML="success ";
           document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
}

    
  

    
   
    </script>
       
 
       
      </body>

</html >