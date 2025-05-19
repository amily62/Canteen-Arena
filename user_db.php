<?php
session_start();
include('connection.php');

$_SESSION['em'] = $_POST['email'];

$email = $_POST['email'];
$password = $_POST['password'];
$query = "select password from registration where email='$email'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)) {
    $un = mysqli_fetch_assoc($result);
    if ($un['password'] === $password) {
        echo "<script> alert('Login Successfully')</script>";
        header('Location:userhome.php');
    } else {
        echo "Wrong Password";
    }
}
