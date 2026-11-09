<?php
session_start();

// Prevent access if already logged in
if (isset($_SESSION['adusername']) && $_SESSION['adloggedin'] === true) {
    header("Location: admin.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Validate input
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $_SESSION['login_error'] = "Please enter both username and password";
        header("Location: redadmin.php");
        exit;
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare SQL statement
    $sql = "SELECT id, username, password FROM admin WHERE username = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            
            if (mysqli_stmt_num_rows($stmt) === 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    // Verify password
                    if (password_verify($password, $hashed_password)) {
                        // Successful login
                        $_SESSION['adusername'] = $username;
                        $_SESSION['id'] = $id;
                        $_SESSION['adloggedin'] = true;
                        header("Location: admin.php");
                        exit;
                    } else {
                        $_SESSION['login_error'] = "Invalid password";
                        header("Location: redadmin.php");
                        exit;
                    }
                }
            } else {
                $_SESSION['login_error'] = "Invalid username";
                header("Location: redadmin.php");
                exit;
            }
        } else {
            $_SESSION['login_error'] = "Database error. Please try again later.";
            header("Location: redadmin.php");
            exit;
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['login_error'] = "Database error. Please try again later.";
        header("Location: redadmin.php");
        exit;
    }
    mysqli_close($conn);
} else {
    header("Location: redadmin.php");
    exit;
}
?>