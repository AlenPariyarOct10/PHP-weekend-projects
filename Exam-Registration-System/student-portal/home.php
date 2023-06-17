<?php
include "./db.php";
$img = mysqli_query($db,"SELECT `logo` FROM `admin`");
$img = mysqli_fetch_assoc($img);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="student-portal/client-style.css">
    <title>Home</title>
</head>
<body>
    <div class="topMenu">
        <div class="menuBox">
            <a class="mini-icon btn-outline-primary" href="#"><i class="fa-brands fa-facebook"></i></a>
        </div>
        <div class="menuBox">
            <a class="mini-icon btn-outline-primary" href="register">Register</a>
            <a class="mini-icon btn-outline-primary" href="login">Login</a>
        </div>
    </div>
    <div class="headerTop">
        <div class="icon">
            <img src="<?php echo substr($img['logo'],1);?>" alt="" srcset="">
        </div>
        <div class="headerTitle">
            <?php

            ?>
            <h1><?php include './adminInfo.php'; echo $adminName; ?></h1>
            <h3>Office of the Dean</h3>
            <h4>Exam Registration System</h4>
        </div>
    </div>
    <div class="navbar">
        <ul class="nav-item-container">
            <li class="nav-item active"><a href="">Home</a></li>
            <li class="nav-item"><a href="">About Us</a></li>
            <li class="nav-item"><a href="">Registration Instruction</a></li>
            <li class="nav-item"><a href="">Campuses</a></li>
            <li class="nav-item"><a href="">Bank Accounts</a></li>
            <li class="nav-item"><a href="">Contact Us</a></li>
        </ul>
    </div>

    <div class="mainBody">
       
        <div class="left-content">
            
            <div class="card-style-1">
                
                
                <p class="card-title">
                    Already Register Student
                </p>
                <p class="card-content">
                    विद्यार्थीले Login मा गएर आफ्नो Email Address तथा Password लेखेर Click गरेपछि Exam Registration Form को Dash Board देखापर्नेछ |
                </p>
                <div class="button-placeholder">
                    <a href="login" class="login-signup">Login</a>
                </div>
            </div>

            <div class="card-style-1 mt-2">
                
                
                <p class="card-title">
                    New Student Registration
                </p>
                <p class="card-content">
                    विद्यार्थीले यस वेभ पेजमा देखिएको Registration Form मा आफ्नो व्यक्तिगत ईमेल, मोवाईल नम्बर तथा मागेको अन्य विवरण भरी नयाँ Password Create गर्नुपर्ने हुन्छ ।
                </p>
                <div class="button-placeholder">
                    <a href="register
                    " class="login-signup">Register New Student</a>
                </div>
                <hr>
                <p class="card-content">
                    विवरण भरेर Register मा Click गर्नासाथै विद्यार्थीले उल्लेख गरेको मोवाईल नम्बरमा OTP Number सहितको म्यासेज आउने छ । अब, सो नम्बरलाई पेजमा देखिएको Verify OTP भन्ने ठाँउमा भरेर Click गर्ना साथ विद्यार्थीको आफ्नो User ID Create हुन्छ ।
                </p>
            </div>
        </div>
        <div class="right-content">

        </div>
    </div>

    <div class="footer">
        <div class="left-content">
            <div class="footer-sub-title">
                <p>About us</p>
            </div>
            <div class="content">
                <p> Formerly, it was existed as an Institute. It was restructured as a Faculty in 1985 (2042 BS). This Faculty is producing specialized human resources in humanities, social sciences, computer applications and interdisciplinary studies</p>
            </div>
        </div>
        <div class="mid-content">
            <div class="logo">
                <ul>
                    <li><i class="fa-brands fa-facebook-f"></i> </li>
                    <li><i class="fa-brands fa-twitter"></i></li>
                    <li><i class="fa-brands fa-youtube"></i></li>
                </ul>
            </div>
            <div class="copyright-info">
                <p class="p1">
                    Copyright © <?php echo $adminName; ?>. All rights reserved.
                </p>
                <p class="p2">
                    Powered by AlenTech Pvt Ltd.
                </p>
            </div>
        </div>
        <div class="right-content">
            <div class="footer-sub-title">Contact Us</div>
            <div class="contact-content">
                <div class="contect-item">
                    
                    <?php 
                    echo $adminName."<br>";
                    echo $adminAddress1.", ".$adminAddress2."<br>";
                    echo $adminEmail;
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>