<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
?>
<html lang="en" style="font-size: 37.5px;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="/logo.png">
    <?php include 'head.php';?>
    <link href="css/app.46643acf.css" rel="preload" as="style">
    <link href="css/chunk-vendors.cf06751b.css" rel="preload" as="style">
  
    <link href="js/chunk-vendors.824d6eef.js" rel="preload" as="script">
    <link href="css/chunk-vendors.cf06751b.css" rel="stylesheet">
    <link href="css/app.46643acf.css" rel="stylesheet">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4341204199150790"
     crossorigin="anonymous"></script>
     <style>
         .mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 700px;
  position: relative;
  margin: auto;
}
     </style>
</head>

<body style="font-size: 36px;"><noscript><strong>We're sorry but default doesn't work properly without JavaScript
            enabled. Please enable it to continue.</strong></noscript>
    <div data-v-68d7bcd4="" class="indexs">
        <div data-v-68d7bcd4="" class="web_show">
             <div data-v-68d7bcd4="" class="logo_box"><img data-v-68d7bcd4="" src="/logo.png" alt=""></div>
            <span data-v-68d7bcd4="">Open with an app</span>
              <div data-v-68d7bcd4="" class="download_box"><a data-v-68d7bcd4="" target="_self" href="app.apk"
                    download="app.apk" style="color: rgb(78, 78, 78); font-size: 16px;"><img data-v-68d7bcd4=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABYklEQVRoQ+3a3RGCMAwA4HQJh9AldAmf6SSek5Rnl9AldAiXqJcT7zi1JW0S4CC8eRd+voQWGnSwkM0txAEG6VfSe3/lVDaEcODsj/uKVKSD7Csv5maQXuasIn/GiN1aNkZsjCTmV5t+34mx50j/BrHniD1HficMGyOkMeK938YYN5Q3WufcCQCqX1FijGfieZ4hhMe/2OxgRwwAXABgRzmRYswdAI4pBGk9MgPMIIIEwaAJMSQEGTIRhowogoyMKUIUQ0bCFCOqIMqYKkQ1RAlTjWBBhDEsBBsihGEjRCBMjAhCDFKJEUOIQgoxoghxCBEjjlCBDGBUEGqQBEYNoQr5wuDP7HoCAzibSBcldwHdEgByiyIO4LOvOkTiIinHMAglS2PGrKMiTdNgm2c2W9u2ybbRUDsIPzvX9qukE5DtSBpEOt2E41lFsDHH+msGIctFIbmvv+uYfovSNXHwYiryAhi53DPcFIGeAAAAAElFTkSuQmCC"
                        alt=""></a></div>
           
        </div>
        <div data-v-68d7bcd4="" class="index_title">
            <p data-v-68d7bcd4="" class="top_title">Welcome Back </p>
            <p data-v-68d7bcd4="" class="bot_title">Quality Guarantee</p>
            
            
        </div>
         <div data-v-68d7bcd4="" class="swiper_box" >
            <div data-v-68d7bcd4="" style="height:550px;!important" class="my-swipe van-swipe">
                <div class="van-swipe__track">
           
                <div class="slideshow-container">

<div class="mySlides fade" style="width: 100%;height: 90%;">
 
  <img src="slide1.jpg" style="height: 100%;width:100%">
 
</div>
<div class="mySlides fade" style="width: 100%;height: 90%;">
 
  <img src="slide2.jpg" style="height: 100%;width:100%">
 
</div>

<div class="mySlides fade" style="width: 100%;height: 90%;">
 
  <img src="slide3.jpg" style="height: 100%;width:100%">
 
</div>
<div class="mySlides fade" style="width: 100%;height: 90%;">
 
  <img src="slide4.jpg" style="height: 100%;width:100%">
 
</div>


</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 

