<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stock - Canteen Arena</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Resets and General Styles */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('images/u3.jpg'); /* New background image */
            background-size: cover;
            background-position: center;
            color: #fff;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styles - Copied from index.php */
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

        /* Main Content Styles */
        main {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Form Styles */
        .wrapper {
            max-width: 600px;
            width: 100%;
            background: rgba(255, 255, 255, 0.9); /* More opaque background */
            margin: auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
            padding: 30px;
            border-radius: 10px;
            color: #333; /* Ensure text is readable */
        }

        .wrapper .title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: rgb(182, 30, 30);
            text-transform: uppercase;
            text-align: center;
        }

        .wrapper .form .inputfield {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .wrapper .form .inputfield label {
            width: 300px;
            color: black;
            margin-right: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .wrapper .form .inputfield .input,
        .wrapper .form .inputfield .textarea {
            width: 100%;
            outline: none;
            border: 1px solid #d5dbd9;
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .wrapper .form .inputfield .btn {
            width: 100%;
            padding: 8px 10px;
            font-size: 15px;
            border: 0px;
            background: rgb(182, 30, 86);
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
            outline: none;
        }

        .wrapper .form .inputfield .btn:hover {
            background: rgb(172, 182, 30);
        }

        /* Footer Styles - Copied from index.php */
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
        <div class="bgimg">
            <center>
                <form method="POST" action="stock_db.php">
                    <div class="wrapper">
                        <div class="title">
                            Canteen Arena
                        </div>
                        <div class="form">
                            <div class="inputfield">
                                <label>Food Name</label><br>
                                <input type="text" name="food_name" class="input" required>
                            </div>
                            <div class="inputfield">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="input" required>
                            </div>
                            <div class="inputfield">
                                <label>Price</label>
                                <input type="text" name="price" class="input" required>
                            </div>
                            <div class="inputfield">
                                <input type="submit" name="sub" value="Add items" class="btn">
                            </div>
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </main>

    <footer>
        &copy; 2025 Canteen Arena | Your Favorite Food Spot!<br>
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </footer>

</body>
</html>
