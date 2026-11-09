<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
 require_once "config.php";

                       

                       
$query =  "SELECT * FROM vipbetrec ORDER BY id DESC";


// result for method two 
$result = mysqli_query($conn, $query);


$dataRow = "";
$number_of_result = mysqli_num_rows($result);  
$results_per_page = 10;  

  
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

//determine which page number visitor is currently on  
if (!isset ($_GET['spage']) ) {  
    $spage = 1;  
} else {  
    $spage = $_GET['spage'];  
}  
 
//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($spage-1) * $results_per_page;  

//retrieve the selected results from database   
$query = "SELECT *FROM vipbetrec ORDER BY id DESC LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) {
    if($row2[5]!=""){
        $vio=" <uni-view data-v-4d2589ba='' class='shape-circle violet'></uni-view>";
    } else {
        $vio="";
    } 
    $dataRow = $dataRow."
                  <uni-view data-v-4d2589ba='' class='record-item-wrapper'>
                  <uni-view data-v-4d2589ba='' class='left'>$row2[1]</uni-view>
                  <uni-view data-v-4d2589ba='' class='center'>$row2[3]</uni-view>
                  <uni-view data-v-4d2589ba='' class='center color-$row2[4]''>
                      <uni-text data-v-4d2589ba='' class='money'><span>$row2[2]</span></uni-text>
                  </uni-view>
                  <uni-view data-v-4d2589ba='' class='right'>
                      <uni-view data-v-4d2589ba='' class='color-wrapper'>
                           $vio
                          <uni-view data-v-4d2589ba='' class='shape-circle $row2[4]'></uni-view>
                      </uni-view>
                  </uni-view>
              </uni-view>

";
    
}
    echo  ' <uni-view data-v-4d2589ba="" class="record-item-wrapper record-item-header">
    <uni-view data-v-4d2589ba="" class="left">Period</uni-view>
    <uni-view data-v-4d2589ba="" class="center">Price</uni-view>
    <uni-view data-v-4d2589ba="" class="center">Number</uni-view>
    <uni-view data-v-4d2589ba="" class="right">Result</uni-view>
</uni-view>
'. $dataRow.'';
              if ( $spage ==1 ) {  
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
                style="color: rgb(0, 122, 255);"><span>'.$spage.'</span></uni-text>
            <uni-text data-v-4cd42de6="" class="uni-pagination__num-current-text">
                <span>/'.$number_of_page.'</span>
            </uni-text>
        </uni-view>
    </uni-view>
    <uni-view data-v-4cd42de6=""
        class="uni-pagination__btn uni-pagination--enabled">
        <uni-text data-v-4c782b3f="" data-v-4cd42de6=""  class="uni-icons"
            style="color: rgb(0, 0, 0); font-size: 20px;"><a href="/win3?spage='.($spage+1).'"><span><img
                    style="height: 30px;" src="home/aa.png"></span></a></uni-text>
    </uni-view>
    </uni-view>';
} else {  
     echo'
     <uni-view data-v-4cd42de6="" data-v-4d2589ba="" class="uni-pagination">
     <uni-view data-v-4cd42de6=""
         class="uni-pagination__btn uni-pagination--enabled">
         <uni-text data-v-4c782b3f="" data-v-4cd42de6="" class="uni-icons"
             style="color: rgb(0, 0, 0); font-size: 20px;"><a href="win3?spage='.($spage-1).'"><span><img
                     style="height: 30px;" src="home/left.png"></span></a></uni-text>
     </uni-view>
     <uni-view data-v-4cd42de6="" class="uni-pagination__num">
         <uni-view data-v-4cd42de6="" class="uni-pagination__num-current">
             <uni-text data-v-4cd42de6="" class="uni-pagination__num-current-text"
                 style="color: rgb(0, 122, 255);"><span>'.$spage.'</span></uni-text>
             <uni-text data-v-4cd42de6="" class="uni-pagination__num-current-text">
                 <span>/'.$number_of_page.'</span>
             </uni-text>
         </uni-view>
     </uni-view>
     <uni-view data-v-4cd42de6=""
         class="uni-pagination__btn uni-pagination--enabled">
         <uni-text data-v-4c782b3f=""  data-v-4cd42de6="" class="uni-icons"
             style="color: rgb(0, 0, 0); font-size: 20px;"><a href="win3?spage='.($spage+1).'"><span><img 
                     style="height: 30px;" src="home/aa.png"></span></a></uni-text>
     </uni-view>
     </uni-view>';
}  
             





?>


















                                   