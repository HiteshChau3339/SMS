<div class="container-fluid">
    <!-- 404 Error Text -->
    <?php
    if ($_SESSION["role"] == "Admin") {
        ?>
        <!--<div class="text-center mt-5">
            <img src="./img/logo-removebg-preview.png" alt="" height="500px" width="500pm"><br>

        </div>-->

        <div class="row mt-5 pl-5 pr-5">

            <!-- Course Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-4 px-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                    All Course</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    include("connection.php");
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `course`";
                                    $result = $connection->query($sql);
                                    $row = $result->rowCount();
                                    if ($row > 0) {
                                        print_r($row);
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <form action="manageClass.php" method="post">
                                        <button class="btn btn-primary btn-icon-split btn-sm mt-2" name="btnnotice">
                                            <!-- <span class="icon text-white-50">
                                            </span> -->
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            <span class="text">View</span>
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-4 px-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                    All Student</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    include("connection.php");
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `stud_register`";
                                    $result = $connection->query($sql);
                                    $row = $result->rowCount();
                                    if ($row > 0) {
                                        print_r($row);
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <form action="manageStudent.php" method="post">
                                        <button class="btn btn-primary btn-icon-split btn-sm mt-2" name="btnnotice">
                                            <!-- <span class="icon text-white-50">
                                            </span> -->
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            <span class="text">View</span>
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-4 px-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Leave
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    include("connection.php");
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `leave` WHERE leave_status='1'";
                                    $result = $connection->query($sql);
                                    $row = $result->rowCount();
                                    if ($row > 0) {
                                        print_r($row);
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <form action="view_leave.php" method="post">
                                        <button class="btn btn-primary btn-icon-split btn-sm mt-2" name="btnPanleave">
                                            <!-- <span class="icon text-white-50">
                                            </span> -->
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            <span class="text">View</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-4 px-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                    All Event</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    include("connection.php");
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `event`";
                                    $result = $connection->query($sql);
                                    $row = $result->rowCount();
                                    if ($row > 0) {
                                        print_r($row);
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <form action="view_event.php" method="post">
                                        <button class="btn btn-primary btn-icon-split btn-sm mt-2" name="btnnotice">
                                            <!-- <span class="icon text-white-50">
                                            </span> -->
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            <span class="text">View</span>
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="row mt-5 pl-5 pr-5">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-4 px-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                    All Leave</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    include("connection.php");
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `leave` WHERE `stud_id`=$id";
                                    $result = $connection->query($sql);
                                    $row = $result->rowCount();
                                    if ($row > 0) {
                                        print_r($row);
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <form action="view_leave.php" method="post">
                                        <button class="btn btn-primary btn-icon-split btn-sm mt-2">
                                            <!-- <span class="icon text-white-50">
                                            </span> -->
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            <span class="text">View</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-lines fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-4 px-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                    All Notices</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    include("connection.php");
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `notice` WHERE `stud_id`=$id";
                                    $result = $connection->query($sql);
                                    $row = $result->rowCount();
                                    if ($row > 0) {
                                        print_r($row);
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <form action="manageNotice.php" method="post">
                                        <button class="btn btn-primary btn-icon-split btn-sm mt-2" name="btnnotice">
                                            <!-- <span class="icon text-white-50">
                                            </span> -->
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            <span class="text">View</span>
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-4 px-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Leave
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    include("connection.php");
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `leave` WHERE leave_status='1' AND stud_id=$id";
                                    $result = $connection->query($sql);
                                    $row = $result->rowCount();
                                    if ($row > 0) {
                                        print_r($row);
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <form action="view_leave.php" method="post">
                                        <button class="btn btn-primary btn-icon-split btn-sm mt-2" name="btnleave">
                                            <!-- <span class="icon text-white-50">
                                            </span> -->
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            <span class="text">View</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-4 px-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl fw-bold text-success text-uppercase mb-1">
                                    All Event
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    include("connection.php");
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `event`";
                                    $result = $connection->query($sql);
                                    $row = $result->rowCount();
                                    if ($row > 0) {
                                        print_r($row);
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <form action="view_event.php" method="post">
                                        <button class="btn btn-primary btn-icon-split btn-sm mt-2" name="btnleave">
                                            <!-- <span class="icon text-white-50">
                                            </span> -->
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            <span class="text">View</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-4 px-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl fw-bold text-success text-uppercase mb-1">
                                    Register Event
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    include("connection.php");
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `event_register` WHERE stud_id=$id ";
                                    $result = $connection->query($sql);
                                    $row = $result->rowCount();
                                    if ($row > 0) {
                                        print_r($row);
                                    } else {
                                        echo "No Data";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <form action="view_event.php" method="post">
                                        <button class="btn btn-primary btn-icon-split btn-sm mt-2" name="btnRegEvent">
                                            <!-- <span class="icon text-white-50">
                                            </span> -->
                                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                                            <span class="text">View</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
</div>