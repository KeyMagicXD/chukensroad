<?php
session_start();

// Redirect to home if user is already logged in
if (isset($_SESSION['username'])) {
    header("location: me");
    exit;
}

require_once "config.php";

$un = substr(trim($_POST["username"]), 3);  // Remove '+91' from the username to extract the actual number
$otp = trim($_POST["otp"]);
$query0 = "SELECT username FROM verify WHERE otp='$otp' ORDER BY id DESC";
$result3 = $conn->query($query0);
$row3 = mysqli_fetch_assoc($result3);
$verun = $row3['username'];

if (true) {
    // Define variables
    $username = $password = "";
    $username_err = $password_err = "";

    // Function to generate user code
    function genUserCode() {
        $str = "AB1CDE2FG3HI4JK5LM6NO7PQ8RS9TU0VQXYZ" . time();
        $str = str_split($str, 1);
        $l = count($str);
        $user_code = '';
        for ($i = 0; $i < 8; $i++) {
            $tn = rand(0, $l - 1);  // Fixed to generate user code correctly
            $user_code .= $str[$tn];
        }
        return $user_code;
    }

    $user_code = genUserCode();

    // Process form data when the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate username
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        } else {
            // Prepare a select statement to check if the username exists
            $sql = "SELECT id FROM users WHERE username = ?";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                $param_username = substr(trim($_POST["username"]), 3);  // Remove '+91'

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        header("location: login");
                    } else {
                        $username = substr(trim($_POST["username"]), 3);  // Remove '+91'
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        }

        // Validate password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate refcode and other user data
        $refcode = trim($_POST["refcode"]);
        $sql3 = "SELECT refcode, refcode1 FROM users WHERE usercode='$refcode'";
        $result3 = $conn->query($sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $refcode1 = $row3['refcode'];
        $refcode2 = $row3['refcode1'];

        $rip = getenv("REMOTE_ADDR");

        // Check input errors before inserting in database
        if (empty($username_err)) {
            // Prepare an insert statement
            $sql = "INSERT INTO users (username, password, refcode, usercode, refcode1, refcode2, balance, r_ip) VALUES (?, ?, ?, ?, ?, ?, 0, '$rip')";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_refcode, $param_usercode, $param_refcode1, $param_refcode2);
                $param_username = $username;
                $param_password = $password;
                $param_refcode = $refcode;
                $param_usercode = $user_code;
                $param_refcode1 = $refcode1;
                $param_refcode2 = $refcode2;

                if (mysqli_stmt_execute($stmt)) {
                    header("location:/login");
                } else {
                    echo "<script>
                            document.addEventListener('DOMContentLoaded', function(event) {
                                document.getElementById('snackbar').innerHTML = 'Server Error, Try Again';
                                document.getElementById('snackbar').style.display = '';
                                setTimeout(function () { document.getElementById('snackbar').style.display = 'none'; }, 3000);
                            });
                        </script>";
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function(event) {
                        document.getElementById('snackbar').innerHTML = 'Already Registered';
                        document.getElementById('snackbar').style.display = '';
                        setTimeout(function () { document.getElementById('snackbar').style.display = 'none'; }, 3000);
                    });
                </script>";
        }

        mysqli_close($conn);
    }
} else {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function(event) {
                document.getElementById('snackbar').innerHTML = 'Maximum OTPs Reached';
                document.getElementById('snackbar').style.display = '';
                setTimeout(function () { document.getElementById('snackbar').style.display = 'none'; }, 3000);
            });
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #0d0d0d;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #1f1f1f;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            text-align: center;
            color: #fff;
            animation: fadeIn 1.2s ease-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .login-container h2 {
            color: #f39c12;
            margin-bottom: 20px;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
            width: 100%;
        }
        .input-group input {
            width: 100%;
            padding: 12px 40px 12px 12px;
            border-radius: 8px;
            border: 1px solid #444;
            background-color: #292929;
            color: #fff;
            font-size: 16px;
            transition: border 0.3s;
        }
        .input-group input:focus {
            border-color: #f39c12;
        }
        .input-group .icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 12px;
            color: #f39c12;
        }
        .otp-group {
            display: flex;
            align-items: center;
        }
        .otp-group .login-btn {
            margin-left: 10px;
            padding: 10px 20px;
            font-size: 14px;
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #f39c12;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .login-btn:hover {
            background-color: #e67e22;
            transform: translateY(-3px);
        }
        .extra-options {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .extra-options a {
            color: #f39c12;
            text-decoration: none;
            font-size: 14px;
        }
        .extra-options a:hover {
            text-decoration: underline;
        }
        .error-msg {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }
            .login-container {
                padding: 20px;
            }
            .extra-options {
                flex-direction: column;
                align-items: center;
            }
            .extra-options a {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form id="createuser" method="POST">
            <div class="input-group">
                <input type="text" name="username" id="number" placeholder="Mobile Number (+91)" onfocus="if (!this.value.startsWith('+91')) { this.value = '+91'; }" required>
                <span class="icon">&#128241;</span>
            </div>
            <div class="input-group">
                <input type="password" id="pass" name="password" placeholder="Password" required>
                <span class="icon">&#128274;</span>
            </div>
            <div class="input-group">
                <input type="text" name="refcode" id="rcode" placeholder="Recommendation Code" required>
                <span class="icon">&#128213;</span>
            </div>
            <div class="input-group otp-group">
                <input type="text" id="verificationCode" name="otp" placeholder="OTP" required>
                <button id="otpbtn" type="button" class="login-btn" onclick="sendcode();">Send OTP</button>
            </div>
            <button type="button" class="login-btn" onclick="codeverify();">Register</button>
        </form>
        
        <!-- New section: Already have an account? -->
        <div class="extra-options">
           <center><p>Already have an account? <a href="login.php">Login</a></p></center>
        </div>
        
        <div id="snackbar" style="display: none;"></div>
    </div>

    <script>
        function sendcode() {
            var number = document.getElementById("number").value;
            var validNumber = number.substring(3); // Extracting the last 10 digits after +91
            if (number.startsWith('+91') && validNumber.length === 10) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "otp?num=" + validNumber, true); // Use only the 10 digits for OTP
                xmlhttp.send();
                document.getElementById("otpbtn").innerHTML = "Wait 120s";
                document.getElementById("otpbtn").disabled = true;
                timer(120);
            } else {
                showError("Enter a valid mobile number with +91");
            }
        }

        function timer(remaining) {
            if (remaining > 0) {
                setTimeout(function () {
                    document.getElementById("otpbtn").innerHTML = "Wait " + remaining + "s";
                    timer(remaining - 1);
                }, 1000);
            } else {
                document.getElementById("otpbtn").innerHTML = "Send OTP";
                document.getElementById("otpbtn").disabled = false;
            }
        }

        function codeverify() {
            var otp = document.getElementById("verificationCode").value;
            var mobile = document.getElementById("number").value;
            var pass = document.getElementById("pass").value;
            var ref = document.getElementById("rcode").value;

            if (!mobile.startsWith('+91') || mobile.length !== 13) {
                showError("Mobile number is required with +91");
            } else if (otp.length < 4) {
                showError("OTP is required");
            } else if (pass.length < 6) {
                showError("Enter a minimum 6-digit password");
            } else if (ref.length < 3) {
                showError("Recommendation code is required");
            } else {
                document.getElementById("createuser").submit();
            }
        }

        function showError(message) {
            document.getElementById("snackbar").innerHTML = message;
            document.getElementById("snackbar").style.display = "";
            setTimeout(function () {
                document.getElementById("snackbar").style.display = "none";
            }, 3000);
        }
    </script>
</body>
</html>
