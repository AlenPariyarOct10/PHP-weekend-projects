<?php
include '../db.php';
    if(isset($_POST['mode'])&& $_POST['mode']=="delete")
    {
        $uid = $_POST['studentId'];
        $delete = mysqli_query($db,"UPDATE `application` SET `status`='-1' WHERE `sid`='$uid'");
    }else if(isset($_POST['mode'])&& $_POST['mode']=="approve")
    {
        $uid = $_POST['studentId'];
        $approve = mysqli_query($db,"UPDATE `application` SET `status`='1' WHERE `sid`='$uid'");
    }



?>