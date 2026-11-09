<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
}

require_once "config.php";

// Fetch balance, commission, and interest data
$opt = "SELECT SUM(amount) as total FROM `bonus` WHERE usercode='" . $_SESSION['usercode'] . "'";
$optres = $conn->query($opt);
$sum = mysqli_fetch_assoc($optres);
$bonus = ($sum['total'] == "") ? 0 : round($sum['total'], 2);

$opt1 = "SELECT SUM(amount) as total FROM `intrest` WHERE username='" . $_SESSION['username'] . "'";
$optres1 = $conn->query($opt1);
$sum1 = mysqli_fetch_assoc($optres1);
$bonus1 = ($sum1['total'] == "") ? 0 : round($sum1['total'], 2);

$sql = "SELECT notice FROM notice WHERE id='1'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$notice = $row['notice'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #0d0d0d;
            color: #fff;
        }

        /* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #1f1f1f;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header .logo {
            font-size: 24px;
            color: #f39c12;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .nav-links a:hover {
            color: #f39c12;
        }

        .menu-bar {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                background-color: #1f1f1f;
                position: absolute;
                top: 50px;
                right: 20px;
                width: 200px;
                border-radius: 8px;
                padding: 10px;
            }

            .nav-links.active {
                display: flex;
            }

            .menu-bar {
                display: block;
                color: #fff;
            }
        }

        .profile-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #1f1f1f;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1a1a1a;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        
        .profile-header img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }
        
        .profile-info {
            flex-grow: 1;
            margin-left: 10px;
        }
        
        .profile-info h4 {
            margin: 0;
            font-size: 18px;
        }

        .balance-section {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            background-color: #444;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .balance-item {
            text-align: center;
        }

        .balance-item h4 {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .balance-item .balance-value {
            font-size: 18px;
            font-weight: bold;
            color: #f39c12;
        }

        .balance-item button {
            padding: 5px 10px;
            margin-top: 5px;
            background-color: #f39c12;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .balance-section {
                flex-wrap: wrap;
            }

            .balance-item {
                width: 33%;
                margin-bottom: 20px;
            }
        }

        .menu-section {
            padding: 20px;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #292929;
            border-radius: 8px;
            cursor: pointer;
        }

        .menu-item i {
            font-size: 20px;
            color: #f39c12;
        }

        .logout-section {
            padding: 20px;
        }

        .logout-btn {
            width: 100%;
            padding: 15px;
            background-color: #f39c12;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            color: #fff;
            cursor: pointer;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #1f1f1f;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            color: white;
            max-width: 400px;
            width: 80%;
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .modal-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .modal-buttons .confirm-btn {
            background-color: #f39c12;
            color: white;
        }

        .modal-buttons .cancel-btn {
            background-color: #888;
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="logo"><b>Profile</b></div>
    <div class="nav-links">
        <a href="/indexlogin">Home</a>
       
        <a href="/invite">Invite</a>
        <a href="/me">Profile</a>
    </div>
    <i class="fas fa-bars menu-bar" onclick="toggleMenu()"></i>
</div>

<div class="profile-container">
    <!-- Profile Header -->
    <div class="profile-header">
        <img src="user-profile.png" alt="User Profile Picture">
        <div class="profile-info">
            <h3>User: +91<?php echo $_SESSION['username']; ?></h3>
            <p>ID: <?php echo $_SESSION['id']; ?></p>
        </div>
    </div>

    <!-- Balance Section -->
    <div class="balance-section">
        <div class="balance-item">
            <h4>Balance</h4>
            <div class="balance-value" id="balancetop">₹ 0</div>
            <button onclick="window.location.href='/recharge';">Recharge</button>
        </div>
        <div class="balance-item">
            <h4>Commission</h4>
            <div class="balance-value">₹ <?php echo $bonus; ?></div>
            <button onclick="window.location.href='/bonus';">See</button>
        </div>
        <div class="balance-item">
            <h4>Interest</h4>
            <div class="balance-value">₹ <?php echo $bonus1; ?></div>
            <button onclick="window.location.href='/intrestrec';">See</button>
        </div>
    </div>

    <!-- Menu Section -->
    <div class="menu-section">
        <div class="menu-item" onclick="window.location.href='/recharge';">
            <h4>Recharge</h4>
            <i class="fas fa-wallet"></i>
        </div>
        <div class="menu-item" onclick="window.location.href='/invite';">
            <h4>Invite & earn</h4>
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="menu-item" onclick="window.location.href='/bank';">
            <h4>Bank Card</h4>
            <i class="fas fa-credit-card"></i>
        </div>
        <div class="menu-item" onclick="window.location.href='/withdraw';">
            <h4>Withdrawal</h4>
            <i class="fas fa-money-bill-alt"></i>
        </div>
        <div class="menu-item" onclick="window.location.href='/security';">
            <h4>Account Security</h4>
            <i class="fas fa-shield-alt"></i>
        </div>
        <div class="menu-item" onclick="window.location.href='/app-download';">
            <h4>App Download</h4>
            <i class="fas fa-download"></i>
        </div>
        <div class="menu-item" onclick="window.location.href='/about';">
            <h4>About</h4>
            <i class="fas fa-info-circle"></i>
        </div>
    </div>

    <!-- Logout Section -->
    <div class="logout-section">
        <button class="logout-btn" id="logout-btn">Logout</button>
    </div>
</div>

<!-- Modal for logout confirmation -->
<div class="modal" id="logoutModal">
    <div class="modal-content">
        <h3>Are you sure you want to logout?</h3>
        <div class="modal-buttons">
            <button class="confirm-btn" id="confirm-logout">Logout</button>
            <button class="cancel-btn" id="cancel-logout">Close</button>
        </div>
    </div>
</div>

<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }

    document.addEventListener("click", function(event) {
        const navLinks = document.querySelector('.nav-links');
        const menuBar = document.querySelector('.menu-bar');
        
        if (!navLinks.contains(event.target) && !menuBar.contains(event.target)) {
            navLinks.classList.remove('active');
        }
    });

    const logoutBtn = document.getElementById("logout-btn");
    const modal = document.getElementById("logoutModal");
    const confirmLogout = document.getElementById("confirm-logout");
    const cancelLogout = document.getElementById("cancel-logout");

    logoutBtn.addEventListener("click", function() {
        modal.style.display = "flex";
    });

    confirmLogout.addEventListener("click", function() {
        window.location.href = "logout.php";
    });

    cancelLogout.addEventListener("click", function() {
        modal.style.display = "none";
    });

    // Dynamic loading of balance
    document.addEventListener("DOMContentLoaded", function () {
        setInterval(function () {
            // Dynamically load balance from server-side script
            fetch('balance.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById("balancetop").innerHTML = `₹ ${data}`;
                });
        }, 1000);
    });
</script>

</body>
</html>
