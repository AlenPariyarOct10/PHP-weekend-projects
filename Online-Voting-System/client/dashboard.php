<?php
  include("../api/connect.php");
  session_start();
  if(!isset($_SESSION['userData']))
  {
    echo "<script>window.location = '../client/login.html';</script>";
  }else{
    $ud = $_SESSION["userData"]["id"];
    
    $udata = $_SESSION['userData'];
    $voteCheck = mysqli_query($connect,"SELECT `vote` FROM `user` WHERE id='$ud'");
    // print_r(mysqli_fetch_row($voteCheck)[0]);
   

    

  

    if(mysqli_fetch_row($voteCheck)[0]==0)
    {
      
      $status ="<td style='color:red'>Not Voted</td>";
      $ifVoted = 0;
      
    }else{
      $status ="<td style='color:green'>Voted</td>";
      $ifVoted = 1;
    }
    
  }

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
    
    
    <div class="main-container user-card">
      <table>
        <tr>
          <td colspan="2"><h2>Voter Information</h2></td>
        </tr>
        <tr>
            <td colspan="2">
                
                <img src="<?php echo "../uploads/users/".$udata['photo'] ?>" width="80" height="80" alt="" title="" class="img-small">

            </td>
        </tr>
        <tr>
          <td>Name :</td>
          <td><?php echo $udata['fname']." ".$udata['lname'];?></td>
        </tr>
        <tr>
          <td>Citizenship No. :</td>
          <td><?php echo $udata['citizen'];?></td>
        </tr>
        <tr>
          <td>Phone No. :</td>
          <td><?php echo $udata['phone'];?></td>
        </tr>
        <tr>
          <td>Address. :</td>
          <td><?php echo $udata['address'];?></td>
        </tr>
        <tr>
          <td>Voting Status:</td>
          <?php echo $status ?>
        </tr>
        <tr>
            <td><button class="btn-logout"><a style="text-decoration:none;color:white;" href="login.html">Logout</a></button></td>
        </tr>
        <tr>
            <td><button class="btn-logout"><a style="text-decoration:none;color:white;" href="result.php">View Result</a></button></td>
        </tr>
      </table>
    </div>
    <div class="main-container group-list">
      <table>
        <tr>
          <td colspan="3"><h2>Voting Groups</h2></td>
        </tr>

        <?php 
        
          // Execute the query
$query = "SELECT * FROM `groups`";
$result = mysqli_query($connect, $query);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {


    while ($row = mysqli_fetch_assoc($result)) 
{
 
// var_dump($row);
echo '
  <tr>
    <td>
      <img src="../uploads/groups/' . $row['photo'] . '" height="40px" alt="">
    </td>';
 echo '   <td>'.$row['name'].'</td>';
   
    if($ifVoted==0)
    {
      echo '<td> <form action="../api/vote.php" method="POST">
      <input type="hidden" name="id" value="'.$row['sn'].'">
      <input type="hidden" name="vote" value="'.$udata['vote'].'">
      <button type="submit" class="btn-vote">Vote</button>
      </form></td>';
    }
    
    
    
  echo '</tr>';



}
}


// Close the database connection
mysqli_close($connect);
   
        ?>

      </table>
    </div>
  </body>
</html>
