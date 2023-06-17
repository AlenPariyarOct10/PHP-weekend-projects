<?php
session_start();
include './adminInfo.php';
if(isset($_SESSION['status']))
{
    if($_SESSION['status']==1)
    {

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="body">
        <?php
        include 'sidebar.php';
        ?>
        
        <div class="content">
            <div class="upper-header">
                <div class="title">
                    <h1>Dashboard</h1>
                </div>
                <div class="content-card">
                    <p>सहयोगका लागी उल्लेखित नम्बरमा सम्पर्क गर्नुहोला : <?php echo $adminEmail; ?></p>
                    <p>Office of the Dean,<?php echo " ".$adminName.", ".$adminAddress1.", ".$adminAddress2; ?></p>
                </div>
            </div>

            <div class="status-cards">
                <div class="statcard-1">
                    <div class="head">Personal Details/ व्यक्तिगत विवरण</div>
                    <hr>
                    
                </div>
                <div class="statcard-2">
                    <div class="head">Contact Details/सम्पर्क विवरण</div>
                    <hr>
                    
                </div>
                <div class="statcard-3">
                    <div class="head">Education Details/ शैक्षिक विवरण</div>
                    <hr>
                   
                </div>
                
            </div>

            <div class="table">
                <div class="table-title">Application Status</div>
                <table id="application-table">
                    <tr>
                        <th>Apply Date</th>
                        <th>Semester</th>
                        <th>Exam Type</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                    <tr>
                        <?php 
                        include 'db.php';
                        $checkApplications = mysqli_query($db,"SELECT application.sid, user.id FROM application, user WHERE application.sid=user.id");
                        
                        if(mysqli_num_rows($checkApplications)==0)
                        {
                            echo '<td>No Applications</td>';
                        }else{
                            ?>
                          
                        <tr>
                            <?php
                            $usrid = $_SESSION['user']['id'];
                            $selected = mysqli_query($db,"SELECT * FROM `application` WHERE `sid`='$usrid'");
                            $selected = mysqli_fetch_assoc($selected);
                            ?>
                            <td><?php echo $selected['apply_date']; ?></td>
                            <td><?php echo $selected['semester']; ?></td>
                            <td><?php if($selected['exam_type']==0){echo "Regular";}else{echo "Back";}; ?></td>
                            <td><?php if($selected['status']==0){echo "Not Approved";}else{echo "Approved";}; ?></td>
                            <td><a href="admitcard">View & Download</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                        

                        <?php

                        ?>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>
    
</body>
</html>
<style>
    td{
        text-align: center;
    }
</style>
<?php }}else{
    header('Location: ../login/');
} ?>