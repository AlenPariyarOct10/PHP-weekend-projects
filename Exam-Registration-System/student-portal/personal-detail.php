
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
    <link rel="stylesheet" href="assets/css/personal-detail.css">
    <script src="assets/js/script.js"></script>
</head>
<body>
<?php
    include 'navbar.php';
    ?>



    <div class="body">
    <?php
        include 'sidebar.php';
        include 'db.php';
        $usr = $_SESSION['user'];
        
 
        ?>
        <div class="content">
            <div class="upper-header">
   
                <div class="content-card">
                    <p>Dashboard / My Profile - Personal Detail</p>
                </div>
            </div>
           

            <form action="server" method="post" enctype="multipart/form-data" class="personal-info-form">
                <input type="hidden" name="mode" value="personal">
                <div class="upper-first">
                    <div class="image-holder">
                        <p class="top-text-sm">
                            Upload your image here <span class="red">*</span>
                        </p>
                        <div class="image-place">
                            <input type="file" style="display: none;" accept=".jpg, .jpeg, .png" value="<?php if($usr['profile_img']!=''){ echo $usr['profile_img'];}?>" name="profileimg" id="profileimg" required>
                            <label for="profileimg"><img id="image-show" src="<?php if($usr['profile_img']==''){echo 'assets/profile.png';}else{ echo $usr['profile_img'];}?>" alt="" srcset=""></label>

                        </div>
                        
                        <p class="mini-msg">
                            Max Allowed Size 300kb
                        </p>
                        <p class="mini-msg">
                            File accepted type : jpg | jpeg | png
                        </p>
                    </div>


                    <div class="image-holder">
                        <p class="top-text-sm">
                            Upload your signature image <span>*</span>
                        </p>
                        <div class="image-place">
                            <input type="file" style="display: none;" accept=".jpg, .jpeg, .png" value="<?php if($usr['profile_img']!=''){ echo $usr['profile_img'];}?>" name="signatureimg" id="profileimg1">
                            <label for="profileimg1"><img id="image-show1" src="<?php if($usr['sign_img']==''){echo 'assets/sign.png';}else{ echo $usr['sign_img'];}?>" alt="" srcset=""></label>
                        </div>
                        <p class="mini-msg">
                            Max Allowed Size 300kb
                        </p>
                        <p class="mini-msg">
                            File accepted type : jpg | jpeg | png
                        </p>
                    </div>
                </div>

                <table id="form-table">
                    <tbody>
                    <tr>
                        <td>
                            <div class="first-name">
                                <label for="first-name-eng">First Name</label>
                                <input class="form-inp" type="text" name="fname" value="<?php if($usr['firstname']!=''){echo $usr['firstname'];}?>" id="first-name-eng" required>
                            </div>
                        </td>
                        <td>
                            <div class="mid-name  fg">
                                <label for="first-name-eng">Middle Name</label>
                                <input class="form-inp" type="text" name="mname" value="<?php if($usr['middlename']!=''){echo $usr['middlename'];}?>" id="mid-name-eng">
                            </div>
                        </td>
                        <td>
                            <div class="last-name  fg">
                                <label for="first-name-eng">Last Name</label>
                                <input class="form-inp" type="text" name="lname" value="<?php if($usr['lastname']!=''){echo $usr['lastname'];}?>" id="last-name-eng" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="first-name  fg">
                                <label for="first-name-np">First Name (Devanagari)</label>
                                <input class="form-inp" type="text" value="<?php if($usr['fname_np']!=''){echo $usr['fname_np'];}?>" name="fname_np" id="first-name-eng" required>
                            </div>
                        </td>
                        <td>
                            <div class="mid-name  fg">
                                <label for="first-name-np">Middle Name (Devanagari)</label>
                                <input class="form-inp" type="text" name="mname_np" value="<?php if($usr['mname_np']!=''){echo $usr['mname_np'];}?>" id="mid-name-eng">
                            </div>
                        </td>
                        <td>
                            <div class="last-name  fg">
                                <label for="first-name-np">Last Name (Devanagari)</label>
                                <input class="form-inp" type="text" name="lname_np" value="<?php if($usr['lname_np']!=''){echo $usr['lname_np'];}?>"" id="last-name-eng" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <div class="parents-name">
                                <label for="first-name-np">Father's Name</label>
                                <input class="form-inp" type="text" name="father_name" value="<?php if($usr['father_name']!=''){echo $usr['father_name'];}?>" id="first-name-eng" required>
                            </div>
                        </td>
                        
                        <td colspan="2">
                            <div class="parents-name">
                                <label for="first-name-np">Mother's Name</label>
                                <input class="form-inp" type="text" name="mother_name" value="<?php if($usr['mother_name']!=''){echo $usr['mother_name'];}?>" id="mid-name-eng">
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="select fg">
                                <label for="first-name-np">Gender</label>
                                <select name="gender" id="">
                                    <?php 
                                    $genderRow = mysqli_query($db,"SELECT * FROM gender");
                                    while($row = mysqli_fetch_assoc($genderRow))
                                    {
                                        if($row['id']==$usr['gender']){
                                            echo '<option value="'.$row['id'].'" selected>'.$row['gender'].'</option>';
                                        }else{
                                            echo '<option value="'.$row['id'].'">'.$row['gender'].'</option>';
                                        }
                                        
                                    
                                    
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select fg">
                                <label for="first-name-np">Gender</label>
                                <select name="mstatus" id="">
                                    <?php 
                                        if($usr['mstatus']==0)
                                        {
                                            echo '<option value="0" selected>Unmarried</option>';
                                            echo '<option value="1">Married</option>';
                                        }else{
                                            echo '<option value="0" >Unmarried</option>';
                                            echo '<option value="1" selected>Married</option>';
                                        }
                                    ?>
                                    
                                    
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select fg">
                                <label for="first-name-np">Date of Birth [AD]</label>
                                <input type="date" name="dob" value="<?php if($usr['dob']!=''){echo $usr['dob'];}?>" id="dob">
                            </div>
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
    <script src="assets/js/personal-detail.js"></script>

    
</body>
</html>

<?php }}else{
   require "student-portal/home.html";
} ?>