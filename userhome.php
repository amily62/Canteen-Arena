<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Home - Canteen Arena</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <style>
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

    .admin-content {
      flex: 1;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: stretch; /* Ensures equal height */
      gap: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .box {
      background: rgba(255, 255, 255, 0.85);
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      width: 250px;
      height: 280px; /* Fixed height */
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .box a {
      text-decoration: none;
      color: inherit;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .box img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .box h3 {
      padding: 15px;
      font-size: 1.3rem;
      color: #333;
      text-align: center;
      flex-grow: 1;
    }

    .box:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .box:hover img {
      transform: scale(1.1);
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
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  <section class="admin-content">
    <div class="container">
      <div class="box">
      <a href="yourorder.php">
                    <img src="images/a2.jpg" alt="View Orders">
                    <h3>View Orders</h3>
                </a>
            </div>
            <div class="box">
                <a href="order.php">
                    <img src="images/a2 (1).jpg" alt="Order Food">
                    <h3>Order Food</h3>
                </a>
            </div>
            <div class="box">
                <a href="review.php">
                    <img src="images/photo-1540189549336-e6e99c3679fe.jpg" alt="Review">
                    <h3>Review</h3>
                </a>
      </div>
    </div>
  </section>

  <footer>
    &copy; 2025 Canteen Arena | Your Favorite Food Spot!<br />
    <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
  </footer>

</body>
</html>
