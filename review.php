<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form - Canteen Arena</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Consistent Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url('images/userhome.jpg');
      background-size: cover;
      background-position: center;
      color: #fff;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      line-height: 1.6;
    }

    header {
      background: linear-gradient(135deg, #1a1a2e, #00adb5);
      padding: 30px 0 20px 0;
      text-align: center;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        header h1 {
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

        /* Main Content Area */
        .bgimg {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .wrapper {
            background: rgba(255, 255, 255, 0.95);
            max-width: 600px;
            width: 100%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .title {
            font-size: 2rem;
            color: #1a1a2e;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .inputfield {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }

        .input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .input:focus {
            border-color: #00adb5;
            outline: none;
        }

        .comment {
            height: 150px;
            resize: vertical;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(45deg, #00adb5, #1a1a2e);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Footer Matching Index Page */
        .footer {
            background: #1a1a2e;
            color: #aaa;
            text-align: center;
            padding: 25px 0;
            margin-top: auto;
        }

        .footer a {
            color: #f8b400;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .menu-bar {
                flex-direction: column;
                gap: 15px;
            }

            .rightmenu-bar ul {
                gap: 15px;
            }

            .wrapper {
                padding: 20px;
            }

            .title {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .rightmenu-bar ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }

            .input {
                padding: 10px;
            }

            .btn {
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
   <header>
    <h1>Canteen Arena</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php">Contact</a>
        <a href="adminlogin.php">Login</a>
        <a href="userlogin.php">Sign Up</a>
    </nav>
</header>

    <!-- Main Form Section -->
    <div class="bgimg">
        <form method="POST" action="review_db.php">
            <div class="wrapper">
                <div class="title">Canteen Arena Review</div>
                <div class="form">
                    <div class="inputfield">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="input" required>
                    </div>
                    <div class="inputfield">
                        <label for="comment">Comment</label>
                        <textarea id="comment" name="comment" class="input comment" required></textarea>
                    </div>
                    <div class="inputfield">
                        <input type="submit" name="sub" value="Submit" class="btn">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        &copy; 2025 Canteen Arena | Your Favorite Food Spot!<br>
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </div>
</body>

</html>
