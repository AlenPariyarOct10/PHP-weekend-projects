<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class='nav-link <?php if ($_SERVER["REQUEST_URI"] == "/exam-registration-system/colleges/") {
                            echo "active";
                        } ?>'
                            href="/exam-registration-system/colleges/dashboard.php">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/exam-registration-system/colleges/student.php") {
                            echo "active";
                        } ?>"
                            href="student.php">
                            <span data-feather="users"></span>
                            Students
                        </a>
                    </li>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>More</span>
                </h6>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/exam-registration-system/colleges/student-approval.php") {
                        echo "active";
                    } ?>"
                        href="student-approval.php">
                        <span data-feather="users"></span>
                        Student Approval
                    </a>
                </li>

                </ul>

                


            </div>
        </nav>