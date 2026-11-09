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
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))){
        $err = "Please enter username + password";
        echo($err);
    } else {
        $username = trim($_POST['username']);
        $newpassword = trim($_POST['password']);
    }

    if(empty($err)) {
        $sql = "UPDATE users SET password='$newpassword' WHERE username='$username'";

        if ($conn->query($sql) === TRUE) {
            echo '<h1 style="text-align: center;">Password changed successfully</h1>';
        } else {
            echo '<h1 style="text-align: center;">Error in updating password</h1>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: "Lato", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            transition: margin-left .5s;
        }
        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 15px;
            text-align: center;
            position: relative;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
        }
        /* Menu Button */
        .menu-btn {
            font-size: 30px;
            cursor: pointer;
            color: #fff;
            position: absolute;
            left: 15px;
            top: 15px;
        }
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
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.5s;
            padding-bottom: 80px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .input_box {
            margin-bottom: 15px;
        }
        .input_box input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .input_box_btn {
            text-align: center;
        }
        .login_btn {
            background-color: #28a745;
            color: white;
            padding: 10px 30px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login_btn:hover {
            background-color: #218838;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            z-index: 100;
        }
        @media screen and (max-width: 768px) {
            .sidenav {
                width: 100%;
                position: relative;
            }
            #main {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <header>
        <span class="menu-btn" onclick="openNav()">&#9776;</span>
        <h1>Admin Dashboard - Change Password</h1>
    </header>

    <!-- Sidebar -->
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
            <h2>Enter Username to Change Password</h2>
            <form action="" method="POST" class="form-signup">
                <div class="input_box">
                    <input type="text" id="Username" name="username" placeholder="Username">
                </div>
                <div class="input_box">
                    <input type="password" id="inputPassword" name="password" placeholder="New Password">
                </div>
                <div class="input_box_btn">
                    <button type="submit" class="login_btn">Change Password</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        &copy; 2025 AdityaLoot - All Rights Reserved
    </footer>

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
