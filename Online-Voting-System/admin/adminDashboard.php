<?php
session_start();



if(!isset($_SESSION['adminName']))
{
    echo "<script>alert('Please login to continue!');window.location = '../admin/adminLogin.php';</script>";
    session_destroy();
}else{
   

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="../css/global.css" />
  </head>
  <body>
    <div id="main-container">
      <form action="../client/result.php" method="post">
        <div class="form-check">
          <input class="form-check-input" type="radio" value=1 name="visibility" id="">
          <label class="form-check-label" for="visible">
            Public
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" value=0 name="visibility" id="">
          <label class="form-check-label" for="hide">
            Hidden
          </label>
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </body>
</html>

    

    <?php
    
}






?>

