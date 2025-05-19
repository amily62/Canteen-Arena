<?php
include('connection.php');

// First check if the table exists
$check_table = "SHOW TABLES LIKE 'vieworder'";
$table_result = mysqli_query($conn, $check_table);

if (mysqli_num_rows($table_result) == 0) {
    die("Error: vieworder table does not exist!");
}

// Add location_details column if it doesn't exist
$check_column = "SHOW COLUMNS FROM vieworder LIKE 'location_details'";
$result = mysqli_query($conn, $check_column);

if (!$result) {
    die("Error checking column: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    $add_column = "ALTER TABLE vieworder ADD COLUMN location_details VARCHAR(255) DEFAULT NULL";
    if (mysqli_query($conn, $add_column)) {
        echo "Location details column added successfully!";
    } else {
        echo "Error adding column: " . mysqli_error($conn);
    }
} else {
    echo "Location details column already exists!";
}

// Verify the column was added
$verify = "SHOW COLUMNS FROM vieworder LIKE 'location_details'";
$verify_result = mysqli_query($conn, $verify);
if (mysqli_num_rows($verify_result) > 0) {
    echo "<br>Column verification successful!";
} else {
    echo "<br>Warning: Column verification failed!";
}
?> 