</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
           
                </div>
            </div>
        </div>
       
        <a href="login"><div data-v-68d7bcd4="" class="index_list">
            <div data-v-68d7bcd4="" class="list_content">
                <ul data-v-68d7bcd4="" class="list_ul">
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/51iEBQzCL5L._UL1500_.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Joyalukkas 18k (750) Rose Gold
                                and Solitaire Pendant for Girls</div>
                            <p data-v-68d7bcd4="" class="price">$ 38576.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/71JvL64Y3cL._UY695_.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Ratnavali Jewels American
                                Diamond Traditional Fashion Jewellery Green Necklace Pendant Set with Earring for
                                Women/Girls RV2916G</div>
                            <p data-v-68d7bcd4="" class="price">$ 2899.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/71YWzTc2omL._UY695_.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Swasti Jewels Heart Shape
                                Fashion Jewellery Set Pendant Earrings for Women</div>
                            <p data-v-68d7bcd4="" class="price">$ 4559.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/4.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Om Jewells Rhodium Plated Blue
                                Crystal Jewellery Combo of Designer Drop Pendant Set with Adjustable Bangle Kada and
                                Adjustable Solitaire Finger Ring for Girls and Women CO1000209</div>
                            <p data-v-68d7bcd4="" class="price">$ 1599.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/5.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Sukkhi Gleaming Pearl Gold
                                Plated Wedding Jewellery Kundan Peacock Meenakari Multi-String Necklace Set for Women
                                (2191NGLDPP1560)</div>
                            <p data-v-68d7bcd4="" class="price">$ 1745.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/6.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Ananth Jewels 925 Sterling
                                Silver BIS Hallmarked Heart Bracelet for Women</div>
                            <p data-v-68d7bcd4="" class="price">$ 9000.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/7.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Handicraft Kottage ® 1gm 22Ct
                                Gold Plated Pendant and Chain for Men/Women/Girls</div>
                            <p data-v-68d7bcd4="" class="price">$ 999.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/8.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Mansiyaorange Combo of Two Party
                                One Gram Gold Forming Long Haram and Choker Multi Color Jewellery Necklace/Juelry/jwelry
                                Set Jewellery for Women</div>
                            <p data-v-68d7bcd4="" class="price">$ 3199.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/9.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Young &amp; Forever Fashion
                                Jewellery Elite Rose Gold Plated Geometric Shape Stud Earring Pendant Set for Women
                                Princess Length Delicate Chain Cubic Zirconia Necklace Set for Girls Jewelry</div>
                            <p data-v-68d7bcd4="" class="price">$ 4450.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/10.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Ratnavali Jewels American
                                Diamond Cz Gold Plated Necklace Set Tennis Necklace Single Line Solitaire Set With Chain
                                &amp; Earring For Women</div>
                            <p data-v-68d7bcd4="" class="price">$ 4000.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/11.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">chandrika pearls gems &amp;
                                jewellers Sania Mirza Style Without Piercing Clip on Pressing Type Nose Ring for Women
                                &amp; Girls</div>
                            <p data-v-68d7bcd4="" class="price">$ 278.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/12.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Chandrika Pearls Gems &amp;
                                Jewellers Sterling Silver Pendant Earring with Swarovski Crystal for Girls</div>
                            <p data-v-68d7bcd4="" class="price">$ 1060.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/13.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Chandrika Pearls Gems &amp;
                                Jewellers 92.5 Sterling Silver Real Diamond Valentine Crown King Queen Ring for Girls
                                &amp; Women</div>
                            <p data-v-68d7bcd4="" class="price">$ 1920.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/14.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Chandrika Pearls Gems &amp;
                                Jewellers 925 Pure Sterling Silver Letters Initial Pendant with Gold Polish (R)</div>
                            <p data-v-68d7bcd4="" class="price">$ 476.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/15.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Chandrika Pearls Gems &amp;
                                Jewellers Dhanteras Brass Hindu Puja Camphor Burner Lamp Panch Aarti - 5 Face For Puja
                            </div>
                            <p data-v-68d7bcd4="" class="price">$ 1880.00</p>
                        </ol>
                    </li>
                    <li data-v-68d7bcd4="" class="list_li">
                        <ol data-v-68d7bcd4="">
                            <div data-v-68d7bcd4="" class="list_img_box">
                                <div data-v-68d7bcd4="" class="list_img"
                                    style="background-image: url(&quot;/uploads/images/16.jpg&quot;);">
                                </div>
                            </div>
                            <div data-v-68d7bcd4="" class="van-multi-ellipsis--l3 info">Jewels Galaxy Designer American
                                Diamond Gold Plated Bangles for Women/Girls</div>
                            <p data-v-68d7bcd4="" class="price">$ 1999.00</p>
                        </ol>
                    </li>
                </ul>
            </div></a>
        </div>
        <div data-v-405e9a63="" data-v-68d7bcd4="" class="footer">
            <ul data-v-405e9a63="" class="nav_foot">
                <li data-v-405e9a63="" onclick="window.location.href='indexlogin'" class="active"><img data-v-405e9a63=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToxOTo1NiswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzI6MDErMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzI6MDErMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTA3NDZiNTEtZDg5Yi1jODQxLTk1ZWQtOGZiZmVkM2YyNTRmIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjUwNzQ2YjUxLWQ4OWItYzg0MS05NWVkLThmYmZlZDNmMjU0ZiIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjUwNzQ2YjUxLWQ4OWItYzg0MS05NWVkLThmYmZlZDNmMjU0ZiI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NTA3NDZiNTEtZDg5Yi1jODQxLTk1ZWQtOGZiZmVkM2YyNTRmIiBzdEV2dDp3aGVuPSIyMDIwLTA3LTA2VDExOjE5OjU2KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PtIT3QUAAAPESURBVGiB7drNi1V1GAfwz3PunRlpiMwXgjJRKpI0AnWVi7RSAqHcSBCJ0qIQIxslqLSFEKmoBSEG0q6/wqWtahO90SaIkILCRdCbM9acp8W548zozJ37qpfJL1zuuff3PM/v+z3n93t+bycy02JAcasJ9AqLRkg9zp2gFmRJ/EMUTA43fgep+oYykQw1fk+MUxuufCrD6pON6xqyXGsyVsniZ4UfKsfJRuwZzbpeY3iIv8ereNHgNBUrZsSHnKguixH0/4ncRRwQPlbkq1jar4rq/QqMVdJb0vPCcnIFRmUcx4+9rqxfQh4V+ba0C0sa/y0j9wl3SyfwRS8r7IeQx/EGds1RNkzuxh04hYu9qrSXQoZVIo4KTzW1jNip6i/H8Ckmuq28V519BFvJU2RzEdPYgvexw3Tz6xi9ErIDp4lNbXlFrMcZPNctgS6FJOwl3iMecS3Jt4wQ8QDexYFr41UH6KaPFGojB0W8TK7rKk7Eg8o8bPzqUpzWQZ/pVMg9SgdFbS95b4cxZiNzrbIcE7ECH+BSO+7tC0nrlA5J+8ihtv2bIWI5XsdyVSL4slXX9oSETTgkvdCWX9vIPbhT1cw+w+RCHq0KqeMxEceF7Z0TbAOZu2SuxBGVmKb9ppWsVWAzzpI3R8QUIrYQH2KbBbi2ImQ7eZbc3BNy7SKsF05hdzOzhYS8KJzERv2dKTdDDRuIY9g/n1EzcmMNx4d6TKxTPIw3VXO0kyhnFs4hJJcJr0hjWNl/fm1htUrMMHmOuDxVULPzaYrQELiG2msUR1TpbxAxQmwVWSe+F7XfmPlEwv3K+juyeKkxhxpgJDE0Vq068yhxqa4Ss5raR9gx+CIaqDYu9uA+YX8d25TOY82t5NUx0pMyL9TxOZ5VpbmZmaCmzA2KOGMwOv1lZR5WxLdmT1kKTNbxO765wa1MUqkHy9AeYUL6WplfVclpNuYeECsRdYzOa3PzUWBUqlcbhTcWTiNVjWvQ+/scPGcPiJndivgXf2C8BdslqrGqs6nP1HZrY3k8HaTsWgT8iQsiLmreJEuZT+AZ3Wyjpop3EQ0hkz1rSyOqJ3K+BduNDfvukJhM9dlTrx4hs2y6I9KHw6X+ZaT5yPbphKy/qfV60n085huUMaJr9H/Vd5MOWxfNE7ktZNBwW8ig4X8lZLiNeCOqlWYrqGlvrtWUx0LjSIFfVSdRrQwIV3GlNV6u4Bet3aho8Jj3xjcT0nhfIj4RRrWwta+6wz+1YAffqZbZrSyla9Jf5Ix3OK4je/s1pwHDohHyH44t+FftlNSAAAAAAElFTkSuQmCC"
                        alt=""><span data-v-405e9a63="">Home</span></li>
                        	<li data-v-405e9a63="" onclick="window.location.href='/api/ok'"  class="">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAXCAYAAADgKtSgAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB6klEQVR4nO1Uv2tUQRB+RpQIYgpBIYgpBAuRgAhiIWgTghJRhAMhhQpy4skdzvft3Tuw2FSaMr3kDxAFIZ11LIIhXSIW/igihEAIRkUlgadMnDuW574XzlYHBt7OfN+3szuzL0n+Wy9Wr9cPkDydpunRWJ7kkOYV15MwgOMAlkj+JJkBAMlqx22dWX5R8TuKViqV3SSnjdSrP/be95VVfC8Aa8Vfi8QAfMrnAdwtE38ZgK9Xq9U9JGcjwusAbtr1fAtys2Xicx2giFxKkmQXgBcR8RWSlwGMk/wSxOcKxVut1hEAywb8TvKDfX+ObLCqJwjWy8ovqnqM5EXn3DDJjYD0huRJAAsWe+S930vyebDZhvIAXAUw+oc4yQltkIicBTBCctPEZ7QinQZb3zb8lAlvGv6CnhbAg5j4diUA1kie0IYFszwfVPkDwCvLZdbYU8Fpn8XEt+/X/KO9wImy2QbgnXPHrMGd+LvYU89yxKV2u33QOXcfwGTeNd5sNgcBvM9tmqVpOhA281xBdWnhaP3mPYzxROR8FyQidyKg1yKyr0y8VqvtB/A2wq11Qc65K7kr2RKRM2XCQWE6XVs58WtdgP5wADwJHs+tpAcjecN4yn+qP8AY6NBOV1Fk3vv+RqNx+G+4yb9lvwCpYwtfJTXi8gAAAABJRU5ErkJggg==">
							    <span data-v-405e9a63="">Games</span></li>
                         <li data-v-405e9a63="" onclick="window.location.href='searc'"class=""><img data-v-405e9a63=""
                        src="data:image/png;base64,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"
                        alt=""><span data-v-405e9a63="">Search</span></li>
                        	<li data-v-405e9a63="" onclick="window.location.href='win'" class=""><img data-v-405e9a63=""
						src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADF0lEQVRoQ+1aO2gUURQ9Nx8mYCfYiR+w0EbsTMD4qyVqwA/aGBG7FUdm3jYBYxOYeS+OmE6IBoL4Az9gk8L4BbVSUlkIiXY2dkKEZK9MSGR8O7PzdXeKmXLn3nvOub/d91hCwse2bU5oWqiZlJKSBExk5AeqhCRJZwubqiJRySl9a3WKYM6Oa3KnSkjRKc0Zr6pIzgQW7h5akbDd3alZSsqlElJ4b0QETFORTwD2BON0dXVtdRzne/CzsrRWvV7f0mg0vmm6P/utdQfAOU3IoOM470oqZF+j0XirCZn2hQgAjvbikZTyZBmF2Lb9EMAJjW+dhBBDzPxMb1EiOu+6rl+t1acMrSWEGGHm2yFcj66eRyzLek1E+zWDX8x8RCn1qgxCLMs6SETPAWwI8mTmN0qpA+tCjhPR45DFsUBEV1zXfdrJigghjjHzdQDbdY7MPKyUevL3hGjb9n0ApyK2oD9cg+1auRpOK+wHUsrTvv1fIUKIfmZ+3yGymWCJaMB13Q//CFmblb1EdAvA7kyR2+c0z8wXlVIf1yGbLh9M09zY09NzE8DZ9vFKhXR3eXn5kud5P4NekbcolmVdBXA4ZJulQi3K2N9OAOaUUtfCYsZeB5mmuaO7u/vQmqjVwWrXw8z+AppbWVl56Xne11a4sUKCzrZtLwDY1iYhi1LKpnUbhZ1KSNQ36/8Qpv+yiMNIJaRWqxl9fX1f2lCVxaWlpZ2Tk5O/4wREbq04R38JENFYnF2e98w8FjXUhbTWehAhhMfMl/OQjSREdMN1XTNt7FStpQ1+0zkmLXiI/bSUciRLnMxCfLCwQ1kWEr4PM08ppS5k9c8lxAe1LOsMEY0C2JWFBDPPMrM3MTExm8U/87CHgdVqtU2GYYwS0TCAzQkJvWDme0qpqYT2Lc1yVyQY3V/PhmEMEFE/gAEAQxr6PICZ3t7emfHx8R9FCCi0ImGEwtZ0lrWaVGyhFQmCVkKSlkCzqyoSl7iqteIyFPG+aq24xFWtFZehqrVaZKjoa9Skf9cIo5Rr2CshEVWuKhK8xM6yLMrUWn8AMZSO49QGBtUAAAAASUVORK5CYII="
						alt=""><span data-v-405e9a63="">Win</span></li>
               
               
                <li data-v-405e9a63="" onclick="window.location.href='login'" class=""><img data-v-405e9a63=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToyMDoyNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzI6MzcrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzI6MzcrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6YTc0MTM1YzQtMzMwNi05YzQ2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"
                        alt=""><span data-v-405e9a63="">My</span></li>
            </ul>
        </div>
    </div>
    <script src="js/chunk-vendors.824d6eef.js"></script>
 

       
      </body>

</html>