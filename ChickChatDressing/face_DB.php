<?php
session_start();
header('Content-Type: application/json');

// Get the raw POST data
$inputJSON = file_get_contents('php://input');
// Decode the JSON data
$inputData = json_decode($inputJSON, true);

// Assuming $connect is your database connection

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$faceData = $inputData['key1'];

// Use prepared statement to prevent SQL injection
$faceSql = "UPDATE profile SET face = 1 WHERE profile = {$_SESSION['UserID']}";
$stmt = mysqli_prepare($connect, $faceSql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "i", $_SESSION['UserID']);

// Execute the statement
mysqli_stmt_execute($stmt);

// Check if the query was successful
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo json_encode(['message' => 'Data updated successfully']);
} else {
    echo json_encode(['error' => 'Error updating data']);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($connect);
?>
