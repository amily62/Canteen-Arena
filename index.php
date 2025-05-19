<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Canteen Arena</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;400&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f9fafc;
            color: #333;
            line-height: 1.6;
        }
        header {
            background: linear-gradient(90deg, #0f5c7a 0%, #3fc1c9 100%);
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
        .hero {
            background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?ixlib=rb-4.0.3&auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center;
            height: 85vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            padding: 20px;
            box-shadow: inset 0 0 0 1000px rgba(20, 40, 60, 0.60);
            flex-direction: column;
        }
        .search-container {
            position: relative;
            max-width: 600px;
            margin: 20px auto;
            padding: 0 20px;
        }
        #searchInput {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid #00adb5;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }
        #searchInput:focus {
            box-shadow: 0 0 10px rgba(0, 173, 181, 0.3);
        }
        .search-results {
            position: absolute;
            top: 100%;
            left: 20px;
            right: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 5px;
            max-height: 400px;
            overflow-y: auto;
            display: none;
            z-index: 1000;
        }
        .search-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .search-item:hover {
            background: #f5f5f5;
        }
        .search-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
        }
        .search-item-info {
            flex-grow: 1;
        }
        .search-item-title {
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 5px;
        }
        .search-item-price {
            color: #00adb5;
            font-weight: 500;
        }
        .not-found {
            padding: 20px;
            text-align: center;
            color: #666;
            font-style: italic;
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
        .features {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 50px auto;
            max-width: 1100px;
            gap: 20px;
            padding: 0 20px;
        }
        .feature-card {
            background: white;
            flex: 1 1 300px;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .feature-card h3 {
            margin-bottom: 15px;
            color: #1a1a2e;
            font-size: 1.5rem;
        }
        .feature-card p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 15px;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }
        .feature-card:hover img {
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

        /* Modern Button Styles */
        .button-group {
            display: flex;
            gap: 2rem;
            margin-top: 3rem;
            z-index: 2;
            justify-content: center; /* Center the buttons */
            position: relative;
        }
        .modern-btn {
            padding: 1.2rem 3rem; /* Adjusted padding */
            font-size: 1.3rem; /* Adjusted font size */
            font-weight: 900; /* Max bold */
            letter-spacing: 0.08em; /* Added letter spacing */
            border: none; /* Removed border */
            border-radius: 40px; /* More rounded */
            background: #ff5e62; /* Bold background color */
            color: #fff;
            box-shadow: 0 6px 30px rgba(255,94,98,0.5); /* Enhanced shadow */
            cursor: pointer;
            outline: none;
            transition:
            transform 0.25s cubic-bezier(.4,2,.3,1),
            box-shadow 0.25s,
            background 0.25s;
            position: relative;
            overflow: hidden;
        }
        .modern-btn::after {
            content: '';
            position: absolute;
            left: 0; top: 0; right: 0; bottom: 0;
            background: rgba(255,255,255,0.28); /* Stronger hover overlay */
            opacity: 0;
            transition: opacity 0.4s;
            pointer-events: none;
        }
        .modern-btn:hover, .modern-btn:focus {
            transform: scale(1.12) translateY(-6px); /* Even more pronounced hover */
            box-shadow: 0 10px 40px rgba(255,94,98,0.6); /* Intense shadow on hover */
            background: #ff4044; /* Darker shade on hover */
        }
        .modern-btn:hover::after, .modern-btn:focus::after {
            opacity: 1;
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
        <a href="adminlogin.php">Login</a>
        <a href="userlogin.php">Sign Up</a>
    </nav>
</header>

<section class="hero">
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search for food..." onkeyup="searchFood()">
        <div id="searchResults" class="search-results"></div>
    </div>
    <div>
        <h2>Welcome to Canteen Arena</h2>
        <p>Delicious food, warm vibes, and quick service — all at your fingertips. Your hunger ends here!</p>
    </div>
</section>

<section class="features">
    <div class="feature-card">
        <img src="images/u1.jpg" alt="Fresh Meals">
        <h3>Fresh & Tasty</h3>
        <p>We offer freshly prepared meals to satisfy your cravings and delight your taste buds.</p>
    </div>
    <div class="feature-card">
        <img src="images/hj.jpg" alt="Fast Service">
        <h3>Fast Service</h3>
        <p>Your time is valuable! Our team ensures every order is served hot and on time.</p>
    </div>
    <div class="feature-card">
        <img src="images/gh.jpg" alt="Cozy Ambience">
        <h3>Cozy Ambience</h3>
        <p>Eat, chat, and relax in a cozy environment designed for comfort and great company.</p>
    </div>
</section>

<footer>
    &copy; 2025 Canteen Arena | Your Favorite Food Spot! <br>
    <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms.html">Terms of Service</a>
</footer>

<script>
    function searchFood() {
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');
        const query = searchInput.value.trim();

        if (query.length < 1) {
            searchResults.style.display = 'none';
            return;
        }

        // Fetch food items from the database
        fetch('search_food.php?query=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                searchResults.innerHTML = '';
                
                if (data.error) {
                    searchResults.innerHTML = `<div class="not-found">${data.error}</div>`;
                } else if (data.length === 0) {
                    searchResults.innerHTML = '<div class="not-found">No food items found</div>';
                } else {
                    data.forEach(item => {
                        const div = document.createElement('div');
                        div.className = 'search-item';
                        div.innerHTML = `
                            <img src="${item.image}" alt="${item.name}">
                            <div class="search-item-info">
                                <div class="search-item-title">${item.name}</div>
                                <div class="search-item-price">৳${item.price}</div>
                            </div>
                        `;
                        div.onclick = () => {
                            window.location.href = `placeorder.php?food=${encodeURIComponent(item.name)}&price=${item.price}`;
                        };
                        searchResults.appendChild(div);
                    });
                }
                
                searchResults.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                searchResults.innerHTML = '<div class="not-found">Error searching for food items</div>';
                searchResults.style.display = 'block';
            });
    }

    // Close search results when clicking outside
    document.addEventListener('click', function(event) {
        const searchResults = document.getElementById('searchResults');
        const searchInput = document.getElementById('searchInput');
        
        if (!searchResults.contains(event.target) && event.target !== searchInput) {
            searchResults.style.display = 'none';
        }
    });
</script>
</body>
</html>
