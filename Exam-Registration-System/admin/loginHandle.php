<?php
include "../db.php";
$email = mysqli_query($db,"SELECT `email` FROM `admin`");
$email = mysqli_fetch_assoc($email);
$psw = mysqli_query($db,"SELECT `password` FROM `admin`");
$psw = mysqli_fetch_assoc($psw);


if(isset($_POST['email']))
{
    if(isset($_POST['password']))
    {
        $login_email = $_POST['email'];
        $login_password = md5($_POST['password']);
        if($email['email']==$login_email && $psw['password']==$login_password)
        {
            session_start();
            $_SESSION['login_admin']=true;
            header('Location: dashboard.php');
        }else{
            session_start();
            $_SESSION['login_not_found'] = true;
            header('Location: login.php');
            
        }

    }else{
        $_SESSION['login_not_found'] = true;
        header('Location: login.php');
    }
}else{
    $_SESSION['login_not_found'] = true;
    header('Location: login.php');
}

?>