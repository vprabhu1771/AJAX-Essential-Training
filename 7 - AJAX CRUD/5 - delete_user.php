<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $userId = $data['id'];

    // Delete query
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo json_encode("User deleted successfully.");
    } else {
        http_response_code(500);
        echo json_encode("Error deleting user.");
    }

    $stmt->close();
}
$conn->close();
?>
