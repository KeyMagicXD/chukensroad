<?php
$host = 'localhost';
$dbname = 'selimdem_selimxpro';
$user = 'selimdem_selimxpro'; // This should be your username
$pass = 'selimdem_selimxpro'; // This should be your password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode([
        'status' => '0002',
        'balance' => 0,
        'err_text' => 'Database error'
    ]);
    exit;
}

function logData($data, $type) {
    $logFile = __DIR__ . "/logs/{$type}.log";
    $logEntry = date('Y-m-d H:i:s') . ' ' . json_encode($data, JSON_PRETTY_PRINT) . "\n";
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

if (!is_dir(__DIR__ . '/logs')) {
    mkdir(__DIR__ . '/logs', 0755, true);
}

$request = file_get_contents('php://input');

logData(['request' => $request], 'requests');

$requestData = json_decode($request, true);

logData(['decodedRequest' => $requestData], 'decoded_requests');

if (json_last_error() !== JSON_ERROR_NONE) {
    $response = [
        'status' => '0002',
        'balance' => 0,
        'err_text' => 'Invalid JSON format'
    ];
    logData(['error' => json_last_error_msg(), 'request' => $request], 'errors');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$response = [];

switch ($requestData['action'] ?? null) {
    case 6:
        logData(['action' => $requestData['action'], 'parameters' => $requestData], 'action_logs');

        $username = $requestData['uid'] ?? '';

        if (empty($username) || !ctype_alnum($username) || strlen($username) > 30) {
            $response = [
                'status' => '0001',
                'balance' => 0,
                'err_text' => 'Invalid UID'
            ];
        } else {
            try {
                $stmt = $pdo->prepare("SELECT balance FROM users WHERE username = :username");
                $stmt->execute(['username' => $username]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    $balance = $row['balance'];
                    $response = [
                        'status' => '0000',
                        'balance' => $balance,
                        'err_text' => ''
                    ];
                } else {
                    $response = [
                        'status' => '0001',
                        'balance' => 0,
                        'err_text' => 'User not found'
                    ];
                }
            } catch (PDOException $e) {
                error_log('Database query failed: ' . $e->getMessage());
                $response = [
                    'status' => '0002',
                    'balance' => 0,
                    'err_text' => 'Database error'
                ];
            }
        }
        break;

    case 8:
        logData(['action' => $requestData['action'], 'parameters' => $requestData], 'action_logs');

        $username = $requestData['uid'] ?? '';
        $bet = $requestData['bet'] ?? 0;
        $win = $requestData['win'] ?? 0;

        if (empty($username) || !ctype_alnum($username) || strlen($username) > 30) {
            $response = [
                'status' => '0001',
                'balance' => 0,
                'err_text' => 'Invalid UID'
            ];
            echo json_encode($response);
            exit();
        }

        if (!is_numeric($bet) || !is_numeric($win)) {
            $response = [
                'status' => '0001',
                'balance' => 0,
                'err_text' => 'Invalid parameters'
            ];
            echo json_encode($response);
            exit();
        }

        try {
            $stmt = $pdo->prepare("SELECT balance FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                $response = [
                    'status' => '0001',
                    'balance' => 0,
                    'err_text' => 'User not found'
                ];
                echo json_encode($response);
                exit();
            }

            $currentBalance = $row['balance'];

            $newBalance = $currentBalance + $win - abs($bet);

            $stmt = $pdo->prepare("UPDATE users SET balance = :balance WHERE username = :username");
            $stmt->execute(['balance' => $newBalance, 'username' => $username]);

            $response = [
                'status' => '0000',
                'balance' => $newBalance,
                'err_text' => ''
            ];

        } catch (PDOException $e) {
            error_log('Database query failed: ' . $e->getMessage());
            $response = [
                'status' => '0002',
                'balance' => 0,
                'err_text' => 'Database error'
            ];
        }

        echo json_encode($response);
        break;

    case 9:
        logData(['action' => $requestData['action'], 'parameters' => $requestData], 'action_logs');

        $username = $requestData['uid'] ?? '';
        $amount = $requestData['amount'] ?? 0;

        if (empty($username) || !ctype_alnum($username) || strlen($username) > 30 || $amount <= 0) {
            $response = [
                'status' => '0001',
                'balance' => 0,
                'err_text' => 'Invalid parameters'
            ];
        } else {
            try {
                $stmt = $pdo->prepare("UPDATE users SET balance = balance - :amount WHERE username = :username AND balance >= :amount");
                $stmt->execute(['amount' => $amount, 'username' => $username]);

                if ($stmt->rowCount() > 0) {
                    $stmt = $pdo->prepare("SELECT balance FROM users WHERE username = :username");
                    $stmt->execute(['username' => $username]);
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $balance = $row['balance'];

                    $response = [
                        'status' => '0000',
                        'balance' => $balance,
                        'err_text' => ''
                    ];
                } else {
                    $response = [
                        'status' => '0001',
                        'balance' => 0,
                        'err_text' => 'Insufficient balance or user not found'
                    ];
                }
            } catch (PDOException $e) {
                error_log('Database query failed: ' . $e->getMessage());
                $response = [
                    'status' => '0002',
                    'balance' => 0,
                    'err_text' => 'Database error'
                ];
            }
        }
        break;

    case 10:
        logData(['action' => $requestData['action'], 'parameters' => $requestData], 'action_logs');

        $username = $requestData['uid'] ?? '';
        $amount = $requestData['amount'] ?? 0;

        if (empty($username) || !ctype_alnum($username) || strlen($username) > 30 || $amount <= 0) {
            $response = [
                'status' => '0001',
                'balance' => 0,
                'err_text' => 'Invalid parameters'
            ];
        } else {
            try {
                $stmt = $pdo->prepare("SELECT balance FROM users WHERE username = :username");
                $stmt->execute(['username' => $username]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$row) {
                    $response = [
                        'status' => '0001',
                        'balance' => 0,
                        'err_text' => 'User not found'
                    ];
                } else {
                    $currentBalance = $row['balance'];

                    $newBalance = $currentBalance + $amount;

                    $stmt = $pdo->prepare("UPDATE users SET balance = :balance WHERE username = :username");
                    $stmt->execute(['balance' => $newBalance, 'username' => $username]);

                    $response = [
                        'status' => '0000',
                        'balance' => $newBalance,
                        'err_text' => ''
                    ];
                }
            } catch (PDOException $e) {
                error_log('Database query failed: ' . $e->getMessage());
                $response = [
                    'status' => '0002',
                    'balance' => 0,
                    'err_text' => 'Database error'
                ];
            }
        }
        break;

    case 11:
        logData(['action' => $requestData['action'], 'parameters' => $requestData], 'action_logs');

        $username = $requestData['uid'] ?? '';
        $amount = $requestData['amount'] ?? 0;

        if (empty($username) || !ctype_alnum($username) || strlen($username) > 30 || $amount <= 0) {
            $response = [
                'status' => '0001',
                'balance' => 0,
                'err_text' => 'Invalid parameters'
            ];
        } else {
            try {
                // Start transaction to ensure atomicity
                $pdo->beginTransaction();

                // Fetch the current balance
                $stmt = $pdo->prepare("SELECT balance FROM users WHERE username = :username");
                $stmt->execute(['username' => $username]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$row) {
                    $pdo->rollBack(); // Rollback if user is not found
                    $response = [
                        'status' => '0001',
                        'balance' => 0,
                        'err_text' => 'User not found'
                    ];
                } else {
                    $currentBalance = $row['balance'];

                    // Ensure the user has sufficient balance before cancellation
                    if ($currentBalance >= $amount) {
                        $newBalance = $currentBalance + $amount;

                        // Update the user's balance
                        $stmt = $pdo->prepare("UPDATE users SET balance = :balance WHERE username = :username");
                        $stmt->execute(['balance' => $newBalance, 'username' => $username]);

                        $pdo->commit(); // Commit the transaction

                        $response = [
                            'status' => '0000',
                            'balance' => $newBalance,
                            'err_text' => ''
                        ];
                    } else {
                        $pdo->rollBack(); // Rollback if the balance is insufficient
                        $response = [
                            'status' => '0001',
                            'balance' => 0,
                            'err_text' => 'Insufficient balance'
                        ];
                    }
                }
            } catch (PDOException $e) {
                $pdo->rollBack(); // Rollback if any error occurs
                error_log('Database query failed: ' . $e->getMessage());
                $response = [
                    'status' => '0002',
                    'balance' => 0,
                    'err_text' => 'Database error'
                ];
            }
        }
        break;

    default:
        $response = [
            'status' => '0003',
            'balance' => 0,
            'err_text' => 'Invalid action'
        ];
        break;
}

logData(['response' => $response], 'responses');

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>