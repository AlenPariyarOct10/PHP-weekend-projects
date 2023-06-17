<?php
include './db.php';
include './adminInfo.php';
$img = mysqli_query($db,"SELECT `logo` FROM `admin`");
$img = mysqli_fetch_assoc($img);
session_start();
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 1) {

        header("Location: dashboard");
    }
} else {


    ?>

  

    

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ERS - Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
            body {
                background-color: blue;
            }

            .container {
                background-color: white;
                padding: 30px;
                border-radius: 15px;
                max-width: 50%;

            }
        </style>
    </head>

    <body>
        <div class="container my-5">
            <?php



            if (isset($_SESSION['user_exist'])) {
                echo '
                <div class="alert alert-danger" role="alert">
               ' . $_SESSION['user_exist'] . '
                </div>
                ';
                session_destroy();

            } else if (isset($_SESSION['user_created'])) {
                echo '
                <div class="alert alert-success" role="alert">
               ' . $_SESSION['user_created'] . '
                </div>
                ';
                session_destroy();

            } else {
                session_destroy();
            }

            ?>
            <form action="checklogin" method="post">
                <div>
                    <h1 class="display-5">Exam Register - Login</h1>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="inputphone" class="form-label">Phone</label>
                    <input type="number" name="number" class="form-control" id="inputphone" required>
                    <div id="emailHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="passwordField" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="passwordField" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">© 2017–<?php echo date("Y"); ?> <?php echo $adminName; ?></p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    </body>

    </html>

<?php } ?>