<?php
session_start();
include('connection.php');

if (!isset($_SESSION['em'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['food_name']) && isset($_POST['price'])) {
    $food_name = mysqli_real_escape_string($conn, $_POST['food_name']);
    $price = (float)$_POST['price'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    $email = $_SESSION['em'];

    // Validate quantity
    if ($quantity < 1) {
        $quantity = 1;
    }

    // Check if item already exists in cart
    $check_query = "SELECT * FROM cart WHERE user_email = '$email' AND food_name = '$food_name'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Update quantity if item exists
        $item = mysqli_fetch_assoc($result);
        $new_quantity = $item['quantity'] + $quantity;
        $update_query = "UPDATE cart SET quantity = $new_quantity WHERE id = " . $item['id'];
        
        if (mysqli_query($conn, $update_query)) {
            header("Location: cart.php");
            exit();
        } else {
            echo "Error updating cart: " . mysqli_error($conn);
        }
    } else {
        // Insert new item if it doesn't exist
        $insert_query = "INSERT INTO cart (user_email, food_name, price, quantity) 
                        VALUES ('$email', '$food_name', $price, $quantity)";
        
        if (mysqli_query($conn, $insert_query)) {
            header("Location: cart.php");
            exit();
        } else {
            echo "Error adding to cart: " . mysqli_error($conn);
        }
    }
} else {
    header("Location: userhome.php");
    exit();
}
?> 