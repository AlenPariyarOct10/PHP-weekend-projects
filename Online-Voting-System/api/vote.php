<?php
session_start();

include('connect.php');
$id = $_POST['id'];
$vote_status = $_POST['vote'];
$voteCheck = mysqli_query($connect,"SELECT * FROM `groups` WHERE sn='$id'");


$votes = mysqli_fetch_assoc($voteCheck)['votes'];
$votes++;
$_SESSION['userData']['votes']=1;
$voterId = $_SESSION['userData']['id'];
mysqli_query($connect,"UPDATE `groups` SET `votes`='$votes' WHERE sn='$id'");
mysqli_query($connect,"UPDATE `user` SET `vote`=1 WHERE id='$voterId'");
echo "<script>alert(".$_SESSION['userData']['votes'].")</script>";
echo "<script>alert('Your vote has been registered !');window.location = '../client/dashboard.php';</script>";
?>