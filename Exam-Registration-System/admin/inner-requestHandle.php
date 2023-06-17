<?php
include '../db.php';

$table = '<form action="exam.php" method="post"><input type="hidden" name="table" value="table"><table class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4 table">
                    <thead>
                    <tr>
                        <th scope="col">Semester</th>
                        <th scope="col">Subject Code</th>
                        <th scope="col">Subject Number</th>
                        <th scope="col">Credit Hours</th>
                        <th scope="col">Fee</th>
                    </tr>
                    </thead>
                    <tbody>
                    ';


if (isset($_POST['mode']) && $_POST['mode'] == 'generateTable') {
    $semNo = $_POST['semester'];
    $semester = mysqli_query($db,"SELECT * FROM `semester` WHERE semester='$semNo'");
    
    if(mysqli_affected_rows($db)>0)
    {
        echo "Table for semester".$semNo." already exists.";
    }else{
        for ($i = 1; $i <= $_POST['subjects']; $i++) {
            $table .=
                '<tr><td><input type="hidden" class="form-control" value="'.$_POST['semester'].'" name="sem">' . $_POST['semester'] . '</td>
            <td><input type="text" class="form-control" name="sc[]" placeholder="Subject Code ' . $i . '" aria-label="Username" aria-describedby="basic-addon1"></td>
            <td><input type="text" class="form-control" name="sn[]" placeholder="Subject Name ' . $i . '" aria-label="Username" aria-describedby="basic-addon1"></td>
            <td><input type="number" class="form-control" name="ch[]" placeholder="Credit Hours ' . $i . '" aria-label="Username" aria-describedby="basic-addon1"></td>
            <td><input type="number" class="form-control" name="fees[]" placeholder="Fees ' . $i . '" aria-label="Username" aria-describedby="basic-addon1"></td></tr>';
        }
        $table .= '</tbody></table><button type="submit" id="submitTable" class="btn btn-primary">Submit</button></form>';
echo $table;
    }
    
}

?>

