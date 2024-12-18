<?php
header('Content-Type: application/json');

// Database connection
include "../db.php";

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'] ?? '';

if ($id) {
    $stmt = $conn->prepare("DELETE FROM brands WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo json_encode(['success' => 'Brand deleted successfully']);
} else {
    echo json_encode(['error' => 'Invalid brand ID']);
}

$stmt->close();
$conn->close();
?>
