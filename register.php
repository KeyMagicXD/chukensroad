<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: me");
    exit;
}

require_once "config.php";
$un=substr(trim($_POST["username"]),3);
$otp=trim($_POST["otp"]);
$query0 =  "SELECT  username FROM verify  WHERE otp='$otp' ORDER BY id DESC";
$result3 =$conn->query($query0);
$row3 = mysqli_fetch_assoc($result3);
$verun=$row3['username'];
if(true){
    

// Define variables and initialize with empty values
$username = $password =  "";
$username_err = $password_err =  "";

function genUserCode(){
    $str="AB1CDE2FG3HI4JK5LM6NO7PQ8RS9TU0VQXYZ".time();
    $str= str_split($str,1);
    $l = count($str);
    $user_code='';
    for($i=0;$i<8;$i++){
    $tn = rand(0,$l);
    $user_code.=$str[$tn];
    }
    
    return $user_code;
    
    }
$user_code = genUserCode();     
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(false){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = substr(trim($_POST["username"]),3);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                       header("location: login");
                } else{
                    $username = substr(trim($_POST["username"]),3);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    }else{
        $password = trim($_POST["password"]);
    }
    $refcode = trim($_POST["refcode"]);
    // Validate confirm password
   $sql3 = "SELECT refcode,refcode1 FROM users WHERE usercode='$refcode'";
   $result3 =$conn->query($sql3);
   $row3 = mysqli_fetch_assoc($result3);
   
       $refcode1=$row3['refcode'];
  
        $refcode2=$row3['refcode1'];
 
   
  $rip= getenv("REMOTE_ADDR") ;
    
    // Check input errors before inserting in database
    if(empty($username_err) ){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, refcode,usercode,refcode1,refcode2,balance,r_ip) VALUES (?,?,?,?,?,?,0,'$rip')";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password,$param_refcode,$param_usercode,$param_refcode1,$param_refcode2);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            $param_refcode = $refcode;
            $param_usercode = $user_code;
            $param_refcode1 = $refcode1;
            $param_refcode2 = $refcode2;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                //$addwin0="UPDATE users SET balance= balance +50 WHERE usercode=$refcode";
                $conn->query($addwin0);
                header("location:/login");
            } else{
             echo "<script>
     document.addEventListener('DOMContentLoaded', function(event) { 
     
                 document.getElementById('snackbar').innerHTML='Server Error Try Again';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
});
                
     
                </script>";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }else{
          echo "<script>
     document.addEventListener('DOMContentLoaded', function(event) { 
     
                 document.getElementById('snackbar').innerHTML='Already Registered';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
});
                
     
                </script>";
    }
    
    // Close connection
    mysqli_close($conn);
}
}else{
     echo "<script>
     document.addEventListener('DOMContentLoaded', function(event) { 
     
                 document.getElementById('snackbar').innerHTML='Maximum OTPs Reached';
          document.getElementById('snackbar').style.display= '';
        setTimeout(function () { document.getElementById('snackbar').style.display= 'none'; }, 3000);
 
});
                
     
                </script>";
}

?>
<html lang="en" style="font-size: 37.5px;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="icon.jpeg">
     <?php include 'head.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="css/app.46643acf.css" rel="preload" as="style">
    <link href="css/chunk-vendors.cf06751b.css" rel="preload" as="style">
    <link href="js/chunk-vendors.824d6eef.js" rel="preload" as="script">
    
    <link href="css/chunk-vendors.cf06751b.css" rel="stylesheet">
    <link href="css/app.46643acf.css" rel="stylesheet">
    
     <script>
