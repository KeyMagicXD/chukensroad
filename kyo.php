<?php
$ard=array("https://www.w3schools.com1/",
  "https://www.w3schools.com2/",
  "https://www.w3schools.com3/",
  "https://www.w3schools.com4/",
 "https://www.w3schools.com5/");
 
 
$random_keys=array_rand($ard);
echo $ard[$random_keys];
$krd=$ard[$random_keys];


?>
<a href="<?php echo $krd; ?>"> hello bb</a>