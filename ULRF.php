<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Canteen Arena</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Resets and General Styles */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?ixlib=rb-4.0.3&auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center;
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

        /* Main Content - Registration Form */
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 120px; /* Adjust to clear the header */
        }

        /* Registration Container Styles */
        .registration-container {
            background: rgba(255, 255, 255, 0.9); /* Make background more opaque */
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2); /* Enhance shadow */
            padding: 40px;
            max-width: 550px; /* Slightly reduced max width */
            width: 100%;
            color: #333;
            margin-bottom: 70px; /* Adjust to clear the footer */
        }

        .registration-container h1 {
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #1a1a2e;
            text-transform: uppercase;
            text-align: center;
        }

        /* Form Group Styles */
        .form-group {
            margin-bottom: 20px; /* Increased spacing */
        }

        .form-group label {
            display: block;
            font-size: 1.1rem; /* Increased font size */
            color: #333;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px; /* Adjusted padding */
            font-size: 16px; /* Adjusted font size */
            border: 2px solid #d5dbd9;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #00adb5;
            box-shadow: 0 0 8px rgba(0, 173, 181, 0.3); /* Subtler shadow */
        }

        /* Terms Agreement Styles */
        .form-group .terms {
            display: flex;
            align-items: center;
        }

        .form-group .terms input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
        }

        .form-group .terms label {
            font-size: 1rem;
            color: #444;
        }

        /* Submit Button Styles */
        button[type="submit"] {
            width: 100%;
            padding: 12px 15px; /* Adjusted padding */
            font-size: 1.2rem; /* Adjusted font size */
            border: 0px;
            background: #00adb5;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            outline: none;
            transition: background 0.3s ease;
        }

        button[type="submit"]:hover {
            background: #008a8f;
        }

        /* Footer Styles */
        footer {
            background: #1a1a2e;
            color: #aaa;
            text-align: center;
            padding: 25px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
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

    <main>
        <div class="registration-container">
            <h1>User Registration</h1>
            <form method="POST" action="registration_db.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="mno">Mobile Number</label>
                    <input type="tel" id="mno" name="mno" required>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" id="pass" name="pass" required>
                </div>
                <div class="form-group">
                    <label for="cpass">Confirm Password</label>
                    <input type="password" id="cpass" name="cpass" required>
                </div>
                <div class="form-group terms">
                    <label for="terms">
                        <input type="checkbox" id="terms" required>
                        Agreed with above details
                    </label>
                </div>
                <button type="submit" name="sub">Register</button>
            </form>
        </div>
    </main>

    <footer>
        &copy; 2025 Canteen Arena | Your Favorite Food Spot! <br>
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </footer>

</body>
</html>
