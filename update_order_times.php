<?php
include('connection.php');

// Set timezone to Bangladesh
date_default_timezone_set('Asia/Dhaka');

// Get current time
$current_time = new DateTime();

// Update all existing orders with random timestamps within last 24 hours
$query = "SELECT id FROM vieworder WHERE order_time IS NULL";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    // Generate random time within last 24 hours
    $random_hours = rand(0, 23);
    $random_minutes = rand(0, 59);
    $random_time = clone $current_time;
    $random_time->modify("-$random_hours hours");
    $random_time->modify("-$random_minutes minutes");
    
    $formatted_time = $random_time->format('Y-m-d H:i:s');
    
    // Update this specific order
    $update_query = "UPDATE vieworder SET order_time = '$formatted_time' WHERE id = " . $row['id'];
    mysqli_query($conn, $update_query);
}

echo "All orders have been updated with random timestamps within the last 24 hours";
?> 