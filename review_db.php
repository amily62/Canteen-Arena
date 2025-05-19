<?php
include('connection.php');
if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $set_data = "insert into comments(name,comment) value('$name','$comment')";
    $result = mysqli_query($conn, $set_data);

    if ($result) {
        echo "<script>alert('successful');</script>";
        header('Location:userhome.php');
    } else {
        echo "not successful";
    }
}
