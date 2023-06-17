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
$admin = mysqli_query($db,"SELECT * FROM `admin`");
$admin = mysqli_fetch_array($admin);
?>

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">

    <div class="row ">
        
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Settings</h4>
            <form action="handleSetting.php" method="POST" class="needs-validation" enctype="multipart/form-data">
                <input type="hidden" name="mode" value="updateForm">
                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="username" name="uname" value="<?php echo $admin['uname']; ?>" required="">
                        <div class="invalid-feedback" style="width: 100%;">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image">Logo / Icon</label>
                    <input type="file" class="form-control" id="image" name="image" value="<?php echo $admin['logo']; ?>">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['email']; ?>">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address1" value="<?php echo $admin['address1']; ?>" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">Address 2 </label>
                    <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $admin['address2']; ?>">
                </div>
                <hr class="mb-4">
                <h4 class="mb-3">Exam Schedule Control</h4>

                <?php $semesterList = mysqli_query($db,"SELECT * FROM `semester`");
                    while($row = mysqli_fetch_assoc($semesterList))
                    {
                        if($row['active']=="active")
                        {
                            echo ' <button type="button" id="'.$row['semester'].'" onclick="update('.$row['semester'].')" value="1" class="btn btn-outline-success">Semester '.$row['semester'].'</button> ';
                            

                        }else{
                            echo ' <button type="button" id="'.$row['semester'].'" onclick="update('.$row['semester'].')" value="0" class="btn btn-outline-danger">Semester '.$row['semester'].'</button> ';
                        }
                        

                        
                    }
                ?>
                
                

                <hr class="mb-4">
<!-- Registration Control -->
                <h4 class="mb-3">Registration Control</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="enableRegister" name="registrationControl" value="1" type="radio" class="custom-control-input" <?php if($admin['registration_control']==1){echo "checked";}?>
                            required>
                        <label class="custom-control-label" for="enableRegister">Enable Registration</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="disableRegister" name="registrationControl" value="0" type="radio" class="custom-control-input" <?php if($admin['registration_control']==0){echo "checked";}?> required="">
                        <label class="custom-control-label" for="disableRegister">Disable Registration</label>
                    </div>
                </div>           
<!-- Registration Control -->
                
                <hr class="mb-4">
                <h4 class="mb-3">Admit Card</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="allow" name="admitCard" type="radio" value="1" class="custom-control-input" <?php if($admin['admitCard']==1){echo "checked";}?>
                            required>
                        <label class="custom-control-label" for="allow">Allow</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="disallow" name="admitCard" type="radio" value="0" class="custom-control-input" <?php if($admin['admitCard']==0){echo "checked";}?> required>
                        <label class="custom-control-label" for="disallow">Disallow</label>
                    </div>
                </div>
                <hr class="mb-4">
                <button id="submit" class="btn btn-primary btn-lg btn-block" type="submit">Save Setting</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2016- <?php echo date('Y')." ". $admin['uname'];?></p>
        
    </footer>
</div>




<?php include 'footer.php';
?>


<script>
    function update(el){
      

        let btn =document.getElementById(el);
        if(btn.classList.contains("btn-outline-danger"))
        {
            btn.classList.remove("btn-outline-danger");
            btn.classList.add("btn-outline-success");
            btn.value = 1;
        }else{
            btn.classList.remove("btn-outline-success");
            btn.classList.add("btn-outline-danger");
            btn.value = 0;
        }

        $.ajax({
            url : 'handleSetting.php',
            method: 'POST',
            data: {mode: "examControl", semester : el},
            success: function(data)
            {
                console.log(data);
            }

        })
        
    }
</script>

<?php

}
}else{
  $_SESSION['error_msg'] = "Please login to continue";
  header("Location: index.php");
}
?>
