<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";

// Array of predefined multipliers
$multipliers = [
    1.03, 1.07, 1.12, 1.18, 1.25, 1.33, 1.42, 1.52, 1.63, 1.75,
    1.88, 2.02, 2.17, 2.33, 2.50, 2.68, 2.87, 3.07, 3.28, 3.50,
    3.73, 3.97, 4.22, 4.48, 4.75, 5.03, 5.32, 5.62, 5.93, 6.25,
    6.58, 6.92, 7.27, 7.63, 8.00, 8.38, 8.77, 9.17, 9.58, 10.00,
    10.43, 10.87, 11.32, 11.78, 12.25, 12.73, 13.22, 13.72, 14.23, 14.75,
    15.28, 15.82, 16.37, 16.93, 17.50, 18.08, 18.67, 19.27, 19.44
];

// Save selected multiplier if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['multiplier_index'])) {
    $index = intval($_POST['multiplier_index']);
    if (isset($multipliers[$index])) {
        $value = $multipliers[$index];
        $sql = "UPDATE notice SET profit_percentage = '$value' WHERE id = 1";
        if ($conn->query($sql) === TRUE) {
            $message = "<p style='color:green'>Prediction saved: {$value}x</p>";
        } else {
            $message = "<p style='color:red'>Error: " . $conn->error . "</p>";
        }
    }
}

// Get current multiplier from DB
$sql = "SELECT profit_percentage FROM notice WHERE id = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$current_profit = floatval($row['profit_percentage']);
$default_index = array_search($current_profit, $multipliers);
if ($default_index === false) $default_index = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Game Prediction</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
            background: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
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
        .slider {
            width: 90%;
            margin: 20px 0;
        }
        .value-display {
            font-size: 28px;
            margin-bottom: 15px;
        }
        .save-btn {
            padding: 10px 20px;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .save-btn:hover {
            background: #2ecc71;
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

<div class="container">
    <h1>Profit Calculator</h1>
    <?php if (isset($message)) echo $message; ?>
    <div class="value-display" id="display"><?php echo $multipliers[$default_index]; ?>x</div>
    <form method="POST">
        <input type="range" name="multiplier_index" id="slider" min="0" max="<?php echo count($multipliers) - 1; ?>" value="<?php echo $default_index; ?>" class="slider">
        <br>
        <button type="submit" class="save-btn">Save</button>
    </form>
</div>

<script>
    const multipliers = <?php echo json_encode($multipliers); ?>;
    const slider = document.getElementById('slider');
    const display = document.getElementById('display');

    slider.oninput = function () {
        const value = multipliers[this.value];
        display.textContent = value.toFixed(2) + 'x';
    };
</script>

 <footer>
        &copy; 2025 AdityaLoot - All Rights Reserved.
    </footer>

</body>
</html>
