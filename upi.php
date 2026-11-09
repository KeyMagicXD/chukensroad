<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";

$err = "";

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $upi = trim($_POST['upi']);
    $currency = $_POST['currency'];

    if (empty($upi)) {
        $err = "Please enter a UPI ID";
        echo($err);
    }

    if (empty($err)) {
        $sql = "UPDATE notice SET upi='$upi', currency='$currency' WHERE id='1'";
        if ($conn->query($sql) === TRUE) {
            echo '<h1 style="text-align: center;">UPI & Currency updated successfully</h1>';
        } else {
            echo '<h1 style="text-align: center;">Error updating data</h1>';
        }
    }
}

// Get the current UPI ID and currency
$sql = "SELECT upi, currency FROM notice WHERE id='1'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$current_upi = $row['upi'];
$current_currency = isset($row['currency']) ? $row['currency'] : 'USD';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin UPI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: "Lato", sans-serif;
            background-color: #f4f4f9;
            transition: margin-left .5s;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 15px;
            text-align: center;
            position: relative;
            z-index: 1;
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
            max-width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1, h2 {
            text-align: center;
            color: #2c3e50;
        }
        .input_box {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .input_box input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            border: 2px solid #34495e;
            border-radius: 5px;
            width: 50%;
        }
        .input_box_btn {
            text-align: center;
        }
        .login_btn {
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login_btn:hover {
            background-color: #2ecc71;
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
            z-index: 1;
        }
        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .sidenav {
                width: 100%;
                position: relative;
            }
            #main {
                margin-left: 0;
            }
            .container {
                padding: 10px;
            }
            .input_box input {
                width: 80%;
            }
        }
        @media screen and (max-width: 480px) {
            .input_box input {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <header>
        <span class="menu-btn" onclick="openNav()">&#9776;</span>
        <h1>Admin UPI</h1>
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
            <h1>Current UPI ID:</h1>
            <h2><?php echo $current_upi; ?></h2><br>
            
            <!-- UPI Change Form -->
            <form action="" method="POST" class="form-signup">
                <div class="input_box">
                    <input type="text" id="upi" name="upi" placeholder="New UPI ID">
                </div>
               <div class="input_box" style="margin-bottom: 10px;">
    <select name="currency" style="padding: 10px; border: 2px solid #34495e; border-radius: 5px; width: 50%;">
        <option value="USD" <?php if($current_currency == "USD") echo "selected"; ?>>USD ($)</option>
        <option value="INR" <?php if($current_currency == "INR") echo "selected"; ?>>INR (₹)</option>
        <option value="PKR" <?php if($current_currency == "PKR") echo "selected"; ?>>PKR (₨)</option>
        <option value="RBL" <?php if($current_currency == "RBL") echo "selected"; ?>>RBL (₽)</option>
    </select>
</div>
<div class="input_box_btn">
    <button type="submit" class="login_btn">Change UPI</button>
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
