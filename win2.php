<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
   require_once "config.php";
   
    $sql = "SELECT * FROM bet WHERE id='1'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($result);
 
// Initialize the session
   $sql3 = "SELECT period FROM period WHERE id='1'";
    $result3 =$conn->query($sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $perio=$row3['period'];
   
                      
$sql = "SELECT  notice FROM notice WHERE id='1'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$notice=$row[notice];
                       
$query =  "SELECT * FROM betrec ORDER BY id DESC";


// result for method one
$result1 = mysqli_query($conn, $query);

// result for method two 
$result2 = mysqli_query($conn, $query);


$dataRow = "";

while($row2 = mysqli_fetch_array($result2))
{
    $dataRow = $dataRow."<tr><td>$row2[1]</td><td> $row2[2]</td><td>$row2[3]</td></tr>";
    
}

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  


if (!isset ($_GET['rpage']) ) {  
    $rpage = 1;  
} else {  
    $rpage = $_GET['rpage'];  
}  

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <link href="css/chunk-vendors.cf06751b.css" rel="stylesheet">
    <link href="css/app.46643acf.css" rel="stylesheet">
    <link href="css/app.b2eed9a6.css" rel="stylesheet">
    

    <script>


        $(document).ready(function () {            $("#balancetop").load('balance');

            setInterval(function () {
                $("#balancetop").load('balance');
            }, 2000);

            $("#ansrec").load('ansrec?page=<?php echo $page; ?>');

setInterval(function () {
    $("#ansrec").load('ansrec?page=<?php echo $page; ?>');
}, 2000);
  $("#mybet").load('rec?rpage=<?php echo $rpage; ?>');
$("#date").load('countdown');


setInterval(function () {
    $("#date").load('countdown');
}, 1000);
$("#date").load('countdown');

setInterval(function () {
    $("#period").load('period');
}, 1000);
  setTimeout(function pageRedirect(){
        document.getElementById("count").style.display="";
       document.getElementById("con").style.display="none";
        }, 1000);



      setInterval(function () {
          if(typeof m == 'undefined'){m=10;}
   document.getElementById("gtotal").innerHTML=document.getElementById("gin").value*m;
   document.getElementById("gfamount").value=document.getElementById("gin").value*m;
             if(typeof n == 'undefined'){n=10;}
   document.getElementById("rtotal").innerHTML=document.getElementById("rin").value*n;
   document.getElementById("rfamount").value=document.getElementById("rin").value*n;
    if(typeof o == 'undefined'){o=10;}
   document.getElementById("vtotal").innerHTML=document.getElementById("vin").value*o;
   document.getElementById("vfamount").value=document.getElementById("vin").value*o;  
    
     if(typeof p == 'undefined'){p=10;}
   document.getElementById("0total").innerHTML=document.getElementById("in0").value*p;
   document.getElementById("famount0").value=document.getElementById("in0").value*p;  
          
           if(typeof q == 'undefined'){q=10;}
   document.getElementById("1total").innerHTML=document.getElementById("in1").value*q;
   document.getElementById("famount1").value=document.getElementById("in1").value*q; 
          
           if(typeof r == 'undefined'){r=10;}
   document.getElementById("2total").innerHTML=document.getElementById("in2").value*r;
   document.getElementById("famount2").value=document.getElementById("in2").value*r; 
    
           if(typeof s == 'undefined'){s=10;}
   document.getElementById("3total").innerHTML=document.getElementById("in3").value*s;
   document.getElementById("famount3").value=document.getElementById("in3").value*s; 
   
    if(typeof t == 'undefined'){t=10;}
   document.getElementById("4total").innerHTML=document.getElementById("in4").value*t;
   document.getElementById("famount4").value=document.getElementById("in4").value*t; 
   
    if(typeof u == 'undefined'){u=10;}
   document.getElementById("5total").innerHTML=document.getElementById("in5").value*u;
   document.getElementById("famount5").value=document.getElementById("in5").value*u; 
   
    if(typeof v == 'undefined'){v=10;}v
   document.getElementById("6total").innerHTML=document.getElementById("in6").value*v;
   document.getElementById("famount6").value=document.getElementById("in6").value*v; 
   
    if(typeof w == 'undefined'){w=10;}
   document.getElementById("7total").innerHTML=document.getElementById("in7").value*w;
   document.getElementById("famount7").value=document.getElementById("in7").value*w; 
   
    if(typeof z== 'undefined'){z=10;}
   document.getElementById("8total").innerHTML=document.getElementById("in8").value*z;
   document.getElementById("famount8").value=document.getElementById("in8").value*z; 
   
    if(typeof y == 'undefined'){y=10;}
   document.getElementById("9total").innerHTML=document.getElementById("in9").value*y;
   document.getElementById("famount9").value=document.getElementById("in9").value*y; 
      }, 100);      
        })
        function sel(e){
            
             document.getElementById("1").className="";
             document.getElementById("2").className="";
             document.getElementById("3").className="";
             document.getElementById("4").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==1){
                m=10;
            }
            if(x==2){
                m=100;
            }
            if(x==3){
                m=1000;
            }
            if(x==4){
               m=10000; 
            }
        }
        
        function minus(id){
            var x=id.value;
           if(x>1){
             id.value= x-1;  
           }
            
        }
        function plus(id){
            id.value++;
        }
        
        function selr(e){
            
             document.getElementById("5").className="";
             document.getElementById("6").className="";
             document.getElementById("7").className="";
             document.getElementById("8").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==5){
                n=10;
            }
            if(x==6){
                n=100;
            }
            if(x==7){
                n=1000;
            }
            if(x==8){
               n=10000; 
            }
        }
        
          function selv(e){
            
             document.getElementById("9").className="";
             document.getElementById("10").className="";
             document.getElementById("11").className="";
             document.getElementById("12").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==9){
                o=10;
            }
            if(x==10){
                o=100;
            }
            if(x==11){
                o=1000;
            }
            if(x==12){
               o=10000; 
            }
        }
        
        function sel0(e){
            
             document.getElementById("13").className="";
             document.getElementById("14").className="";
             document.getElementById("15").className="";
             document.getElementById("16").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==13){
                p=10;
            }
            if(x==14){
                p=100;
            }
            if(x==15){
                p=1000;
            }
            if(x==16){
               p=10000; 
            }
        }
        
        function sel1(e){
            
             document.getElementById("17").className="";
             document.getElementById("18").className="";
             document.getElementById("19").className="";
             document.getElementById("20").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==17){
                q=10;
            }
            if(x==18){
                q=100;
            }
            if(x==19){
                q=1000;
            }
            if(x==20){
               q=10000; 
            }
        } 
        
        function sel2(e){
            
             document.getElementById("21").className="";
             document.getElementById("22").className="";
             document.getElementById("23").className="";
             document.getElementById("24").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==21){
                r=10;
            }
            if(x==22){
                r=100;
            }
            if(x==23){
                r=1000;
            }
            if(x==24){
               r=10000; 
            }
        }
        
        
         function sel3(e){
            
             document.getElementById("25").className="";
             document.getElementById("26").className="";
             document.getElementById("27").className="";
             document.getElementById("28").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==25){
                s=10;
            }
            if(x==26){
                s=100;
            }
            if(x==27){
                s=1000;
            }
            if(x==28){
               s=10000; 
            }
        } 
        
             function sel4(e){
            
             document.getElementById("29").className="";
             document.getElementById("30").className="";
             document.getElementById("31").className="";
             document.getElementById("32").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==29){
                t=10;
            }
            if(x==30){
                t=100;
            }
            if(x==31){
                t=1000;
            }
            if(x==32){
               t=10000; 
            }
        }
        
           function sel5(e){
            
             document.getElementById("33").className="";
             document.getElementById("34").className="";
             document.getElementById("35").className="";
             document.getElementById("36").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==33){
                u=10;
            }
            if(x==34){
                u=100;
            }
            if(x==35){
                u=1000;
            }
            if(x==36){
               u=10000; 
            }
        }
        
           function sel6(e){
            
             document.getElementById("37").className="";
             document.getElementById("38").className="";
             document.getElementById("39").className="";
             document.getElementById("40").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==37){
                v=10;
            }
            if(x==38){
                v=100;
            }
            if(x==39){
                v=1000;
            }
            if(x==40){
               v=10000; 
            }
        }
        
         function sel7(e){
            
             document.getElementById("41").className="";
             document.getElementById("42").className="";
             document.getElementById("43").className="";
             document.getElementById("44").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==41){
                w=10;
            }
            if(x==42){
                w=100;
            }
            if(x==43){
                w=1000;
            }
            if(x==44){
               w=10000; 
            }
        }
        
        function sel8(e){
            
             document.getElementById("45").className="";
             document.getElementById("46").className="";
             document.getElementById("47").className="";
             document.getElementById("48").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==45){
                z=10;
            }
            if(x==46){
                z=100;
            }
            if(x==47){
                z=1000;
            }
            if(x==48){
               z=10000; 
            }
        }
        
         function sel9(e){
            
             document.getElementById("49").className="";
             document.getElementById("50").className="";
             document.getElementById("51").className="";
             document.getElementById("52").className="";
            document.getElementById(e).className="active";
             var x=e;
                 if(x==49){
                y=10;
            }
            if(x==50){
                y=100;
            }
            if(x==51){
                y=1000;
            }
            if(x==52){
               y=10000; 
            }
        }
        
        
        
        
   function vio() {
  document.getElementById("viobox").style.display = "";
}      
 
 function num0() {
  document.getElementById("0box").style.display = "";
}
 function num1() {
  document.getElementById("1box").style.display = "";
}
 function num2() {
  document.getElementById("2box").style.display = "";
}
 function num3() {
  document.getElementById("3box").style.display = "";
}
 function num4() {
  document.getElementById("4box").style.display = "";
}
 function num5() {
  document.getElementById("5box").style.display = "";
}
 function num6() {
  document.getElementById("6box").style.display = "";
}
 function num7() {
  document.getElementById("7box").style.display = "";
} 
function num8() {
  document.getElementById("8box").style.display = "";
}
 function num9() {
  document.getElementById("9box").style.display = "";
}
 function c0() {
  document.getElementById("0box").style.display = "none";
}
 function c1() {
  document.getElementById("1box").style.display = "none";
}
 function c2() {
  document.getElementById("2box").style.display = "none";
}
 function c3() {
  document.getElementById("3box").style.display = "none";
}
 function c4() {
  document.getElementById("4box").style.display = "none";
}
 function c5() {
  document.getElementById("5box").style.display = "none";
} 
function c6() {
  document.getElementById("6box").style.display = "none";
}
function c7() {
  document.getElementById("7box").style.display = "none";
}
 function c8() {
  document.getElementById("8box").style.display = "none";
}
 function c9() {
  document.getElementById("9box").style.display = "none";
}


        function gproceed() {
     
            
       
     if (document.getElementById("gtotal").innerHTML==0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
           document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("gform").submit();
     }
 }

     function vproceed() {
     
            
       
     if (document.getElementById("vtotal").innerHTML ==0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
           document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("vform").submit();
     }
 }


 function rproceed() {
     
            
       
     if (document.getElementById("rtotal").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
         document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("rform").submit();
     }
 }
  
  
  

 function proceed0() {
     
            
       
     if (document.getElementById("0total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
          document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("0form").submit();
     }
 }
  

 function proceed1() {
     
            
       
     if (document.getElementById("1total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
          document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("1form").submit();
     }
 }
    
 function proceed2() {
     
            
       
     if (document.getElementById("2total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
        
     
                 document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 

         document.getElementById("2form").submit();
     }
 }

  
 function proceed3() {
     
            
       
     if (document.getElementById("3total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
           document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("3form").submit();
     }
 }
        
 function proceed4() {
     
            
       
     if (document.getElementById("4total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
           document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("4form").submit();
     }
 }
   
 function proceed5() {
     
            
       
     if (document.getElementById("5total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
          document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("5form").submit();
     }
 }
 
 function proceed6() {
     
            
       
     if (document.getElementById("6total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
          document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("6form").submit();
     }
 }
 
 function proceed7() {
     
            
       
     if (document.getElementById("7total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
          document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("7form").submit();
     }
 }
 
 function proceed8() {
     
            
       
     if (document.getElementById("8total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
         document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("8form").submit();
     }
 }
 
  function proceed9() {
     
            
       
     if (document.getElementById("9total").innerHTML == 0) {
        
         var x = document.getElementById("copied");
         x.className = "show";
         setTimeout(function () {
             x.className = x.className.replace("show", "");
         }, 3000);

     }else{
         console.log("submit");
         document.getElementById('snackbar').innerHTML='success';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
         document.getElementById("9form").submit();
     }
 }
 

 
    </script>
    <style>
     .flt {
    position: fixed;
      top: 514px;
    right: 4px;
    width: 39px;
    font-size: 17px;
    height: 39px;
    border-color: #f37e21;
    color: #f37e21;
    background-color: #fff !important;
    border-radius: 50%;
}

        .flt2{
    position: fixed;
    top: 465;
    right: 4px;
     width: 39px;
    font-size: 17px;
    height: 39px;
    border-color: #f37e21;
    color: #f37e21;
    background-color: #fff !important;
    border-radius: 50%;
}
    
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
        
.loader-wrapper {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  
  display:flex;
  justify-content: center;
  align-items: center;
}


     
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}


    </style>
</head>

<body style="font-size: 36px;"><script><strong>We're sorry but default doesn't work properly without JavaScript
            enabled. Please enable it to continue.</strong></script>
            
    <div data-v-6437971e="" class="win">
        <div data-v-b74b9dc6="" class="mine_top"><div data-v-b74b9dc6=""  class="mine_info"><p data-v-b74b9dc6="" class="balance" >Available balance: $<span style="font-size:18px;" id="balancetop" ></span></p><div data-v-b74b9dc6="" class="mine_info_btn"><div data-v-b74b9dc6="" class="btn"><button data-v-b74b9dc6="" onclick="location.href='recharge'" class="one_btn" style="background:#2196f3!important;">Recharge</button><button onclick="location.href='tend'" data-v-b74b9dc6="" id=""class="one_btn" style="color:black !important;background:white !important;">Trend</button></div><div data-v-b74b9dc6="" onclick = "location.reload()" class="refresh"><img data-v-b74b9dc6="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxNjozNzowOCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTY6Mzg6MTkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTY6Mzg6MTkrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6M2IwNzljZTEtNGFmNi1kYTRh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" alt=""></div></div></div></div>

        <div style="display:none;" id="date"></div>

        <div data-v-6437971e="" class="main">
           <marquee style="color:red;"><b><?php echo $notice?></b></marquee>   <ul data-v-6437971e="" class="main_nav">
                <li data-v-6437971e="" onclick="window.location.href='win'" style="display:;" class="active">
                  ⚡Sapre
                </li>
              
                  <li data-v-6437971e=""  onclick="window.location.href='win1'" style="display:;" class="" >🚀 Fast Parity
                </li> 
              <!--     <li data-v-6437971e=""  onclick="window.location.href='win2'"class="" style="display:;"  >-->
              <!--Bcone-->
              <!--  </li>-->
              <!--<li data-v-6437971e=""  onclick="window.location.href='win3'"class="" style="display:;"  >-->
              <!--       Emred-->
              <!--  </li> -->

            </ul>
            <div data-v-6437971e="" class="center_text">
            <ul data-v-6437971e="" class="center_top">

<li data-v-6437971e="" class="left_li">
    <ol data-v-6437971e="" class="top_ol"><img data-v-6437971e=""
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADF0lEQVRoQ+1aO2gUURQ9Nx8mYCfYiR+w0EbsTMD4qyVqwA/aGBG7FUdm3jYBYxOYeS+OmE6IBoL4Az9gk8L4BbVSUlkIiXY2dkKEZK9MSGR8O7PzdXeKmXLn3nvOub/d91hCwse2bU5oWqiZlJKSBExk5AeqhCRJZwubqiJRySl9a3WKYM6Oa3KnSkjRKc0Zr6pIzgQW7h5akbDd3alZSsqlElJ4b0QETFORTwD2BON0dXVtdRzne/CzsrRWvV7f0mg0vmm6P/utdQfAOU3IoOM470oqZF+j0XirCZn2hQgAjvbikZTyZBmF2Lb9EMAJjW+dhBBDzPxMb1EiOu+6rl+t1acMrSWEGGHm2yFcj66eRyzLek1E+zWDX8x8RCn1qgxCLMs6SETPAWwI8mTmN0qpA+tCjhPR45DFsUBEV1zXfdrJigghjjHzdQDbdY7MPKyUevL3hGjb9n0ApyK2oD9cg+1auRpOK+wHUsrTvv1fIUKIfmZ+3yGymWCJaMB13Q//CFmblb1EdAvA7kyR2+c0z8wXlVIf1yGbLh9M09zY09NzE8DZ9vFKhXR3eXn5kud5P4NekbcolmVdBXA4ZJulQi3K2N9OAOaUUtfCYsZeB5mmuaO7u/vQmqjVwWrXw8z+AppbWVl56Xne11a4sUKCzrZtLwDY1iYhi1LKpnUbhZ1KSNQ36/8Qpv+yiMNIJaRWqxl9fX1f2lCVxaWlpZ2Tk5O/4wREbq04R38JENFYnF2e98w8FjXUhbTWehAhhMfMl/OQjSREdMN1XTNt7FStpQ1+0zkmLXiI/bSUciRLnMxCfLCwQ1kWEr4PM08ppS5k9c8lxAe1LOsMEY0C2JWFBDPPMrM3MTExm8U/87CHgdVqtU2GYYwS0TCAzQkJvWDme0qpqYT2Lc1yVyQY3V/PhmEMEFE/gAEAQxr6PICZ3t7emfHx8R9FCCi0ImGEwtZ0lrWaVGyhFQmCVkKSlkCzqyoSl7iqteIyFPG+aq24xFWtFZehqrVaZKjoa9Skf9cIo5Rr2CshEVWuKhK8xM6yLMrUWn8AMZSO49QGBtUAAAAASUVORK5CYII="
            alt=""><span data-v-6437971e="">Period</span></ol>
    <ol data-v-6437971e=""class="bot_ol">
    <?php echo  $perio?> 
    </ol>
</li>
<li data-v-6437971e="" class="right_li">
    <ol data-v-6437971e="" class="top_ol"><span data-v-6437971e="">Count Down</span></ol>
    <ol data-v-6437971e="" class="bot_ol">
        <div data-v-6437971e=""  id="count" style="display: none;" class="countdown">
            <div data-v-6437971e="" id="demo" class="van-count-down">
              
            </div>
        </div>
        <div data-v-6437971e="" id="con" class="ol_btn" ><button data-v-6437971e=""
                class="grayback" style="background:#ff9800 !important;color:#fff !important;">
                Continue
            </button></div>
    </ol>
</li>
            </div>
            <div data-v-6437971e=""   class="btn_center">
                    <button data-v-6437971e="  " id="green" class="back_one" >
                        Join Green
                    </button>
                    <div id="vio"> <button data-v-6437971e="" id="voilet"  onclick="vio()" class="back_two" class="vio">
                        Join Violet
                    </button></div>
                       <button data-v-6437971e="" id="redbutton" class="back_three">
                        Join Red
                    </button>
                   
                 
                </div>
                <ul data-v-b74b9dc6="" class="center_notes"><li data-v-b74b9dc6="">
                    <ol id="num0" onclick="num0()" style="background: linear-gradient(to right bottom, rgb(156, 39, 176) 50%, rgb(244, 67, 54) 50%);

" data-v-b74b9dc6="" class="">
            0
          </ol></li><li data-v-b74b9dc6=""><ol id="num1" style="background: rgb(76, 175, 80);

" onclick="num1()" data-v-b74b9dc6="" class="">
            1
          </ol></li><li data-v-b74b9dc6=""><ol id="num2" style=" background: rgb(244, 67, 54);   

" onclick="num2()" data-v-b74b9dc6="" class="">
            2
          </ol></li><li data-v-b74b9dc6=""><ol id="num3" style="background: rgb(76, 175, 80)

" onclick="num3()" data-v-b74b9dc6="" class="">
            3
          </ol></li><li data-v-b74b9dc6=""><ol id="num4" style="background: rgb(244, 67, 54)    

" onclick="num4()" data-v-b74b9dc6="" class="">
            4
          </ol></li><li data-v-b74b9dc6=""><ol  id="num5" style="background: linear-gradient(to right bottom, rgb(156, 39, 176) 50%, rgb(76, 175, 80) 50%);

" onclick="num5()" data-v-b74b9dc6="" class="">
            5
          </ol></li><li data-v-b74b9dc6=""><ol id="num6" style="background: rgb(244, 67, 54) 

" onclick="num6()" data-v-b74b9dc6="" class="">
            6
          </ol></li><li data-v-b74b9dc6=""><ol id="num7" style="background: rgb(76, 175, 80)

" onclick="num7()" data-v-b74b9dc6="" class="">
            7
          </ol></li><li data-v-b74b9dc6=""><ol id="num8" style="background: rgb(244, 67, 54)    

" onclick="num8()" data-v-b74b9dc6="" class="">
            8
          </ol></li><li data-v-b74b9dc6=""><ol id="num9" style="background: rgb(76, 175, 80)

" onclick="num9()" data-v-b74b9dc6="" class="">
            9
          </ol></li></ul>
            <div data-v-6437971e="" class="nav_content">
                <div data-v-6437971e="" class="content">
  <!--               <a target="blank" href="https://telegram.me/diamondclubmall"><button type="button" class="flt">-->
  <!--  <i style="color:#27dfd7;" class="fa fa-headphones" ></i>-->
  <!--  <img style="width:90%;" src="telegram.png">-->
    <!--<p style="font-size: 12px; margin-top: -4px;">Contact</p>-->
  <!--  <br>-->
  <!--</button> </a>-->
  <!-- <a target="blank" href="https://www.youtube.com/"><button type="button" class="flt2">-->
  <!--  <i style="color:#27dfd7;" class="fa fa-headphones" ></i>-->
  <!--  <img style="width:90%;" src="youtube.png">-->
    <!--<p style="font-size: 12px; margin-top: -4px;">Contact</p>-->
    
  <!--</button> </a>-->
                    <div data-v-6437971e="" class="content_con">
                        <div data-v-6437971e="" class="content_title"><img data-v-6437971e=""
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADF0lEQVRoQ+1aO2gUURQ9Nx8mYCfYiR+w0EbsTMD4qyVqwA/aGBG7FUdm3jYBYxOYeS+OmE6IBoL4Az9gk8L4BbVSUlkIiXY2dkKEZK9MSGR8O7PzdXeKmXLn3nvOub/d91hCwse2bU5oWqiZlJKSBExk5AeqhCRJZwubqiJRySl9a3WKYM6Oa3KnSkjRKc0Zr6pIzgQW7h5akbDd3alZSsqlElJ4b0QETFORTwD2BON0dXVtdRzne/CzsrRWvV7f0mg0vmm6P/utdQfAOU3IoOM470oqZF+j0XirCZn2hQgAjvbikZTyZBmF2Lb9EMAJjW+dhBBDzPxMb1EiOu+6rl+t1acMrSWEGGHm2yFcj66eRyzLek1E+zWDX8x8RCn1qgxCLMs6SETPAWwI8mTmN0qpA+tCjhPR45DFsUBEV1zXfdrJigghjjHzdQDbdY7MPKyUevL3hGjb9n0ApyK2oD9cg+1auRpOK+wHUsrTvv1fIUKIfmZ+3yGymWCJaMB13Q//CFmblb1EdAvA7kyR2+c0z8wXlVIf1yGbLh9M09zY09NzE8DZ9vFKhXR3eXn5kud5P4NekbcolmVdBXA4ZJulQi3K2N9OAOaUUtfCYsZeB5mmuaO7u/vQmqjVwWrXw8z+AppbWVl56Xne11a4sUKCzrZtLwDY1iYhi1LKpnUbhZ1KSNQ36/8Qpv+yiMNIJaRWqxl9fX1f2lCVxaWlpZ2Tk5O/4wREbq04R38JENFYnF2e98w8FjXUhbTWehAhhMfMl/OQjSREdMN1XTNt7FStpQ1+0zkmLXiI/bSUciRLnMxCfLCwQ1kWEr4PM08ppS5k9c8lxAe1LOsMEY0C2JWFBDPPMrM3MTExm8U/87CHgdVqtU2GYYwS0TCAzQkJvWDme0qpqYT2Lc1yVyQY3V/PhmEMEFE/gAEAQxr6PICZ3t7emfHx8R9FCCi0ImGEwtZ0lrWaVGyhFQmCVkKSlkCzqyoSl7iqteIyFPG+aq24xFWtFZehqrVaZKjoa9Skf9cIo5Rr2CshEVWuKhK8xM6yLMrUWn8AMZSO49QGBtUAAAAASUVORK5CYII="
                                alt="">
                            <p data-v-6437971e="">  Sapre Record</p>
                        
                        </div>
                        <div data-v-6437971e="" class="parity">
                                  <div id="ansrec" > </div>  





                        </div>
                    </div>
                    <a href="bets"> <div data-v-6437971e="" class="content_con">
                        <div data-v-6437971e="" class="content_title"><img data-v-6437971e=""
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB6ElEQVRoQ+2asUoDQRCGZyBPYKeV1r6EPoKgQsBGIYKN1Y1CGrU7bg4uYGvAxiCm8Q2Sh7ASCytLsRNygZGDPTkuF3PLJZtzs6nCMMPONzP7J3t7CJZ80BIOcCB16+TMjniet1OHpMMwHP6Vx1QQIroAgDMA2KwDiIi8AkAvDMObonwKQYioCwAndQAoyOGQmft5+wRIu91ej+P4o6YQSVrvzLw1EyTZE4g4SB1F5LoOUIj4m4eI7Ob3zERHikCmzaUpQM/zrhxIdrRcR+Y0e2608qpVNFqqSqcAMBiPx60oir6TBmTsG7oNEZFuo9Hwfd9/y8YutCNE9AIA22rBO2ZuJd9zdl2WxP+cmW9NgvQAoKkWPGbmewWStWuDIOJeEATPJkGaIrKPiMNsBYkota/pUiBifzQa9TqdzpcxEN0kq/gvdI9USUw31oGUkV/dqlbxdx0p05GMOs1VteI4foyi6NOYahHREwAcqAUvmTlQvyNZu/ZEIeJREAQPDiStQNmDlTWjpT0zFQKcapVRrQoF1g51HVmpjixKtYz/jSciaw5Wdhx1rXn4oK2hFQKc/K6U/FaYFO1QN1pWXPRYc/Wmjqv//zI03YlWXE/nDv7/+4UBbY1ccsDMVziWnF/p5R1I6VIZcvwBChr8Ue16BMAAAAAASUVORK5CYII="
                                alt="">
                            <p data-v-6437971e="">My Record</p>
                            
                        </div></a>
                        <div data-v-b74b9dc6="" id="mybet" class="parity">
    
                   
                </div>
                <div id="copied">Minimum Bet $ 10</div>
                
                <div data-v-405e9a63="" data-v-6437971e="" class="footer">
              
                    <ul data-v-405e9a63="" class="nav_foot">
                <li data-v-405e9a63=""onclick="window.location.href='indexlogin'" class=""><img data-v-405e9a63=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToxOTozOCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzE6NDErMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzE6NDErMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NmY2M2YzNjUtMzkyZS1mMzRj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"
                        alt=""><span data-v-405e9a63="">Home</span></li>
                        	<li data-v-405e9a63="" onclick="window.location.href='/api/ok'"  class="">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAXCAYAAADgKtSgAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB6klEQVR4nO1Uv2tUQRB+RpQIYgpBIYgpBAuRgAhiIWgTghJRhAMhhQpy4skdzvft3Tuw2FSaMr3kDxAFIZ11LIIhXSIW/igihEAIRkUlgadMnDuW574XzlYHBt7OfN+3szuzL0n+Wy9Wr9cPkDydpunRWJ7kkOYV15MwgOMAlkj+JJkBAMlqx22dWX5R8TuKViqV3SSnjdSrP/be95VVfC8Aa8Vfi8QAfMrnAdwtE38ZgK9Xq9U9JGcjwusAbtr1fAtys2Xicx2giFxKkmQXgBcR8RWSlwGMk/wSxOcKxVut1hEAywb8TvKDfX+ObLCqJwjWy8ovqnqM5EXn3DDJjYD0huRJAAsWe+S930vyebDZhvIAXAUw+oc4yQltkIicBTBCctPEZ7QinQZb3zb8lAlvGv6CnhbAg5j4diUA1kie0IYFszwfVPkDwCvLZdbYU8Fpn8XEt+/X/KO9wImy2QbgnXPHrMGd+LvYU89yxKV2u33QOXcfwGTeNd5sNgcBvM9tmqVpOhA281xBdWnhaP3mPYzxROR8FyQidyKg1yKyr0y8VqvtB/A2wq11Qc65K7kr2RKRM2XCQWE6XVs58WtdgP5wADwJHs+tpAcjecN4yn+qP8AY6NBOV1Fk3vv+RqNx+G+4yb9lvwCpYwtfJTXi8gAAAABJRU5ErkJggg==">
							    <span data-v-405e9a63="">Games</span></li>
                    <li data-v-405e9a63="" onclick="window.location.href='search'"class=""><img data-v-405e9a63=""
                        src="data:image/png;base64,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"
                        alt=""><span data-v-405e9a63="">Search</span></li>
                <li data-v-405e9a63="active" onclick="window.location.href='win'" class=""><img data-v-405e9a63=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADCElEQVRoQ+2aO2gUURSGv5MEA9oJduIDLLQROxMwvmqJGvCBNkaiklkNmsKd1UBik51pElndCYoxgSBGBR9gk8KoiaBWSioLIdHOxi5CwOyV2aBmdmczszOz2S1mup055z/n/8+5Z+ZeVvB7WYbyaxqpnaaLHzxfRnmgmIgfPVewiStSSpyab61qJRiy4wrdpWqLOCbirkBckYg7IzSce0XcZne1hoLPXGIioXvBL0AZFfkE7HLg1rOZC/p3x71aaa07xiYW+Vagw2dhyBhBccbxQNFCQn9Xk0Syxh6EaUduwqiQNa4imE6G8gQtebwmiVjmY1DHCoRPCpbZCupFccvKWbTkyL/7tdBaltkO6r5LroeX9iNZ4y3C3gKW8+TUIS6l3tTEfuRWej918hJhXUGeUyT0fUtEhtJHUfK0iKliFpFutOTzqn2T2VPLMo+g1ADC1qIcRbXRmXr2f4domeOgTrhPRTUN0uJ3YkZrt1JseYSWPGnHW06kCdT7aJOoNJo0oyU/OInYv27376ZO7oLsrHQK4fDVDDl1novXPv7FKT58uDewnoWFDCKnwwWrkLdSD2hs7KKj++fyCKVPUYbMXnLqYNE0q1B+nrCKKepkks7kDTdb7+OgbHobdXIAxUEgv7BW8RpHmCSnXpNIfV0prjeR5d6WMQtsWSUic2h68bgtEbxMIqXerJWgVvBl4RGiPCKZTCMNv76sQlXm+L12O11dC34lKo9I/ivA7EWpPr8BAtmJ9JVa1KXwyidiI1nGIHA5UJLeTjfR9CveZk6LYERsjGx6BBHnPqbc6IX2So2SSLUHgQlOJHoyw2h6RxAStk84IkttdgroAXYETGICYZBOfSKgf94tPBEbJdO/gXrpAWlD2OgrIeEVOXlIIjnsyz7S8esV0R7PMt9MgzShVDNIq9NFzaBkjDWLY5y7/sMLrpzn0VTELaLbmA4wVv2SiYl4KhVXxFMiV4O4tTx1i1vLU6K4tYJJFLdWMN3CTa2oD7Z9/l3DjWpMJK9KXJES6yBuLfgDD0c21e428DwAAAAASUVORK5CYII="
                        alt=""><span data-v-405e9a63="">win</span></li>
                <li data-v-405e9a63="" onclick="window.location.href='me'" class=""><img data-v-405e9a63=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToyMDoyNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzI6MzcrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzI6MzcrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6YTc0MTM1YzQtMzMwNi05YzQ2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"
                        alt=""><span data-v-405e9a63="">My</span></li>
            </ul>
                </div>


                
                 <div  style="display: none;" id="red">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background: #f44336;">Join Red</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="5" onclick="selr(5)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="6"onclick="selr(6)"  >100</li>
                    <li data-v-36d08a7e="" id ="7"onclick="selr(7)">1000</li>
                    <li data-v-36d08a7e=""id ="8"onclick="selr(8)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(rin)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="rin" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(rin)"
                        class="van-stepper__plus"></button></div>
                          <form id="rform" method="post" action="option">
                            <input type="hidden" id="rper" name="period" value="000000" >
                            <input type="hidden"  name="ans" value="red" >
                            <input type="hidden" type="text" id="rfamount" name="amount" value="10" >
                        </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="rtotal" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  id="close3"data-v-36d08a7e="">CANCEL</button><button
                    data-v-36d08a7e="" onclick="rproceed()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>
             
                
                <div  style="display: none;" id="greenbox">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background: rgb(76, 175, 80);">Join Green</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="1" onclick="sel(1)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="2"onclick="sel(2)"  >100</li>
                    <li data-v-36d08a7e="" id ="3"onclick="sel(3)">1000</li>
                    <li data-v-36d08a7e=""id ="4"onclick="sel(4)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(gin)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="gin" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(gin)"
                        class="van-stepper__plus"></button></div>
                          <form id="gform" method="post" action="option">
                            <input type="hidden" id="per" name="period" value="000000" >
                            <input type="hidden"  name="ans" value="green" >
                            <input type="hidden" type="text" id="gfamount" name="amount" value="10" >
                        </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="gtotal" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  id="close"data-v-36d08a7e="">CANCEL</button><button
                    data-v-36d08a7e="" onclick="gproceed()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>
             
      
       
                
                <div  style="display: none;"  id="viobox">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background: rgb(156, 39, 176);">Join Violet</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="9" onclick="selv(9)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="10"onclick="selv(10)"  >100</li>
                    <li data-v-36d08a7e="" id ="11"onclick="selv(11)">1000</li>
                    <li data-v-36d08a7e=""id ="12"onclick="selv(12)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(vin)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="vin" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(vin)"
                        class="van-stepper__plus"></button></div>
                            <form id="vform" method="post" action="option">
                                            <input type="hidden" id="vper" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="violet" >
                                            <input type="hidden" type="text" id="vfamount" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="vtotal" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  id="close1"data-v-36d08a7e="">CANCEL</button><button
                    data-v-36d08a7e="" onclick="vproceed()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>
             
                             <div  style="display: none;"  id="0box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 0</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="13" onclick="sel0(13)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="14"onclick="sel0(14)"  >100</li>
                    <li data-v-36d08a7e="" id ="15"onclick="sel0(15)">1000</li>
                    <li data-v-36d08a7e=""id ="16"onclick="sel0(16)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in0)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in0" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in0)"
                        class="van-stepper__plus"></button></div>
                            <form id="0form" method="post" action="option">
                                            <input type="hidden" id="per0" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="0" >
                                            <input type="hidden" type="text" id="famount0" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="0total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c0()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed0()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>
           
           
                        
                             <div  style="display: none;"  id="1box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 1</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="17" onclick="sel1(17)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="18"onclick="sel1(18)"  >100</li>
                    <li data-v-36d08a7e="" id ="19"onclick="sel1(19)">1000</li>
                    <li data-v-36d08a7e=""id ="20"onclick="sel1(20)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in1)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in1" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in1)"
                        class="van-stepper__plus"></button></div>
                            <form id="1form" method="post" action="option">
                                            <input type="hidden" id="per1" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="1" >
                                            <input type="hidden" type="text" id="famount1" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="1total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c1()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed1()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>    
       
           
                    
                             <div  style="display: none;"  id="2box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 2</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="21" onclick="sel2(21)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="22"onclick="sel2(22)"  >100</li>
                    <li data-v-36d08a7e="" id ="23"onclick="sel2(23)">1000</li>
                    <li data-v-36d08a7e=""id ="24"onclick="sel2(24)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in2)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in2" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in2)"
                        class="van-stepper__plus"></button></div>
                            <form id="2form" method="post" action="option">
                                            <input type="hidden" id="per2" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="2" >
                                            <input type="hidden" type="text" id="famount2" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="2total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c2()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed2()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>
       
                    
                             <div  style="display: none;"  id="3box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 3</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="25" onclick="sel3(25)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="26"onclick="sel3(26)"  >100</li>
                    <li data-v-36d08a7e="" id ="27"onclick="sel3(27)">1000</li>
                    <li data-v-36d08a7e=""id ="28"onclick="sel3(28)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in3)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in3" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in3)"
                        class="van-stepper__plus"></button></div>
                            <form id="3form" method="post" action="option">
                                            <input type="hidden" id="per3" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="3" >
                                            <input type="hidden" type="text" id="famount3" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="3total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c3()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed3()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>
       
                    
                             <div  style="display: none;"  id="4box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 4</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="29" onclick="sel4(29)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="30"onclick="sel4(30)"  >100</li>
                    <li data-v-36d08a7e="" id ="31"onclick="sel4(31)">1000</li>
                    <li data-v-36d08a7e=""id ="32"onclick="sel4(32)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in4)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in4" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in4)"
                        class="van-stepper__plus"></button></div>
                            <form id="4form" method="post" action="option">
                                            <input type="hidden" id="per4" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="4" >
                                            <input type="hidden" type="text" id="famount4" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="4total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c4()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed4()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>
       
                    
                             <div  style="display: none;"  id="5box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 5</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="33" onclick="sel5(33)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="34"onclick="sel5(34)"  >100</li>
                    <li data-v-36d08a7e="" id ="35"onclick="sel5(35)">1000</li>
                    <li data-v-36d08a7e=""id ="36"onclick="sel5(36)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in5)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in5" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in5)"
                        class="van-stepper__plus"></button></div>
                            <form id="5form" method="post" action="option">
                                            <input type="hidden" id="per5" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="5" >
                                            <input type="hidden" type="text" id="famount5" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="5total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c5()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed5()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>

                         
                             <div  style="display: none;"  id="6box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 6</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="37" onclick="sel6(37)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="38"onclick="sel6(38)"  >100</li>
                    <li data-v-36d08a7e="" id ="39"onclick="sel6(39)">1000</li>
                    <li data-v-36d08a7e=""id ="40"onclick="sel6(40)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in6)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in6" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in6)"
                        class="van-stepper__plus"></button></div>
                            <form id="6form" method="post" action="option">
                                            <input type="hidden" id="per6" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="6" >
                                            <input type="hidden" type="text" id="famount6" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="6total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c6()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed6()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>

                             
                             <div  style="display: none;"  id="7box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 7</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="41" onclick="sel7(41)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="42"onclick="sel7(42)"  >100</li>
                    <li data-v-36d08a7e="" id ="43"onclick="sel7(43)">1000</li>
                    <li data-v-36d08a7e=""id ="44"onclick="sel7(44)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in7)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in7" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in7)"
                        class="van-stepper__plus"></button></div>
                            <form id="7form" method="post" action="option">
                                            <input type="hidden" id="per7" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="7" >
                                            <input type="hidden" type="text" id="famount7" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="7total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c7()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed7()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>   
 <div data-v-1f39f91d="" class="notice_zz" id="notice" style="display: none;">
            <div data-v-1f39f91d="" class="wrapper" style="max-height: 70vh;">
                <p data-v-1f39f91d="" class="tz_title">Rule</p>
                <p data-v-1f39f91d="" class="tz_info">3 minutes and 1 issue ,Open all the day , total trade available is 480 issues 2 minutes and 30 secs to Order and 30 sec to show the Win Results If you spend 100 rupees to trade, after deducting 2 rupees service fee, your contract amount is 98 rupees:
