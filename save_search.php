<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit();
}

require 'db_connection.php'; // Include your database connection file

$data = json_decode(file_get_contents('php://input'), true);
$query = isset($data['query']) ? trim($data['query']) : '';

if (empty($query)) {
    echo json_encode(['success' => false, 'error' => 'Empty query']);
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO search_history (user_id, query) VALUES (?, ?)");
if (!$stmt) {
    echo json_encode(['success' => false, 'error' => 'Failed to prepare statement: ' . $conn->error]);
    exit();
}

$stmt->bind_param("is", $user_id, $query);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to execute statement: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>