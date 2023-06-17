<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'db.php';
    $number = mysqli_real_escape_string($db,$_POST['number']);
    $password = mysqli_real_escape_string($db,md5($_POST['password']));
    $check = mysqli_query($db,"SELECT * FROM user WHERE phone='$number' AND password='$password'");
    
    if(mysqli_num_rows($check)==1)
    {
        session_start();
        $_SESSION['status']=1;

        $_SESSION['user'] = mysqli_fetch_assoc($check);
       
        header("Location: dashboard");
        
    }else{
        echo "<script>alert('No user found'); window.location.href = './';</script>";
    }

}else{
    
}

?>