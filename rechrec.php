<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";
   
$query =  "SELECT  * FROM recharge ORDER BY id DESC ";

// result for method one
$result1 = mysqli_query($conn, $query);

// result for method two 
$result2 = mysqli_query($conn, $query);
$rowcount = mysqli_num_rows($result2);

$dataRow = "";
while($row2 = mysqli_fetch_array($result2)) {
    $dataRow = $dataRow."<tr class='user'><td>$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td><td>$row2[5]</td></tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recharge Record</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: "Lato", sans-serif;
            background-color: #f4f4f9;
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
            max-width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #34495e;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #searchbar {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 50%;
            margin-left: 25%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .input_box_btn {
            text-align: center;
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
                position: relative;
            }
            #main {
                margin-left: 0;
            }
            #searchbar {
                width: 80%;
                margin-left: 10%;
            }
            table {
                font-size: 14px;
            }
        }
        @media screen and (max-width: 480px) {
            .menu-btn {
                font-size: 25px;
            }
            #searchbar {
                width: 100%;
                margin-left: 0;
            }
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>

    <header>
        <span class="menu-btn" onclick="openNav()">&#9776;</span>
        <h1>Recharge Record</h1>
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
            <input id="searchbar" onkeyup="search()" type="text" placeholder="Search by username">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>UPI ID</th>
                </tr>
                <?php echo $dataRow; ?>
            </table>
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
            document.getElementById("main").style.marginLeft= "0";
        }

        function search() {
            let input = document.getElementById('searchbar').value.toLowerCase();
            let x = document.getElementsByClassName('user');
            for (i = 0; i < x.length; i++) {
                if (!x[i].innerHTML.toLowerCase().includes(input)) {
                    x[i].style.display="none";
                }
                else {
                    x[i].style.display="";                
                }
            }
        }
    </script>

</body>
</html>
