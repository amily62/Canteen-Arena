<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - Canteen Arena</title>
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
            justify-content: center;
        }

        /* Header Styles - Consistent with paste-5.txt */
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

        /* Login Container Styles */
        .login-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            width: 100%;
            max-width: 500px;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            text-align: center;
            color: #333;
        }

        .login-box h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: #1a1a2e;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #00adb5;
            box-shadow: 0 0 5px rgba(0, 173, 181, 0.3);
        }

        .login-btn {
            background: #00adb5;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-btn:hover {
            background: #008a8f;
        }

        /* Footer Styles - Consistent with paste-5.txt */
        footer {
            background: #1a1a2e;
            color: #aaa;
            text-align: center;
            padding: 15px 0;
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

        /* Additional Styling */
        .signup-link {
            margin-top: 20px;
            font-size: 1rem;
        }
        .signup-link a {
            color: #00adb5;
            text-decoration: none;
            font-weight: bold;
        }
        .signup-link a:hover {
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

    <div class="login-container">
        <div class="login-box">
            <h1>User Login</h1>
            <form method="POST" action="user_db.php">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email Address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>
                </div>
                <button type="submit" class="login-btn" name="sub">Login</button>
            </form>
            <p class="signup-link">Create a New <a href="ULRF.php">Account</a></p>
        </div>
    </div>

    <footer>
        &copy; 2025 Canteen Arena | Your Favorite Food Spot! <br>
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </footer>

</body>
</html>