function myFunction() {
  document.getElementById("number").value = "+91";
   document.getElementById("mimg").src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF62lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo0OToxNCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMTZUMTM6MjI6NTkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjI6NTkrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDRhYWM4MjAtOWE3MC02MzQ0LWJmMDQtMjViNDVjYjQwM2Y1IiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6MDJlNTNjMjYtMTE3OS0zYTQwLThjM2EtZTY5YzMyODNmOGYxIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6NTliZmRlZmQtYjQzZi04NzQ4LWIzOWYtYTUzYTZhM2Y0MTFmIj4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo1OWJmZGVmZC1iNDNmLTg3NDgtYjM5Zi1hNTNhNmEzZjQxMWYiIHN0RXZ0OndoZW49IjIwMjAtMDctMDdUMTY6NDk6MTQrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjQ0YWFjODIwLTlhNzAtNjM0NC1iZjA0LTI1YjQ1Y2I0MDNmNSIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyMjo1OSswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6d6mY/AAABXklEQVRoge2aoU4DQRCGvxKeAY0kIcGQoIuHoA5Vh8OSgOQqeQheAFQDnhoMCR6JrakEeYguybVc0pnpTTIJ8yUndrO3/3y53TO7g6ZpWMf93gTgDjhaO7g/3oCbi48z0eBt4aS3wLW1IiND4AsYSwZvCSetrNVsiDhXKrKvLKAGBh1PrZxHnCtdWlpqFktjla6+XvASAceiu7CIvANPfRfS4hQ41L6kFZkCx9oQJWPgBeUXlW72X6bK8VbUOVqRsKRINFIkGikSjRSJRopEI0WikSLRSJFopEg0UiQaKRKNFIlGikQjRaLxb0V2XKroIUd70HMJfAPP2iAFJyVHheXo7ao8ofA8DIXlk6ehZ5CnyCNw3mo/4HjxwOuvNWNZgtKeOeW5imj6N8ZL5IC/y6gq/S5IRT4Nc7f3RFXaWsS50s3+CuwaCrEUv5orQvpFRiwuyswt1RiYl7yR9IUfjyIqQMLbQWwAAAAASUVORK5CYII="
}
      function passw(){
       document.getElementById("pimg").src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAGtmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MTo0NyswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMTZUMTM6MjQ6MDErMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjQ6MDErMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZWZhZmY1NWQtNzQ1Yi01NjRkLWE2NzctM2Y2ZTYzY2UwZWIyIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6NTgzNjU4ZWQtOWViYi0yMzQzLWFkMDUtMjEwZDBiZWEwM2M1IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjIj4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDplYmI2ZjQ0Zi05MmE5LWVjNGItOWI5YS01YzM2ODQ5Yzk1NWMiIHN0RXZ0OndoZW49IjIwMjAtMDctMDdUMTY6NTE6NDcrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmNlZDlhOWUyLWU2NWItODE0My05MjRkLTE3YmY1NzMyYjcxZiIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyNDowMSswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZWZhZmY1NWQtNzQ1Yi01NjRkLWE2NzctM2Y2ZTYzY2UwZWIyIiBzdEV2dDp3aGVuPSIyMDIwLTA3LTE2VDEzOjI0OjAxKzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PidSzWMAAAVZSURBVGiB7dpZiF1FGgfw3+2O3WYx6UjUcaKOSzRxi7gybhBx3BcwisuDDKKgPrijDK6ITyoi6gwDo4LLgzPoixpxJWhc4hJ3k8yMmhijokaNJrZmMX19+Kq8dS/dSbr7tDbSfzicU+fUqar/qe/7f1/VvbV6ve73gLbfegBVYYTIcMMIkeGGESLDDaPg7mkPD6aNcfi+ktEMAqMG8M42WIZT8Q1qaE9tzcZyjMZPWFvNMDeMjSHShh78GZvgLIzFntgV72AFDsazeAH/xxv4CGsEqSHFhoiMQScuxm44Euswsagzvbg+LB3L8TIexRzMr2a4fWN9RLpwgJiB08VXzfXz9SqsxBYt9yfiGDGLb+BfmIUfKh19gb6IdAkf+CsOKur+hG5hPguxLR7BJJyJDkFq09TGRByOQ3Al7sNXlbPQO5FxOBEXCXPKmI/PcLVw5ucSgR/S8QCmiVnYI7UxQYhBJ85P17cMAY9eiRyKy1tIzE4DfUY4cEb5dZel43nsgFdxMg4UMzQFN+A73KtiRavV6/XWOPI69inKT+F6MSPf9bP9g3GOMNMx6d4CnCJMszK0RvYLNJN4C9cKcv0lAXPxd8xDXsFNxcwBtLVelEQm4cKivBK34k2sHmD7PeIj3IRP0r12IQw7DrDNXlESmSHsOONRPCgC2mDxBF4sylPxFxFgK0Em0oGTivs/4rZ0rgLr8FjLvWOFQlaCTGSCRrwgHPHNqjpJeAqLivJemjOE9o1sp7SiWr7I8jsefywqzFN9wvelIHNeKo8VRI7D/0QGPV2kNwsF0XaRy/0hje99YSV7ipj2qcj3FmYiWwvzyvigYhIZswsi43GZCJ7jRNzZUsSvV4U57i1EYhF2FxL+ErYTwfcFoYY3ZSJbtnS4sdPcX6wsrjtxhkZ+toNQuTackOrU8ScRj1and6YJAeoQOSDcWDr7qqKTyZVTCEwtrtel8yh8na7bWp7VinF1Fu9m6+lJ59F5Rr7VCFiE7bYXDVaFUt6X42YRgLvFLOQseikewvFirXNA8d79IubNwGLhJ/VMZInIk7ZL5W1S5S8qJNEu1ioZq0TAXSuc94ji2TyR792OszUTuUekS1PSOBfj7UxkqXCwTGQPEXmrJLKfcNiM9zRM413NprNYEF8qlKrEx0IB89g6sCbbZLeIvt2pPF5krpsOfvy/4NyW8iwN0+3SrJplVj6+5b12zW6whoZz1UWKnoPgJiJDPVI1W0YHivwqY5n4cBlt4ktn2V9RPOsSapeXDL1mAyXzJSKNOCSVJ+MS4ZTP93voDeyCa4q+enAnPizqdOMu4TdfpD7zbM3BTnhbqFivW0+tC6tZIsXePz2bIQJYu1h7r9Q8rRvC3mI9cmhx72vc3VJvNe4QAtO6FH5RrGFGiZms6QWtZvNfkXIvKAZ8NC7FURp2vD5zyx3NxFU4TbM5XKY55yrR13p+uSBBHx+ydUbW4UkRTS9I582Fxm8vEst/iI25b4Tu5w52FeZyanrnOuFrmxXt3yziQOVoJVIX5vOAmO6zhBR3CK3Pej9fEB6NncUe1lEizRiHfTXSjXz+G/45FCTofc0udTxBqFbeTenULMc9wkR2Eub0rVCYEp8LebwC/6l26M3oa1+rR9jl48KEjhOOu4+YtbGCbJlydGl8fXhNSPozIusdUmxoy3QFnhbp8nSxqpsiMtC6yAS2EJG5JoLXv7EVbhT7XUuGYuCt2Njd+B/xSjp2FIueDiEOk0UcmJOezRU7LjX9k+pBYSA/KyxKxxixllgj1Gmt2IXP+FV/wK+N/GFgmGGEyHDDCJHhhhEiww2/GyI/AzYzM6L+LxHkAAAAAElFTkSuQmCC"
}
function verotp(){
    document.getElementById("vimg").src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF62lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0yM1QxNDozMTozNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMjNUMTY6MDU6NTIrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMjNUMTY6MDU6NTIrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MmQ0NmMwM2QtYmYxZi1iNzRiLWEwMjYtYzJmNGRhNzQ3OTgzIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6MDhiMzkwMzAtOTQ2ZS0zZDRjLThiOTEtNDNlMjJlYTlkYjY5IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6OWM2MzdkMWMtN2U0ZC0zZjRmLThiYjMtMGIyM2I5OTZjMzIxIj4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo5YzYzN2QxYy03ZTRkLTNmNGYtOGJiMy0wYjIzYjk5NmMzMjEiIHN0RXZ0OndoZW49IjIwMjAtMDctMjNUMTQ6MzE6MzUrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjJkNDZjMDNkLWJmMWYtYjc0Yi1hMDI2LWMyZjRkYTc0Nzk4MyIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0yM1QxNjowNTo1MiswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5EdMpTAAABnklEQVRoge2av0rDUBSHv4qzrv57AHF1ctI3KA51c1JwVnwA3UWHgoPgpJuTfyandnKpoyCi4FBU6KQ+QByuQ5vctOm5ucltOR9kuckJv49zyUlJK1EUMQ5MlB0gL1QkNFQkNCbjC+eL1/GlGWAWmC4ikIVv4BP46l7ceq72XJQQ6WIZOALWcg4mpQHsA4+2k2lbawVoEY4EmCwtTLYEaSK7vtLkgDWbTWQJqPnN4kQNk7EHm4i1dYGRyGgTWSggiCuJjGMzR1QkNFQEOADmgEqOxw7wIgnT7xVlkMShsLYfZ8AHcDtsobQjTWFdFu4kRVKRVWFdFtYlRS5b6xW4BzrCe8SZB7aBTUmxVATg0qE2d/TxGxoqgg7EvuhA1IEITAF14F14jzilDcS9/yMI9PEbGioSGipSMomBPIoibSyfFkZR5Bj4jS+OmkgdOLGdcJnsRdEGHjBvxBdpFw0r0sG8D93Ic/lhmK31BFQJUAKyd6SB6cSbvyhuZOnIFaYTwUrAYJFTYAP4KSCLE7at1cRspQZ+fpd7oaL/1wqMPzIjP36UceDFAAAAAElFTkSuQmCC"
}
    function rec(){
    document.getElementById("rimg").src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF62lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0yM1QxNDozMTozNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMjNUMTY6MTE6MDkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMjNUMTY6MTE6MDkrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ODQ5MTZlZDctYThlOC1mZjQ3LTlmMTAtOThiY2QyYjY4NDFmIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6YzQwMWNhMjMtNzlhYy0wMjRhLTliZTAtYzI4N2U4M2FlNDEwIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6MzA5ZGYxYzMtMjdjYi00OTQ5LWI5OWMtZmNkMDhkMWRjOWM5Ij4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDozMDlkZjFjMy0yN2NiLTQ5NDktYjk5Yy1mY2QwOGQxZGM5YzkiIHN0RXZ0OndoZW49IjIwMjAtMDctMjNUMTQ6MzE6MzUrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjg0OTE2ZWQ3LWE4ZTgtZmY0Ny05ZjEwLTk4YmNkMmI2ODQxZiIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0yM1QxNjoxMTowOSswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6mhMdPAAADDElEQVRoge3aT6gVVRwH8M8TwRYuQmhhJAouFIJHECS16QYuNDANekbkQtMgiAhKqsWD90RdpEvFTdlOId2UkaBGXipQCUKEpIQiECSRJMq/IbwWZ3yMx7l35p659zk+7hcG5vc7v99vft97zpzzO2fuyNTUlNmAOQ86gX5hSKRpmJsX9i//MiXGUoxmF1zEZyU+b2BRdv8jzuOPXh+8+Ze10/dzu9iVYT52462CtjXYhrOR/ilMYF2Bz1fYiKspyaQOreX4VzEJQqInMZbTjWW6dR181uAvLExJKLVHvqhg8ygO4YVMPlQx9sGcT2Wk9MgElhXo213sJzq0Ffm0uth3REqPPFmgW4YLWIHTUVurQ5xuPk/3mlRKjzwbybuyhOAMtlaIUeYzI0RulMjzE2LEPv/1lJE0IkcjeVKYNgkz02SFGGU+7V6TGskXjbkFsYUtWI0FvQYdEK7giDCFH6B8QTwizOlNw2PYnF0rsSnfGA+tFZpJIsZGoUqYRkzkuQE89DscH0DctXkhHlovRXJbby/eZCT/jldxBz+4fyGN7buh5d41qSXUc6i2IG4rN/GEsB7kcVuoxf7M5DeFnnkkZ7NJGM6XKzyj1a2xX/uRT/B4pHsPJ3Ly9/ggslmMPf1IoB9EPsaqSPcp9hXY7sHnkW5MtWqgK+oS2eD+X/kCPuri866w+cpjt5qzZR0ioxgv0L8t7Cs64TLeL9DvUFxVV0IdIuMFDx7HNxV8D2NvpBvF9tRk6hBZj9dxLZNPYWcP/u/gXHZ/Cx9mMZNQ9x05iOfxNV5L8F8vTMkvCqV9MuocPtzFT1lCcWleBb/iFWH/Xwv9WkdSSNxFbRLMogO6WUOkyjvS84nGg0AZkZaSYq0pmDVDa0ikaRgSaRrKiLQx0pCrXYfIQ4MhkaYhXtmvFNicnIlEEvB3XoiJHHPvd7/WgJOpg2/zQjy0DuP6zOWSjKvCkdM0YiL/4Bn8PFMZJeCScHR0M68sqn7PC5++XsYSzBt0ZhVxA78Je/xrcePI8N9BDcOQSNPwP5LYiMcogLzVAAAAAElFTkSuQmCC"
}
                 
