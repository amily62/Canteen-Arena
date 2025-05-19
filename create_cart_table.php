<?php
include('connection.php');

// Check if the cart table already exists
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

    if (mysqli_query($conn, $create_table)) {
        echo "<h2 style='color: green;'>Cart table created successfully!</h2>";
        
        // Verify the table was created
        $verify_table = "SHOW TABLES LIKE 'cart'";
        $verification = mysqli_query($conn, $verify_table);
        
        if (mysqli_num_rows($verification) > 0) {
            echo "<p style='color: green;'>✓ Table verification successful</p>";
        } else {
            echo "<p style='color: red;'>⚠ Warning: Table verification failed</p>";
        }
    } else {
        echo "<h2 style='color: red;'>Error creating cart table: " . mysqli_error($conn) . "</h2>";
    }
} else {
    echo "<h2 style='color: blue;'>Cart table already exists!</h2>";
}

// Show table structure
$show_structure = "DESCRIBE cart";
$structure = mysqli_query($conn, $show_structure);

if ($structure) {
    echo "<h3>Table Structure:</h3>";
    echo "<table border='1' style='border-collapse: collapse; margin-top: 20px;'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    
    while ($row = mysqli_fetch_assoc($structure)) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . $row['Default'] . "</td>";
        echo "<td>" . $row['Extra'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color: red;'>Error showing table structure: " . mysqli_error($conn) . "</p>";
}
?> 