<?php
include '../db.php';
    if(isset($_POST['mode'])&& $_POST['mode']=="delete")
    {
        $uid = $_POST['studentId'];
        $delete = mysqli_query($db,"DELETE FROM `user` WHERE `id`='$uid'");
    }



?>