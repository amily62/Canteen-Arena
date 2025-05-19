<?php
include('connection.php');
if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['mno'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $set_data = "insert into registration(name,email,phone_number,password,confirm_password) value('$name','$email','$phone','$password','$cpassword')";
    $result = mysqli_query($conn, $set_data);

    if ($result) {
        echo "<script>alert('successful');</script>";
        header('Location:userlogin.php');
    } else {
        echo "not successful";
    }
}
