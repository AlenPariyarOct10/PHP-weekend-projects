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
<?php
    include 'navbar.php';
    ?>



    <div class="body">
    <?php
        include 'sidebar.php';
        include 'db.php';

        $districtQuery = mysqli_query($db,'SELECT * FROM `districts`');
        $usr = $_SESSION['user'];
     
        
        
        ?>
        <div class="content">
            <div class="upper-header">
   
                <div class="content-card">
                    <p>Dashboard / My Profile - Contact Detail</p>
                </div>
            </div>

            <form action="server" method="POST" enctype="multipart/form-data" class="personal-info-form">
            <input type="hidden" name="mode" value="contact">
                <table id="form-table">
                    <tbody>
                        <tr>
                            <td>
                                <label for="citizenship">Citizenship No.</label>
                                <input type="text" value="<?php if($usr['citizenshipno']!=''){echo $usr['citizenshipno'];}; ?>" name="citizenship" id="">
                            </td>
                            <td>
                                <label for="citizenship-photo">Citizenship Image</label>
                                <input name="citizenship-photo" value="<?php if($usr['citizenship_img']!=''){echo $usr['citizenship_img'];}; ?>" type="file">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                
                                <label for="district">Select your District</label>
                               
                                <select name="district" id="district">
                                    <?php 

                                   

                                    if($usr['district_id']==78)
                                    {
                                        echo '<option value="" disabled selected> Select District </option>';
                                    }
                                    while($row = mysqli_fetch_assoc($districtQuery))
                                    {

                                        if($row['id']==$usr['district_id'])
                                        {
                                            echo '<option value="'.$row['id'].'" selected>'.$row['title'].' </option>';
                                        }else{
                                            echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                                        }
                                        
                                    
                                    
                                    }
                                    ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="paddress">Permanent Address</label>
                                <input type="text" value="<?php if($usr['permanent_address']!=''){echo $usr['permanent_address'];}; ?>" name="paddress" id="">
                            </td>
                            <td>
                                <label for="taddress">Temporary Address</label>
                                <input type="text" value="<?php if($usr['temporary_address']!=''){echo $usr['temporary_address'];}; ?>" name="taddress" id=""> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="contact_landline">Landline No.</label>
                                <input type="text" value="<?php if($usr['landline']!=''){echo $usr['landline'];}; ?>" name="contact_landline" id=""> 
                            </td>
                            <td>
                                <label for="contact_mobile">Mobile No.</label>
                                <input type="text" value="<?php if($usr['phone']!=''){echo $usr['phone'];}; ?>" name="contact_mobile" id=""> 
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
    <script src="../../assets/js/student-portal/personal-detail.js"></script>
    
</body>
</html>
<?php }}else{
   require "student-portal/home.html";
} ?>