<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 1) {

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
                include 'db.php';
                include 'sidebar.php';
                ?>
                <div class="content">
                    <div class="upper-header">

                        <div class="content-card">
                            <p>Dashboard / My Profile - Personal Detail</p>
                        </div>
                    </div>

                    <form action="server" method="post" enctype="multipart/form-data" class="personal-info-form">
                        <input type="hidden" name="mode" value="subject-select">
                        <?php
                        $usr = $_SESSION['user'];
                        $sem = $_SESSION['semester'];
                        ?>

                        <table id="form-table">
                            <tbody>
                                <tr>
                                    <td>


                                        <?php

                                        $subs = mysqli_query($db, "SELECT * FROM `exam` WHERE `semester`='$sem'");

                                        if ($_SESSION['examType'] == "regular") {

                                            while ($subs_row = mysqli_fetch_assoc($subs)) {
                                                echo '<div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="' . $subs_row["subject_code"] . '" id="' . $subs_row["subject_code"] . '" checked disabled>
                                                        <input type="hidden" name="subjects[]" value="' . $subs_row["subject_code"] . '">
                                                        <label class="form-check-label" for="' . $subs_row["subject_code"] . '">
                                                         ' . $subs_row["name"] . '
                                                        </label>
                                                        <label class="form-check-label" for="' . $subs_row["subject_code"] . '">
                                                         ' . $subs_row["subject_code"] . '
                                                        </label>
                                                     </div>';
                                            }
                                            ;

                                        }

                                        while ($subs_row = mysqli_fetch_assoc($subs)) {
                                            echo '<div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="' . $subs_row["subject_code"] . '" id="' . $subs_row["subject_code"] . '">
                                                    <label class="form-check-label" for="' . $subs_row["subject_code"] . '">
                                                     ' . $subs_row["name"] . '
                                                    </label>
                                                    <label class="form-check-label" for="' . $subs_row["subject_code"] . '">
                                                     ' . $subs_row["subject_code"] . '
                                                    </label>
                                                 </div>';
                                        }
                                        ;
                                        ?>

                                    </td>

                                </tr>


                                <tr>
                                    <td>
                                        <div class="submit">
                                            <button type="submit">SUBMIT</button>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                

                </div>
            </div>




        </body>

        </html>
        <style>
            #form-table td div {
                display: flex;
                flex-direction: row-reverse;
                justify-content: space-between;
                align-items: center;

            }

            #form-table td {
                width: 60%;
            }
        </style>

    <?php }
} else {
    require "student-portal/home.html";
} ?>