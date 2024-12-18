<?php

// Database connection
include "../db.php";

$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$upload_dir = "uploads/"; // Directory to store uploaded files
$logo = null;

// Check if a file is uploaded
if (!empty($_FILES['logo']['name'])) {
    $file_name = basename($_FILES['logo']['name']);
    $target_file = $upload_dir . $file_name;

    // Validate the file type (allow only images)
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($_FILES['logo']['type'], $allowed_types)) {
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {
            $logo = $upload_dir . $file_name; // Save the filename for the database
        } else {
            die('File upload failed. Please try again.');
        }
    } else {
        die('Invalid file type. Only JPG, PNG, and GIF files are allowed.');
    }
}

if ($id) {
    // Update brand
    if ($logo) {
        $stmt = $conn->prepare("UPDATE brands SET name = ?, logo = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $logo, $id);
    } else {
        $stmt = $conn->prepare("UPDATE brands SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $name, $id);
    }
    $stmt->execute();
    echo 'Brand updated successfully';
} else {
    // Insert new brand
    if ($logo) {
        $stmt = $conn->prepare("INSERT INTO brands (name, logo) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $logo);
        $stmt->execute();
        echo 'Brand added successfully';
    } else {
        die('Logo is required for adding a new brand.');
    }
}

$stmt->close();
$conn->close();
?>