function error(id,id1,limit){
   
    if(id1.value.length<4){
         console.log("otp  error")
      id.style.bottom='-25px';
      id.style.zIndex =2;}else{
          console.log("otp")
           id.style.zIndex ='-1';
      }
}
</script>        

  
      
    <script>
           let timerOn = true;

function timer(remaining) {
  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('otpbtn').innerHTML = 'WAIT'+remaining + 's';
  document.getElementById('otpbtn').style.fontSize = "12px";
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
  }
  
  // Do timeout stuff here
  document.getElementById('otpbtn').innerHTML="RESEND"
   document.getElementById("otpbtn").onclick = sendcode();
}

     
     function sendcode(){
         text=document.getElementById("number").value;
         var number=text.substr(3, 10);
         if(number!=null && number.length==10){
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.open("GET", "otp?num="+number, true);
             xmlhttp.send();
              timer(120);
             document.getElementById('otpbtn').removeAttribute("onclick");
             document.getElementById("snackbar").innerHTML="success ";
               document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
     
  
         }else{
                 document.getElementById("snackbar").innerHTML="Mobile Number is required";
          document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
     
  
         }
         
     }
     function codeverify(){
         var otp=document.getElementById("verificationCode").value;
         var mobile=document.getElementById("number").value;
         var pass=document.getElementById("pass").value;
         var ref=document.getElementById("rcode").value;
         if(mobile.length<9){
              document.getElementById("snackbar").innerHTML=" Mobile number is required";
           document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
         }else{  if(otp.length<0){
              document.getElementById("snackbar").innerHTML=" otp is required";
           document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
         }else{
               if(pass.length<6){
              document.getElementById("snackbar").innerHTML="Enter Min 6 Digit Password ";
           document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
         }else{
               if(ref.length<3){
              document.getElementById("snackbar").innerHTML=" Mobile number is required";
           document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
         }else{
               document.getElementById("snackbar").innerHTML="success ";
           document.getElementById("snackbar").style.display= "";
        setTimeout(function () { document.getElementById("snackbar").style.display= "none"; }, 3000);
         document.getElementById("createuser").submit();
         }
             
         }
         }
             
         }
         
     }
 
    </script>
    
