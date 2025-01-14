<?php
include("connection.php");

session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
}

// $id = $_SESSION['id'];
// $editQuery = "SELECT * FROM stud_register WHERE stud_id=$id";
// $resultprofile = $connection->query($editQuery);
// $recodesprofile = $resultprofile->fetch();
?>
<!-- master.php -->
<!DOCTYPE html>
<html>

<head>
    <title>My Website</title>
    <!-- Common CSS and other head elements -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Font awesome offline link -->
    <link rel="stylesheet" href="./icons/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="./icons/fontawesome-free-6.4.0-web/css/fontawesome.min.css">
    <!-- Offline Bootstrap CSS link  -->
    <link rel="stylesheet" href="./bootstrap-5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-5.3.0/dist/css/bootstrap-utilities.min.css">

    <!-- Custom page_styles for this template-->
    <link href="css/page_style" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion nav nav-" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                </div>
                <div class="sidebar-brand-text mx-2 fs-3 fw-semibold">SMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt fs-5"></i>
                    <span class="fs-6">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading fs-6 fw-semibold">
                Interface
            </div>



            <!-- Nav Item - Leave Collapse Menu -->

            <?php if ($_SESSION['role'] == "Student") { ?>
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave"
                        aria-expanded="true" aria-controls="collapseLeave">
                        <i class="fa-regular fa-file-lines fs-5" style="color: #ffffff;"></i>
                        <span class="fw-semibold fs-6 mx-2">Leave</span></a>
                    <div id="collapseLeave" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header fw-bold fs-6">Leave Info:</h6>
                            <a class="collapse-item fw-semibold" href="leave.php">Add Leave</a>
                            <a class="collapse-item fw-semibold" href="view_leave.php">View Leave</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseevent"
                        aria-expanded="true" aria-controls="collapseevent">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span class="fw-semibold fs-6 mx-2">Event</span></a>
                    <div id="collapseevent" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header fw-bold fs-6 ">Event Info:</h6>
                            <a class="collapse-item fw-semibold" href="view_event.php">View Event</a>
                            <a class="collapse-item fw-semibold" href="EventRegStud.php">View Register-Event</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenotice"
                        aria-expanded="true" aria-controls="collapsenotice">
                        <i class="fa-solid fa-bullhorn fs-5" style="color: #ffffff;"></i>
                        <span class="fw-semibold fs-6 mx-2">Notice</span></a>
                    <div id="collapsenotice" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header fw-bold fs-6">Notice Info:</h6>
                            <a class="collapse-item fw-semibold" href="manageNotice.php">View Notice</a>
                        </div>
                    </div>
                </li>
                <?php
            } else {
                ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa-solid fa-users fs-5" style="color: #ffffff;"></i>
                        <span class="fs-6 gap-2 fw-semibold fs-6">Course</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header fw-bold fs-6">Course Info:</h6>
                            <!--<a class="collapse-item fw-semibold" href="course.php">Add Course</a>-->
                            <a class="collapse-item fw-semibold" href="manageClass.php">Manage Course</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-user-plus fs-5" style="color: #ffffff;"></i>
                        <span class="fw-semibold fs-6">Students</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header fw-semibold fs-6">Students Info:</h6>
                            <!--<a class="collapse-item" href="addStudent.php">Add Students</a>-->
                            <a class="collapse-item fw-semibold" href="manageStudent.php">Manage Students</a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Notice Collapse Menu -->

                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNotice"
                        aria-expanded="true" aria-controls="collapseNotice" href="charts.html">
                        <i class="fa-solid fa-bullhorn fs-5" style="color: #ffffff;"></i>
                        <span class="fw-semibold fs-6 mx-1">Notice</span></a>
                    <div id="collapseNotice" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header fw-semibold fs-6">Notice Info:</h6>
                            <!--<a class="collapse-item fw-semibold" href="notice.php">Add Notice</a>-->
                            <a class="collapse-item fw-semibold" href="manageNotice.php">Manage Notice</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Leave Collapse Menu -->

                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave"
                        aria-expanded="true" aria-controls="collapseLeave" href="charts.html">
                        <i class="fa-regular fa-file-lines fs-5" style="color: #ffffff;"></i>
                        <span class="fw-semibold fs-6 mx-2">Leave</span></a>
                    <div id="collapseLeave" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header fw-semibold fs-6">Leave Info:</h6>
                            <a class="collapse-item fw-semibold" href="view_leave.php">View Leave</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Event Collapse Menu -->

                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent"
                        aria-expanded="true" aria-controls="collapseEvent" href="charts.html">
                        <i class="fa-regular fa-file-lines fs-5" style="color: #ffffff;"></i>
                        <span class="fw-semibold fs-6 mx-2">Event</span></a>
                    <div id="collapseEvent" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header fw-semibold fs-6">Event Info:</h6>
                            <!--<a class="collapse-item fw-semibold" href="Event.php">Add Event</a>-->
                            <a class="collapse-item fw-semibold" href="view_event.php">View Event</a>
                            <a class="collapse-item fw-semibold" href="EventRegStud.php">View Register_Student</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
                        aria-expanded="true" aria-controls="collapseAdmin" href="charts.html">
                        <i class="fa-solid fa-bullhorn fs-5" style="color: #ffffff;"></i>
                        <span class="fw-semibold fs-6 mx-1">Admin</span></a>
                    <div id="collapseAdmin" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header fw-semibold fs-6">Admin Info:</h6>
                            <!--<a class="collapse-item fw-semibold" href="notice.php">Add Notice</a>-->
                            <a class="collapse-item fw-semibold" href="admin.php">New Admin</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <?php
            }
            ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-2 fw-semibold small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        
                    </form> -->

                    <div id="header">

                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <?php
                        include("connection.php");
                        $id = $_SESSION['id'];
                        $admin_id = $_SESSION['admin_id'];
                        $role = $_SESSION['role'];

                        if ($role == 'Admin') {
                            $sql = "SELECT * FROM `admin` WHERE `admin_id`=$admin_id";
                        } else {
                            $sql = "SELECT * FROM stud_register WHERE `stud_id`=$id";
                        }
                        $result = $connection->query($sql);
                        $recodes = $result->fetch();
                        ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle gap-2" href="" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if ($role == "Admin") {
                                    ?>
                                    <img class="img-profile rounded-circle border border-2"
                                        src="./<?= $recodes['admin_img'] ?>">
                                <?php } ?>

                                <?php
                                if ($role == "Student") {
                                    ?>
                                    <img class="img-profile rounded-circle border border-2"
                                        src="./<?= $recodes['stud_img'] ?>" height="40px" width="40px">
                                <?php } ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small fw-semibold">
                                    <?= $recodes['firstname'] ?>
                                </span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item fw-semibold fs-6" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-500 fs-6"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item fw-semibold fs-6" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-500 fs-6"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item fw-semibold fs-6" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-500 fs-6"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item fw-semibold fs-6" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-500 fs-6"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <?php if (isset($pageContent)) {
                    include $pageContent;
                } ?>
            </div>
        </div>




        <footer>
            <!-- Common footer content -->
        </footer>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
        <!-- Bootstrap JS file -->
        <script src="./bootstrap-5.3.0/dist/js/bootstrap.js"></script>
        <script src="./bootstrap-5.3.0/dist/js/bootstrap.bundle.js"></script>
        <script src="./bootstrap-5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./bootstrap-5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>