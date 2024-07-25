<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "misjsiit_dev";

// Create connection
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM notifications WHERE is_read = 0 ORDER BY created_at DESC";
$result = $conn->query($sql);

$notifications = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
}

$unread_count = count($notifications);

$response = array(
    'unread_count' => $unread_count,
    'notifications' => $notifications
);

echo json_encode($response);

$conn->close();
