<?php
header('Content-Type: application/json');

// Database connection
include "../db.php";

$sql = "SELECT * FROM brands";
$result = $conn->query($sql);

$brands = [];
while ($row = $result->fetch_assoc()) {
    $brands[] = $row;
}

echo json_encode($brands);

$conn->close();
?>
