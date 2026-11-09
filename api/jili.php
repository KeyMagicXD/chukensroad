<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "selimdem_selimxpro";
$password = "selimdem_selimxpro";
$dbname = "selimdem_selimxpro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle and respond to errors
function handleError($message) {
    // Set the content type to HTML
    header('Content-Type: text/html; charset=utf-8');

    // Output the HTML for the error message
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8d7da;
                color: #721c24;
                margin: 0;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .error-container {
                background-color: #f5c6cb;
                border: 1px solid #f5c6cb;
                border-radius: 5px;
                padding: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            .error-message {
                font-size: 18px;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="error-container">
            <p class="error-message">' . htmlspecialchars($message) . '</p>
        </div>
    </body>
    </html>
    ';
    exit();
}

// Get the current URL path
$request = $_SERVER['REQUEST_URI'];

// Define routes
if ($_SERVER['REQUEST_METHOD'] === 'GET' && strpos($request, '/getUserBalance') !== false) {
    if (isset($_GET['userId'])) {
        $userId = $_GET['userId'];

        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT balance FROM users WHERE username = ?");
        $stmt->bind_param("s", $userId);

        // Execute statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $balance = $row['balance'];

                // Return balance as JSON
                header('Content-Type: application/json');
                echo json_encode(["balance" => $balance]);
            } else {
                handleError("User not found");
            }
        } else {
            handleError("Failed to fetch balance");
        }

        $stmt->close();
    } else {
        handleError("Missing userId parameter");
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($request, '/bet') !== false) {
    $data = json_decode(file_get_contents("php://input"), true);
    $userId = $data['userId'];
    $betAmount = $data['betAmount'];
    $winloseAmount = $data['winloseAmount'];

    if (!$userId || $betAmount === null || $winloseAmount === null) {
        handleError('Missing parameter');
    }

    // Perform the bet logic
    $stmt = $conn->prepare("SELECT balance FROM users WHERE username = ?");
    $stmt->bind_param("s", $userId);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentBalance = $row['balance'];
            $newBalance = $currentBalance - $betAmount + $winloseAmount;

            $updateStmt = $conn->prepare("UPDATE users SET balance = ? WHERE username = ?");
            $updateStmt->bind_param("ds", $newBalance, $userId);
            if ($updateStmt->execute()) {
                header('Content-Type: application/json');
                echo json_encode(["newBalance" => $newBalance]);
            } else {
                handleError('Failed to update balance');
            }

            $updateStmt->close();
        } else {
            handleError('User not found');
        }
    } else {
        handleError('Failed to fetch current balance');
    }

    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($request, '/sessionBet') !== false) {
    $data = json_decode(file_get_contents("php://input"), true);
    $userId = $data['userId'];
    $betAmount = $data['betAmount'];
    $winloseAmount = $data['winloseAmount'];
    $sessionId = $data['sessionId'];
    $type = $data['type'];

    if (!$userId || $betAmount === null || $winloseAmount === null || $sessionId === null || $type === null) {
        handleError('Missing parameter');
    }

    // Perform the session bet logic
    $stmt = $conn->prepare("SELECT balance FROM users WHERE username = ?");
    $stmt->bind_param("s", $userId);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentBalance = $row['balance'];
            $newBalance = $type == 1 ? $currentBalance - $betAmount : $currentBalance + $winloseAmount;

            $updateStmt = $conn->prepare("UPDATE users SET balance = ? WHERE username = ?");
            $updateStmt->bind_param("ds", $newBalance, $userId);
            if ($updateStmt->execute()) {
                header('Content-Type: application/json');
                echo json_encode(["newBalance" => $newBalance]);
            } else {
                handleError('Failed to update balance');
            }

            $updateStmt->close();
        } else {
            handleError('User not found');
        }
    } else {
        handleError('Failed to fetch current balance');
    }

    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($request, '/cancelBet') !== false) {
    $data = json_decode(file_get_contents("php://input"), true);
    $userId = $data['userId'];
    $betAmount = $data['betAmount'];
    $round = $data['round'];

    if (!$userId || $betAmount === null || $round === null) {
        handleError('Missing parameter');
    }

    // Cancel the bet logic
    $stmt = $conn->prepare("SELECT balance FROM users WHERE username = ?");
    $stmt->bind_param("s", $userId);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentBalance = $row['balance'];
            $newBalance = $currentBalance + $betAmount; // Reverting the bet amount to the balance

            $updateStmt = $conn->prepare("UPDATE users SET balance = ? WHERE username = ?");
            $updateStmt->bind_param("ds", $newBalance, $userId);
            if ($updateStmt->execute()) {
                header('Content-Type: application/json');
                echo json_encode(["newBalance" => $newBalance, "message" => "Bet canceled"]);
            } else {
                handleError('Failed to update balance');
            }

            $updateStmt->close();
        } else {
            handleError('User not found');
        }
    } else {
        handleError('Failed to fetch current balance');
    }

    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($request, '/cancelSessionBet') !== false) {
    $data = json_decode(file_get_contents("php://input"), true);
    $userId = $data['userId'];
    $betAmount = $data['betAmount'];
    $sessionId = $data['sessionId'];
    $type = $data['type'];

    if (!$userId || $betAmount === null || $sessionId === null || $type === null) {
        handleError('Missing parameter');
    }

    // Cancel the session bet logic
    $stmt = $conn->prepare("SELECT balance FROM users WHERE username = ?");
    $stmt->bind_param("s", $userId);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentBalance = $row['balance'];
            $newBalance = $currentBalance + $betAmount; // Reverting the bet amount to the balance

            $updateStmt = $conn->prepare("UPDATE users SET balance = ? WHERE username = ?");
            $updateStmt->bind_param("ds", $newBalance, $userId);
            if ($updateStmt->execute()) {
                header('Content-Type: application/json');
                echo json_encode(["newBalance" => $newBalance, "message" => "Session bet canceled"]);
            } else {
                handleError('Failed to update balance');
            }

            $updateStmt->close();
        } else {
            handleError('User not found');
        }
    } else {
        handleError('Failed to fetch current balance');
    }

    $stmt->close();
} else {
    // Handle unsupported methods or endpoints
    handleError('Go To https://1stwingo.online and add this URL');
}

// Close the database connection
$conn->close();
?>
