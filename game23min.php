


<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'selimdem_selimxpro');
define('DB_PASSWORD', 'selimdem_selimxpro');
define('DB_NAME', 'selimdem_selimxpro');
// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}


$sql3 = "SELECT period,nxt FROM beconeperiod WHERE id='1'";
$result3 =$conn->query($sql3);
$row3 = mysqli_fetch_assoc($result3);
$period=$row3['period'];
$next=$row3['nxt'];
echo"$next <br>";

if($next==11){
     $opt1="SELECT SUM(amount) as total1 FROM beconebetting WHERE ans='green' AND status='pending'";
$opt1res=$conn->query($opt1);
$sum1 = mysqli_fetch_assoc($opt1res);


$opt0="SELECT SUM(amount) as total0 FROM beconebetting WHERE ans='red' AND status='pending'";
$opt0res=$conn->query($opt0);
$sum0 = mysqli_fetch_assoc($opt0res);

   if($sum1['total1'] =="" AND $sum0['total0'] ==""){
        $num=rand(40000,50000);             
}
elseif($sum1['total1']> $sum0['total0']){
    $a=array("0","2","4","6","8");
$random_keys=array_rand($a,1);
$t= $a[$random_keys];
     $x=rand(40000,50000);
   $y= $x % 10;
  $num=($x-$y)+$t;
}elseif($sum1['total1']< $sum0['total0']){
    $a=array("1","3","5","7","9");
$random_keys=array_rand($a,1);
$t= $a[$random_keys];
     $x=rand(40000,50000);
   $y= $x % 10;
  $num=($x-$y)+$t;}
}else{
    $x=rand(40000,50000);
   $y= $x % 10;
  $num=($x-$y)+$next;
}

$price=$num;

$prices= $num % 10;
$ans=$prices;
   
if($prices==0 || $prices==5){
    $res1="violet";
} else
{ 
   $res1="";  
}
$e=$ans % 2;

if($e==0){
  $res='red';

}elseif($e==1){
 $res='green';
}

$exist="SELECT COUNT(*) as betnum FROM beconebetting WHERE status='pending'";
$existres=$conn->query($exist);
$exists= mysqli_fetch_assoc($existres);


if( $exists['betnum']==0){
   
$rec="INSERT INTO beconebetrec (period,ans,num,clo,res1) VALUES ($period,$ans,$num,'$res','$res1')";
$conn->query($rec);




}else{
    
    
$addwin00="UPDATE beconebetting SET res='fail',price=$num,number=$prices,color='$res',color2='$res1' WHERE period=$period ";
$conn->query($addwin00);




switch ($prices) {

  case "1":
    $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans=1";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
    }
    
    break;
  case "3":
    $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans=3";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
    }
      break;
  case "2":
    $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans=2";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
    }
    break;
  case "4":
   $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans=4";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
    }
    break;
  case "5":
    $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans=5";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
    }
    break;
  case "6":
    $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans=6";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
    }
    break;
  case "7":
    $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans=7";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
    }
    break;
  case "8":
    $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans=8";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
    }
    break;
  case "9":
    $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans=9";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
    }
    break;
  case "0":
    echo"zero";
    $bet0="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans='0'";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(5/100)*$fbets0)*9;
    $addwin0="UPDATE users SET balance= balance+$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE beconebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    $b1=(30/100)*((5/100)*$fbets0);
    $b2=(20/100)*((5/100)*$fbets0);
    $b3=(10/100)*((5/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET balance= balance +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r','$b1')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET balance= balance +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r1','$b2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET balance= balance +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner0','$r2','$b3')";
                $conn->query($recb2);
                
            }
        }
    }
 
   }
    break;
  default:
    echo "ERROR NO NUMBER FOUND";
}




