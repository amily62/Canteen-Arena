<?php
session_start();
include('connection.php');

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['em'])) {
    echo json_encode(['error' => 'Please login first']);
    exit();
}

if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']);
    
    // Search in the food table
    $sql = "SELECT * FROM food WHERE name LIKE '%$query%' LIMIT 10";
    $result = mysqli_query($conn, $sql);
    
    $foods = array();
    
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $foods[] = array(
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['image']
            );
        }
    }
    
    echo json_encode($foods);
} else {
    echo json_encode(array());
}
?> 