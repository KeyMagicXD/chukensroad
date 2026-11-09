<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
 require_once "config.php";

                       

                       
$query =  "SELECT * FROM beconebetrec ORDER BY id DESC";


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
$query = "SELECT *FROM beconebetrec ORDER BY id DESC LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) {  
    $dataRow = $dataRow."
    
    <tr data-v-b74b9dc6=''><td data-v-b74b9dc6=''>$row2[1]</td><td data-v-b74b9dc6=''>$row2[3]</td><td data-v-b74b9dc6='' style='color: $row2[4];'>
    $row2[2]
                  </td><td data-v-b74b9dc6=''><span data-v-b74b9dc6=''  style='background:$row2[4];'></span>
                  <span data-v-b74b9dc6='' style='background: $row2[5];'></span></td></tr>

";
    
}
    echo  '  <table data-v-b74b9dc6=""><thead data-v-b74b9dc6=""><tr data-v-b74b9dc6=""><th data-v-b74b9dc6="">Period</th><th data-v-b74b9dc6="">Price</th><th data-v-b74b9dc6="">Number</th><th data-v-b74b9dc6="">Result</th></tr><tr data-v-b74b9dc6="" style="border: 0px; width: 100%; display: none;"><th data-v-b74b9dc6="" colspan="4" style="height: 0px; line-height: 0;"><div data-v-b74b9dc6="" class="table_loading"><div data-v-b74b9dc6="" class="v-progress-linear__bar"><div data-v-b74b9dc6="" class="
    v-progress-linear__bar__indeterminate
    v-progress-linear__bar__indeterminate--active
  "><div data-v-b74b9dc6="" class="
      v-progress-linear__bar__indeterminate
      long
      primary
    "></div><div data-v-b74b9dc6="" class="
      v-progress-linear__bar__indeterminate
      short
      primary
    "></div></div></div></div></th></tr></thead><tbody data-v-b74b9dc6="">
'. $dataRow.'</tbody></table>
<div data-v-b74b9dc6="" class="pagination"><ul data-v-b74b9dc6="" class="page_box"><li data-v-b74b9dc6="" class="page"><span data-v-b74b9dc6="">'.(1+($spage-1)*10).'-'.($spage*10).'</span> of '.$number_of_page.'
              </li><li data-v-b74b9dc6="" class="page_btn">';
              if ( $spage ==1 ) {  
    echo'<a href="#"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow-left"><!----></i></a><a href="win?page='.($spage+1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow"><!----></i></a></li></ul></div>';
} else {  
     echo'<a href="win?page='.($spage-1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow-left"><!----></i></a><a href="win?page='.($spage+1).'"><i data-v-b74b9dc6="" class="van-icon van-icon-arrow"><!----></i></a></li></ul></div>';
}  
             





?>