if( $res=="red" && $res1=="" ){
    
echo"red";
$bet2="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans='$res'";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(5/100)*$fbets2)*2;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addwin12="UPDATE beconebetting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner2 AND period=$period AND ans='$res'";
$conn->query($addwin12);
    $b10=(30/100)*((5/100)*$fbets2);
    $b20=(20/100)*((5/100)*$fbets2);
    $b30=(10/100)*((5/100)*$fbets2);
    $uc0="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner2'";
    $ucc0=$conn->query($uc0);
    $getuc= mysqli_fetch_assoc($ucc0);
    $r0=$getuc['refcode'];
    $r10=$getuc['refcode1'];
    $r20=$getuc['refcode2'];
    if($r0!=""){
        $addb10="UPDATE users SET balance= balance +$b10 WHERE usercode='$r0'";
        $conn->query($addb10);
        $recb10="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner2','$r0','$b10')";
        $conn->query($recb10);
        if($r10!=""){
            $addb20="UPDATE users SET balance= balance +$b20 WHERE usercode='$r01'";
            $conn->query($addb20);
            $recb20="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner2','$r10','$b20')";
            $conn->query($recb20);
            if($r20!=""){
                $addb30="UPDATE users SET balance= balance +$b30 WHERE usercode='$r20'";
                $conn->query($addb30);
                $recb20="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner2','$r20','$b30')";
                $conn->query($recb20);
                
            }
        }
    }
}



}elseif( $res=="green" && $res1=="" ){

echo"green"; 
$bet3="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans='$res'";
$betres3=$conn->query($bet3);
while($row3 = mysqli_fetch_array($betres3)){
    
$winner3=$row3['username'];
$fbets3=$row3['amount']; 
$winamount3= ($fbets3-(5/100)*$fbets3)*2;
$addwin3="UPDATE users SET balance= balance+$winamount3 WHERE username=$winner3";
$conn->query($addwin3);
$addwin13="UPDATE beconebetting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner3 AND period=$period AND ans='$res'";
$conn->query($addwin13);
    $b10=(30/100)*((5/100)*$fbets3);
    $b20=(20/100)*((5/100)*$fbets3);
    $b30=(10/100)*((5/100)*$fbets3);
    $uc0="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner3'";
    $ucc0=$conn->query($uc0);
    $getuc= mysqli_fetch_assoc($ucc0);
    $r0=$getuc['refcode'];
    $r10=$getuc['refcode1'];
    $r20=$getuc['refcode2'];
    if($r0!=""){
        $addb10="UPDATE users SET balance= balance +$b10 WHERE usercode='$r0'";
        $conn->query($addb10);
        $recb10="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner3','$r0','$b10')";
        $conn->query($recb10);
        if($r10!=""){
            $addb20="UPDATE users SET balance= balance +$b20 WHERE usercode='$r01'";
            $conn->query($addb20);
            $recb20="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner3','$r10','$b20')";
            $conn->query($recb20);
            if($r20!=""){
                $addb30="UPDATE users SET balance= balance +$b30 WHERE usercode='$r20'";
                $conn->query($addb30);
                $recb20="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner3','$r20','$b30')";
                $conn->query($recb20);
                
            }
        }
    }

}

    }
