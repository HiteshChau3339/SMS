<?php
include("connection.php");
//$course = $_POST['course'];
$sql = "SELECT * FROM `course`";
$result = $connection->query($sql);
$recodes = $result->fetchAll();
?>

<div class="container-fluid px-5 col-md-10">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 fw-bold">Courses</h1><br>

    <form>
        <!-- <div class="form-group">
            <label>Course</label>
            <select class="form-control" id="course">
                <option>Select Course</option>
                <?php foreach ($recodes as $row) { ?>
                 <option value=<?= $row['class_id'] ?>><?= $row['course'] ?></option>
             <?php } ?>
            </select>
        </div> -->
        <!-- <div>
        <button type="submit" class="btn btn-dark">Add</button>
    </div> -->
    </form>
    <!------------------------------------------------------------------------------------------------------->


    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <a class="btn btn-success fw-semibold text-end mb-3 float-end" href="course.php">
                Add Course
            </a>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                    aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row" class="text-center">
                            <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Name: activate to sort column ascending" style="width: 68.2px;">
                                Course
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
                            <tr class="odd text-center">
                                <td class="border border-bottom">
                                    <?= $row['course_name'] ?>
                                </td>
                                <td class="border border-bottom">
                                    <!-- <button onclick="updatedata(<?= $row['class_id'] ?>)" class="btn btn-primary">Update </button> -->

                                    <!-- <a href="" class="text-decoration-none" data-bs-placement="top" title="Edit"
                                        data-bs-toggle="modal">
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp; -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                        onclick="UpdateClass(<?= $row['course_id'] ?>)">
                                        <i class="fas fa-edit fs-4" style="color: ;"></i>

                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <!-- <a href="" class="text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Delete">
                                        <i class="fa-solid fa-trash-can fs-3" style="color: #d80e0e;"></i>
                                    </a> -->

                                    <button type="button" class="btn btn-danger" onclick="DeleteCourse(<?= $row['course_id'] ?>)"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" name="btnDelCourse">
                                        <i class="fa-solid fa-trash-can fs-4" style="color: #;"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="hidden" class="form-control fs-6 border-2" id="course_id" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="fw-semibold">Course</label>
                                <input type="text" id="course_name" class="form-control fs-6 border-2" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-SaveEditClass">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="./vendor/jquery/jquery.min.js"></script>

        <script>
            function UpdateClass(course_id) {
                $.ajax({
                    url: "/SMS-32/ClassUpdate_Process.php",
                    type: "post",
                    contentType: "Application/json",
                    data: JSON.stringify({
                        updateCourseId: course_id,
                    }),
                    success: function (data) {
                        if (data) {
                            document.getElementById('course_id').value = data.course_id;
                            document.getElementById('course_name').value = data.course_name;
                        }
                        else {
                            alert("Data CanNot Be Updated");
                        }
                    }
                })
            }

            $('#btn-SaveEditClass').on('click', function () {
                $.ajax({
                    url: '/SMS-32/ClassUpdateSave.php',
                    type: 'post',
                    contentType: 'Application/json',
                    data: JSON.stringify({
                        course_id: $('#course_id').val(),
                        course_name: $('#course_name').val(),
                    }),
                    success: function (data) {
                        if (data == 1) {
                            alert("Data Updated Successfully");
                            window.location.replace("manageClass.php");
                        }
                        else {
                            alert("Data CanNot Be Updated");
                        }
                    }
                })
            })
        </script>


        <script>

            function DeleteCourse(course_id) {
                if (confirm("Are You Sure Delete Course")) {
                    $.ajax({
                        url: "/SMS-32/delete.php",
                        type: "post",
                        contentType: "Application/json",
                        data: JSON.stringify({
                            CourseId: course_id
                        }),
                        success: function (data) {
                            if (data == 1) {
                                alert("Data Deleted Successfully");
                                window.location.replace("manageClass.php");
                            }
                            else {
                                alert("Data Cannot Be Deleted");
                            }
                        }
                    });
                }
            }
        </script>