<?php
session_start();
include('connection.php');

if (!isset($_SESSION['em'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['em'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Canteen Arena</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: url('images/food.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: linear-gradient(135deg, #1a1a2e, #00adb5);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .brand {
            font-size: 1.75rem;
            font-weight: 600;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #ddd;
        }

        .cart-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cart-title {
            text-align: center;
            margin-bottom: 2rem;
            color: #1a1a2e;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }

        .cart-table th,
        .cart-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            background-color: #00adb5;
            color: white;
        }

        .cart-table tr:hover {
            background-color: #f5f5f5;
        }

        .quantity-input {
            width: 60px;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .remove-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .remove-btn:hover {
            background: #c0392b;
        }

        .cart-summary {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #ddd;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1a1a2e;
            margin-bottom: 1.5rem;
        }

        .order-form {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #1a1a2e;
            font-weight: 500;
        }

        .form-group select,
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .location-details {
            display: none;
            margin-top: 1rem;
        }

        .location-details.active {
            display: block;
        }

        .place-order-btn {
            background: #00adb5;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .place-order-btn:hover {
            background: #00848a;
        }

        .continue-shopping {
            text-align: center;
            margin-top: 1rem;
        }

        .continue-shopping a {
            color: #00adb5;
            text-decoration: none;
            font-weight: 500;
        }

        .continue-shopping a:hover {
            text-decoration: underline;
        }

        .empty-cart {
            text-align: center;
            padding: 2rem;
            color: #666;
        }

        .otp-section {
            display: none;
            margin-top: 1rem;
            padding: 1rem;
            background: #e8f4f8;
            border-radius: 4px;
        }

        .otp-section.active {
            display: block;
        }

        .verify-btn {
            background: #2ecc71;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 0.5rem;
        }

        .verify-btn:hover {
            background: #27ae60;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="brand">Canteen Arena</div>
        <ul class="nav-links">
            <li><a href="userhome.php">Home</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="cart-container">
        <h1 class="cart-title">Your Shopping Cart</h1>
        
        <?php
        $query = "SELECT * FROM cart WHERE user_email = '$email' ORDER BY created_at DESC";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Food Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    while ($item = mysqli_fetch_assoc($result)) {
                        $itemTotal = $item['price'] * $item['quantity'];
                        $total += $itemTotal;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['food_name']) ?></td>
                            <td>৳<?= number_format($item['price'], 2) ?></td>
                            <td>
                                <form action="update_cart.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                                    <input type="number" name="quantity" value="<?= $item['quantity'] ?>" 
                                           min="1" class="quantity-input" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>৳<?= number_format($itemTotal, 2) ?></td>
                            <td>
                                <form action="remove_from_cart.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                                    <button type="submit" class="remove-btn">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <div class="cart-summary">
                <div class="total-price">
                    Total: ৳<?= number_format($total, 2) ?>
                </div>

                <form action="place_cart_order.php" method="POST" class="order-form" id="orderForm">
                    <input type="hidden" name="total_amount" value="<?= $total ?>">
                    
                    <div class="form-group">
                        <label for="order_location">Choose Your Location:</label>
                        <select name="order_location" id="order_location" required onchange="toggleLocationDetails()">
                            <option value="">Select Location</option>
                            <option value="Cafeteria">Cafeteria</option>
                            <option value="Classroom">Classroom</option>
                        </select>
                    </div>

                    <div id="cafeteria_details" class="location-details">
                        <div class="form-group">
                            <label for="cafeteria_location">Specify Your Location in Cafeteria:</label>
                            <input type="text" name="cafeteria_location" id="cafeteria_location" placeholder="Enter your location in cafeteria">
                        </div>
                    </div>

                    <div id="classroom_details" class="location-details">
                        <div class="form-group">
                            <label for="classroom_number">Classroom Number:</label>
                            <input type="text" name="classroom_number" id="classroom_number" placeholder="Enter classroom number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <select name="payment_method" id="payment_method" required onchange="togglePaymentDetails()">
                            <option value="">Select Payment Method</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                            <option value="Online Payment">Online Payment</option>
                        </select>
                    </div>

                    <div id="online_payment_details" class="location-details">
                        <div class="form-group">
                            <label for="payment_gateway">Select Payment Gateway:</label>
                            <select name="payment_gateway" id="payment_gateway">
                                <option value="">Select Payment Gateway</option>
                                <option value="Bkash">Bkash</option>
                                <option value="Nagad">Nagad</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mobile_number">Enter Your Mobile Number:</label>
                            <input type="text" name="mobile_number" id="mobile_number" placeholder="Enter your mobile number">
                            <button type="button" class="verify-btn" style="width: 100%; margin-top: 10px;" onclick="generateOTP()">Send OTP</button>
                        </div>
                        <div class="form-group">
                            <label for="otp">Enter OTP:</label>
                            <input type="text" name="otp" id="otp" placeholder="Enter OTP">
                        </div>
                    </div>

                    <button type="submit" class="place-order-btn" onclick="return validateForm()">Place Order</button>
                </form>
            </div>
        <?php
        } else {
            echo '<div class="empty-cart">
                    <h2>Your cart is empty</h2>
                    <p>Add some delicious items to your cart!</p>
                  </div>';
        }
        ?>

        <div class="continue-shopping">
            <a href="order.php">← Continue Shopping</a>
        </div>
    </div>

    <script>
        function toggleLocationDetails() {
            const location = document.getElementById('order_location').value;
            const cafeteriaDetails = document.getElementById('cafeteria_details');
            const classroomDetails = document.getElementById('classroom_details');
            
            cafeteriaDetails.classList.remove('active');
            classroomDetails.classList.remove('active');
            
            if (location === 'Cafeteria') {
                cafeteriaDetails.classList.add('active');
            } else if (location === 'Classroom') {
                classroomDetails.classList.add('active');
            }
        }

        function togglePaymentDetails() {
            const paymentMethod = document.getElementById('payment_method').value;
            const onlinePaymentDetails = document.getElementById('online_payment_details');
            
            onlinePaymentDetails.classList.remove('active');
            
            if (paymentMethod === 'Online Payment') {
                onlinePaymentDetails.classList.add('active');
            }
        }

        function validateForm() {
            const paymentMethod = document.getElementById('payment_method').value;
            const orderLocation = document.getElementById('order_location').value;
            
            if (!orderLocation) {
                alert('Please select your location');
                return false;
            }
            
            if (!paymentMethod) {
                alert('Please select a payment method');
                return false;
            }
            
            if (paymentMethod === 'Online Payment') {
                const paymentGateway = document.getElementById('payment_gateway').value;
                const mobileNumber = document.getElementById('mobile_number').value;
                const otp = document.getElementById('otp').value;
                
                if (!paymentGateway) {
                    alert('Please select a payment gateway');
                    return false;
                }
                
                if (!mobileNumber) {
                    alert('Please enter your mobile number');
                    return false;
                }
                
                if (!otp) {
                    alert('Please enter the OTP');
                    return false;
                }
            }
            
            return true;
        }

        function generateOTP() {
            const mobileNumber = document.getElementById('mobile_number').value;
            if (mobileNumber.length === 11) {
                // Generate random OTP
                const otp = Math.floor(100000 + Math.random() * 900000);
                alert('Your OTP is: ' + otp);
            } else {
                alert('Please enter a valid mobile number first');
            }
        }
    </script>
</body>
</html> 