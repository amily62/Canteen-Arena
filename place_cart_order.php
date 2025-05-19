<?php
session_start();
include('connection.php');

if (!isset($_SESSION['em'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['em'];
    $order_location = mysqli_real_escape_string($conn, $_POST['order_location']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $total_amount = floatval($_POST['total_amount']);
    
    // Get location details
    $location_details = '';
    if ($order_location === 'Cafeteria' && isset($_POST['cafeteria_location'])) {
        $location_details = 'Cafeteria - ' . mysqli_real_escape_string($conn, $_POST['cafeteria_location']);
    } else if ($order_location === 'Classroom' && isset($_POST['classroom_number'])) {
        $location_details = 'Classroom ' . mysqli_real_escape_string($conn, $_POST['classroom_number']);
    }
    
    // Get payment details
    $payment_gateway = '';
    $payment_number = '';
    if ($payment_method === 'Online Payment') {
        if (isset($_POST['payment_gateway'])) {
            $payment_gateway = mysqli_real_escape_string($conn, $_POST['payment_gateway']);
        }
        if (isset($_POST['mobile_number'])) {
            $payment_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
        }
    } else if ($payment_method === 'Cash on Delivery') {
        $payment_gateway = 'Cash';
        $payment_number = 'N/A';
    }
    
    // Get all items from cart
    $cart_query = "SELECT * FROM cart WHERE user_email = '$email'";
    $cart_result = mysqli_query($conn, $cart_query);
    
    if ($cart_result && mysqli_num_rows($cart_result) > 0) {
        // Start transaction
        mysqli_begin_transaction($conn);
        
        try {
            // Get customer name
            $name_query = "SELECT name FROM registration WHERE email = '$email'";
            $name_result = mysqli_query($conn, $name_query);
            $customer_name = mysqli_fetch_assoc($name_result)['name'];
            
            // Collect all items for combined order
            $food_names = [];
            $quantities = [];
            $total_price = 0;
            
            // Reset the result pointer to start
            mysqli_data_seek($cart_result, 0);
            
            while ($item = mysqli_fetch_assoc($cart_result)) {
                $food_names[] = $item['food_name'];
                $quantities[] = $item['quantity'];
                $total_price += ($item['price'] * $item['quantity']);
            }
            
            // Combine items into single order
            $combined_food_names = implode(', ', $food_names);
            $combined_quantities = implode(',', $quantities);
            
            // Debug output to verify quantities
            error_log("Food Names: " . $combined_food_names);
            error_log("Quantities: " . $combined_quantities);
            error_log("Number of items: " . count($food_names));
            error_log("Number of quantities: " . count($quantities));
            
            // Insert combined order into vieworder table
            $insert_query = "INSERT INTO vieworder (
                customer_name, 
                food_name, 
                quantity, 
                order_location, 
                location_details, 
                price, 
                payment_method, 
                payment_gateway,
                payment_number,
                order_time
            ) VALUES (
                '$customer_name',
                '$combined_food_names',
                '$combined_quantities',
                '$order_location',
                '$location_details',
                '$total_price',
                '$payment_method',
                '$payment_gateway',
                '$payment_number',
                NOW()
            )";
            
            if (!mysqli_query($conn, $insert_query)) {
                throw new Exception("Error inserting order: " . mysqli_error($conn));
            }
            
            // Clear the cart after successful order
            $clear_cart = "DELETE FROM cart WHERE user_email = '$email'";
            if (!mysqli_query($conn, $clear_cart)) {
                throw new Exception("Error clearing cart: " . mysqli_error($conn));
            }
            
            // Commit transaction
            mysqli_commit($conn);
            
            // Redirect to order.php
            header("Location: order.php");
            exit();
            
        } catch (Exception $e) {
            // Rollback transaction on error
            mysqli_rollback($conn);
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "No items in cart";
    }
} else {
    header("Location: cart.php");
    exit();
}
?> 