<?php
include('connection.php');

// Add all necessary columns if they don't exist
$columns = [
    "ALTER TABLE vieworder ADD COLUMN IF NOT EXISTS order_time DATETIME DEFAULT CURRENT_TIMESTAMP",
    "ALTER TABLE vieworder ADD COLUMN IF NOT EXISTS location_details VARCHAR(255) DEFAULT NULL",
    "ALTER TABLE vieworder ADD COLUMN IF NOT EXISTS payment_method VARCHAR(20) DEFAULT 'Cash on Delivery'",
    "ALTER TABLE vieworder ADD COLUMN IF NOT EXISTS payment_details VARCHAR(255) DEFAULT NULL",
    "ALTER TABLE vieworder ADD COLUMN IF NOT EXISTS delivery_status VARCHAR(20) DEFAULT 'Work in Processing'"
];

foreach ($columns as $query) {
    if (!mysqli_query($conn, $query)) {
        echo "Error adding column: " . mysqli_error($conn) . "<br>";
    }
}

echo "Table structure updated successfully!";
?> 