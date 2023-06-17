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



                    <table id="form-table">
                        <tbody>
                            <tr>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Exam Type</th>
                                <th>Admit Card</th>
                            </tr>
                            <tr>
                                <?php
                                $usrid = $_SESSION['user']['id'];
                                $selected = mysqli_query($db,"SELECT * FROM `application` WHERE `sid`='$usrid'");
                                $selected = mysqli_fetch_assoc($selected);
                                ?>
                                <td><?php echo $selected['semester']; ?></td>
                                <td><?php if($selected['status']==0){echo "Not Approved";}else{echo "Approved";}; ?></td>
                                <td><?php if($selected['exam_type']==0){echo "Regular";}else{echo "Back";}; ?></td>
                                <td><a href="admitcard">View & Download</a></td>
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>




        </body>

        </html>
        <style>
         td{
            text-align: center;
         }
        a:hover{
            color: black;
        }
        </style>

    <?php }
} else {
    require "student-portal/home.html";
} ?>