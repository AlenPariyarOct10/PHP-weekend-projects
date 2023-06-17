<?php

if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}


if (isset($_SESSION['login_admin'])) {
  if ($_SESSION['login_admin'] == true) {

include '../db.php';
include 'header.php';
?>
<?php include 'sidebar.php';
?>

<?php
if (isset($_POST['table']) && $_POST['table'] == "table") {
  ?>
  <div class="container">
    <?php
    $s = $_POST['sem'];
    $semester = mysqli_query($db,"SELECT * FROM `semester` WHERE semester='$s'");
    
    if(mysqli_affected_rows($db)>0)
    {
        echo "Table for semester".$s." already exists.";
    }else
    {

    
    
    $insertSemester = mysqli_query($db,"INSERT INTO `semester`(`semester`, `active`) VALUES ('$s','active')");

    $sem = mysqli_query($db,"SELECT * FROM `semester` WHERE `semester`='$s'");
    $sem = mysqli_fetch_array($sem);
    // echo mysqli_affected_rows($db)."<br>";
    foreach ($_POST['sc'] as $key => $value) {
      $sem = $_POST['sem'];
      $sn = $_POST['sn'][$key];
      $ch = $_POST['ch'][$key];
      $fee = $_POST['fees'][$key];

      $insertExam = mysqli_query($db,"INSERT INTO `exam`(`subject_code`, `name`, `credit_hours`, `semester`, `fee`) VALUES ('$value','$sn','$ch','$sem','$fee')");
  

      // echo $_POST['sem']."<br>";
      // echo "$value<br>";
      // echo $_POST['sn'][$key] . "<br>";
      // echo $_POST['ch'][$key] . "<br>";
      
    }
  }
    ?>
  </div>
  <?php
}
?>

<div id='createTable'>
  <div class='col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4'>
    <div class='btn-group'>
      <button type='button' id="addNew" class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#addNewExam'><i
          class='fa-light fa-plus'></i> Add New</button>
    </div>
    <div class='btn-group'>
      <input type='number' class='form-control' id="semester" placeholder='Semester' name='semester'
        aria-label='Username' aria-describedby='basic-addon1' required>
      <input type='number' class='form-control' id="subjects" placeholder='No of Subjects' name='subjects'
        aria-label='Username' aria-describedby='basic-addon1' required>
    </div>
  </div>
</div>

<div class='col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4' id="table">

</div>
<div class='col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4' id="table">
  

<?php 
  $semm = mysqli_query($db,"SELECT `semester` FROM `semester`");
  while($semRow = mysqli_fetch_assoc($semm))
  {
    $semKey = $semRow['semester'];
    $table = mysqli_query($db,"SELECT * FROM `exam` WHERE `semester`='$semKey'");
    ?>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th class="btn-outline-primary">Semester <?php echo $semKey; ?></th>
    </tr>
    <tr>
      <th scope="col">Semester</th>
      <th scope="col">Subject Code</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Credit Hours</th>
      <th scope="col">Fee</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($tableRow = mysqli_fetch_assoc($table))
    {
      ?>
      <tr>
      <td><?php echo $tableRow['semester'];?></td>
      <td><?php echo $tableRow['subject_code'];?></td>
      <td><?php echo $tableRow['name']; ?></td>
      <td><?php echo $tableRow['credit_hours']; ?></td>
      <td><?php echo $tableRow['fee']; ?></td>
      </tr>
      <?php

    }
    ?>
      </tbody>
</table>
    <?php
  }
?>

    
      



</div>




<script>


  $('#addNew').on('click', () => {
    $semester = $('#semester').val();
    $subject = document.getElementById('subjects').value;
    $mode = "generateTable";
    $.ajax({
      url: 'inner-requestHandle.php',
      type: 'POST',
      data: { mode: $mode, semester: $semester, subjects: $subject },
      success: function (data) {
        $('#table').html(data);
      }
    });
  })

 







</script>
<?php include 'footer.php';
?>
<?php

}
}else{
  $_SESSION['error_msg'] = "Please login to continue";
  header("Location: index.php");
}
?>