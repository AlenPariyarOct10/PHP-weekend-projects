<div id="sidebar" class="slidebar">
    <div class="slidebar-header">
        MAIN NAVIGATION
    </div>
    <div class="menus">
        <ul class="dashboard-menu-options" style="padding: 0px;">
            <li class="menu-option <?php if (strpos($_SERVER['REQUEST_URI'], '/exam-registration-system/dashboard') > 0) {
                echo 'active-option';
            } ?>"><i class="fa-solid fa-gauge"><a href="<?php echo '/exam-registration-system/dashboard'; ?>"> Dashboard</a></i></li>
            <li id="toggle-sub-class"><i class="fa-solid fa-user"></i> My Profile</li>
            <ul id="sub-menu" class="sub-menu">

                <li><a class="sub-menu-item <?php if (strpos($_SERVER['REQUEST_URI'], '/exam-registration-system/profile') > 0) {
                    echo 'active-option';
                } ?>" href="<?php echo '/exam-registration-system/profile'; ?>">Personal Details</a></li>
                <li><a class="sub-menu-item <?php if (strpos($_SERVER['REQUEST_URI'], '/contact') > 0) {
                    echo 'active-option';
                } ?>" href="<?php echo '/exam-registration-system/contact'; ?>"> Contact Details</a></li>
                <li><a class="sub-menu-item <?php if (strpos($_SERVER['REQUEST_URI'], '/college-detail') > 0) {
                    echo 'active-option';
                } ?>" href="<?php echo '/exam-registration-system/college-detail'; ?>"> College Details</a></li>
                <li><a class="sub-menu-item <?php if (strpos($_SERVER['REQUEST_URI'], '/education') > 0) {
                    echo 'active-option';
                } ?>" href="<?php echo '/exam-registration-system/education'; ?>"> Education</a></li>
                <li><a class="sub-menu-item <?php if (strpos($_SERVER['REQUEST_URI'], '/preview') > 0) {
                    echo 'active-option';
                } ?>" href="<?php echo '/exam-registration-system/preview'; ?>"> Preview</a></li>
            </ul>
            <li class="menu-option <?php if (strpos($_SERVER['REQUEST_URI'], '/exam-registration-system/register-exam') > 0) {
                echo 'active-option';
            } ?>"><i class="fa-sharp fa-solid fa-file-pen"><a href="<?php echo '/exam-registration-system/register-exam'; ?>"> Exam Registration</a></i></li>

            <li><i class="fa-solid fa-address-card"></i> My Application</li>
        </ul>
    </div>
</div>

<style>
    a:hover{
        text-decoration: none;
        color: white;
    }
</style>