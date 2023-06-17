<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'db.php';
$usr = $_SESSION['user'];
$uid = $usr['id'];

$approval = mysqli_query($db, "SELECT `status` FROM `application` WHERE `sid`='$uid'");
$approval = mysqli_fetch_assoc($approval);







if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 1) {
        if ($approval['status'] == 1) {
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
                    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
                    crossorigin="anonymous" referrerpolicy="no-referrer" />
                <title>Document</title>
                <link rel="stylesheet" href="assets/css/style.css">

                <link rel="stylesheet" href="assets/css/contact-detail.css">
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

                            <div class="content-card">
                                <p>Register Exam</p>
                            </div>
                        </div>

                        <form action="server" method="post" enctype="multipart/form-data" class="personal-info-form">
                            <input type="hidden" name="mode" value="register-exam">
                            <?php
                            $usr = $_SESSION['user'];
                            ?>
                            <table id="form-table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="semester">Semester</label>
                                            <select name="semester" id="semester">
                                                <?php
                                                $level = mysqli_query($db, "SELECT * FROM `semester` WHERE `active`='active'");
                                                if ($usr['level_id'] == -1 || $usr['level_id'] == 0) {
                                                    echo '<option disabled selected>Select Level</option>';
                                                }
                                                while ($level_row = mysqli_fetch_assoc($level)) {
                                                    echo '
                                    <option value="' . $level_row['semester'] . '">' . $level_row['semester'] . '</option>
                                            ';

                                                }
                                                ;
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <label for="examType">Type</label>
                                            <select name="examType" id="examType">
                                                <option value="r">Regular</option>
                                                <option value="b">Back</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>

                                    </tr>

                                </tbody>
                            </table>
                            <div class="submit">
                                <center> <button type="submit">SUBMIT</button></center>
                            </div>
                        </form>

                    </div>
                </div>


            </body>

            </html>


        <?php
        
        }else{
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
                    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
                    crossorigin="anonymous" referrerpolicy="no-referrer" />
                <title>Document</title>
                <link rel="stylesheet" href="assets/css/style.css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

                <link rel="stylesheet" href="assets/css/contact-detail.css">
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
                        <div class="alert alert-danger" role="alert">
                            Your registration request has been sent to College Administration ! Please contact to your college for any queries.
                        </div>
                        
                    </div>
                </div>


            </body>

            </html>
            <?php
        }
    } else {
        require "student-portal/home.html";
    }
} ?>