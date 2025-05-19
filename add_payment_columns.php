<?php
include('connection.php');

// Add payment method column
$check_payment_method = "SHOW COLUMNS FROM vieworder LIKE 'payment_method'";
$result = mysqli_query($conn, $check_payment_method);

if (mysqli_num_rows($result) == 0) {
    $query = "ALTER TABLE vieworder ADD COLUMN payment_method VARCHAR(20) DEFAULT 'Cash on Delivery'";
    if (mysqli_query($conn, $query)) {
        echo "Payment method column added successfully<br>";
    } else {
        echo "Error adding payment method column: " . mysqli_error($conn) . "<br>";
    }
}

// Add payment gateway column
$check_payment_gateway = "SHOW COLUMNS FROM vieworder LIKE 'payment_gateway'";
$result = mysqli_query($conn, $check_payment_gateway);

if (mysqli_num_rows($result) == 0) {
    $query = "ALTER TABLE vieworder ADD COLUMN payment_gateway VARCHAR(20) DEFAULT NULL";
    if (mysqli_query($conn, $query)) {
        echo "Payment gateway column added successfully<br>";
    } else {
        echo "Error adding payment gateway column: " . mysqli_error($conn) . "<br>";
    }
}

// Add payment number column
$check_payment_number = "SHOW COLUMNS FROM vieworder LIKE 'payment_number'";
$result = mysqli_query($conn, $check_payment_number);

if (mysqli_num_rows($result) == 0) {
    $query = "ALTER TABLE vieworder ADD COLUMN payment_number VARCHAR(20) DEFAULT NULL";
    if (mysqli_query($conn, $query)) {
        echo "Payment number column added successfully<br>";
    } else {
        echo "Error adding payment number column: " . mysqli_error($conn) . "<br>";
    }
}

echo "<script>alert('Payment columns added successfully'); window.location.href='order.php';</script>";
?> 