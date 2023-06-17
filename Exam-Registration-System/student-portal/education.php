<?php
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['status'])) {
  if ($_SESSION['status'] == 1) {

    ?>
    <!DOCTYPE html>
    <html lang='en'>

    <head>
      <meta charset='UTF-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
        integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />
      <title>Document</title>
      <link rel='stylesheet' href='assets/css/education.css'>

      <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css'
        integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous'>
      <script src='https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js'
        integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj'
        crossorigin='anonymous'></script>
      <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct'
        crossorigin='anonymous'></script>
      <script src='assets/js/script.js'></script>
      <style>
        body {
          height: 130vh;
        }
      </style>
    </head>

    <body>
      <?php
      include 'navbar.php';
      ?>

      <div class='body'>
        <?php
        include 'sidebar.php';
        include 'db.php';
        $usr = $_SESSION['user'];
        $uid = $usr['id'];
        $lid = $usr['level_id'];
        $cid = $usr['college_id'];
        $pid = $usr['programme_id'];

        $academic_year = $usr['academic_year'];
        $level = mysqli_query($db, "SELECT `level` FROM `level` WHERE lid='$lid'");
        $college = mysqli_query($db, "SELECT `name` FROM `college` WHERE cid='$cid'");
        $programme = mysqli_query($db, "SELECT `name` FROM `programme` WHERE pid='$pid'");
        $academic_year = mysqli_query($db, "SELECT `academic_year` FROM `user` WHERE id='$uid'");
        $registration_number = mysqli_query($db, "SELECT `registration_number` FROM `user` WHERE id='$uid'");
        $level = mysqli_fetch_assoc($level);
        $college = mysqli_fetch_assoc($college);
        $programme = mysqli_fetch_assoc($programme);
        $academic_year = mysqli_fetch_assoc($academic_year);
        $registration_number = mysqli_fetch_assoc($registration_number);



        ?>
        <main>
          <div class='container-fluid'>
            <h1 class=''></h1>
            <ol class='breadcrumb'>
              <li class='breadcrumb-item'><a href='https://student.tufohss.edu.np/'>Dashboard</a></li>
              <li class='breadcrumb-item active'>My Profile - Education Details </li>
            </ol>
            <table>
              <tbody>
                <tr>
                  <td>Level : </td>
                  <td>
                    <?php echo $level['level']; ?>
                  </td>
                </tr>
                <tr>
                  <td>College : </td>
                  <td>
                    <?php echo $college['name']; ?>
                  </td>
                </tr>
                <tr>
                  <td>Programme : </td>
                  <td>
                    <?php echo $programme['name']; ?>
                  </td>
                </tr>
                <tr>
                  <td>Academic Year : </td>
                  <td>
                    <?php echo $academic_year['academic_year']; ?>
                  </td>
                </tr>
                <tr>
                  <td>Registration Number : </td>
                  <td>
                    <?php echo $registration_number['registration_number']; ?>
                  </td>
                </tr>
              </tbody>
            </table>
            <a class='btn btn-primary' data-toggle='modal' data-target='#staticBackdrop'>
              + Add Educational Detail
            </a>
          </div>
          <br>
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
                              <th class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1'
                                aria-label='Action: activate to sort column ascending' style='width: 56px;'>Action</th>
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
                                <td><a href='javascript:void(0);' class='remove-education' data-id='45841'>Remove</a></td>
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

            <div class='container-fluid'>
              <div class='form-group mt-4 mb-0'>
                <a class='btn btn-success float-right' href='preview'> Submit</a>
              </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add your recent Educational Qualification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="server" method="post" enctype="multipart/form-data" class="personal-info-form">
                      <input type="hidden" name="mode" value="educational_detail">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="degree">Your Degree</label>
                          <select id="degree" name="degree" class="form-control" required>
                            <?php
                            $degree = mysqli_query($db, "SELECT * FROM `recent_degree`");
                            $board_name = mysqli_query($db, "SELECT * FROM `board_name`");
                            while ($row = mysqli_fetch_assoc($degree)) {
                              echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                              // <option selected disabled>Choose...</option>
                        
                            }
                            ?>

                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="board_name">Board Name</label>
                          <select id="board_name" name="board_name" class="form-control" required>
                            <?php

                            $board_name = mysqli_query($db, "SELECT * FROM `board_name`");
                            while ($row = mysqli_fetch_assoc($board_name)) {
                              echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                              // <option selected disabled>Choose...</option>
                        
                            }
                            ?>

                          </select>
                        </div>

                      </div>
                      <div class="form-group">
                        <label for="major_subject">Major Subject</label>
                        <input type="text" class="form-control" name="major_subject" id="inputAddress"
                          placeholder="Ex. Computer Science, Mathematics">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="academic_year">Academic Year</label>
                          <input type="number" placeholder="in BS" name="academic_year" class="form-control"
                            id="academic_year">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="score">Division / Grade</label>
                          <input type="text" name="score" class="form-control" id="score">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="completeYear">Complition Year</label>
                          <input type="number" placeholder="in BS" name="completeYear" class="form-control"
                            id="completeYear">
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="documentTitle">Upload any related document</label>
                        <input type="text" placeholder="Title of Document : Ex. Transcript, Certificate"
                          name="documentTitle" class="form-control" id="documentTitle">
                        <input class="form-control" name="document" type="file" id="formFile">
                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>

                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>



          </div>
        </main>
      </div>


    </body>

    </html>

  <?php }
} else {
  require 'student-portal/home.html';
}
?>