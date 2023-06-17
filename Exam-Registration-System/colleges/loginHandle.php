<?php
include "../db.php";




if(isset($_POST['email']))
{
    if(isset($_POST['password']))
    {
        $login_email = $_POST['email'];
        $login_password = $_POST['password'];
        $check = mysqli_query($db,"SELECT * FROM `college` WHERE `email`='$login_email' AND `password`='$login_password'");
        $check = mysqli_fetch_assoc($check);
        if(mysqli_affected_rows($db)==1)
        {
            session_start();
            $_SESSION['login_admin']=true;
            $_SESSION['college_id'] = $check['cid'];
            $_SESSION['college_name'] = $check['name'];
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