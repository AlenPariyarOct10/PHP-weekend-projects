<div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">                            
                            <a class='nav-link <?php if($_SERVER["REQUEST_URI"]=="/exam-registration-system/admin/"){echo "active";} ?>' href="/exam-registration-system/admin/dashboard.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($_SERVER["REQUEST_URI"]=="/exam-registration-system/admin/colleges.php"){echo "active";} ?>" href="colleges.php">
                                <span data-feather="layout"></span>
                                Colleges
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($_SERVER["REQUEST_URI"]=="/exam-registration-system/admin/student.php"){echo "active";} ?>" href="student.php">
                                <span data-feather="users"></span>
                                Students
                            </a>
                        </li>

                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>More</span>

                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link <?php if($_SERVER["REQUEST_URI"]=="/exam-registration-system/admin/exam.php"){echo "active";} ?>" href="exam.php">
                                <span data-feather="book-open"></span>
                                Exam
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($_SERVER["REQUEST_URI"]=="/exam-registration-system/admin/setting.php"){echo "active";} ?>" href="setting.php">
                                <span data-feather="settings"></span>
                                Setting
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>