<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}

require_once "config.php";

// Fetch users data
$query = "SELECT * FROM users ORDER BY id DESC";
$result2 = mysqli_query($conn, $query);

$dataRow = "";
while ($row2 = mysqli_fetch_array($result2)) {
    $balance0 = round($row2[6], 2);
    $dataRow .= "<tr class='user'><td></td><td>$row2[1]</td><td>$row2[24]</td><td>$row2[16]</td><td>$row2[2]</td><td> ₹$balance0 </td><td>$row2[12]</td><td>$row2[7]</td><td>$row2[8]</td><td>$row2[13]</td></tr>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Lato', sans-serif;
            background: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
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

        .menu-btn {
            font-size: 30px;
            cursor: pointer;
            color: white;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 2;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 50%;
            padding: 10px;
            border-radius: 20px;
            border: 2px solid #34495e;
            font-size: 16px;
            outline: none;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            white-space: nowrap;
        }

        table th {
            background-color: #34495e;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            padding: 10px;
            font-size: 0.9rem;
            background-color: #34495e;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .sidenav {
                width: 100%;
                left: -100%;
                position: fixed;
                top: 0;
                transition: left 0.3s;
            }

            #main {
                margin-left: 0;
            }

            .search-bar input {
                width: 80%;
            }
        }

        /* Serial Number for Rows */
        body {
            counter-reset: rowNumber;
        }

        table tr td:first-child::before {
            counter-increment: rowNumber;
            content: counter(rowNumber);
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <span class="menu-btn" onclick="openNav()">&#9776;</span>
        <h1>Admin - User Management</h1>
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
            <h2>Manage Users</h2>

            <!-- Search Bar -->
            <div class="search-bar">
                <input id="searchbar" type="text" onkeyup="search()" placeholder="Search by username...">
            </div>

            <!-- User Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Username</th>
                            <th>Login IP</th>
                            <th>Registered IP</th>
                            <th>Password</th>
                            <th>Balance</th>
                            <th>Name</th>
                            <th>Account No</th>
                            <th>IFSC</th>
                            <th>UPI ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $dataRow; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 AdityaLoot - All Rights Reserved.
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.left = "0";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.left = "-100%";
        }

        // Search functionality
        function search() {
            let input = document.getElementById('searchbar').value.toLowerCase();
            let rows = document.getElementsByClassName('user');

            for (let i = 0; i < rows.length; i++) {
                if (!rows[i].innerHTML.toLowerCase().includes(input)) {
                    rows[i].style.display = "none";
                } else {
                    rows[i].style.display = "";
                }
            }
        }
    </script>

</body>

</html>
