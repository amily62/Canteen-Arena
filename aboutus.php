<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Canteen Arena</title>
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

        /* Header Styles - Consistent with paste-5.txt */
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

        /* Hero Section - Like Index Page */
        .hero {
            background-image: url('images/ok.jpg'); /* Replace with your about us image */
            background-size: cover;
            background-position: center;
            height: 60vh; /* Adjusted height for About Us */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            padding: 20px;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.6); /* Darken the image */
            flex-direction: column;
        }

        .hero h2 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
        }

        .hero p {
            font-size: 1.4rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
            text-shadow: 1px 1px 6px rgba(0,0,0,0.6);
        }

        /* About Us Content Styles (Below Hero Section) */
        .about-us-content {
            flex: 1;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .about-detail {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 800px;
            width: 100%;
        }

        .about-detail p {
            font-size: 1.1rem;
            color: #555;
            text-align: justify;
            line-height: 1.7;
        }

        /* Footer Styles - Consistent with paste-5.txt */
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

<section class="hero">
    <h2>About Canteen Arena</h2>
    <p>For explorers everywhere!</p>
</section>

<section class="about-us-content">
    <div class="about-detail">
        <p>
        Discover our story, our mission, and the people behind your favorite canteen. We are what we eat’ is an old phrase, but even today it stands true and the very prove of this phrase can be witnessed from the behaviour of people eating particular variety of food. If you take a broader look, you will find in states across Bangladesh different regions have different varieties of food. Let us delve into the behaviour of people of some of the states of Bangladesh and how Shudh Restaurant makes its customers happy with its varieties of delicious food dishes.
        </p>
    </div>
</section>

<footer>
    &copy; 2025 Canteen Arena | Your Favorite Food Spot! <br>
    <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
</footer>

</body>
</html>