JOIN GREEN if the result shows 1,3,7,9, you will get (98*2) 196 rupees
JOIN RED if the result shows 2,4,6,8, you will get (98*2) 196 rupees; If the result shows 0, you will get (98*1.5) 147 rupees
JOIN VOILETif the result shows 0 or 5, you will get (98*4.5) 441 rupees
Select NUMBERif the result is the same as the number you selected, you will get (98*9) 882 rupees</p>
                <div data-v-1f39f91d="" class="tz_close"><button data-v-1f39f91d="" id="x">CLOSE</button></div>
            </div>
        </div>
            
                         
                             <div  style="display: none;"  id="8box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 8</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="45" onclick="sel8(45)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="46"onclick="sel8(46)"  >100</li>
                    <li data-v-36d08a7e="" id ="47"onclick="sel8(47)">1000</li>
                    <li data-v-36d08a7e=""id ="48"onclick="sel8(48)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in8)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input  type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in8" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in8)"
                        class="van-stepper__plus"></button></div>
                            <form id="8form" method="post" action="option">
                                            <input type="hidden" id="per8" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="8" >
                                            <input type="hidden" type="text" id="famount8" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="8total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c8()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed8()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>
           
                        
                             <div  style="display: none;"  id="9box">
                <div data-v-26b1e4cf=""   class="branch"></div>    
       <div data-v-36d08a7e="" class="agree_zz" style="">
        <div data-v-36d08a7e="" class="wrapper">
        <p data-v-36d08a7e="" class="branch_title" style="background:rgb(33, 150, 243) ;">Join 9</p>
        <div data-v-36d08a7e="" class="branch_content">
            <p data-v-36d08a7e="" class="money">Contract Money</p>
            <div data-v-36d08a7e="" class="choose_money">
                <ul data-v-36d08a7e="">
                    <li data-v-36d08a7e=""id ="49" onclick="sel9(49)" class="active">10</li>
                     <li data-v-36d08a7e="" id ="50"onclick="sel9(50)"  >100</li>
                    <li data-v-36d08a7e="" id ="51"onclick="sel9(51)">1000</li>
                    <li data-v-36d08a7e=""id ="52"onclick="sel9(52)"  >10000</li>
                </ul>
            </div>
            <p data-v-36d08a7e="" class="money">Number</p>
            <div data-v-36d08a7e="" class="stepper">
                <div data-v-36d08a7e="" class="van-stepper"><button type="button" onclick="minus(in9)" 
                        class="van-stepper__minus van-stepper__minus--disabled"></button><input type="number"
                  min="1"
                  step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                  title="Numbers only"
                        role="spinbutton" inputmode="decimal" id="in9" value="1" aria-valuemax="Infinity" aria-valuemin="1"
                        aria-valuenow="1" class="van-stepper__input"><button type="button" onclick="plus(in9)"
                        class="van-stepper__plus"></button></div>
                            <form id="9form" method="post" action="option">
                                            <input type="hidden" id="per9" name="period" value="000000" >
                                            <input type="hidden"  name="ans" value="9" >
                                            <input type="hidden" type="text" id="famount9" name="amount" value="10" >
                            </form>
            </div>
            <p data-v-36d08a7e="" class="money">Total contract money is <span id="9total" data-v-36d08a7e="">10</span></p>
            <div data-v-36d08a7e="" class="agree_box">
                <div data-v-36d08a7e="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
                    <div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked"><i
                            class="van-icon van-icon-success"
                            style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                            <!---->
                        </i></div><span class="van-checkbox__label">I agree <span data-v-36d08a7e=""
                            class="greencolor">PRESALE RULE</span></span>
                </div>
            </div>
            <div data-v-36d08a7e=""  class="close_btn"><button  data-v-36d08a7e="" onclick="c9()">CANCEL</button><button
                    data-v-36d08a7e="" onclick="proceed9()" style="color: rgb(0, 137, 123);">CONFIRM</button></div>
        </div>
    </div>
    </div>
