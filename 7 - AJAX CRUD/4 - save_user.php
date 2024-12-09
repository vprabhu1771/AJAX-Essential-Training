<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role = $_POST['role'];

if ($id == '') {
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $email, $phone, $role);
} else {
    // Update existing user
    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, phone = ?, role = ? WHERE id = ?");
    $stmt->bind_param('ssssi', $name, $email, $phone, $role, $id);
}

if ($stmt->execute()) {
    echo "Success";
} else {
    echo "Error: " . $conn->error;
}
?>
