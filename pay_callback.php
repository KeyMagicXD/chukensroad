<?php 

require_once "config.php";
$con = $conn;

// Payment gateway callback page

// Get the JSON data from the request body
$json_data = file_get_contents('php://input');

// Decode JSON data
$data = json_decode($json_data, true);

// Extract keys and assign to variables
$mer_no = $data['mer_no'];
$order_no = $data['order_no'];
$paytypecode = $data['paytypecode'];
$order_amount = $data['order_amount'];
$order_realityamount = $data['order_realityamount'];
$status = $data['status'];
$sys_no = $data['sys_no'];
$sign = $data['sign'];

$log_message = ''; // Initialize log message variable

if ($status == "success") {
    // Fetch the values of the columns order_id, order_no, order_amount, and userid
    $query1 = "SELECT order_id, order_no, order_amount, userid, payphone FROM cxrpays WHERE status = 'pending' AND order_no = ?";
    $stmt1 = $con->prepare($query1);
    $stmt1->bind_param("s", $order_no);
    $stmt1->execute();
    $stmt1->bind_result($order_id, $order_no, $order_amount, $userid, $payphone);
    
    // Fetch the results
    $stmt1->fetch();
    $stmt1->close();
    
    // Update the status in the database
    $query2 = "UPDATE cxrpays SET status = 'completed' WHERE order_no = ?";
    $stmt2 = $con->prepare($query2);
    $stmt2->bind_param("s", $order_no);
    $stmt2->execute();
    $stmt2->close();

    // Update user balance
    $upi = "test@paytm";
    $utr = rand(11111111111, 99999999999);
    $update_query = "UPDATE users SET balance = balance + ? WHERE username = ?";
    $update_stmt = $con->prepare($update_query);
    $update_stmt->bind_param("ss", $order_amount, $userid);
    if ($update_stmt->execute()) {
        $log_message .= "User balance updated successfully.\n";
    }
    $update_stmt->close();

    // Insert recharge record
    $insert_query = "INSERT INTO recharge (username, recharge, status, upi, utr, rand) VALUES (?, ?, 'success', ?, ?, ?)";
    $insert_stmt = $con->prepare($insert_query);
    $insert_stmt->bind_param("sdsds", $userid, $order_amount, $upi, $utr, $order_no);
    if ($insert_stmt->execute()) {
        $log_message .= "Recharge record inserted successfully.\n";
    }
    $insert_stmt->close();

    // Write the SQL queries, log message, and JSON data to a text file
    $sql_queries = "Query 1 (SELECT): $query1\nQuery 2 (UPDATE): $query2\n";
    $json_string = json_encode($data, JSON_PRETTY_PRINT);
    $file_content = "SQL Queries:\n$sql_queries\n$log_message\nJSON Data:\n$json_string";

    $file_path = 'callback.txt';
    file_put_contents($file_path, $file_content);

    echo "success: SQL queries executed successfully.";
} else {
    echo "failure: Payment status is not 'success'.";
}

?>
