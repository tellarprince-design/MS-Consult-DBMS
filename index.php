<?php
$conn = new mysqli(
    getenv('DB_HOST'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_NAME')
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = file_get_contents('database/schema.sql');

if ($conn->multi_query($sql)) {
    echo "Database imported successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>