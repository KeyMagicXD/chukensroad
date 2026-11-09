<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['adusername']) && $_SESSION['adloggedin'] === true) {
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="icon.png">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            background: linear-gradient(135deg, #0b0631, #2c1355);
            color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 20px;
        }
        .admin-container {
            background-color: #292929;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .admin-header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .admin-header img {
            width: 60px;
            height: 60px;
            margin-right: 10px;
        }
        .admin-header h2 {
            font-size: 26px;
            color: #f7b731;
            font-weight: bold;
        }
        .input-box {
            position: relative;
            margin-bottom: 25px;
        }
        .input-box input {
            width: 100%;
            padding: 15px 20px;
            border-radius: 8px;
            border: 1px solid #444;
            background-color: #1c1c1c;
            color: #fff;
            font-size: 16px;
        }
        .input-box input::placeholder {
            color: #888;
        }
        .input-box input:focus {
            outline: none;
            border-color: #f7b731;
            background-color: #2e2e2e;
        }
        .login-btn {
            width: 100%;
            padding: 15px;
            background-color: #f7b731;
            border: none;
            border-radius: 8px;
            color: #1c1e21;
            font-size: 18px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .login-btn:hover {
            background-color: #e09323;
        }
        .error-message {
            color: #ff4444;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .loading .loading-box {
            background-color: #007bff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .loading .progress-bar {
            width: 100%;
            height: 5px;
            background-color: rgba(255, 255, 255, 0.3);
            margin-top: 10px;
            border-radius: 3px;
            overflow: hidden;
        }
        .loading .progress-bar .bar {
            width: 100%;
            height: 100%;
            background-color: #fff;
            animation: loading-progress 1.5s linear infinite;
        }
        @keyframes loading-progress {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }
        @media (max-width: 500px) {
            .admin-container {
                padding: 20px;
                max-width: 350px;
            }
            .input-box input {
                padding: 12px 15px;
                font-size: 14px;
            }
            .login-btn {
                padding: 12px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <img src="/img/logo.png" alt="Admin Icon">
            <h2>Admin Login</h2>
        </div>
        <?php
        if (isset($_SESSION['login_error'])) {
            echo '<div class="error-message">' . htmlspecialchars($_SESSION['login_error']) . '</div>';
            unset($_SESSION['login_error']);
        }
        ?>
        <form action="adminverify.php" method="POST">
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
    <div id="loading" class="loading">
        <div class="loading-box">
            <span>Loading...</span>
            <div class="progress-bar">
                <div class="bar"></div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function () {
            document.getElementById("loading").style.display = "none";
        });
        if (!navigator.onLine) {
            document.getElementById("loading").style.display = "";
        }
    </script>
</body>
</html>