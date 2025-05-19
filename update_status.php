<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $delivery_status = $_POST['delivery_status'];

    $query = "UPDATE vieworder SET delivery_status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $delivery_status, $order_id);
    
    if (mysqli_stmt_execute($stmt)) {
        header('Location: vieworder.php');
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
} else {
    header('Location: vieworder.php');
    exit();
}
?> 