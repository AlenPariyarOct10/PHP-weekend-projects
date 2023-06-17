<?php
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}


if (isset($_SESSION['login_admin'])) {
  if ($_SESSION['login_admin'] == true) {

    ?>
    <?php include '../db.php'; ?>
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <?php
 

      $clzCount = mysqli_affected_rows($db);
      $cname = $_SESSION['college_name'];
      echo '<div class="alert alert-info" role="alert">
          Welcome ! '.$cname.'
            </div>';
      $collegeId = $_SESSION['college_id'];
      $usrCount = mysqli_query($db, "SELECT * FROM `user` WHERE `college_id`='$collegeId'");
      $usrCount = mysqli_affected_rows($db);
      echo '<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Total Students</h5>
                  <p class="card-text">' . $usrCount . '</p></div></div>';

      $examCount = mysqli_query($db, "SELECT * FROM `semester` WHERE `active`='active'");
      $examCount = mysqli_affected_rows($db);
      echo '<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Active Exams</h5>
                    <p class="card-text">' . $examCount . '</p></div></div>';

      ?>



    </main>
    <?php include 'footer.php'; ?>

    <?php

  }
}else{
  $_SESSION['error_msg'] = "Please login to continue";
  header("Location: index.php");
}


?>