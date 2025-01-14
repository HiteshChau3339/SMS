<?php
include("connection.php");
$sql = "SELECT * FROM `stud_register` WHERE  `role_id`='2'";
$result = $connection->query($sql);
$recodes = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-md col-sm-10">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Student</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                    aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Student_img: activate to sort column descending" style="width: 132.2px;">
                                Profile Photo</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Name: activate to sort column ascending" style="width: 68.2px;">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Position: activate to sort column ascending" style="width: 89.2px;">Surname
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                aria-label="Office: activate to sort column ascending" style="width: 155.2px;">Email
                            </th>

                            <th class="sorting text-center  " tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Update: activate to sort column ascending"
                                style="width: 87.2px;">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($recodes as $row) {
                            ?>
                            <tr class="odd">
                                <td class="sorting_1"><img src="./<?= $row['stud_img'] ?>" height="50px" width="50px"></td>
                                <td>
                                    <?= $row['firstname'] ?>
                                </td>
                                <td>
                                    <?= $row['lastname'] ?>
                                </td>
                                <td>
                                    <?= $row['email'] ?>
                                </td>

                                <td class="text-center">
                                    <a href="update.php ?stud_id" class="btn btn-primary">Update </a>

                                    <a href="delete.php ?stud_id=<?= $row['stud_id'] ?>" class="btn btn-danger">Delete</a>

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

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>