</div>
</div>

         <div id="snackbar" class="van-toast van-toast--middle van-toast--text" style="z-index: 2009;display:none "><div class="van-toast__text">OTP SENT</div></div>       
                <div id="dvLoading" align="center"></div>

   
   
               

              

                <script>
                 $(window).on("load",function(){
                
  
          
        });
        
             
    
   
           
                    function func() {
                      
    
                var countDownDate = Date.parse(new Date) / 1e3;
  var now = new Date().getTime();
  var distance = 120 - countDownDate % 120;
  //alert(distance);
  var i = distance / 60,
   n = distance % 60,
   o = n / 10,
   s = n % 10;
  var minutes = Math.floor(i);
  var seconds = ('0'+Math.floor(n)).slice(-2);
  var sec1= (seconds%100-seconds%10)/10;
var sec2=seconds%10;
  document.getElementById("demo").innerHTML = "<span data-v-6437971e='' class='span'>0</span><span data-v-6437971e=''class='span'>"+Math.floor(minutes)+"</span><span data-v-6437971e=''>:</span><p data-v-6437971e=''><span data-v-6437971e='' class='span'>"+sec1+"</span><span data-v-6437971e='' class='span'>"+sec2+"</span></p> ";

var diff=distance;
console.log(distance);
                     
                  
                        if(diff<30){ 
                            console.log("Timeout");
                            document.getElementById("green").setAttribute("disabled", true);
                            document.getElementById("redbutton").setAttribute("disabled", true);
                           
                           
                            document.getElementById("red").style.display="none";
                            document.getElementById("greenbox").style.display="none";
                            document.getElementById("viobox").style.display="none";
                            document.getElementById("0box").style.display="none";
                            document.getElementById("1box").style.display="none";
                            document.getElementById("2box").style.display="none";
                            document.getElementById("3box").style.display="none";
                            document.getElementById("4box").style.display="none";
                            document.getElementById("5box").style.display="none";
                            document.getElementById("6box").style.display="none";
                            document.getElementById("7box").style.display="none";
                            document.getElementById("8box").style.display="none";
                            document.getElementById("9box").style.display="none";
                            
                           
                             document.getElementById("green").className="back_one btn_active";
                             document.getElementById("voilet").onclick = null;
                             document.getElementById("voilet").className="back_two btn_active";
                          
                           
                             
                            document.getElementById("redbutton").className="back_three btn_active";
                            document.getElementById("num0").className="btn_active";
                            document.getElementById('num0').onclick = null;
                            document.getElementById("num1").className="btn_active";
                            document.getElementById('num1').onclick = null;
                            document.getElementById("num2").className="btn_active";
                            document.getElementById('num2').onclick = null;
                            document.getElementById("num3").className="btn_active";
                            document.getElementById('num3').onclick = null;
                            document.getElementById("num4").className="btn_active";
                            document.getElementById('num4').onclick = null;
                            document.getElementById("num5").className="btn_active";
                            document.getElementById('num5').onclick = null;
                            document.getElementById("num6").className="btn_active";
                            document.getElementById('num6').onclick = null;
                            document.getElementById("num7").className="btn_active";
                            document.getElementById('num7').onclick = null;
                            document.getElementById("num8").className="btn_active";
                            document.getElementById('num8').onclick = null;
                            document.getElementById("num9").className="btn_active";
                            document.getElementById('num9').onclick = null;
                             
                      
                       
                        }


                      
                     

                     
                         if (diff==0) {
                           
                            location.reload();
                            
                        }
                           if(diff==115){
                              location.reload();
                            
                    }
                       
                        document.getElementById("per").value =    <?php echo  $perio?> ;
                        document.getElementById("rper").value =    <?php echo  $perio?> ;
                        document.getElementById("vper").value =    <?php echo  $perio?> ;
                        document.getElementById("per1").value =    <?php echo  $perio?> ;
                        document.getElementById("per2").value =    <?php echo  $perio?> ;
                        document.getElementById("per3").value =    <?php echo  $perio?> ;
                        document.getElementById("per4").value =    <?php echo  $perio?> ;
                        document.getElementById("per5").value =    <?php echo  $perio?> ;
                        document.getElementById("per6").value =    <?php echo  $perio?> ;
                        document.getElementById("per7").value =    <?php echo  $perio?> ;
                        document.getElementById("per8").value =    <?php echo  $perio?> ;
                        document.getElementById("per9").value =    <?php echo  $perio?> ;
                        document.getElementById("per0").value =    <?php echo  $perio?> ;
              
                    }

                    func();
                    var interval = setInterval(func, 1000);

                      var modal = document.getElementById("greenbox");
 
    
    // Get the button that opens the modal


    
  



   
    var span = document.getElementById("close");



    var span3 = document.getElementById("close3");
    var span1 = document.getElementById("close1");
    
    document.getElementById("redbutton").onclick = function () {
        console.log("red")
        document.getElementById("red").style.display = "";
    } 
      span3.onclick = function () {
        document.getElementById("red").style.display = "none";
    }
         span1.onclick = function () {
        document.getElementById("viobox").style.display = "none";
    }
   

 
    document.getElementById("green").onclick = function () {
        modal.style.display = "";
    }
    span.onclick = function () {
        modal.style.display = "none";
    }
    document.getElementById("icon").onclick = function () {
        document.getElementById("notice").style.display = "";
    }
    document.getElementById("x").onclick = function () {
        document.getElementById("notice").style.display = "none";
    }
      
    






                </script>
                 
               

</body>

</html>