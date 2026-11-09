<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}

require_once "config.php";

// Fetch withdrawal records
$query =  "SELECT * FROM record WHERE status='Applying' OR status='Agree' ORDER BY id DESC";
$result1 = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query);

$dataRow = "";
while($row2 = mysqli_fetch_array($result2)) {
    $query0 = "SELECT account, ifsc, upi FROM users WHERE username='$row2[1]'";
    $result3 = $conn->query($query0);
    $row3 = mysqli_fetch_assoc($result3);

    $alink = '"/waccept?am='.$row2[2].'&un='.$row2[1].'&id='.$row2[0].'"';
    $blink = '"/agree?am='.$row2[2].'&un='.$row2[1].'&id='.$row2[0].'"';
    $dlink = '"/wdecline?am='.$row2[2].'&un='.$row2[1].'&id='.$row2[0].'"';

    $dataRow .= "<tr><td>$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td><td>$row3[account]</td><td>$row3[ifsc]</td><td>$row3[upi]</td>
                 <td onclick='window.location.href=$blink;' style='background:green;'>AGREE</td>
                 <td onclick='window.location.href=$alink;' style='background:green;'>YES</td>
                 <td onclick='window.location.href=$dlink;'style='background:red;'>NO</td></tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw Requests</title>
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
            z-index: 1;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
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
            padding-bottom: 80px;
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow-x: auto;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            text-align: left;
            padding: 12px;
            white-space: nowrap;
        }
        th {
            background-color: #34495e;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
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
        @media screen and (max-width: 768px) {
            .sidenav {
                width: 100%;
                position: relative;
            }
            #main {
                margin-left: 0;
            }
            table, th, td {
                font-size: 14px;
                padding: 10px;
            }
        }
        @media screen and (max-width: 480px) {
            th, td {
                font-size: 12px;
                padding: 8px;
            }
            .menu-btn {
                font-size: 25px;
            }
        }
    </style>
</head>
<body>

    <header>
        <span class="menu-btn" onclick="openNav()">&#9776;</span>
        <h1>Withdraw Requests</h1>
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
            <h2>Withdraw Requests</h2>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Bank</th>
                    <th>IFSC</th>
                    <th>UPI</th>
                    <th>Agree</th>
                    <th>Approve</th>
                    <th>Decline</th>
                </tr>
                <?php echo $dataRow; ?>
            </table>
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
