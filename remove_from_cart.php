<?php
session_start();
include('connection.php');

if (!isset($_SESSION['em'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id'])) {
    $cart_id = mysqli_real_escape_string($conn, $_POST['cart_id']);
    $email = $_SESSION['em'];

    // Remove the cart item
    $query = "DELETE FROM cart WHERE id = '$cart_id' AND user_email = '$email'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: cart.php");
        exit();
    } else {
        echo "Error removing item from cart: " . mysqli_error($conn);
    }
} else {
    header("Location: cart.php");
    exit();
}
?> 