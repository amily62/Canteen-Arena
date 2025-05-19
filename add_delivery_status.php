<?php
include('connection.php');

$query = "ALTER TABLE vieworder ADD COLUMN IF NOT EXISTS delivery_status VARCHAR(20) DEFAULT 'Work in Processing'";
if (mysqli_query($conn, $query)) {
    echo "Column added successfully";
} else {
    echo "Error adding column: " . mysqli_error($conn);
}
?> 