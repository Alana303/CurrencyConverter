<?php
// Include the database configuration file
include('db_config.php');

// Get POST data from the request body
$data = json_decode(file_get_contents('php://input'), true);

// Prepare the SQL statement to insert conversion data
$stmt = $conn->prepare("INSERT INTO conversions (from_currency, to_currency, amount, result, datetime) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $data['from'], $data['to'], $data['amount'], $data['result'], $data['datetime']);

// Execute the query and handle success or failure
if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to save conversion']);
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>
