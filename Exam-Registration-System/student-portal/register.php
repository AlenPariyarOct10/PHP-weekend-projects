<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="assets/js/register/validation.js"></script>
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

<?php
include './adminInfo.php';
if ($registrationControl == 1) {


    ?>



    <body>
        <div class="container my-5">
            <?php
            if (isset($_SESSION['nomatch_password'])) {
                echo '<div class="alert alert-danger" role="alert">
       ' . $_SESSION['nomatch_password'] . '
      </div>';
            }
            ?>
            <form action="handleregister" method="post">
                <div>
                    <h1 class="display-5">Registration Form</h1>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Email</label>
                    <input type="email" placeholder="Enter your email" name="email" class="form-control" id="email"
                        aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="InputEmail1" id="passwordlabel" class="form-label">Password</label>
                    <input type="password" placeholder="Enter your password" name="password" class="form-control"
                        id="password" aria-describedby="emailHelp" required>

                </div>
                <div class="mb-3">
                    <label for="confirmpassword" id="cpasswordlabel" class="form-label">Confirm Password</label>
                    <input type="password" placeholder="Re-Enter your password" name="confirm-password" class="form-control"
                        id="confirmpassword" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">First Name</label>
                    <input type="text" placeholder="Enter your first name" name="first-name" class="form-control"
                        id="firstname" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Middle Name</label>
                    <input type="text" placeholder="Enter your middle name" name="mid-name" class="form-control"
                        id="midname">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Last Name</label>
                    <input type="text" placeholder="Enter your last name" name="last-name" class="form-control"
                        id="lastname" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Phone No.</label>
                    <input type="text" placeholder="Enter your phone number" name="phone" class="form-control" id="phone"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">© 2017–<?php echo date("Y")." ";  echo $adminName.", ".$adminAddress1.", ".$adminAddress2; ?></p>
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

    <?php

} else {
    ?>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <body>
        <div class="alert alert-warning" role="alert">
            Registration is closed !
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
    </body>

<?php


}

?>

</html>