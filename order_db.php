<?php
session_start();
include('connection.php');

// Check if all required POST data exists
if (!isset($_POST['food_name']) || !isset($_POST['price']) || !isset($_POST['quantity']) || !isset($_POST['place']) || !isset($_POST['payment_method'])) {
    echo "<script>alert('Missing required order information'); window.location.href='order.php';</script>";
    exit();
}

// First check if location_details column exists
$check_column = "SHOW COLUMNS FROM vieworder LIKE 'location_details'";
$result = mysqli_query($conn, $check_column);

if (mysqli_num_rows($result) == 0) {
    // Add the column if it doesn't exist
    $add_column = "ALTER TABLE vieworder ADD COLUMN location_details VARCHAR(255) DEFAULT NULL";
    mysqli_query($conn, $add_column);
}

$email = $_SESSION['em'];
$food_name = $_POST['food_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$place_order = $_POST['place'];
$payment_method = $_POST['payment_method'];
$location_details = isset($_POST['location_details']) ? $_POST['location_details'] : '';

// Initialize payment variables
$payment_gateway = NULL;
$payment_number = NULL;

// Validate payment method
if ($payment_method === 'Online Payment') {
    if (!isset($_POST['payment_gateway']) || !isset($_POST['payment_number']) || !isset($_POST['otp'])) {
        echo "<script>alert('Please complete the payment process'); window.location.href='order.php';</script>";
        exit();
    }
    
    $payment_gateway = $_POST['payment_gateway'];
    $payment_number = $_POST['payment_number'];
    $otp = $_POST['otp'];
    
    // Here you would typically verify the OTP
    // For demo purposes, we'll just check if it's a 6-digit number
    if (!preg_match('/^\d{6}$/', $otp)) {
        echo "<script>alert('Invalid OTP'); window.location.href='order.php';</script>";
        exit();
    }
}

$query = "select name from registration where email = '$email'";
$result = mysqli_query($conn, $query);
$un = mysqli_fetch_assoc($result);

$customer_name = $un['name'];

// Set timezone to Bangladesh
date_default_timezone_set('Asia/Dhaka');

// Get current time in Bangladesh timezone
$current_time = date('Y-m-d H:i:s');

// Now insert the order with location details
$query2 = "INSERT INTO vieworder (
    customer_name, 
    food_name, 
    quantity, 
    order_location, 
    location_details,
    price, 
    order_time, 
    payment_method, 
    payment_gateway, 
    payment_number
) VALUES (
    '$customer_name', 
    '$food_name', 
    '$quantity', 
    '$place_order', 
    '$location_details',
    '$price', 
    '$current_time', 
    '$payment_method', 
    " . ($payment_gateway ? "'$payment_gateway'" : "NULL") . ", 
    " . ($payment_number ? "'$payment_number'" : "NULL") . "
)";

$result2 = mysqli_query($conn, $query2);

if ($result2) {
    echo "<script>alert('Order successful! You can place more orders.'); window.location.href='order.php';</script>";
} else {
    echo "<script>alert('Error placing order: " . mysqli_error($conn) . "'); window.location.href='order.php';</script>";
}
