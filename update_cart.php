<?php
session_start();
include('connection.php');

if (!isset($_SESSION['em'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id']) && isset($_POST['quantity'])) {
    $cart_id = mysqli_real_escape_string($conn, $_POST['cart_id']);
    $quantity = (int)$_POST['quantity'];
    $email = $_SESSION['em'];

    // Validate quantity
    if ($quantity < 1) {
        $quantity = 1;
    }

    // Update the cart item
    $query = "UPDATE cart SET quantity = $quantity WHERE id = '$cart_id' AND user_email = '$email'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: cart.php");
        exit();
    } else {
        echo "Error updating cart: " . mysqli_error($conn);
    }
} else {
    header("Location: cart.php");
    exit();
}
?> 