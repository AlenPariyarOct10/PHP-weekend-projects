<?php


include('connect.php');


$name = $_POST['Name'];
$password = $_POST['passwordField'];
$image = $_FILES['profile_pic']['name'];
$imageTmp = $_FILES['profile_pic']['tmp_name'];

$check = mysqli_query($connect,"SELECT * FROM `groups` WHERE `name`='$name' AND `password`='$password'");

if(mysqli_num_rows($check)>0)
{
    echo "<script>alert('Account already registered. Login to Continue. !'); window.location = '../client/login-group.html';</script>";
}else{
    mysqli_query($connect,"INSERT INTO `groups`(`name`, `votes`, `photo`, `password`) VALUES ('$name',0,'$image','$password')");
    move_uploaded_file($imageTmp,'../uploads/groups/'.$image);
    echo "<script>alert('Your group account has been registered. Login to Continue. !'); window.location = '../client/login-group.html';</script>";
}






?>