<?php
include("connection.php");
$sql = "SELECT * FROM `stud_register` INNER JOIN `course` ON stud_register.course_id = course.course_id";
$result = $connection->query($sql);
$recodes = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-md col-sm-10">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 fw-bold">Student</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <a class="btn btn-success fw-semibold text-end mb-3 float-end" href="addStudent.php">
                Add Student
            </a>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                    aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row" class="text-center bg-light">
                            <th class="sorting sorting_asc bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Student_img: activate to sort column descending" style="width: 132.2px;">
                                Profile Photo</th>
                            <th class="sorting bg-primary text-white " tabindex="0" aria-controls="dataTable"
                                rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                style="width: 68.2px;">
                                Name</th>
                            <th class="sorting bg-primary text-white " tabindex="0" aria-controls="dataTable"
                                rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"
                                style="width: 89.2px;">Surname
                            </th>
                            <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Office: activate to sort column ascending"
                                style="width: 155.2px;">Email
                            </th>
                            <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Office: activate to sort column ascending"
                                style="width: 155.2px;">Course
                            </th>

                            <th class="sorting text-center bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                rowspan="1" colspan="1" aria-label="Update: activate to sort column ascending"
                                style="width: 87.2px;">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($recodes as $row) {
                            ?>
                            <tr class="odd text-center" role="row">
                                <td class="sorting_1 border border-bottom"><img src="./<?= $row['stud_img'] ?>"
                                        height="50px" width="50px"></td>
                                <td class="border border-bottom">
                                    <?= $row['firstname'] ?>
                                </td>
                                <td class="border border-bottom">
                                    <?= $row['lastname'] ?>
                                </td>
                                <td class="border border-bottom">
                                    <?= $row['email'] ?>
                                </td>
                                <td class="border border-bottom">
                                    <?= $row['course_name'] ?>
                                </td>

                                <td class="text-center border border-bottom">
                                    <!-- <button onclick="updatedata(<?= $row['stud_id'] ?>)" class="btn btn-primary">Update </button> -->

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                        onclick="UpdateStudent(<?= $row['stud_id'] ?>)" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Update">
                                        <i class="fas fa-edit fs-5" style="color: #;"></i>
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;

                                    <!-- <button onclick="deletedata(<?= $row['stud_id'] ?>)" class="btn btn-danger">Delete</button> -->

                                    <!-- <a href="" class="text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Delete">
                                        <i class="fa-solid fa-trash-can fs-3" style="color: #d80e0e;"></i>
                                    </a> -->

                                    <button type="button" class="btn btn-danger" onclick="DeleteStudent(<?= $row['stud_id'] ?>)"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="fa-solid fa-trash-can fs-5" style="color: #;"></i>
                                    </button>

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

<!-- /.container-fluid -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="hidden" class="form-control fs-6 border-2" id="stud_id" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">First Name</label>
                        <input type="text" class="form-control fs-6 border-2" name="firstname" id="firstname" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Last Name</label>
                        <input type="text" class="form-control fs-6 border-2" placeholder="Last Name" name="lastname"
                            id="lastname" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Gender</label>
                        <select name="gender" class="form-control fs-6 border-2" id="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">FeMale</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Phone No</label>
                        <input type="text" id="phone" class="form-control fs-6 border-2" placeholder="Enter PhoneNo"
                            name="phone" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Address</label>
                        <input type="text" id="address" class="form-control fs-6 border-2" placeholder="Enter Address"
                            name="address" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Email</label>
                        <input type="email" id="email" class="form-control fs-6 border-2" placeholder="Email Address"
                            name="email" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-SaveEditStudent">Save changes</button>
            </div>
        </div>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script type="text/javascript" src="./vendor/jquery/jquery.js"></script>

<script>
    function DeleteStudent(stud_id) {
        if (confirm("Are You Sure Delete Course")) {
            $.ajax({
                url: "/SMS-32/deleteStud.php",
                type: "post",
                contentType: "Application/json",
                data: JSON.stringify({
                    deleteStudId: stud_id,
                }),
                success: function (data) {
                    if (data == 1) {
                        alert("Data Deleted Successfully");
                        window.location.replace("manageStudent.php");
                    }
                    else {
                        alert("Data Cannot Be Deleted");
                    }
                }
            });
        }
    }

    function UpdateStudent(stud_id) {
        $.ajax({
            url: "/SMS-32/UpdateStudentProcess.php",
            type: "post",
            contentType: "Application/json",
            data: JSON.stringify({
                updateStudId: stud_id
            }),
            success: function (data) {
                if (data) {
                    document.getElementById('stud_id').value = data.stud_id;
                    document.getElementById('firstname').value = data.firstname;
                    document.getElementById('lastname').value = data.lastname;
                    document.getElementById('email').value = data.email;
                    document.getElementById('gender').value = data.gender;
                    document.getElementById('phone').value = data.phone;
                    document.getElementById('address').value = data.address;
                }
                else {
                    alert("Data CanNot Be Updated");
                }
            }
        })
    }

    $('#btn-SaveEditStudent').on('click', function () {
        $.ajax({
            url: '/SMS-32/UpdateStudentSave.php',
            type: 'post',
            contentType: 'Application/json',
            data: JSON.stringify({
                stud_id: $('#stud_id').val(),
                firstname: $('#firstname').val(),
                lastname: $('#lastname').val(),
                gender: $('#gender').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                address: $('#address').val(),
            }),
            success: function (data) {
                if (data == 1) {
                    alert("Data Updated Successfully");
                    window.location.replace("manageStudent.php");
                }
                else {
                    alert("Data CanNot Be Updated");
                }
            }
        })
    })
</script>