<?php
include('connection.php');
$username=$_POST['uname'];
$password=$_POST['password'];
$query="select password from admin where uname='$username'";
$result=mysqli_query($conn,$query);
if (mysqli_num_rows($result))
{
    $un=mysqli_fetch_assoc($result);
    if($un['password']===$password)
    {
        echo "<script> alert('Login Successfully')</script>";
        header('Location:adminhome.php');
    }
    else
    {
        echo "Wrong Password";
    }
}
?>