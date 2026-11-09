<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
 require_once "config.php";

 

                    

                       
$query =  "SELECT * FROM vipbetting ORDER BY id DESC";


// result for method two 
$result = mysqli_query($conn, $query);


$dataRow = "";
$number_of_result = mysqli_num_rows($result);  
$results_per_page = 10;  

  
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

//determine which page number visitor is currently on  
if (!isset ($_GET['srpage']) ) {  
    $srpage = 1;  
} else {  
    $srpage = $_GET['srpage'];  
}  
 
//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($srpage-1) * $results_per_page;  

//retrieve the selected results from database   
$query = "SELECT *FROM vipbetting WHERE username='".$_SESSION['username']."' ORDER BY id DESC LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query);



  
//display the retrieved result on the webpage  

  
while ($row2 = mysqli_fetch_array($result)) { 
    if($row2[6]=='fail'){
        $status1="red";
$add =($row2[4]-(5/100)*$row2[4]);        
$amount="-$add";
 }elseif($row2[6]=='success'){
     $status1="green";
     if($row2[3]==$row2[9]){
         $add=($row2[4]-(5/100)*$row2[4])*9;
     }elseif($row2[3]==$row2[10]){
         if($row2[12]=='violet'){
            $add=($row2[4]-(5/100)*$row2[4])*1.5;   
         }else{
           $add=($row2[4]-(5/100)*$row2[4])*2;  
         }
     }elseif($row2[3]==$row2[12]){
          $add=($row2[4]-(5/100)*$row2[4])*3;
     }
     $amount="+$add";
 }
    $dataRow = $dataRow."
 
<uni-view data-v-4d2589ba='' class='period-item'>
       <uni-view data-v-4d2589ba='' class='period-header'>
        <uni-view data-v-4d2589ba='' class='left'>
            <uni-text data-v-4d2589ba='' class='money'><span>$row2[2]</span>
            </uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba='' class='center'>
            <uni-text data-v-4d2589ba='' class='money color-$status1'><span>$row2[6]</span>
            </uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba='' class='center'>
            <uni-text data-v-4d2589ba='' class='money color-$status1'><span>$amount</span>
            </uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba='' class='right'>
            <uni-view data-v-4d2589ba='' class='icon-wrapper'>
                <uni-text data-v-4c782b3f='' data-v-4d2589ba='' class='uni-icons icon'
                    style='color: rgb(51, 51, 51); font-size: 20px;'><span><img style='height: 30px;'
                            src='home/down.png'></span>
                </uni-text>
            </uni-view>
        </uni-view>
    </uni-view>
  
    <uni-view data-v-4d2589ba='' style='display:none;' class='period-content'>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='detail'><span>Period Detail</span></uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='title'><span>Period</span></uni-text>
            <uni-text data-v-4d2589ba='' class='value'><span>$row2[2]</span></uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='title'><span>Contract Money</span></uni-text>
            <uni-text data-v-4d2589ba='' class='value'><span>$row2[4]</span></uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='title'><span>Delivery</span></uni-text>
            <uni-text data-v-4d2589ba='' class='value'><span>".($row2[4]-(5/100)*$row2[4])."</span></uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='title'><span>Fee</span></uni-text>
            <uni-text data-v-4d2589ba='' class='value'><span>".((5/100)*$row2[4])."</span></uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='title'><span>Result</span></uni-text>
            <uni-view data-v-4d2589ba='' class='value result'>
                <uni-text data-v-4d2589ba='' class='value'><span>$row2[9]</span></uni-text>
                <uni-view data-v-4d2589ba='' class='color-wrapper'>
                    <!---->
                    <uni-view data-v-4d2589ba='' class='shape-circle $row2[12]'></uni-view>
                    <uni-view data-v-4d2589ba='' class='shape-circle $row2[10]'></uni-view>
                    
                </uni-view>
            </uni-view>
        </uni-view>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='title'><span>Select</span></uni-text>
            <!---->
            <!---->
            <uni-text data-v-4d2589ba='' class='value'><span>$row2[3]</span></uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='title'><span>Status</span></uni-text>
            <uni-text data-v-4d2589ba='' class='value color-$status1'><span>$row2[6]</span></uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='title'><span>Amount</span></uni-text>
            <uni-text data-v-4d2589ba='' class='value color-$status1'><span>$amount</span></uni-text>
        </uni-view>
        <uni-view data-v-4d2589ba=''>
            <uni-text data-v-4d2589ba='' class='title'><span>Create time</span></uni-text>
            <uni-text data-v-4d2589ba='' class='value'><span>$row2[7]</span></uni-text>
        </uni-view>
    </uni-view>
</uni-view>";
    
}
  
             
             
