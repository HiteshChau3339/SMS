<?php
/*include("connection.php");
$id = $_SESSION['id'];
$sql = "SELECT * FROM `notice` JOIN stud_register ON stud_register.stud_id = notice.stud_id";
$result = $connection->query($sql);
$recodes = $result->fetchAll(PDO::FETCH_ASSOC)*/

include("connection.php");
$id = $_SESSION['id'];
$role = $_SESSION['role'];

if ($role == "Student") {
    if (isset($_POST['btnnotice']) || $role == "Student") {
        $sql = "SELECT * FROM `notice` WHERE stud_id=$id";
    }
} else {
    $sql = "SELECT * FROM `notice` JOIN stud_register ON stud_register.stud_id = notice.stud_id";
}
$result = $connection->query($sql);
$recodes = $result->fetchAll(PDO::FETCH_ASSOC)
    ?>

<div class="container-md col-sm-10">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 fw-bold">Notice</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="card-body">
                <?php if ($role == "Admin") { ?>
                    <a class="btn btn-success fw-semibold mb-3 float-end me-2" href="notice.php">
                        Add Notice
                    </a>
                <?php } ?>
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row" class="text-center">
                                            <?php
                                            if ($_SESSION["role"] == "Admin") {
                                                ?>
                                                <th class="sorting bg-primary text-white" tabindex="0"
                                                    aria-controls="dataTable" rowspan="1" colspan="1"
                                                    aria-label="Name: activate to sort column ascending"
                                                    style="width: 68.2px;">
                                                    Student Name
                                                </th>
                                            <?php } ?>
                                            <th class="sorting bg-primary text-white" tabindex="0"
                                                aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Name: activate to sort column ascending"
                                                style="width: 68.2px;">Date</th>
                                            <th class="sorting bg-primary text-white" tabindex="0"
                                                aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 89.2px;">Subject</th>
                                            <th class="sorting bg-primary text-white  " tabindex="0"
                                                aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Update: activate to sort column ascending"
                                                style="width: 87.2px;">Message</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($recodes as $row) {
                                            ?>
                                            <tr class="odd">
                                                <?php
                                                if ($_SESSION["role"] == "Admin") {
                                                    ?>
                                                    <td class="border border-bottom text-center">
                                                        <?= $row['firstname'] ?>
                                                    </td>
                                                <?php } ?>
                                                <td class="border border-bottom text-center">
                                                    <?= $row['date'] ?>
                                                </td>
                                                <td class="border border-bottom text-center">
                                                    <?= $row['subject'] ?>
                                                </td>
                                                <td class="border border-bottom text-center">
                                                    <?= $row['message'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>