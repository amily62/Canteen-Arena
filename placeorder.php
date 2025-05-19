<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form - Canteen Arena</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Resets and General Styles */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: url('images/food.jpg'); /* Match with your desired background */
            background-size: cover;
            background-position: center;
            color: #333; /* Dark text for readability on light backgrounds */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styles (Consistent with Index) */
        .menu-bar {
            background: linear-gradient(135deg, #1a1a2e, #00adb5);
            color: #fff;
            padding: 20px 0;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .menu-bar .leftmenu-bar {
            float: left;
            margin-left: 5%;
        }

        .menu-bar .leftmenu-bar h2 {
            font-size: 2rem;
        }

        .menu-bar .rightmenu-bar {
            float: right;
            margin-right: 5%;
        }

        .menu-bar .rightmenu-bar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .menu-bar .rightmenu-bar ul li {
            margin-left: 20px;
        }

        .menu-bar .rightmenu-bar ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .menu-bar .rightmenu-bar ul li a:hover {
            color: #f8b400;
        }

        /* Main Content Styles */
        .bgimg {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .wrapper {
            max-width: 600px;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .wrapper .title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #1a1a2e;
            text-transform: uppercase;
            text-align: center;
        }

        .wrapper .form .inputfield {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .wrapper .form .inputfield label {
            width: 30%;
            color: #333;
            margin-right: 10px;
            font-size: 1.1rem;
            text-align: right;
        }

        .wrapper .form .inputfield .input,
        .wrapper .form .inputfield .textarea {
            width: 70%;
            outline: none;
            border: 1px solid #ccc;
            font-size: 1rem;
            padding: 10px;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .wrapper .form .inputfield .input:focus,
        .wrapper .form .inputfield .textarea:focus {
            border-color: #00adb5;
        }

        .wrapper .form .inputfield .btn {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            border: none;
            background: linear-gradient(to right, #00adb5, #1a1a2e);
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            outline: none;
            transition: background 0.3s;
        }

        .wrapper .form .inputfield .btn:hover {
            background: linear-gradient(to left, #00adb5, #1a1a2e);
        }

        /* Footer Styles (Consistent with Index) */
        .footer {
            background: #1a1a2e;
            color: #aaa;
            text-align: center;
            padding: 25px 0;
            margin-top: 20px;
            font-size: 1rem;
        }

        .footer a {
            color: #f8b400;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .menu-bar .leftmenu-bar,
            .menu-bar .rightmenu-bar {
                float: none;
                text-align: center;
                margin: 0;
            }

            .menu-bar .rightmenu-bar ul {
                display: block;
                margin-top: 10px;
            }

            .menu-bar .rightmenu-bar ul li {
                margin: 5px 0;
                display: inline-block;
            }

            .wrapper {
                margin: 20px;
                padding: 20px;
            }

            .wrapper .form .inputfield {
                flex-direction: column;
                align-items: flex-start;
            }

            .wrapper .form .inputfield label {
                width: 100%;
                text-align: left;
                margin-bottom: 5px;
            }

            .wrapper .form .inputfield .input,
            .wrapper .form .inputfield .textarea {
                width: 100%;
            }
        }

        .payment-options, .payment-gateways {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        .payment-options label, .payment-gateways label {
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }

        #onlinePaymentDetails {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
        }

        .btn {
            background: #00adb5;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #00848a;
        }

        #otpField {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="menu-bar">
        <div class="leftmenu-bar">
            <h2>Canteen Arena</h2>
        </div>
        <div class="rightmenu-bar">
            <ul>
                <li><a href="userhome.php">HOME</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>

    <div class="bgimg">
        <form method="POST" action="order_db.php">
            <div class="wrapper">
                <div class="title">Canteen Arena Order</div>
                <div class="form">
                    <div class="inputfield">
                        <label>Food Name</label>
                        <input type="text" name="food_name" class="input" value="<?php echo $_POST['food_name']; ?>"
                            readonly>
                    </div>
                    <div class="inputfield">
                        <label>Price</label>
                        <input type="number" name="price" class="input" value="<?php echo $_POST['price']; ?>" readonly>
                    </div>
                    <div class="inputfield">
                        <label>Choose your place</label>
                        <input type="radio" id="cafeteria" name="place" value="Cafeteria" onchange="updateLocationField()">
                        <label for="cafeteria">Cafeteria</label>
                        <input type="radio" id="classroom" name="place" value="Classroom" onchange="updateLocationField()">
                        <label for="classroom">Classroom</label>
                    </div>

                    <div class="inputfield" id="locationDetailsGroup" style="display: none;">
                        <label id="locationLabel">Specify your Location:</label>
                        <input type="text" name="location_details" class="input" id="locationDetails" required>
                    </div>

                    <div class="inputfield">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="input" required>
                    </div>

                    <div class="inputfield">
                        <label>Payment Method</label>
                        <div class="payment-options">
                            <input type="radio" id="cod" name="payment_method" value="Cash on Delivery" onchange="toggleOnlinePayment()">
                            <label for="cod">Cash on Delivery</label>
                            
                            <input type="radio" id="online" name="payment_method" value="Online Payment" onchange="toggleOnlinePayment()">
                            <label for="online">Online Payment</label>
                        </div>
                    </div>

                    <div id="onlinePaymentDetails" style="display: none;">
                        <div class="inputfield">
                            <label>Select Payment Gateway</label>
                            <div class="payment-gateways">
                                <input type="radio" id="bkash" name="payment_gateway" value="Bkash" onchange="togglePaymentNumber()">
                                <label for="bkash">Bkash</label>
                                
                                <input type="radio" id="nagad" name="payment_gateway" value="Nagad" onchange="togglePaymentNumber()">
                                <label for="nagad">Nagad</label>
                            </div>
                        </div>

                        <div id="paymentNumberField" style="display: none;">
                            <div class="inputfield">
                                <label>Enter Your Number</label>
                                <input type="text" name="payment_number" class="input" placeholder="Enter your mobile number">
                            </div>
                            <div class="inputfield">
                                <button type="button" onclick="sendOTP()" class="btn">Send OTP</button>
                            </div>
                            <div id="otpField" style="display: none;">
                                <div class="inputfield">
                                    <label>Enter OTP</label>
                                    <input type="text" name="otp" class="input" placeholder="Enter OTP">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="inputfield">
                        <input type="submit" value="Place Order" class="btn" name="sub">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <footer class="footer">
        &copy; 2025 Canteen Arena | Your Favorite Food Spot!<br />
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </footer>

    <script>
        function updateLocationField() {
            const place = document.querySelector('input[name="place"]:checked').value;
            const locationGroup = document.getElementById('locationDetailsGroup');
            const locationLabel = document.getElementById('locationLabel');

            if (place === 'Classroom') {
                locationGroup.style.display = 'block';
                locationLabel.textContent = "What's your classroom number?";
            } else if (place === 'Cafeteria') {
                locationGroup.style.display = 'block';
                locationLabel.textContent = 'Specify your Location:';
            } else {
                locationGroup.style.display = 'none';
            }
        }

        function toggleOnlinePayment() {
            const onlinePayment = document.getElementById('onlinePaymentDetails');
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            
            if (paymentMethod === 'Online Payment') {
                onlinePayment.style.display = 'block';
            } else {
                onlinePayment.style.display = 'none';
            }
        }

        function togglePaymentNumber() {
            const paymentNumber = document.getElementById('paymentNumberField');
            const otpField = document.getElementById('otpField');
            const paymentGateway = document.querySelector('input[name="payment_gateway"]:checked');
            
            if (paymentGateway) {
                paymentNumber.style.display = 'block';
                otpField.style.display = 'none';
            } else {
                paymentNumber.style.display = 'none';
                otpField.style.display = 'none';
            }
        }

        function sendOTP() {
            const paymentNumber = document.querySelector('input[name="payment_number"]').value;
            if (paymentNumber.length === 11) {
                // Generate random 6 digit OTP
                const otp = Math.floor(100000 + Math.random() * 900000);
                alert('Your OTP is: ' + otp);
                document.getElementById('otpField').style.display = 'block';
            } else {
                alert('Please enter a valid 11-digit mobile number');
            }
        }
    </script>
</body>

</html>
