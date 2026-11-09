<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Check if the user is logged in
if (!isset($_SESSION['adloggedin']) || $_SESSION['adloggedin'] !== true) {
    header("Location: redadmin.php");
    exit;
}

require_once "config.php";

// Check database connection
if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("Database connection failed. Please check config.php and server logs.");
}

// Database queries with error handling
function executeQuery($conn, $sql, $queryName = "Query") {
    $result = $conn->query($sql);
    if (!$result) {
        $error = "Query failed ($queryName): " . $conn->error . " | SQL: $sql";
        error_log($error);
        return false;
    }
    return $result;
}

// Initialize variables to prevent undefined notices
$bonus9 = $bonus = $tbal = $tbal0 = 0;
$with = ['total_withdraw' => 0];
$sr = ['total_balance' => 0];

// Query 1: Total Users
$opt9 = "SELECT COUNT(*) as total9 FROM `users`";
$optres9 = executeQuery($conn, $opt9, "Total Users");
if ($optres9) {
    $sum9 = mysqli_fetch_assoc($optres9);
    $bonus9 = $sum9['total9'] ?? 0;
} else {
    error_log("Total Users query returned no result");
}

// Query 2: Total Withdraw (Success)
$opt = "SELECT SUM(withdraw) as total FROM `record` WHERE status='success'";
$optres = executeQuery($conn, $opt, "Total Withdraw Success");
if ($optres) {
    $sum = mysqli_fetch_assoc($optres);
    $bonus = $sum['total'] ? round($sum['total'], 2) : 0;
} else {
    error_log("Total Withdraw Success query returned no result");
}

// Query 3: Total Withdraw (Withdrawing)
$wh = "SELECT SUM(withdraw) as total_withdraw FROM `record` WHERE status='Withdrawing'";
$wh1 = executeQuery($conn, $wh, "Total Withdraw Withdrawing");
if ($wh1) {
    $with = mysqli_fetch_assoc($wh1);
    $with['total_withdraw'] = $with['total_withdraw'] ?? 0;
} else {
    error_log("Total Withdraw Withdrawing query returned no result");
}

// Query 4: Total User Balance
$ub = "SELECT SUM(balance) as total_balance FROM `users` WHERE status='0'";
$ubal = executeQuery($conn, $ub, "Total User Balance");
if ($ubal) {
    $sr = mysqli_fetch_assoc($ubal);
    $sr['total_balance'] = $sr['total_balance'] ?? 0;
} else {
    error_log("Total User Balance query returned no result");
}

// Query 5: Total Recharge (Successful)
$opt1 = "SELECT SUM(recharge) as total1 FROM `recharge` WHERE status='successfull'";
$optres1 = executeQuery($conn, $opt1, "Total Recharge Successful");
if ($optres1) {
    $sum1 = mysqli_fetch_assoc($optres1);
    $tbal = $sum1['total1'] ?? 0;
} else {
    error_log("Total Recharge Successful query returned no result");
}

// Query 6: Total Recharge (Applying) - FIXED: Changed 'withdraw' to 'recharge'
$opt10 = "SELECT SUM(recharge) as total10 FROM `recharge` WHERE status='Applying'";
$optres10 = executeQuery($conn, $opt10, "Total Recharge Applying");
if ($optres10) {
    $sum10 = mysqli_fetch_assoc($optres10);
    $tbal0 = $sum10['total10'] ?? 0;
} else {
    error_log("Total Recharge Applying query returned no result");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Lato', sans-serif;
            background: #F4F4F9;
            color: #333;
            margin: 0;
            padding: 0;
            transition: margin-left .5s;
        }
        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 15px;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
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
            cursor: pointer;
        }
        #main {
            margin-left: 250px;
            padding: 20px;
        }
        .dashboard {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 300px;
            text-align: center;
        }
        .card h3 {
            margin-bottom: 15px;
            font-size: 1.5rem;
            color: #2c3e50;
        }
        .card p {
            font-size: 1.2rem;
            color: #f39c12;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9rem;
            color: #777;
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
        @media (max-width: 768px) {
            .sidenav {
                width: 100%;
                position: fixed;
                top: 0;
                left: -100%;
                transition: left 0.3s;
            }
            #main {
                margin-left: 0;
            }
            .dashboard {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <span class="menu-btn" onclick="openNav()">&#9776;</span>
    <div class="sidenav" id="mySidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="admin.php" class="fa fa-dashboard"> Dashboard</a>
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
    <div id="main">
        <h2>Welcome, Admin</h2>
        <div class="dashboard">
            <div class="card">
                <h3>Total Users</h3>
                <p><?php echo htmlspecialchars($bonus9); ?></p>
            </div>
            <div class="card">
                <h3>Total Profit</h3>
                <p>₹ <?php echo htmlspecialchars($tbal - $bonus); ?></p>
            </div>
            <div class="card">
                <h3>Total Withdraw</h3>
                <p>₹ <?php echo htmlspecialchars($with['total_withdraw']); ?></p>
            </div>
            <div class="card">
                <h3>Total Recharge</h3>
                <p>₹ <?php echo htmlspecialchars($tbal); ?></p>
            </div>
            <div class="card">
                <h3>Total User Balance</h3>
                <p>₹ <?php echo htmlspecialchars($sr['total_balance']); ?></p>
            </div>
        </div>
        <footer>
            &copy; 2025 AdityaLoot - All Rights Reserved.
        </footer>
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.left = "0";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.left = "-100%";
        }
    </script>
</body>
</html>