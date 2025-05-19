<?php
include('connection.php');

// First check if the column exists
$check_column = "SHOW COLUMNS FROM vieworder LIKE 'order_time'";
$result = mysqli_query($conn, $check_column);

if (!$result) {
    die("Error checking column: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    // Column doesn't exist, add it
    $query = "ALTER TABLE vieworder ADD COLUMN order_time DATETIME DEFAULT CURRENT_TIMESTAMP";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Order time column added successfully'); window.location.href='order.php';</script>";
    } else {
        echo "<script>alert('Error adding column: " . mysqli_error($conn) . "'); window.location.href='order.php';</script>";
    }
} else {
    echo "<script>alert('Order time column already exists'); window.location.href='order.php';</script>";
}
?> 