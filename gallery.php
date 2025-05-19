<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen Arena - Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Resets and General Styles */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f9fafc;
            color: #333;
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

        /* Gallery Styles */
        .gallery-container {
            flex: 1;
            padding: 40px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .gallery-item {
            position: relative;
            width: 300px;
            height: 200px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .info-overlay {
            position: absolute;
            bottom: -100%;
            left: 0;
            width: 100%;
            padding: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            transition: bottom 0.3s ease;
        }

        .gallery-item:hover .info-overlay {
            bottom: 0;
        }

        .item-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .item-description {
            font-size: 0.9rem;
            line-height: 1.4;
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
        <a href="index.php">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<section class="gallery-container">
    <!-- Example Item 1 -->
    <div class="gallery-item">
        <img src="images/f1.jpg" alt="Food Item 1">
        <div class="info-overlay">
            <div class="item-name">Burger</div>
            <div class="item-description">Our signature dish with fresh ingredients.</div>
        </div>
    </div>

    <!-- Example Item 2 -->
    <div class="gallery-item">
        <img src="images/f2 (1).jpg" alt="Food Item 2">
        <div class="info-overlay">
            <div class="item-name">Pizza</div>
            <div class="item-description">Traditional recipe with modern twist.</div>
        </div>
    </div>

    <!-- Add all your gallery items following this pattern -->
    <div class="gallery-item">
        <img src="images/s1 (2).jpg" alt="Food Item 3">
        <div class="info-overlay">
            <div class="item-name">Paratha & Curry</div>
            <div class="item-description">Chef's recommendation for today.</div>
        </div>
    </div>

    <!-- Continue with all your images -->
    <div class="gallery-item">
        <img src="images/f2 (2).jpg" alt="Food Item 4">
        <div class="info-overlay">
            <div class="item-name">Sandwich</div>
            <div class="item-description">Seasonal ingredients special.</div>
        </div>
    </div>

    <!-- Add remaining items following the same structure -->
    <!-- ... -->
    <div class="gallery-item">
        <img src="images/images (2).jpg" alt="Food Item 5">
        <div class="info-overlay">
            <div class="item-name">French Fries</div>
            <div class="item-description">Qualityful and healthy.</div>
        </div>
    </div><div class="gallery-item">
        <img src="images/images (3).jpg" alt="Food Item 6">
        <div class="info-overlay">
            <div class="item-name">Biriyani</div>
            <div class="item-description">Chef's recommendation for today.</div>
        </div>
    </div><div class="gallery-item">
        <img src="images/s1 (3).jpg" alt="Food Item 7">
        <div class="info-overlay">
            <div class="item-name">Lunch Combo</div>
            <div class="item-description">Seasonal ingredients special.</div>
        </div>
    </div><div class="gallery-item">
        <img src="images/images (4).jpg" alt="Food Item 8">
        <div class="info-overlay">
            <div class="item-name">Faluda</div>
            <div class="item-description">Chef's recommendation for today.</div>
        </div>
    </div><div class="gallery-item">
        <img src="images/ok2.webp" alt="Food Item 9">
        <div class="info-overlay">
            <div class="item-name">Cha & Coffee</div>
            <div class="item-description">Chef's recommendation for today.</div>
        </div>
        </div><div class="gallery-item">
        <img src="images/fry.jpg" alt="Food Item 10">
        <div class="info-overlay">
            <div class="item-name">Chicken Fry</div>
            <div class="item-description">Chef's recommendation for today.</div>
        </div></div><div class="gallery-item">
        <img src="images/ice.webp" alt="Food Item 11">
        <div class="info-overlay">
            <div class="item-name">Ice-cream</div>
            <div class="item-description">Chef's recommendation for today.</div>
        </div></div><div class="gallery-item">
        <img src="images/beverage.webp" alt="Food Item 12">
        <div class="info-overlay">
            <div class="item-name">Beverage</div>
            <div class="item-description">Chef's recommendation for today.</div>
        </div>
    </div>

</section>

<footer>
    &copy; 2025 Canteen Arena | Your Favorite Food Spot! <br>
    <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
</footer>

</body>
</html>
