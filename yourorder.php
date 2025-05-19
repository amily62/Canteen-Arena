<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: url('images/ok.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .navbar {
            background: linear-gradient(135deg, #1a1a2e, #00adb5);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .brand {
            font-size: 1.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
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
            text-decoration: underline;
            color: #ddd;
        }

        .order-table {
            width: 80%;
            margin: 8rem auto 2rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            color: #333;
            overflow: hidden;
        }

        .order-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-table th,
        .order-table td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .order-table th {
            background-color: #00adb5;
            color: white;
            font-weight: 600;
        }

        .order-table tr:hover {
            background-color: #f5f5f5;
        }

        .status-processing {
            color: #f39c12;
            font-weight: bold;
        }

        .status-ontheway {
            color: #3498db;
            font-weight: bold;
        }

        .status-done {
            color: #27ae60;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-top: 7rem;
            color: white;
            font-size: 2rem;
            font-weight: 600;
        }

        footer {
      background: #1a1a2e;
      color: #aaa;
      text-align: center;
      padding: 1rem;
      margin-top: auto;
    }

    footer a {
      color: #f8b400;
      text-decoration: none;
      font-weight: bold;
    }

    footer a:hover {
      text-decoration: underline;
    }

        @media (max-width: 768px) {
            .order-table {
                width: 95%;
            }
        }
    </style>
    <script>
        // Remove the time update function as we'll use the actual order time from database
    </script>
</head>

<body>
    <nav class="navbar">
        <div class="brand">Canteen Arena</div>
        <ul class="nav-links">
            <li><a href="userhome.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="order-table">
        <table>
            <thead>
                <tr>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Order Place</th>
                    <th>Location Details</th>
                    <th>Total Price</th>
                    <th>Order Time</th>
                    <th>Payment Method</th>
                    <th>Payment Details</th>
                    <th>Delivery Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Set timezone to Bangladesh
                date_default_timezone_set('Asia/Dhaka');

                $query = "SELECT * FROM registration as r 
                    INNER JOIN vieworder as vo on(r.name = vo.customer_name)
                    ORDER BY vo.id DESC";
                
                $result = mysqli_query($conn, $query);

                while ($data = mysqli_fetch_assoc($result)) {
                    $statusClass = '';
                    $currentStatus = $data['delivery_status'] ?? 'Work in Processing';
                    switch($currentStatus) {
                        case 'Done':
                            $statusClass = 'status-done';
                            $statusText = 'Done';
                            break;
                        case 'On the Way':
                            $statusClass = 'status-ontheway';
                            $statusText = 'On the Way';
                            break;
                        default:
                            $statusClass = 'status-processing';
                            $statusText = 'Work in Processing';
                    }
                    
                    // Format the order time from database
                    if (isset($data['order_time']) && !empty($data['order_time'])) {
                        $orderTime = new DateTime($data['order_time']);
                        $formattedTime = $orderTime->format('d M Y, h:i A');
                    } else {
                        $formattedTime = 'Time not available';
                    }
                    
                    // Format payment details
                    $paymentDetails = '';
                    if ($data['payment_method'] === 'Online Payment') {
                        $paymentDetails = $data['payment_gateway'] . ' - ' . $data['payment_number'];
                    }
                    
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($data['food_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($data['quantity']) . "</td>";
                    echo "<td>" . htmlspecialchars($data['order_location']) . "</td>";
                    echo "<td>" . (isset($data['location_details']) ? htmlspecialchars($data['location_details']) : '') . "</td>";
                    echo "<td>" . htmlspecialchars(floatval($data['price']) * intval($data['quantity'])) . "</td>";
                    echo "<td>" . $formattedTime . "</td>";
                    echo "<td>" . htmlspecialchars($data['payment_method']) . "</td>";
                    echo "<td>" . htmlspecialchars($paymentDetails) . "</td>";
                    echo "<td class='" . $statusClass . "'>" . htmlspecialchars($statusText) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

   <footer>
    &copy; 2025 Canteen Arena | Your Favorite Food Spot!<br />
    <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
  </footer>
</body>

</html>
