<?php

if ($_POST['mode'] == 'personal') {
    if (!isset($_SESSION)) {
        session_start();
    }
    include 'db.php';
    $usr = $_SESSION['user'];
    $uid = $usr['id'];

    $dest1 = "uploads/" . mysqli_real_escape_string($db, $_FILES["profileimg"]["name"]);
    $dest2 = "uploads/" . mysqli_real_escape_string($db, $_FILES["signatureimg"]["name"]);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $mname = mysqli_real_escape_string($db, $_POST['mname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $fname_np = mysqli_real_escape_string($db, $_POST['fname_np']);
    $mname_np = mysqli_real_escape_string($db, $_POST['mname_np']);
    $lname_np = mysqli_real_escape_string($db, $_POST['lname_np']);
    $father_name = mysqli_real_escape_string($db, $_POST['father_name']);
    $mother_name = mysqli_real_escape_string($db, $_POST['mother_name']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $mstatus = mysqli_real_escape_string($db, $_POST['mstatus']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $filepath1 = $_FILES["profileimg"]["tmp_name"];
    $filepath2 = $_FILES["signatureimg"]["tmp_name"];
    move_uploaded_file($filepath1, $dest1);
    move_uploaded_file($filepath2, $dest2);
    $update = "UPDATE `user`
        SET
            `firstname` = '$fname',
            `middlename` = '$mname',
            `lastname` = '$lname',
            `fname_np` = '$fname_np',
            `mname_np` = '$mname_np',
            `lname_np` = '$lname_np',
            `father_name` = '$father_name',
            `mother_name` = '$mother_name',
            `gender` = '$gender',
            `marital_status` = '$mstatus',
            `dob` = '$dob',
            `profile_img` = '$dest1',
            `sign_img` = '$dest2'
        WHERE
            `id`='$uid';
        ";
    mysqli_query($db, $update);
    $data = mysqli_query($db, "SELECT * FROM `user` WHERE id='$uid'");
    $data = mysqli_fetch_assoc($data);
    $_SESSION['user'] = $data;

    require "student-portal/contact-detail.php";

} else if ($_POST['mode'] == 'contact') {
    if (!isset($_SESSION)) {
        session_start();
    }
    include 'db.php';
    $usr = $_SESSION['user'];
    $uid = mysqli_real_escape_string($db, $usr['id']);
    $dest = "uploads/" . mysqli_real_escape_string($db, $_FILES["citizenship-photo"]["name"]);
    $citizenship_no = $_POST['citizenship'];
    $filepath = mysqli_real_escape_string($db, $_FILES["citizenship-photo"]["tmp_name"]);
    move_uploaded_file($filepath, $dest);
    $district = mysqli_real_escape_string($db, $_POST['district']);
    $permanent_address = mysqli_real_escape_string($db, $_POST['paddress']);
    $temporary_address = mysqli_real_escape_string($db, $_POST['taddress']);
    $contact_landline = mysqli_real_escape_string($db, $_POST['contact_landline']);
    $contact_mobile = mysqli_real_escape_string($db, $_POST['contact_mobile']);

    $update = "UPDATE `user`
        SET
            `citizenshipno` = '$citizenship_no',
            `district_id` = '$district',
            `permanent_address` = '$permanent_address',
            `temporary_address` = '$temporary_address',
            `landline` = '$contact_landline',
            `phone` = '$contact_mobile',
            `citizenship_img` = '$dest'
            
        WHERE
            `id`='$uid';
        ";
    mysqli_query($db, $update);
    $data = mysqli_query($db, "SELECT * FROM `user` WHERE id='$uid'");
    $data = mysqli_fetch_assoc($data);
    $_SESSION['user'] = $data;

    require "student-portal/college-detail.php";
} else if ($_POST['mode'] == 'college') {
    if (!isset($_SESSION)) {
        session_start();
    }
    include 'db.php';
    $usr = $_SESSION['user'];
    $uid = mysqli_real_escape_string($db, $usr['id']);
    $level_id = mysqli_real_escape_string($db, $_POST['level']);
    $college_id = mysqli_real_escape_string($db, $_POST['college']);
    $programme_id = mysqli_real_escape_string($db, $_POST['programme']);
    $academic_year = mysqli_real_escape_string($db, $_POST['academic_year']);
    $registration_number = mysqli_real_escape_string($db, $_POST['registrationNumber']);


    $update = "UPDATE `user`
        SET
            `level_id` = '$level_id',
            `college_id` = '$college_id',
            `programme_id` = '$programme_id',
            `academic_year` = '$academic_year',
            `registration_number` = '$registration_number'
        WHERE
            `id`='$uid';
        ";
    mysqli_query($db, $update);
    $data = mysqli_query($db, "SELECT * FROM `user` WHERE id='$uid'");
    $data = mysqli_fetch_assoc($data);
    $_SESSION['user'] = $data;

    require "student-portal/education.php";
} else if ($_POST['mode'] == 'educational_detail') {
    if (!isset($_SESSION)) {
        session_start();
    }
    include 'db.php';
    $usr = $_SESSION['user'];
    $uid = mysqli_real_escape_string($db, $usr['id']);
    $degree = mysqli_real_escape_string($db, $_POST['degree']);
    $board_id = mysqli_real_escape_string($db, $_POST['board_name']);
    $major_subject = mysqli_real_escape_string($db, $_POST['major_subject']);
    $academic_year = mysqli_real_escape_string($db, $_POST['academic_year']);
    $score = mysqli_real_escape_string($db, $_POST['score']);
    $completeYear = mysqli_real_escape_string($db, $_POST['completeYear']);
    $documentTitle = mysqli_real_escape_string($db, $_POST['documentTitle']);
    $document = $_FILES['document'];
    $documentName = "/uploads/" . $_FILES['document']['name'];
    $docTempName = $_FILES['document']['tmp_name'];
    move_uploaded_file($docTempName, $docTempName);
    $date = date("Y-M-d | h:i:sa");
    $insert = "INSERT INTO `educational_description` (`sid`, `degree_id`, `board_id`, `major_subjects`, `academic_year`, `Division/Grade`, `complition_year`, `document_title`, `document_img`) VALUES ('$uid', '$degree', '$board_id', '$major_subject', '$academic_year', '$score', '$completeYear', '$documentTitle', '$documentName')";
    $insertApplication = mysqli_query($db, "INSERT INTO `application`(`sid`, `apply_date`,`status`) VALUES ('$uid','$date','0')") or die("unable to insert");
    mysqli_query($db, $insert);
    $data = mysqli_query($db, "SELECT * FROM `educational_description` WHERE sid='$uid'");
    $data = mysqli_fetch_assoc($data);
    $_SESSION['education'] = $data;
    require "student-portal/education.php";
}else if($_POST['mode']=='register-exam')
{
    if (!isset($_SESSION)) {
        session_start();
    }
    include 'db.php';
    $usr = $_SESSION['user'];
    $uid = mysqli_real_escape_string($db, $usr['id']);
    $semester = $_POST['semester'];
    $_SESSION['semester'] = $_POST['semester'];

    // 0-> Regular & 1 -> Back
    if($_POST['examType']=='r')
    {
        $examType = 0;
        $_SESSION['examType'] = "regular";
    }else{
        $examType = 1;
        $_SESSION['examType'] = "back";
    }

    mysqli_query($db,"UPDATE `application` SET `semester`='$semester',`exam_type`='$examType' WHERE `sid`='$uid'");
    header("Location: subject-select");

}else if($_POST['mode']=="subject-select")
{
    if (!isset($_SESSION)) {
        session_start();
    }
    include 'db.php';
    $usr = $_SESSION['user'];
    $uid = mysqli_real_escape_string($db, $usr['id']);
    // var_dump($_POST['subjects']);
    $fee = 0;
    // var_dump($_POST['subjects']);
    $jsonSubs = json_encode($_POST['subjects']);
    echo "<br>".$jsonSubs."<br>";
    mysqli_query($db,"UPDATE `application` SET `subs`='$jsonSubs' WHERE `sid`='$uid'");
    echo "<script>console.log(".$jsonSubs.")</script>";
    foreach($_POST['subjects'] as $key => $val)
    {
        $fee_row = mysqli_query($db,"SELECT `fee` FROM `exam` WHERE `subject_code`='$val'");
        $fee_row = mysqli_fetch_assoc($fee_row);
        // var_dump($fee_row['fee']);
        $fee += $fee_row['fee'];
        mysqli_query($db,"INSERT INTO `selected_subjects`(`subject_code`, `std_id`) VALUES ('$val','$uid')");
    }



    
    $_SESSION['payment_amount'] = $fee;
    header("Location: application");
    
    
}



?>