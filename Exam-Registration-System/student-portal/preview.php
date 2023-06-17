<?php
 if(!isset($_SESSION))
 {
     session_start();
     include 'db.php';
 }

if(isset($_SESSION['status']))
{
    if($_SESSION['status']==1)
    {

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    body {
      height: 200vh;
    }

    table {
      margin: 20px;
      height: 65%;
    }

    .box {
      display: flex;
      flex-direction: column;
    }
  </style>
  <script src="assets/js/script.js"></script>

</head>

<body>
  <?php
  include 'navbar.php';
  ?>



  <div class="body">
    <?php
    include 'sidebar.php';
    ?>
    <div class="box">



      <table class="table stable-responsive table-bordered table-hover" width="100%" style="width: 100%">
        <tbody>
          <tr>
            <td width="30%"><label class="labelregtxt" for="firstname">Full Name :</label> </td>
            <td width="70%"><span><?php echo $_SESSION['user']['name'] ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">FULL NAME (DEVNAGARI):</label> </td>
            <td><span><?php echo $_SESSION['user']['fname_np']." ".$_SESSION['user']['mname_np']." ".$_SESSION['user']['lname_np']; ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">Gender :</label> </td>
            <td><span><?php if($_SESSION['user']['gender']==0){echo "Male";}else if($_SESSION['user']['gender']==1){echo "Female";}else{echo "Third Gender";} ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">Marital Status :</label> </td>
            <td><span><?php if($_SESSION['user']['marital_status']==0){echo "Unmarried";}else{echo "Married";} ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">Birth of date ( YY/MM/DD IN AD ) :</label> </td>
            <td><span><?php echo $_SESSION['user']['dob'] ?></span></td>
          </tr>

          <tr>
            <td><label class="labelregtxt" for="firstname">Citizenship No :</label> </td>
            <td><span><?php echo $_SESSION['user']['citizenshipno'] ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">District :</label> </td>
            <?php $did = $_SESSION['user']['district_id'];
                  $district = mysqli_fetch_assoc(mysqli_query($db,"SELECT `title` FROM `districts` WHERE `id`='$did'"))['title'];
             ?>
            <td><span><?php echo $district; ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">FATHER'S NAME :</label> </td>
            <td><span><?php echo $_SESSION['user']['father_name'] ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">MOTHER'S NAME :</label> </td>
            <td><span><?php echo $_SESSION['user']['mother_name'] ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">Permanent Address:</label> </td>
            <td><span><?php echo $_SESSION['user']['permanent_address'] ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">CONTACT ADDRESS IN KATHMANDU :</label> </td>
            <td><span><?php echo $_SESSION['user']['temporary_address'] ?></span></td>
          </tr>


          <tr>
            <td><label class="labelregtxt" for="firstname">CONTACT PHONE NO LANDLINE:</label> </td>
            <td><span><?php echo $_SESSION['user']['landline'] ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">MOBILE NUMBER :</label> </td>
            <td><span><?php echo $_SESSION['user']['phone'] ?></span></td>
          </tr>
          <tr>
            <td><label class="labelregtxt" for="firstname">EMAIL ADDRESS:</label> </td>
            <td><span><?php echo $_SESSION['user']['email'] ?></span></td>
          </tr>


        </tbody>
      </table>

      <div class='container-fluid'>
            <div class='card mb-4'>
              <div class='card-header'>

                Academic Certificates
              </div>

              <?php
              if (isset($_SESSION['education'])) {

                $degree_id = $_SESSION['education']['degree_id'];
                $board_id = $_SESSION['education']['board_id'];
                $major_subjects = $_SESSION['education']['major_subjects'];
                $academic_year = $_SESSION['education']['academic_year'];
                $Division_Grade = $_SESSION['education']['Division/Grade'];
                $complition_year = $_SESSION['education']['complition_year'];
                $document_img = $_SESSION['education']['document_img'];
                $document_title = $_SESSION['education']['document_title'];

                $degree = mysqli_fetch_assoc(mysqli_query($db, "SELECT `name` FROM `recent_degree` WHERE `id`='$degree_id'"))['name'];
                $board = mysqli_fetch_assoc(mysqli_query($db, "SELECT `name` FROM `board_name` WHERE `id`='$board_id'"))['name'];




              }
              ?>

              <div class='card-body mb-4'>
                <div class='table-responsive mb-4'>
                  <div id='dataTable_wrapper' class='dataTables_wrapper dt-bootstrap4 no-footer'>

                    <div class='row'>
                      <div class='col-sm-12'>
                        <table class='table table-bordered dataTable no-footer' id='dataTable' width='100%' cellspacing='0'
                          role='grid' aria-describedby='dataTable_info' style='width: 100%;'>
                          <thead>
                            <tr role='row'>
                              <th class='sorting_asc' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1'
                                aria-sort='ascending' aria-label='Your Degree: activate to sort column descending'
                                style='width: 77px;'>Your Degree</th>
                              <th class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1'
                                aria-label='Board Name: activate to sort column ascending' style='width: 85px;'>Board Name
                              </th>
                              <th class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1'
                                aria-label='Major Subject: activate to sort column ascending' style='width: 215px;'>Major
                                Subject</th>
                              <th class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1'
                                aria-label='Academic Year: activate to sort column ascending' style='width: 95px;'>Academic
                                Year</th>
                              <th class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1'
                                aria-label='Division/Grade: activate to sort column ascending' style='width: 112px;'>
                                Division/Grade</th>
                              <th class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1'
                                aria-label='Completed Years: activate to sort column ascending' style='width: 109px;'>
                                Completed Years</th>
                              <th class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1'
                                aria-label='Documents: activate to sort column ascending' style='width: 85px;'>Documents
                              </th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (isset($_SESSION['education'])) {
                              ?>
                              <tr role='row' class='odd'>
                                <td class='sorting_1'>
                                  <?php echo $degree; ?>
                                </td>
                                <td>
                                  <?php echo $board; ?>
                                </td>
                                <td>
                                  <?php echo $major_subjects; ?>
                                </td>
                                <td>
                                  <?php echo $academic_year; ?> BS
                                </td>
                                <td>
                                  <?php echo $Division_Grade; ?>
                                </td>
                                <td>
                                  <?php echo $complition_year; ?> BS
                                </td>

                                <td><a href='<?php echo "/exam-registration-system" . $document_img; ?>'><?php echo $document_title; ?></a></td>
                                
                              </tr>
                            <?php } else {
                              echo '<tr><td>No Data Uploaded</td></tr>';
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            




          </div>
    </div>






  </div>




</body>

</html>

<?php }}else{
   require "student-portal/home.html";
} ?>