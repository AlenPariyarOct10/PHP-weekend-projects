<?php 


include "../db.php";

if(isset($_POST['mode'])&&$_POST['mode']=="examControl" )
{
    $sem = $_POST['semester'];
    $check = mysqli_query($db,"SELECT `active` FROM `semester` WHERE `semester`='$sem'");
    $check = mysqli_fetch_assoc($check);
    $check = $check['active'];
    if($check=="active")
    {
        $update = mysqli_query($db,"UPDATE `semester` SET `active`='inactive' WHERE `semester`='$sem'");
    }else{
        $update = mysqli_query($db,"UPDATE `semester` SET `active`='active' WHERE `semester`='$sem'");
    }
    
}else if(isset($_POST['mode'])&&$_POST['mode']=="updateForm")
{
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $registrationControl = $_POST['registrationControl'];
        $admitCard = $_POST['admitCard'];
        $logoDest = "../uploads/".$_FILES['image']['name'];
        $filepath = $_FILES['image']['tmp_name'];
        move_uploaded_file($filepath,$logoDest);
     

        $updateAdmin = mysqli_query($db,"UPDATE `admin` SET `uname`='$uname',`email`='$email',`address1`='$address1',`address2`='$address2',`registration_control`='$registrationControl',`admitCard`='$admitCard',`logo`='$logoDest'");
      
        require 'setting.php';
}


?>