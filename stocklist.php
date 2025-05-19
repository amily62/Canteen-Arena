<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Food List - Canteen Arena</title>
    <style>
        /* Resets and General Styles */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('images/a2 (2).jpg'); /* Background Image */
            background-size: cover;
            background-position: center;
            color: #fff;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #1a1a2e, #00adb5);
            padding: 30px 0 20px 0;
            text-align: center;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
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

        /* Hero Section */
        .hero {
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
            padding: 50px 20px;
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }
        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
        }

        /* Main Content - Table Styles */
        main {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            color: #333;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #00adb5;
            color: white;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        /* Footer Styles */
        footer {
            background: #1a1a2e;
            color: #aaa;
            text-align: center;
            padding: 25px 0;
            margin-top: 50px;
            font-size: 1rem;
        }
        footer a {
            color: #f8b400;
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
        <h1>Canteen Arena</h1>
        <nav>
            <a href="adminhome.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Price (per item in Rs.)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = "SELECT * FROM stock_food";
                $result = mysqli_query($conn, $q);
                while ($r1 = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($r1['food_name']); ?></td>
                        <td><?php echo htmlspecialchars($r1['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($r1['price']); ?></td>
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
