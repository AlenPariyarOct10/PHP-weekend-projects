<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
  }
  
  
  if (isset($_SESSION['login_admin'])) {
    if ($_SESSION['login_admin'] == true) {

include '../db.php';
include 'header.php'; ?>
<?php include 'sidebar.php'; ?>



<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4">


    <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickable">
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
    </ul>
</div>
</div>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">




    <table class="table">
        <thead>
            <tr>
                <th scope="col">UID</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">District</th>
                <th scope="col">College</th>
                <th scope="col">Level</th>
                <th scope="col">Registration Number</th>
                <th scope="col">Operation</th>

            </tr>
        </thead>
        <tbody id="tbody">
            <?php

            $user = mysqli_query($db, "SELECT * FROM `user`");
            $level = mysqli_query($db, "SELECT * FROM `level`");
            $level = mysqli_fetch_all($level);
            $college = mysqli_query($db, "SELECT * FROM `college`");
            $college = mysqli_fetch_all($college);





            while ($college_row = mysqli_fetch_assoc($user)) {
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $college_row['id']; ?>
                    </th>
                    <td scope="row">
                        <?php echo $college_row['name']; ?>
                    </td>
                    <td scope="row">
                        <?php echo $college_row['phone']; ?>
                    </td>
                    <td scope="row">
                        <?php

                        $did = $college_row['district_id'];
                        if ($did > 0) {


                            $districts = mysqli_query($db, "SELECT * FROM `districts` WHERE `id`='$did'");
                            $districts = mysqli_fetch_assoc($districts);
                            echo $districts['title'];
                        } else {
                            echo "-";
                        }
                        ?>

                    </td>
                    <td scope="row">
                        <?php if ($college_row['college_id'] > 0) { ?>
                            <?php echo $college[0][$college_row['college_id']]; ?>
                        <?php } else {
                            echo "-";
                        } ?>
                    </td>
                    <td scope="row">
                        <?php $lid = $level[$college_row['level_id']]; ?>
                        <?php print_r($lid[1]) ?>
                    </td>
                    <td scope="row">
                        <?php echo $college_row['registration_number']; ?>
                    </td>
                    <td scope="row">
                        <button type="button" onclick="deleteStudent(<?php echo $college_row['id']; ?>)"
                            class="btn btn-outline-danger">Delete</button>

                    </td>
                </tr>
                <?php
            }
            ?>



        </tbody>
    </table>

</main>



>


<script>
    function deleteStudent(id) {
        $.ajax({
            url: "handleStudentUpdate.php",
            type: "POST",
            data: { mode: "delete", studentId: id },
            success: function () {
                location.reload();
            }
        });
    }


</script>
<?php include 'footer.php'; ?>
<?php

}
}else{
  $_SESSION['error_msg'] = "Please login to continue";
  header("Location: index.php");
}
?>