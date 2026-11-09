<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["loggedin"])) {
    header("location: me");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username and password";
    } else {
        $username = substr(trim($_POST["username"]), 3);
        $password = trim($_POST['password']);
    }

    if (empty($err)) {
        $res = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        $result = mysqli_fetch_array($res);
        if ($result) {
            $loginip = getenv("REMOTE_ADDR");
            $sql2 = "SELECT * FROM users WHERE username='$username'";
            $result2 = $conn->query($sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $sql3 = "UPDATE users SET ip='$loginip' WHERE username='$username'";
            $conn->query($sql3);

            $_SESSION["username"] = $row2['username'];
            $_SESSION["id"] = $row2['id'];
            $_SESSION["usercode"] = $row2['usercode'];
            $_SESSION["refcode"] = $row2['refcode'];
            $_SESSION["refcode1"] = $row2['refcode1'];
            $_SESSION["refcode2"] = $row2['refcode2'];
            $_SESSION["loggedin"] = true;

            header("location: indexlogin");
        } else {
            $err = "Incorrect Username or Password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CODEOPENLAB</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <script>
        function validateNumber(input) {
            input.value = input.value.replace(/[^0-9+]/g, '');  // Removes any non-numeric characters
        }

        function addCountryCode() {
            const usernameField = document.getElementById("username");
            if (usernameField.value === "") {
                usernameField.value = "+91";
            }
        }
    </script>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    
    <?php if (!empty($err)): ?>
        <div class="error-msg"><?php echo $err; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="input-group">
            <input type="text" name="username" id="username" placeholder="Mobile number" onclick="addCountryCode()" oninput="validateNumber(this)" required>
            <i class="fas fa-user icon"></i>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
            <i class="fas fa-lock icon"></i>
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>

    <div class="extra-options">
        <a href="register.php">Register</a>
        <a href="forgot_pass.php">Forgot Password?</a>
    </div>
</div>

</body>
</html>
