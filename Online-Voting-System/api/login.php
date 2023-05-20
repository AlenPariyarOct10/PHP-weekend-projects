<?php

session_start();
include('connect.php');

$phoneNo = $_POST['phoneNo'];
$password = $_POST['passwordField'];

$check = mysqli_query($connect,"SELECT * FROM `user` WHERE phone='$phoneNo' AND password='$password'");

if(mysqli_num_rows($check)>0)
{
    $userData = mysqli_fetch_array($check);
    $group = mysqli_query($connect,"SELECT * FROM `groups`");
   
    $_SESSION['userData'] = $userData;
   
    
    echo "<script> alert('Welcome ! You have been logged in.'); window.location = '../client/dashboard.php'; </script>";
}else{
    echo "<script> alert('We could not find any user with credentials you have provided.'); window.location = '../client/login.html'; </script>";

}


?>

