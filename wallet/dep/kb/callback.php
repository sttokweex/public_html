<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$requestBody = file_get_contents('php://input');

file_put_contents('webhook_log.txt', date('Y-m-d H:i:s') . "\n" . $requestBody . "\n\n", FILE_APPEND);

$data = json_decode($requestBody, true);

if (isset($data['update_type']) && $data['update_type'] === 'invoice_paid') {
    
    $invoice = $data['payload'];

    if ($invoice['status'] === 'paid') {
        
        $host = 'localhost'; 
        $db = 'fmd404ln_db'; 
        $user = 'fmd404ln_db'; 
        $pass = '%kWjv0k0iOzk'; 

        $mysqli = new mysqli($host, $user, $pass, $db);

        if ($mysqli->connect_error) {
            file_put_contents('db_error_log.txt', date('Y-m-d H:i:s') . ": Connection failed: " . $mysqli->connect_error . "\n", FILE_APPEND);
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        
        $tg_id = $mysqli->prepare("SELECT COUNT(*) FROM users WHERE tg_id ORDER BY id DESC");
        $stmt1 = $mysqli->prepare("SELECT tg_id, COUNT(*) as count FROM users GROUP BY tg_id ORDER BY count DESC;?");
        $stmt1->bind_param("s", $tg_id);
        
        if ($stmt1->execute()) {
            $result = $stmt1->get_result();
            if ($row = $result->fetch_assoc()) {
                $userId = $mysqli->prepare("SELECT COUNT(*) FROM users WHERE tg_id ORDER BY id DESC");
            } else {
                file_put_contents('db_error_log.txt', date('Y-m-d H:i:s') . ": No user found for invoice_id " . $invoiceId . "\n", FILE_APPEND);
                $stmt1->close();
                $mysqli->close();
                exit; 
            }
        } else {
            file_put_contents('db_error_log.txt', date('Y-m-d H:i:s') . ": Error executing query: " . $stmt->error . "\n", FILE_APPEND);
            $stmt1->close();
            $mysqli->close();
            exit; 
        }

       
        $status1 = 1;
        $stmt = $mysqli->prepare("INSERT INTO deposits (invoice_id, amount, currency, status, user_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisii", $invoice['invoice_id'], $invoice['amount'], $invoice['asset'], $status1, $userId);
        
        if ($stmt->execute()) {
            file_put_contents('payments_log.txt', date('Y-m-d H:i:s') . ": Payment processed for invoice " . $invoice['invoice_id'] . "\n", FILE_APPEND);
            
            $amount = $invoice['amount']; 

            
            $updateStmt = $mysqli->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
            $updateStmt->bind_param("di", $amount, $userId); 

            if ($updateStmt->execute()) {
                file_put_contents('balance_log.txt', date('Y-m-d H:i:s') . ": Balance updated for user ID " . $userId . ", Amount: " . $amount . "\n", FILE_APPEND);
            } else {
                file_put_contents('db_error_log.txt', date('Y-m-d H:i:s') . ": Error updating balance: " . $updateStmt->error . "\n", FILE_APPEND);
            }

            $updateStmt->close();
        } else {
            file_put_contents('db_error_log.txt', date('Y-m-d H:i:s') . ": Error executing query: " . $stmt->error . "\n", FILE_APPEND);
        }

        $stmt->close();
        $mysqli->close();
    } else {
        file_put_contents('status_log.txt', date('Y-m-d H:i:s') . ": Invoice " . $invoice['invoice_id'] . " not paid - status: " . $invoice['status'] . "\n", FILE_APPEND);
    }
}

http_response_code(200);
?>