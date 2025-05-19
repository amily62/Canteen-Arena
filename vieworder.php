<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Food Order Details - Canteen Arena</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Resets and General Styles */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?ixlib=rb-4.0.3&auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center;
            color: #fff;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #1a1a2e, #00adb5);
            padding: 30px 0 20px 0;
            text-align: center;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            position: fixed;
            top: 0;
        }
        header h1 {
            color: #fff;
            font-size: 3rem;
            margin-bottom: 10px;
        }
        nav {
            margin-top: 10px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: 0.3s ease;
        }
        nav a:hover {
            color: #f8b400;
            transform: scale(1.1);
        }

        /* Table Styles */
        main {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 120px; /* Reduced from 150px to 120px */
        }

        table {
            border-collapse: collapse;
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        th {
            background: #00adb5;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .status-select {
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
            background-color: white;
            color: #333;
            cursor: pointer;
        }

        .status-select option {
            padding: 5px;
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

        /* Footer Styles */
        footer {
            background: #1a1a2e;
            color: #aaa;
            text-align: center;
            padding: 25px 0;
            width: 100%;
            position: relative;
            margin-top: 50px;
        }
        footer a {
            color: #f8b400;
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            text-decoration: underline;
        }

        .delete-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .delete-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>

    <header>
        <h1>Canteen Arena</h1>
        <nav>
            <a href="adminhome.php">Home</a>
            <a href="logout.php">Logout</a>
            <!-- Add other admin navigation links here -->
        </nav>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Food Name</th>
                    <th>Price (Per Item)</th>
                    <th>Quantity</th>
                    <th>Order Place</th>
                    <th>Location Details</th>
                    <th>Total Price</th>
                    <th>Order Time</th>
                    <th>Payment Method</th>
                    <th>Payment Details</th>
                    <th>Delivery Status</th>
                    <th>Update Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Simple query to get all orders
                $query = "SELECT * FROM vieworder ORDER BY order_time DESC";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                }

                while ($data = mysqli_fetch_assoc($result)) {
                    $statusClass = '';
                    $currentStatus = $data['delivery_status'] ?? 'Work in Processing';
                    switch($currentStatus) {
                        case 'Done':
                            $statusClass = 'status-done';
                            break;
                        case 'On the Way':
                            $statusClass = 'status-ontheway';
                            break;
                        default:
                            $statusClass = 'status-processing';
                    }
                    // Format the order time
                    $orderTime = new DateTime($data['order_time']);
                    $formattedTime = $orderTime->format('d M Y, h:i A');

                    // Format payment details
                    $paymentDetails = '';
                    if ($data['payment_method'] === 'Online Payment') {
                        $paymentDetails = $data['payment_gateway'] . ' - ' . $data['payment_number'];
                    }
                ?>
                    <tr>
                        <td><?= htmlspecialchars($data['customer_name']) ?></td>
                        <td><?= htmlspecialchars($data['food_name']) ?></td>
                        <td><?= htmlspecialchars($data['price']) ?></td>
                        <td><?= htmlspecialchars($data['quantity']) ?></td>
                        <td><?= htmlspecialchars($data['order_location']) ?></td>
                        <td><?= isset($data['location_details']) ? htmlspecialchars($data['location_details']) : '' ?></td>
                        <td><?= htmlspecialchars(floatval($data['price']) * intval($data['quantity'])) ?></td>
                        <td><?= $formattedTime ?></td>
                        <td><?= htmlspecialchars($data['payment_method']) ?></td>
                        <td><?= htmlspecialchars($paymentDetails) ?></td>
                        <td class="<?= $statusClass ?>"><?= htmlspecialchars($currentStatus) ?></td>
                        <td>
                            <form action="update_status.php" method="POST" style="display: inline;">
                                <input type="hidden" name="order_id" value="<?= $data['id'] ?>">
                                <select name="delivery_status" class="status-select" onchange="this.form.submit()">
                                    <option value="Work in Processing" <?= ($currentStatus == 'Work in Processing') ? 'selected' : '' ?>>Work in Processing</option>
                                    <option value="On the Way" <?= ($currentStatus == 'On the Way') ? 'selected' : '' ?>>On the Way</option>
                                    <option value="Done" <?= ($currentStatus == 'Done') ? 'selected' : '' ?>>Done</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        &copy; 2025 Canteen Arena | Your Favorite Food Spot! <br>
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </footer>

</body>
</html>