if( $res=="green" && $res1=="violet"){

echo"green vio";
$bet4="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans='$res'";
$betres4=$conn->query($bet4);
while($row4 = mysqli_fetch_array($betres4)){
    $winner4=$row4['username'];

$fbets4=$row4['amount']; 
$winamount4= ($fbets4-(5/100)*$fbets4)*1.5;
$addwin4="UPDATE users SET balance= balance +$winamount4 WHERE username=$winner4";
$conn->query($addwin4);
$addwin14="UPDATE beconebetting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner4 AND period=$period AND ans='$res'";
$conn->query($addwin14);
    $b14=(30/100)*((5/100)*$fbets4);
    $b24=(20/100)*((5/100)*$fbets4);
    $b34=(10/100)*((5/100)*$fbets4);
    $uc4="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner4'";
    $ucc4=$conn->query($uc4);
    $getuc4= mysqli_fetch_assoc($ucc4);
    $r4=$getuc4['refcode'];
    $r14=$getuc4['refcode1'];
    $r24=$getuc4['refcode2'];
    if($r14!=""){
        $addb14="UPDATE users SET balance= balance +$b14 WHERE usercode='$r4'";
        $conn->query($addb14);
        $recb14="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner4','$r4','$b14')";
        $conn->query($recb14);
        if($r14!=""){
            $addb24="UPDATE users SET balance= balance +$b24 WHERE usercode='$r14'";
            $conn->query($addb24);
            $recb24="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner4','$r14','$b24')";
            $conn->query($recb24);
            if($r24!=""){
                $addb34="UPDATE users SET balance= balance +$b34 WHERE usercode='$r24'";
                $conn->query($addb34);
                $recb24="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner4','$r24','$b34')";
                $conn->query($recb24);
                
            }
        }
    }

}


$bet1="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans='violet'";
$betres1=$conn->query($bet1);
while($row1 = mysqli_fetch_array($betres1)){
    $winner1=$row1['username'];

$fbets1= $row1['amount'];
$winamount1= ($fbets1-(5/100)*$fbets1)*3;


$addwin1="UPDATE users SET balance= balance +$winamount1 WHERE username=$winner1";
$conn->query($addwin1);
$addwin11="UPDATE beconebetting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner1 AND period=$period AND ans='violet'";
$conn->query($addwin11);
    $b17=(30/100)*((5/100)*$fbets1);
    $b27=(20/100)*((5/100)*$fbets1);
    $b37=(10/100)*((5/100)*$fbets1);
    $uc7="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner1'";
    $ucc7=$conn->query($uc7);
    $getuc7= mysqli_fetch_assoc($ucc7);
    $r7=$getuc7['refcode'];
    $r17=$getuc7['refcode1'];
    $r27=$getuc7['refcode2'];
    if($r7!=""){
        $addb17="UPDATE users SET balance= balance +$b17 WHERE usercode='$r7'";
        $conn->query($addb1);
        $recb17="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner1','$r7','$b17')";
        $conn->query($recb17);
        if($r17!=""){
            $addb27="UPDATE users SET balance= balance +$b27 WHERE usercode='$r17'";
            $conn->query($addb27);
            $recb27="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner1','$r17','$b27')";
            $conn->query($recb27);
            if($r27!=""){
                $addb37="UPDATE users SET balance= balance +$b37 WHERE usercode='$r27'";
                $conn->query($addb37);
                $recb27="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner1','$r27','$b37')";
                $conn->query($recb27);
                
            }
        }
    }

    
}

}elseif($res=="red" && $res1=="violet"){
 
echo"red vio";
$bet5="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans='$res'";
$betres5=$conn->query($bet5);
while($row5 = mysqli_fetch_array($betres5)){
  $winner5=$row5['username'];

$fbets5=$row5['amount'] ;
$winamount5= ($fbets5-((5/100)*$fbets5))*1.5;
$addwin5="UPDATE users SET balance= balance+$winamount5 WHERE username='$winner5'";
$conn->query($addwin5);
$addwin15="UPDATE beconebetting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner5 AND period=$period AND ans='$res'";
$conn->query($addwin15);
    $b15=(30/100)*((5/100)*$fbets5);
    $b25=(20/100)*((5/100)*$fbets5);
    $b35=(10/100)*((5/100)*$fbets5);
    $uc5="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner5'";
    $ucc5=$conn->query($uc5);
    $getuc5= mysqli_fetch_assoc($ucc5);
    $r5=$getuc5['refcode'];
    $r15=$getuc5['refcode1'];
    $r25=$getuc5['refcode2'];
    if($r5!=""){
        $addb15="UPDATE users SET balance= balance +$b15 WHERE usercode='$r5'";
        $conn->query($addb15);
        $recb15="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner5','$r5','$b15')";
        $conn->query($recb15);
        if($r15!=""){
            $addb25="UPDATE users SET balance= balance +$b25 WHERE usercode='$r15'";
            $conn->query($addb25);
            $recb25="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner5','$r15','$b25')";
            $conn->query($recb25);
            if($r25!=""){
                $addb35="UPDATE users SET balance= balance +$b35 WHERE usercode='$r25'";
                $conn->query($addb35);
                $recb25="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner5','$r25','$b35')";
                $conn->query($recb25);
                
            }
        }
    }
      
}

$bet12="SELECT username,amount FROM beconebetting WHERE status='pending' AND ans='violet'";
$betres12=$conn->query($bet12);
while($row12 = mysqli_fetch_array($betres12)){
$winner12=$row12['username'];

$fbets12=$row12['amount'] ;
$winamount12= ($fbets12-(5/100)*$fbets12)*3;

$addwin12="UPDATE users SET balance= balance+$winamount12 WHERE username=$winner12";
$conn->query($addwin12);
$addwin112="UPDATE beconebetting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner12 AND period=$period AND ans='violet'";
$conn->query($addwin112);
    $b16=(30/100)*((5/100)*$fbets12);
    $b26=(20/100)*((5/100)*$fbets12);
    $b36=(10/100)*((5/100)*$fbets12);
    $uc6="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner12'";
    $ucc6=$conn->query($uc6);
    $getuc6= mysqli_fetch_assoc($ucc6);
    $r6=$getuc6['refcode'];
    $r16=$getuc6['refcode1'];
    $r26=$getuc6['refcode2'];
    if($r6!=""){
        $addb16="UPDATE users SET balance= balance +$b16 WHERE usercode='$r6'";
        $conn->query($addb16);
        $recb16="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner12','$r6','$b16')";
        $conn->query($recb16);
        if($r16!=""){
            $addb26="UPDATE users SET balance= balance +$b26 WHERE usercode='$r16'";
            $conn->query($addb26);
            $recb26="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner12','$r16','$b26')";
            $conn->query($recb26);
            if($r26!=""){
                $addb36="UPDATE users SET balance= balance +$b36 WHERE usercode='$r26'";
                $conn->query($addb36);
                $recb26="INSERT INTO bonus (giver,usercode,amount) VALUES ('$winner12','$r26','$b36')";
                $conn->query($recb26);
                
            }
        }
    }


}

    }










$rec="INSERT INTO beconebetrec (period,ans,num,clo,res1) VALUES ($period,$ans,$num,'$res','$res1')";
$conn->query($rec);

}

 





















$suc="UPDATE beconebetting SET status='sucessful' WHERE status='pending'";
$conn->query($suc);

$sql4 = "UPDATE beconeperiod SET period= period +'1',nxt='11' WHERE id='1'";
$conn->query($sql4);

$sql1="DELETE FROM beconebet WHERE id='1'";
$sql = "INSERT INTO beconebet (id) VALUES ('1')";
                
$conn->query($sql1);
 
                
$conn->query($sql);



$conn->close();
?>