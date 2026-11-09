<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect them to the login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Generate Gift Card</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: "Lato", sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
        }
        .menu-btn {
            font-size: 30px;
            cursor: pointer;
            color: white;
            position: absolute;
            top: 15px;
            left: 15px;
        }
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
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .input_box {
            margin-bottom: 20px;
            position: relative;
        }
        .input_box input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }
        .input_box input:focus {
            border-color: #3498db;
        }
        .input_box_btn {
            text-align: center;
        }
        .input_box_btn button {
            padding: 10px 20px;
            background-color: #27ae60;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .input_box_btn button:hover {
            background-color: #2ecc71;
        }
        .tips_span {
            position: absolute;
            top: -10px;
            left: 15px;
            background: white;
            padding: 0 5px;
            color: grey;
            font-size: 12px;
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
        }
        @media screen and (max-width: 768px) {
            .sidenav {
                width: 100%;
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
        Generate Gift Card
    </header>

    <!-- Sidebar -->
    <div class="sidenav" id="mySidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="admin" class="fa fa-dashboard"> Dashboard</a>
        <a href="users" class="fa fa-users"> Users</a>
        <a href="adduser" class="fa fa-user-plus"> Add User</a>
        <a href="inviterec" class="fa fa-list-alt"> Invite Record</a>
        <a href="adpass" class="fa fa-lock"> Password Change</a>
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
            <marquee>After creating the gift card, copy the link to your browser and share it with users.</marquee>
            <h2>Generate Gift Card</h2>
            <form action="link" method="POST" class="form-signup">
                <div class="input_box">
                    <input type="number" id="Amount" name="amount" placeholder="Amount">
                    <span class="tips_span">Amount</span>
                </div>
                <div class="input_box">
                    <input type="number" id="ShareBy" name="share_by" placeholder="Share By">
                    <span class="tips_span">Share By</span>
                </div>
                <div class="input_box_btn">
                    <button type="submit">Generate Link</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        &copy; 2025 AdityaLoot - All Rights Reserved.
    </footer>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
        
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

</body>
</html>