</head>
<style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Raleway', sans-serif;
                background: linear-gradient(135deg, #0b0631, #2c1355); /* Dark background */
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .recharge_box[data-v-fd780a88] {
     padding-left: 24px; 
     padding-right: 24px;
    
}
        .recharge[data-v-fd780a88]{
            background: linear-gradient(135deg, #29104a, #3e185c); /* Solid dark background */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
            text-align: center;
            animation: fadeIn 1.2s ease-out;
            height:auto;
            margin-bottom:30px;
            margin-top:30px;
        }
        .input_box_btn[data-v-fd780a88]{
            padding:0px;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .recharge[data-v-fd780a88] h2 {
            color: #f7b731;
            margin-top:10px;
            font-size:30px;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
            width: 100%;
        }
        .input_box[data-v-fd780a88] {
            width: 100%;
            padding: 12px 40px 12px 12px;
            border-radius: 8px;
            /*border: 1px solid #444;*/
            background: linear-gradient(135deg, #0b0631, #2c1355);
            color: #fff;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .input_box input[data-v-fd780a88]{
            background: linear-gradient(135deg, #0b0631, #2c1355);
            color: #fff;
        }
        .input-group input:focus {
            border-color: #f7b731;
        }
        .input-group .icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 12px;
            color: #f7b731;
        }
        .otp-group {
            display: flex;
            align-items: center;
        }
        .otp-group .login-btn {
            margin-left: 10px;
            padding: 10px 20px;
            font-size: 14px;
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #f7b731;
            border: none;
            border-radius: 8px;
            color: #1c0c45;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .login-btn:hover {
            background-color: #e09323;
            transform: translateY(-3px);
        }
        .extra-options {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .extra-options a {
            color: #f7b731;
            text-decoration: none;
            font-size: 14px;
        }
        .extra-options a:hover {
            text-decoration: underline;
        }
        .error-msg {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .gocode[data-v-fd780a88],.input_box_btn .login_btn[data-v-fd780a88]{
            background:#F7B731;
            color:#000;
        }
        .agree_box[data-v-fd780a88] .van-checkbox__label{
            color:#fff;
        }
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }
            .recharge[data-v-fd780a88] {
                padding: 10px;
                margin-left:20px;
                margin-right:20px;
            }
            .extra-options {
                flex-direction: column;
                align-items: center;
            }
            .extra-options a {
                margin-top: 10px;
            }
        }
        .extra-options{
            display:flex;
            width:100%;
            justify-content:center;
        }
        .extra-options p,.extra-options a{
            font-size:18px;
        }
    </style>

<body style="font-size: 36px;">
    

    <div data-v-fd780a88="" " class="recharge">
    <h2>Register</h2>
        <!--<nav data-v-fd780a88="" class="top_nav">-->
        <!--    <div data-v-fd780a88="" class="left"><a href="login"> <img data-v-fd780a88=""b-->
        <!--            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACexIHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOaxTo85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAABJRU5ErkJggg=="-->
        <!--            alt=""></a><span data-v-fd780a88="">Register</span></div>-->

        <!--</nav>-->
        <div data-v-fd780a88="" class="recharge_box">
            <form action="" id="createuser" method="POST" class="form-signup" autocomplete="off">

                <div data-v-fd780a88="" class="input_box"><img data-v-fd780a88="" id="mimg"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB00lEQVRoQ+1asS4EURQ97xc0lNSEQqKmp7QNX0CiMTdKq5QzGglfQGNLeltLFISaksYvPJndnWTDbN59s29iJHfaOe/MPWfOnJ3MWwflISKnANaU8BSwB5JHWiKnAWZZduyc62qwKTHe+26e5ycaTpUQEXkBsKghTIx5Jbmk4dQK8RqyEjPJyTp3lqRqRhVIRKKEjAT1K8SvxxhSYNsgJHbmSnyTQh6997dJpqwgcc5tAVgtTzUlpE9yoykRJa+I3AMYxLARITF1OI3Y8VIwIVVOlq1ldyQyZxatkGEWrZBDE85btELGWbRCDlm0fjsQ9RpvP4iREbPWChlmrRVyyFrLWmv4FcXqN/JZsfoNGWb1G3LI6tfq1+q31lNi9Ruyzeo35JDV7/T1e5nn+X5No9XLsiy7cM7tNbY/MprkzHt/p54qEuic2wRwWC5rZH8kcqYk8LYIGd/Zjd7RbTpaWqd7JDslWERuAGxrF7clWp8k534OLSIfAGZjxPx1tJ5JrlQIeQKw/J+EFLN2SPbGolXEqohX1JH6jrwBmI+aYAgeiBGRWiIAvJNc0FxX+xH7CsCOhjAx5prkroZTJaQgGr1aHwCY0RBPifny3p9r/6tVXOsbCz8HUf9wHDEAAAAASUVORK5CYII="
                        alt=""><span style="font-size: 17px;" id="cucode"></span><input data-v-fd780a88="" type="text" name="username"  id="number"  onfocus="myFunction()"onkeyup="error(vernum,number,9)"
                        placeholder="Mobile Number"><span data-v-fd780a88="" class="tips_span" id="vernum">Mobile number is
                        required</span></div>
                <div id="recaptcha-container"></div>
                <div>
                
                <div data-v-fd780a88="" class="special_box" style="display:yes;">
                    <div data-v-fd780a88="" class="input_box" style="width: 70%;"><img data-v-fd780a88="" id="vimg"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACOUlEQVRoQ+2aMWzTQBSG3ztLWVmpGJEYysgEU9lZGGAqEy4LEgO+mzK0LEl0d6aDJQZEp26txEA3pkx0YiwbEkOlVurUsiRD7qFUDG1yjRv71bGry5z3v/97/50vtoNwSz54SzgggNQtyZBI4xJRSt0djUZLQog7izDvnDuNoujIGHM8q/+VSytJkkdCCAsAK4sA8PTsO+dkmqY/fX68IFLKx4j4oyYAl2wQ0RNr7f6kNy+IUmoHAF7UEQQAdo0xL3NBkiRZFkIc1BTi3JZz7mGapr8uepxKREr5GhG/1BmEiGJr7VYeyDoibtQcZMNa+yGA1CUlIgqJ1CWMcx+siYzFWq3W506nc8RFqZR6Q0QJIj6YpckG4hNihHkGAHtVgTy11va5zE/qKKWoKpCpqwYXlJTyOSJ+rQRk3AQRV6Mo+t7tdk84INrt9r3hcBgj4isAuF8ZCIf5ohpsm72oAa66AMI1SS4d1kTCgZgTi1IqHIiXZiSlzL2xusmfKIs4ED8KIbJer/eHYxOHA/H/FH0PH3KXFkcCZTRYL79ljJStDSBlJ8hdHxLhnmhZPSKaukNt4lXrEBGXtdZ/Lw6kiSDvjTGbk6k2DSQzxrzzLc0mgBwCwD4i7mmtt6/aX/OCnCBirLX+VnbDctfPA3JARGu+117cporoXRdk/DAuNsb8LtKkiprrgOwOBoM4y7KzKgwV7TEThIg+WWvfFhWvss4HsoKI60TUn3y9VaWxeXuF/6LMO7Gb/v4/Av6hQgwN1SIAAAAASUVORK5CYII="
                            alt=""><input data-v-fd780a88="" type="text" id="verificationCode"  onkeyup="error(verotp,verificationCode,4)" onfocus="verotp()"
                            placeholder="Verification Code" name="otp"><span data-v-fd780a88="" class="tips_span" id="verotp">Verification Code is required</span></div>
                            <button id="otpbtn" data-v-fd780a88="" type="button" onclick="sendcode()" class="gocode">OTP</button></div>
                </div>
                
                <div data-v-fd780a88="" class="input_box"><img data-v-fd780a88="" id="pimg"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MTo0NyswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZWJiNmY0NGYtOTJhOS1lYzRi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"
                        alt=""><input data-v-fd780a88="" name="password"  id="pass"  onfocus="passw()" type="password" placeholder="Password"><span
                        data-v-fd780a88="" id="verpass" class="tips_span">Password is required</span></div>
                         
                <div data-v-fd780a88="" class="input_box"><img data-v-fd780a88="" id="rimg"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEMUlEQVRoQ+1ZXYgbVRT+zoSQpVtFfBHqCorgikJRXwoVoT4o+tBiH1pBfLD+IasRJfeMsBQ2FczuzpndQAsLSpGCCGJfSvdBqEIXEX/oi/qgtqC0FFZELIKLP2ySU6ZNlsnsJDOTmYm65EIecu/5+b57ztxz7gxhiwzaIjwwIvJfi2TqiDDznaq6E4D3AxFdFpF3+xFl5mdV9ba2/LlCofDd3NzcxTSbMzCRqamp7ePj4wLgpRAApwAcEZGv/WvMfB+AGQBPhOgsNxqNZ+r1+pVBCA1EpFKp3G1Z1vcRDn8H8KKInPTkmPkAgHcA3NRPr1gs7qjVaj8nJTMQEWb+AcBkHGeq+nA7hc7GkQewIiLXdJKMxESMMTNEVA1xsgJgT495b7rX2qZ5Va26rnskVyLM/CEAL002RrPZnFxcXLxgjNlFRF/GARChsywi++LY6cgkjggzXwYw4XPiiMgbnf+2bVdU1Y0AEaWzKiK35krEGHOeiO7qOAmmQZ/U28AVQ+eiiNyRKxHbtuuq+lrAySEROdE+mbzUizP66ZwQkUNxjPRNLWPMHiJ6HsDjAG5OYjBH2V9V9bRlWWcdx3k/6GfTM8LMpwHszRFQFqY3RayLSJJTJws0KW3c7+8cuogw8+sAFlM66FInok9V9W8Aj2ZpN3hgBIl41ddfoFZU1St0sUZIofwJwIOtVqthWdZnwW7AAxPL8PVm1MPVhc3fAUQSidMu2LY9oapfAdjhA/YPEe11HOdjb46ZHwJwBsCYT+ZSsVjcVavVfokixMybNjlzIsz8EYDH/GBardbLCwsLS/45Zi4DOBoAfVJEDv7rRJh5HoAdAHJcRF4IA8fMHwB4MrDGItK3G8g1IsaYp4noPT8oIrpQKBR2z87O/hZGZHp6+pb19fVzAK5drDpDVfe5rrvcKzK5ETHG7CQir4p3tfOq+ojrup/0S5UeHcC3RHTQcZzzPSKZzzMS1gWr6mHXdd+Kyndv3RhzjIheifu85BaRNpinALxNRNsBfCEiu+OQ6Mgw8zftu75XZ2ZExBl6avnAPEBEbzabTe+UupSEiG3bk6p6lIjmHMfpe4PMNSId0NVqdVu1Wv0zCYmOrG3bNziO80eU7lCIRIHIYn1EpL2LA73RyCICQRupI5KkacyDQMdm2qYxT2xpbXdlS1T3m9ZZnvojInnu7iC2RxEZZNfy1EkUka1TR+Lc2fPcdl9zms99ZBjg/T5SV/b/a0SC3z5iv9MaUoT877VOicj+jRbGD8AY8xwRHR8SqLRuXhWRY6FEyuXyjWNjY6sAxtN6yVn/SqPRmKjX63+FEvEmK5XKPZZleSl2b85gBjW/alnWgfn5+c/9BkI/vZXL5VKpVNpPRLeramlQj1nqWZblXaV/XFtbO7O0tLQWtJ34G2KW4LK0NSKS5W5mYWvLROQqDqopUSkA7bQAAAAASUVORK5CYII="
                        alt=""><input data-v-fd780a88="" onfocus="rec()"name="refcode" type="text" 
                        placeholder="Recommendation Code" id="rcode" value="" >
                        
                </div>
                <!--<p>Recommendation Code: 726T17IR </p>-->
                <br>
                <div data-v-fd780a88="" class="agree_box">
                <!--<div data-v-fd780a88="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">-->
                <!--<div id="agbox" onclick="check();" class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked">-->
                <!--<i class="van-icon van-icon-success" id="agicon" style="border-color: rgb(255, 165, 0); background-color: rgb(255, 165, 0);"></i>-->
                <!--</div>-->
                <!--<span  class="van-checkbox__label">I agree <span data-v-fd780a88="" id ="terms" class="orangecolor">Privacy Policy</span></span>-->
                <!--</div>-->
                <!--</div>-->
              

                </div>
                
                <div id="snackbar" class="van-toast van-toast--middle van-toast--text" style="z-index: 2009;display:none "><div class="van-toast__text">OTP SENT</div></div>
                
                <div data-v-fd780a88="" class="input_box_btn"><button data-v-fd780a88="" id="register"
                        class="login_btn ripple"  type="button" onclick="codeverify();">Register</button></div>
            </form>
            <div class="extra-options">
           <p>Already have an account? <a href="login.php">Login</a></p>
        </div>

        </div>
<!--<div data-v-405e9a63="" data-v-309ccc10="" class="footer">-->
<!--            <ul data-v-405e9a63="" class="nav_foot">-->
<!--                <li data-v-405e9a63="" onclick="window.location.href='index'" class=""><img data-v-405e9a63=""-->
<!--                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToxOTozOCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzE6NDErMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzE6NDErMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NmY2M2YzNjUtMzkyZS1mMzRj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"-->
<!--                        alt=""><span data-v-405e9a63="">Home</span></li>-->
<!--                    <li data-v-405e9a63="" onclick="window.location.href='searc'" class=""><img data-v-405e9a63=""-->
<!--                        src="data:image/png;base64,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"-->
<!--                        alt=""><span data-v-405e9a63="">Search</span></li>-->
      
<!--                <li data-v-405e9a63="" onclick="window.location.href='login'" class="active"><img data-v-405e9a63=""-->
<!--                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxMToyMDoxOSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDZUMTE6MzM6MDYrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTE6MzM6MDYrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6YzI0MGRmNzQtY2FmMy00MjQx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"-->
<!--                        alt=""><span data-v-405e9a63="">My</span></li>-->
<!--            </ul>-->
<!--        </div>-->
      
                   
                <script>
                function check(){if(document.getElementById("agbox").className==="van-checkbox__icon van-checkbox__icon--square"){
                document.getElementById("agbox").className="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked";
                document.getElementById("agicon").style.backgroundColor="black";
                }else{
                document.getElementById("agbox").className="van-checkbox__icon van-checkbox__icon--square";
                document.getElementById("agicon").style.backgroundColor="white";
                }
                
                }
            
                    document.getElementById("terms").onclick = function () {
        document.getElementById("modal").style.display = "";
    }
    document.getElementById("close").onclick = function () {
        document.getElementById("modal").style.display = "none";
    }
                </script>

   <?php
   if(isset($_GET["r_code"])){
    $id=$_GET["r_code"];
   echo" <script type='text/JavaScript'>

function ref() {
      document.getElementById('rcode').value= '$id';      
}
ref()
</script>";
}


   ?>



       
      </body>

</html>