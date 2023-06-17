<?php
include "../db.php";

if (isset($_POST['mode']) && $_POST['mode'] == 'addNew') {
    $collegeName = $_POST['newName'];
    $collegeEmail = $_POST['newEmail'];
    $collegePassword = $_POST['newPassword'];

    mysqli_query($db, "INSERT INTO `college`(`name`, `email`, `password`) VALUES ('$collegeName','$collegeEmail','$collegePassword')");
    $cr = $college_row['cid'];
    $college = mysqli_query($db, "SELECT * FROM `college` WHERE `cid`='$cr'");
    
    $tableRows = "";
    while ($college_row = mysqli_fetch_assoc($college)) {
        $cr = $college_row['cid'];
        $college = mysqli_query($db, "SELECT * FROM `college` WHERE `cid`='$cr'");
        $stdCount = mysqli_affected_rows($db);
        $tableRows .='<tr><th scope="row">' . $college_row['cid'] . '</th><td scope="row">' . $college_row['name'] . '</td><td scope="row">' . $college_row['email'] . '</td><td scope="row">' . $college_row['password'] . '</td><td scope="row">' . $stdCount . '</td><td scope="row"> <a type="button" class="btn btn-success" onclick="edit('.$college_row['cid'].')"
        data-toggle="modal" data-target="#editCollege">Edit</a> <a type="button" class="btn btn-danger" onclick="deleteCollege('.$college_row['cid'].')"
        data-toggle="modal" data-target="#deleteCollege">Delete</a></td></tr>';
    }

    echo $tableRows;
} else if (isset($_POST['mode']) && $_POST['mode'] == 'edit') {
    
    $uid = $_POST['dataId'];
    $newText = $_POST['updatedText'];
    $newEmail = $_POST['updatedEmail'];
    $newPassword = $_POST['updatedPassword'];
    $stdCount = mysqli_query($db, "SELECT * FROM `user` WHERE `college_id`='$uid'");
    $stdCount = mysqli_affected_rows($db);

    $updateNewName = mysqli_query($db, "UPDATE `college` SET `name`='$newText',`email`='$newEmail',`password`='$newPassword' WHERE `cid`='$uid'");

    $college = mysqli_query($db, "SELECT * FROM `college`");
 
    $tableRows = "";
    while ($college_row = mysqli_fetch_assoc($college)) {
        $cr = $college_row['cid'];
        $college = mysqli_query($db, "SELECT * FROM `college` WHERE `cid`='$cr'");
        $stdCount = mysqli_affected_rows($db);
        $tableRows .='<tr><th scope="row">' . $college_row['cid'] . '</th><td scope="row">' . $college_row['name'] . '</td><td scope="row">' . $college_row['email'] . '</td><td scope="row">' . $college_row['password'] . '</td><td scope="row">' . $stdCount . '</td><td scope="row"> <a type="button" class="btn btn-success" onclick="edit('.$college_row['cid'].')"
        data-toggle="modal" data-target="#editCollege">Edit</a> <a type="button" class="btn btn-danger" onclick="deleteCollege('.$college_row['cid'].')"
        data-toggle="modal" data-target="#deleteCollege">Delete</a></td></tr>';
    }

    echo $tableRows;
} else if (isset($_POST['mode']) && $_POST['mode'] == "delete") {
    $uid = $_POST['delId'];
    $deleteCollege = mysqli_query($db, "DELETE FROM `college` WHERE `cid`='$uid'");

    $check = mysqli_query($db, "SELECT * FROM `college`");
    $collegeRows = mysqli_affected_rows($db);
    $stdCount = mysqli_query($db, "SELECT * FROM `user` WHERE `college_id`='$uid'");
    $stdCount = mysqli_affected_rows($db);
    $cr = $college_row['cid'];
    $college = mysqli_query($db, "SELECT * FROM `college` WHERE `cid`='$cr'");
    $newTableRows = "";
    while ($college_row = mysqli_fetch_assoc($college)) {
        $cr = $college_row['cid'];
        $college = mysqli_query($db, "SELECT * FROM `college` WHERE `cid`='$cr'");
        $stdCount = mysqli_affected_rows($db);
        $tableRows .='<tr><th scope="row">' . $college_row['cid'] . '</th><td scope="row">' . $college_row['name'] . '</td><td scope="row">' . $college_row['email'] . '</td><td scope="row">' . $college_row['password'] . '</td><td scope="row">' . $stdCount . '</td><td scope="row"> <a type="button" class="btn btn-success" onclick="edit('.$college_row['cid'].')"
        data-toggle="modal" data-target="#editCollege">Edit</a> <a type="button" class="btn btn-danger" onclick="deleteCollege('.$college_row['cid'].')"
        data-toggle="modal" data-target="#deleteCollege">Delete</a></td></tr>';
    }
    echo $newTableRows;

}
?>
