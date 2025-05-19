<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Canteen Arena</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        /* Contact Us Content Styles */
        .contact-content {
            flex: 1;
            height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('images/ok4.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .contact-box {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 8px;
            padding: 30px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .contact-box h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #f8b400;
        }

        .contact-item {
            margin-bottom: 20px;
        }

        .contact-item a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-item a:hover {
            color: #f8b400;
        }

        .contact-item i {
            font-size: 2rem;
            margin-right: 15px;
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

<section class="contact-content">
    <div class="contact-box">
        <h1>Contact Us</h1>
        <div class="contact-item">
            <a href="tel:01601619747"><i class="fa fa-phone"></i>01601619747</a>
        </div>
        <div class="contact-item">
            <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i>Facebook</a>
        </div>
        <div class="contact-item">
            <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i>Instagram</a>
        </div>
    </div>
</section>

<footer>
    &copy; 2025 Canteen Arena | Your Favorite Food Spot! <br>
    <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
</footer>

</body>
</html>
