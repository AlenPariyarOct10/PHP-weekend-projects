<?php 
    include_once 'db.php';
    $adminInfo = mysqli_query($db,"SELECT * FROM `admin`");
    $adminInfo = mysqli_fetch_assoc($adminInfo);
    // var_dump($adminInfo);
    $adminName = $adminInfo['uname'];
    $adminEmail = $adminInfo['email'];
    $adminAddress1 = $adminInfo['address1'];
    $adminAddress2 = $adminInfo['address2'];
    $registrationControl = $adminInfo['registration_control'];
    $admitCard = $adminInfo['admitCard'];
    $logo = $adminInfo['logo'];


?>