<?php
session_start();
include('connection.php');

// Check if cart table exists, if not create it
$check_table = "SHOW TABLES LIKE 'cart'";
$table_exists = mysqli_query($conn, $check_table);

if (mysqli_num_rows($table_exists) == 0) {
    // Create cart table if it doesn't exist
    $create_table = "CREATE TABLE IF NOT EXISTS cart (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_email VARCHAR(255) NOT NULL,
        food_name VARCHAR(255) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        quantity INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    mysqli_query($conn, $create_table);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            background: url('images/bg2index.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .navbar {
            background: linear-gradient(to right, #0f4c75, #3282b8);
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
            align-items: center;
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

        .cart-icon {
            position: relative;
            font-size: 1.5rem;
            color: white;
            text-decoration: none;
            padding: 0.5rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: background 0.3s ease;
        }

        .cart-icon:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #e74c3c;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 0.8rem;
            min-width: 20px;
            text-align: center;
        }

        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 2rem;
            max-width: 1200px;
            margin: 7rem auto;
        }

        .food-card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            color: #333;
            display: flex;
            flex-direction: column;
        }

        .food-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .food-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 4px solid #3498db;
        }

        .food-content {
            padding: 1.5rem;
            text-align: left;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .food-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .food-price {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 0.75rem;
        }

        .rating {
            color: #f39c12;
            margin-bottom: 0.75rem;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: auto;
        }

        .order-button, .cart-button {
            flex: 1;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
            text-decoration: none;
            border: none;
        }

        .order-button {
            background-color: #2ecc71;
            color: white;
        }

        .order-button:hover {
            background-color: #27ae60;
        }

        .cart-button {
            background-color: #3498db;
            color: white;
        }

        .cart-button:hover {
            background-color: #2980b9;
        }

        .quantity-input {
            width: 60px;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 0.75rem;
        }

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

        @media (max-width: 768px) {
            .food-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="brand">Canteen Arena</div>
        <ul class="nav-links">
            <li><a href="userhome.php">Home</a></li>
            <li>
                <a href="cart.php" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <?php
                    if (isset($_SESSION['em'])) {
                        $email = $_SESSION['em'];
                        $query = "SELECT COUNT(*) as count FROM cart WHERE user_email = '$email'";
                        $result = mysqli_query($conn, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            if ($row['count'] > 0) {
                                echo '<span class="cart-count">' . $row['count'] . '</span>';
                            }
                        }
                    }
                    ?>
                </a>
            </li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <main class="food-grid">
        <div class="food-card">
            <img src="images/u2.jpg" alt="Samosa">
            <div class="food-content">
                <h3 class="food-title">Samosa</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 10</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Samosa">
                    <input type="hidden" name="price" value="10">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Samosa">
                    <input type="hidden" name="price" value="10">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/f1.jpg" alt="Burger">
            <div class="food-content">
                <h3 class="food-title">Burger</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 35</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Burger">
                    <input type="hidden" name="price" value="35">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Burger">
                    <input type="hidden" name="price" value="35">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/f2 (1).jpg" alt="Pizza">
            <div class="food-content">
                <h3 class="food-title">Pizza</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 59</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Pizza">
                    <input type="hidden" name="price" value="59">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Pizza">
                    <input type="hidden" name="price" value="59">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/f2 (2).jpg" alt="Sandwich">
            <div class="food-content">
                <h3 class="food-title">Sandwich</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 59</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Sandwich">
                    <input type="hidden" name="price" value="59">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Sandwich">
                    <input type="hidden" name="price" value="59">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/f2 (3).jpg" alt="Tea">
            <div class="food-content">
                <h3 class="food-title">Tea</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 15</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Tea">
                    <input type="hidden" name="price" value="15">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Tea">
                    <input type="hidden" name="price" value="15">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/f3 (1).jpg" alt="Noodles">
            <div class="food-content">
                <h3 class="food-title">Noodles</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 60</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Noodles">
                    <input type="hidden" name="price" value="60">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Noodles">
                    <input type="hidden" name="price" value="60">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/images.jpg" alt="Jalebi">
            <div class="food-content">
                <h3 class="food-title">Jalebi</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 20</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Jalebi">
                    <input type="hidden" name="price" value="20">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Jalebi">
                    <input type="hidden" name="price" value="20">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/images (1).jpg" alt="Full Plate">
            <div class="food-content">
                <h3 class="food-title">Full Plate</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 120</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Full Plate">
                    <input type="hidden" name="price" value="120">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Full Plate">
                    <input type="hidden" name="price" value="120">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/roll.jpg" alt="chicken roll">
            <div class="food-content">
                <h3 class="food-title">chicken roll</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 70</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="chicken roll">
                    <input type="hidden" name="price" value="70">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="chicken roll">
                    <input type="hidden" name="price" value="70">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/ice.webp" alt="Ice-cream">
            <div class="food-content">
                <h3 class="food-title">Ice-cream</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 50</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Ice-cream">
                    <input type="hidden" name="price" value="50">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Ice-cream">
                    <input type="hidden" name="price" value="50">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/beverage.webp" alt="Beverage">
            <div class="food-content">
                <h3 class="food-title">Beverage</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 50</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="Beverage">
                    <input type="hidden" name="price" value="50">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="Beverage">
                    <input type="hidden" name="price" value="50">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>

        <div class="food-card">
            <img src="images/fry.jpg" alt="chicken fry">
            <div class="food-content">
                <h3 class="food-title">chicken fry</h3>
                <p class="food-price"><span class="taka-sign">৳</span> 70</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <form action="add_to_cart.php" method="POST" class="button-group">
                    <input type="hidden" name="food_name" value="chicken fry">
                    <input type="hidden" name="price" value="70">
                    <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="cart-button">Add to Cart</button>
                </form>
                <form action="placeorder.php" method="post" class="button-group">
                    <input type="hidden" name="food_name" value="chicken fry">
                    <input type="hidden" name="price" value="70">
                    <button type="submit" class="order-button" name="sub">Order Now</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        &copy; 2025 Canteen Arena | Your Favorite Food Spot!<br />
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </footer>
</body>

</html>