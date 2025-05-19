<?php
include('connection.php');
$food_name = $_POST['food_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];



$query = "INSERT INTO `stock_food`( `food_name`, `quantity`, `price`) VALUES ('$food_name','$quantity','$price')";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "correct";
} else {
    echo "incorrect";
}
