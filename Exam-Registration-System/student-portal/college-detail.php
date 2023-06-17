
<?php
 if(!isset($_SESSION))
 {
     session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link rel="stylesheet" href="assets/css/contact-detail.css">
    <script src="assets/js/script.js"></script>
</head>
<body>
<?php
    include 'navbar.php';
    ?>



    <div class="body">
    <?php
        include 'db.php';
        include 'sidebar.php';
        ?>
        <div class="content">
            <div class="upper-header">
   
                <div class="content-card">
                    <p>Dashboard / My Profile - Personal Detail</p>
                </div>
            </div>

            <form action="server" method="post" enctype="multipart/form-data" class="personal-info-form">
                <input type="hidden" name="mode" value="college">
               <?php 
               $usr = $_SESSION['user'];
               ?>
                <table id="form-table">
                    <tbody>
                        <tr>
                            <td>
                                <label for="level">Level</label>
                                <select name="level" id="">
                                    <?php
                                        $level = mysqli_query($db,"SELECT * FROM `level`");
                                        if($usr['level_id']==-1 || $usr['level_id']==0)
                                        {
                                            echo '<option disabled selected>Select Level</option>';
                                        }
                                        while($level_row = mysqli_fetch_assoc($level))
                                        {
                                    echo '
                                    <option value="'.$level_row['lid'].'">'.$level_row['level'].'</option>
                                            ';
                                    
                                        };
                                    ?>
                                </select>
                            </td>
                            <td>
                                <label for="college">College</label>
                                <select name="college" id="">
                                <?php
                                        $college = mysqli_query($db,"SELECT * FROM `college`");
                                        if($usr['college_id']<=0)
                                        {
                                            echo '<option disabled selected>Select College</option>';
                                        }
                                        while($college_row = mysqli_fetch_assoc($college))
                                        {
                                            echo '<option value="'.$college_row['cid'].'">'.$college_row['name'].'</option>';
                                        }
                                        ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label for="programme">Programme</label>
                                <select name="programme" id="">
                                <?php
                                        $programme = mysqli_query($db,"SELECT * FROM `programme`");
                                        if($usr['programme_id']<=0)
                                        {
                                            echo '<option disabled selected>Select Programme</option>';
                                        }
                                        while($programme_row = mysqli_fetch_assoc($programme))
                                        {
                                            echo '<option value="'.$programme_row['pid'].'">'.$programme_row['name'].'</option>';
                                        }
                                        ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                
                                <label for="academic_year">Academic Year</label>

                                <select name="academic_year" id="">
                                    <?php 
                                    if($usr['academic_year']<=0)
                                    {
                                        echo '<option disabled selected>Select Year</option>';
                                    }
                                    for($i=date("Y")+58-5;$i<=date("Y")+58;$i++)
                                    {
                                        if(date("Y")==$i){
                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        }else{
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <label for="registrationNumber">Registration Number</label>
                                <input type="text" value="<?php if($usr['registration_number']!=''){echo $usr['registration_number']; } ?>" name="registrationNumber" id="registrationNumber"> 
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                            <div class="submit">
                                <button type="submit">SUBMIT</button>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            
        </div>
    </div>
    
    
</body>
</html>


<?php }}else{
   require "student-portal/home.html";
} ?>