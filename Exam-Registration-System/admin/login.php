
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <?php 
    include "../db.php";
        $img = mysqli_query($db,"SELECT `logo` FROM `admin`");
        $img = mysqli_fetch_assoc($img);

    ?>

    <?php

    ?>

    <title>Signin Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form method="post" action="loginHandle.php" class="form-signin">
      <?php
      
      if(session_status()==PHP_SESSION_ACTIVE)
      {
        if(isset($_SESSION['login_not_found'])&& $_SESSION['login_not_found']==true)
        {
          echo '  <div class="alert alert-danger" role="alert">
          Login user not found !
        </div>';
        }
      }else{
        session_start();
        
        if(isset($_SESSION['login_not_found'])&& $_SESSION['login_not_found']==true)
        {
          echo '  <div class="alert alert-danger" role="alert">
          Login user not found !
        </div>';
        }

      }
      

      if(session_status()!=PHP_SESSION_ACTIVE)
      {
        session_start();
      }
      if(isset($_SESSION['error_msg']))
      {
        echo '  <div class="alert alert-danger" role="alert">
          '.$_SESSION['error_msg'].'
        </div>';
      }

      
  
    ?>
      <input type="hidden" name="mode" value="login">
      <img class="mb-4" src="<?php echo $img['logo'];?>" alt=""  height="80px">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-<?php echo date("Y"); ?></p>
    </form>
  </body>
</html>
