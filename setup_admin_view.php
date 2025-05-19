<?php
include('connection.php');

// Drop the admin_view column if it exists
$drop_column = "ALTER TABLE vieworder DROP COLUMN IF EXISTS admin_view";
mysqli_query($conn, $drop_column);

// Add the admin_view column with proper default value
$add_column = "ALTER TABLE vieworder ADD COLUMN admin_view ENUM('visible', 'hidden') DEFAULT 'visible'";
$result = mysqli_query($conn, $add_column);

if ($result) {
    echo "Admin view column has been set up successfully!";
} else {
    echo "Error setting up admin view column: " . mysqli_error($conn);
}
?> 