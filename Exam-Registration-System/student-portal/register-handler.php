<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'db.php';
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $cpassword = mysqli_real_escape_string($db,$_POST['confirm-password']);
    $firstname = mysqli_real_escape_string($db,$_POST['first-name']);
    $midname = mysqli_real_escape_string($db,$_POST['mid-name']);
    $lastname = mysqli_real_escape_string($db,$_POST['last-name']);
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    if($password!=$cpassword)
    {
        session_start();
            $_SESSION['nomatch_password']="Password validation failed !";
            header("Location: index.php");
    }else{
        include '../db.php';
        $checkEmail = mysqli_query($db,"SELECT * FROM user WHERE email='{$email}'");
        $checkPhone = mysqli_query($db,"SELECT * FROM user WHERE phone='{$phone}'");
        if(mysqli_num_rows($checkEmail)>0 || mysqli_num_rows($checkPhone)>0)
        {
            session_start();
            $_SESSION['user_exist']="User already exist ! Please Login to continue";
            header("Location:  login");
        }else{
            $fullname = $firstname." ".$midname." ".$lastname;
            $sp = md5($password);
            $registerUser = mysqli_query($db,"INSERT INTO `user`(`name`, `phone`, `email`,`password`,`firstname`,`middlename`,`lastname`) VALUES ('$fullname','$phone','$email','$sp','$firstname','$midname','$lastname')");

            session_start();
            $_SESSION['user_created']="User created ! Please Login to continue";
            header("Location:  login");
            
        }
    }

}else{
    session_destroy();
    header("Location:  login");
}



?>