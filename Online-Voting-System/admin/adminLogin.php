<?php
session_start();

if(isset($_POST['passwordField'] ))
{



    include('../api/connect.php');

    $name = $_POST['name'];
    $password = $_POST['passwordField'];
    
    
    
    $check = mysqli_query($connect,"SELECT * FROM `admin` WHERE `name`='$name' AND `password`='$password'");
    
    if(mysqli_num_rows($check)>0)
    {
        $adminData = mysqli_fetch_array($check);
       
       
        $_SESSION['adminName'] = $name;
        $_SESSION['adminPassword'] = $password;
       
        
        echo "<script> alert('Welcome ! You have been logged in.'); window.location = '../admin/adminDashboard.php'; </script>";
    }else{
        echo "<script> alert('We could not find any user with credentials you have provided.'); window.location = '../admin/adminLogin.php'; </script>";
    
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Login Page</title>
    <link rel="stylesheet" href="../css/global.css" />
  </head>
  <body>
    <div id="main-container">
      <form action="../admin/adminLogin.php" method="POST">
        
        <table>
          <tr>
            <td>
                <h2 id="headTitle">Online Voting System</h2>
            </td>
            
            
          </tr>
          <tr>
            <td>
                <img src="https://cdn-icons-png.flaticon.com/512/2673/2673003.png " width="50" height="50" alt="" title="" class="img-small">

            </td>
          </tr>
          <tr>
            <td>
              <h4>Login</h4>
            </td>
          </tr>
          <tr>
         
            <td>
              <input
                type="text"
                name="name"
                id="name"
                class="loginInpBox"
                placeholder="Name"
              />
            </td>
          </tr>
          <tr>
          
            <td>
              <input class="loginInpBox" type="password" name="passwordField" id="passwordField" placeholder="Password" />
            </td>
          </tr>
          <tr>
            <td style="margin-top: 10px;">
              <button type="submit" id="submitBtn" class="btn submit-btn">Login</button>
            </td>
          </tr>

      
        </table>
      </form>
    </div>
  </body>
</html>


