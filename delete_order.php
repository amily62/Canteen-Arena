<?php
session_start();
include('connection.php');

// Check if user is logged in and is admin
if (!isset($_SESSION['em']) || $_SESSION['em'] !== 'admin@gmail.com') {
    header("Location: vieworder.php");
    exit();
}

// Check if order_id is provided
if (!isset($_POST['order_id']) || empty($_POST['order_id'])) {
    header("Location: vieworder.php");
    exit();
}

$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);

// Simply delete the order
$query = "DELETE FROM vieworder WHERE id = '$order_id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error deleting order: " . mysqli_error($conn);
}

header("Location: vieworder.php");
exit();
?> 