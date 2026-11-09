<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";

$username = $newpassword = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
        echo($err);
    } else {
        $username = trim($_POST['username']);
        $newpassword = trim($_POST['password']);

        function genUserCode(){
            $str="AB1CDE2FG3HI4JK5LM6NO7PQ8RS9TU0VQXYZ".time();
            $str= str_split($str,1);
            $l = count($str);
            $user_code='';
            for($i=0;$i<6;$i++){
                $tn = rand(0,$l);
                $user_code .= $str[$tn];
            }
            return $user_code;
        }

        $user_code = genUserCode();

        $query11 = "SELECT username FROM `users` WHERE username='$username'";
        $result1 = mysqli_query($conn, $query11);

        if (mysqli_num_rows($result1) != 0) {
            echo '<h1 style="text-align: center;">Username already exists</h1>';
        } else {
            if(empty($err)) {
                $sql = "INSERT INTO users (username, password, usercode) VALUES('$username', '$newpassword', '$user_code')";
                if ($conn->query($sql) === TRUE) {
                    echo '<h1 style="text-align: center;">User Created Successfully</h1>';
                } else {
                    echo '<h1 style="text-align: center;">User Creation Failed</h1>';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User - Admin Panel</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Lato', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .input_box {
            margin-bottom: 20px;
        }

        .input_box img {
            margin-right: 10px;
            vertical-align: middle;
        }

        .input_box input {
            width: calc(100% - 40px);
            padding: 10px;
            border: 2px solid #34495e;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }

        .input_box_btn {
            text-align: center;
        }

        .login_btn {
            background-color: #2c3e50;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .login_btn:hover {
            background-color: #34495e;
        }

        /* Sidebar Styling */
        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1f1f1f;
            padding-top: 60px;
            overflow-x: hidden;
            transition: all 0.5s;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
            
        }
        .sidenav a {
            padding: 15px 25px;
            font-size: 18px;
            color: white;
            display: block;
            text-decoration: none;
            transition: 0.3s;
        }
        .sidenav a:hover {
             background-color: #f39c12;
            color: #1f1f1f;

        }
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
        }

        #main {
            transition: margin-left .5s;
            padding: 20px;
        }

        .menu-btn {
            font-size: 30px;
            cursor: pointer;
            color: #fff;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 2;
        }
        
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .sidenav {
                width: 100%;
                left: -100%;
                transition: left 0.3s;
            }

            #main {
                margin-left: 0;
            }
        }

    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <h1>Add User - Admin Panel</h1>
    </header>

    <!-- Sidebar -->
    <span class="menu-btn" onclick="openNav()">&#9776;</span>

    <div class="sidenav" id="mySidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="admin" class="fa fa-dashboard"> Dashboard</a>
    <a href="users" class="fa fa-users"> Users</a>
    <a href="adduser" class="fa fa-user-plus"> Add User</a>
    <a href="inviterec" class="fa fa-list-alt"> Invite Record</a>
    <a href="adpass" class="fa fa-lock"> Password Change</a>
    <a href="/adpre" class="fa fa-line-chart"> Game Prediction</a>
    <a href="adwith" class="fa fa-money"> Withdraw Requests</a>
    <a href="rechargeRequests" class="fa fa-money"> Recharge Requests</a>
    <a href="rechrec" class="fa fa-history"> Recharge History</a>
    <a href="withrecord" class="fa fa-history"> Withdraw History</a>
    <a href="intrestrecord" class="fa fa-line-chart"> Interest Record</a>
    <a href="upi" class="fa fa-credit-card"> Admin UPI</a>
    <a href="notice" class="fa fa-bell"> Notification</a>
    <a href="gift" class="fa fa-gift"> Gift Card</a>
    <a href="login" class="fa fa-sign-out"> Log Out</a>
</div>

    <!-- Main Content -->
    <div id="main">
        <div class="container">
            <h2>Enter Username and Password to Add User</h2>
            <form action="" method="POST" class="form-signup">
                <div class="input_box">
                    <img src="path-to-username-icon" alt="">
                    <input type="text" id="Username" name="username" placeholder="Username">
                </div>
                <div class="input_box">
                    <img src="path-to-password-icon" alt="">
                    <input type="password" id="inputPassword" name="password" placeholder="New Password">
                </div>
                <div class="input_box_btn">
                    <button class="login_btn" type="submit">Add User</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer
    <footer>
        &copy; 2024 Admin Panel - All Rights Reserved.
    </footer> -->

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }
    </script>

</body>

</html>