echo' 
       '. $dataRow.'';
        
  if ( $srpage ==1 ) {  
    echo'
    <uni-view data-v-4cd42de6="" data-v-4d2589ba="" class="uni-pagination">
    <uni-view data-v-4cd42de6=""
        class="uni-pagination__btn uni-pagination--disabled">
        <uni-text data-v-4c782b3f="" data-v-4cd42de6=""  class="uni-icons"
            style="color: rgb(0, 0, 0); font-size: 20px;"><a href="#"><span><img
                    style="height: 30px;" src="home/left.png"></span></a></uni-text>
    </uni-view>
    <uni-view data-v-4cd42de6="" class="uni-pagination__num">
        <uni-view data-v-4cd42de6="" class="uni-pagination__num-current">
            <uni-text data-v-4cd42de6="" class="uni-pagination__num-current-text"
                style="color: rgb(0, 122, 255);"><span>'.$srpage.'</span></uni-text>
            <uni-text data-v-4cd42de6="" class="uni-pagination__num-current-text">
                <span>/'.$number_of_page.'</span>
            </uni-text>
        </uni-view>
    </uni-view>
    <uni-view data-v-4cd42de6=""
        class="uni-pagination__btn uni-pagination--enabled">
        <uni-text data-v-4c782b3f="" data-v-4cd42de6=""  class="uni-icons"
            style="color: rgb(0, 0, 0); font-size: 20px;"><a href="/win3?srpage='.($srpage+1).'"><span><img
                    style="height: 30px;" src="home/aa.png"></span></a></uni-text>
    </uni-view>
    </uni-view>';
} else {  
     echo'
     <uni-view data-v-4cd42de6="" data-v-4d2589ba="" class="uni-pagination">
     <uni-view data-v-4cd42de6=""
         class="uni-pagination__btn uni-pagination--enabled">
         <uni-text data-v-4c782b3f="" data-v-4cd42de6="" class="uni-icons"
             style="color: rgb(0, 0, 0); font-size: 20px;"><a href="win3?srpage='.($srpage-1).'"><span><img
                     style="height: 30px;" src="home/left.png"></span></a></uni-text>
     </uni-view>
     <uni-view data-v-4cd42de6="" class="uni-pagination__num">
         <uni-view data-v-4cd42de6="" class="uni-pagination__num-current">
             <uni-text data-v-4cd42de6="" class="uni-pagination__num-current-text"
                 style="color: rgb(0, 122, 255);"><span>'.$srpage.'</span></uni-text>
             <uni-text data-v-4cd42de6="" class="uni-pagination__num-current-text">
                 <span>/'.$number_of_page.'</span>
             </uni-text>
         </uni-view>
     </uni-view>
     <uni-view data-v-4cd42de6=""
         class="uni-pagination__btn uni-pagination--enabled">
         <uni-text data-v-4c782b3f=""  data-v-4cd42de6="" class="uni-icons"
             style="color: rgb(0, 0, 0); font-size: 20px;"><a href="win3?srpage='.($srpage+1).'"><span><img 
                     style="height: 30px;" src="home/aa.png"></span></a></uni-text>
     </uni-view>
     </uni-view>';
}  
                  echo'  </div>
                  <script>
                           var coll = document.getElementsByClassName("period-header");
var i;
console.log("hii");

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    console.log("hii");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
      console.log("hii");
    } else {
      console.log("hii");
      content.style.display = "block";
    }
  });
}
    
                  </script>';




?>
