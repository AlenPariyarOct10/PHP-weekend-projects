<?php

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}


if (isset($_SESSION['login_admin'])) {
    if ($_SESSION['login_admin'] == true) {
        include '../db.php';
        include 'header.php';
        include 'sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addCollege">
                Add College
            </button>



            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">UID</th>
                        <th scope="col">College Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Students</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    $college = mysqli_query($db, "SELECT * FROM `college`");
                    while ($college_row = mysqli_fetch_assoc($college)) {
                        ?>
                        <tr id="<?php echo $college_row['cid']; ?>">
                            <th scope="row">
                                <?php echo $college_row['cid']; ?>
                            </th>
                            <td id="row-<?php echo $college_row['cid']; ?>" scope="row">
                                <?php echo $college_row['name']; ?>
                            </td>
                            <td id="row-<?php echo $college_row['cid']; ?>" scope="row">
                                <?php echo $college_row['email']; ?>
                            </td>
                            <td id="row-<?php echo $college_row['cid']; ?>" scope="row">
                                <?php echo $college_row['password']; ?>
                            </td>
                            <td>
                                <?php
                                $uid = $college_row['cid'];
                                $stdCount = mysqli_query($db, "SELECT * FROM `user` WHERE `college_id`='$uid'");
                                $stdCount = mysqli_affected_rows($db);
                                echo $stdCount;
                                ?>
                            </td>
                            <td scope="row">
                                <a type="button" class="btn btn-success" onclick="edit(<?php echo $college_row['cid']; ?>)"
                                    data-toggle="modal" data-target="#editCollege">Edit</a>
                                <a type="button" class="btn btn-danger" onclick="deleteCollege(<?php echo $college_row['cid']; ?>)"
                                    data-toggle="modal" data-target="#deleteCollege">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </main>

        <!-- Add College Modal -->
        <div class="modal fade" id="addCollege" tabindex="-1" role="dialog" aria-labelledby="addCollege" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new college</h5>

                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                            <input type="text" id="addCollegeName" class="form-control my-3" placeholder="Enter college name">
                            <input type="email" id="addCollegeEmail" class="form-control my-3" placeholder="Enter college email">
                            <input type="password" id="addCollegePassword" class="form-control my-3" placeholder="Enter college password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="saveNewCollege" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit College Modal -->
        <div class="modal fade" id="editCollege" tabindex="-1" role="dialog" aria-labelledby="editCollege" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit college data</h5>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <input type="text" class="form-control my-3" id="editCollegeText" placeholder="Enter college name">
                            <input type="email" class="form-control my-3" id="editCollegeEmail" placeholder="Enter college email">
                            <input type="password" class="form-control my-3" id="editCollegePassword" placeholder="Enter college password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="saveEdit" onclick="updateChange(uid)" class="btn btn-primary"
                            data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>





        <script>
            $('#saveNewCollege').on('click', () => {
                $name = document.getElementById('addCollegeName').value;
                $email = document.getElementById('addCollegeEmail').value;
                $password = document.getElementById('addCollegePassword').value;
                if ($name == '') {
                    alert("Please enter college name !");
                } else {
                    $.ajax({
                        url: "handleCollegeUpdate.php",
                        type: 'POST',
                        data: { mode: 'addNew', newName: $name, newEmail: $email, newPassword: $password},
                        success: function (data) {
                            $('#tbody').html(data);

                        }


                    });
                }
            });


            var uid;

            function edit(id) {
                uid = id;

            };

            function updateChange() {
                let newText = document.getElementById('editCollegeText').value;
                let newEmail = document.getElementById('editCollegeEmail').value;
                let newPassword = document.getElementById('editCollegePassword').value;
                $.ajax({
                    url: "handleCollegeUpdate.php",
                    type: "POST",
                    data: { mode: "edit", dataId: uid, updatedText: newText, updatedEmail: newEmail, updatedPassword: newPassword},
                    success: function (data) {
                        $('#tbody').html(data);

                    }
                });
            };

            function deleteCollege(id) {
                $.ajax({
                    url: "handleCollegeUpdate.php",
                    type: "POST",
                    data: { mode: "delete", delId: id },
                    success: function (data) {
                        $('#tbody').html(data);

                    }
                });
            };

        </script>



        <?php include 'footer.php'; ?>


        <?php
    }
} else {
    $_SESSION['error_msg'] = "Please login to continue";
    header("Location: index.php");
}
?>

