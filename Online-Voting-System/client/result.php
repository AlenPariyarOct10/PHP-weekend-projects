<?php 

session_start();
include("../api/connect.php");
$query = "SELECT * FROM `groups`";
$result = mysqli_query($connect, $query);

if(isset($_POST['visibility']))
{
  $check = $_POST['visibility'];
  $visibility_query = mysqli_query($connect,"UPDATE `admin` set `visible`='$check' WHERE 1");

}

$check_vs_status = mysqli_query($connect,"SELECT `visible` FROM `admin`");
// if($check_vs_status==1)
// {
//   echo "unhide";
// }else{
//   echo "hide";
// }






?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/register.css" />
    <title>Document</title>
  </head>
  <body>

  <?php if(mysqli_fetch_row($check_vs_status)[0]==1){ ?>
  
    <div class="main-container group-list">
      <table>
        <tr>
          <td colspan="3"><h92>Vote Results</h92></td>
        </tr>
        <?php
        
        if ($result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) 
        {
          echo '
          <tr>
          <td>
            <img src="../uploads/groups/' . $row['photo'] . '" height="40px" alt="">
          </td>';
          echo '<td>'.$row['name'].'</td>';
          echo '<td><button class="btn-vote">'.$row['votes'].' Vote</button></td>'   ;
          echo '</tr>';
        }
        }

      }else{
        
        echo '<h1>The result is not published yet..</h1>';
        echo 'You will be redirected to login page in <span id="timer">5</span>';
        echo '<script>
        let time=5;
        setInterval(myTimer, 1000);

        function myTimer() {
        time--;

        document.getElementById("timer").innerHTML = time;
        if(time==0)
        {
          window.location = "../client/login.html";
        }
        }';
        

        

      }?>
        

        
</script>

      
     
      </table>
    </div>
  </body>
</html>
