<?php
include("connection.php");
$id = $_SESSION['id'];
$role = $_SESSION['role'];



if ($role == 2) {
    if (isset($_POST['btnleave'])) {
        $sql = "SELECT * FROM `notice` WHERE stud_id=$id";
    } else {
        $sql = "SELECT * FROM `notice`";
    }
}

$result = $connection->query($sql);
$recodes = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container-md col-sm-10">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Notice</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row" class="text-center">
                                            <th class="sorting bg-primary text-white" tabindex="0"
                                                aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Name: activate to sort column ascending"
                                                style="width: 68.2px;">Date</th>
                                            <th class="sorting bg-primary text-white" tabindex="0"
                                                aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 89.2px;">Subject</th>
                                            <th class="sorting bg-primary text-white" tabindex="0"
                                                aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Update: activate to sort column ascending"
                                                style="width: 87.2px;">Message</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($recodes as $row) {
                                            ?>
                                            <tr class="odd text-center">
                                                <td class="border border-bottom">
                                                    <?= $row['date'] ?>
                                                </td>
                                                <td class="border border-bottom">
                                                    <?= $row['subject'] ?>
                                                </td>
                                                <td class="border border-bottom">
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