<?php
include("connection.php");
$sql = "SELECT * FROM course";
$result = $connection->query($sql);
$recodes = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container-fluid px-5 col-md-7">


    <!-------------------------------------------------------------------------------------------------->
    <!-- Page Heading -->
    <div class="mt-5">
        <h1 class="h3 mb-4 text-gray-800 fw-bold">Add Class</h1>
    </div>

    <div class="mt-3 border border-2 shadow p-4 rounded-3">
        <form method="post" action="class_process.php">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="fw-semibold">Course</label>
                    <div class="text-center">
                        <select class="form-control border-2" name="course" required>
                            <option>Select Course</option>
                            <?php foreach ($recodes as $row) { ?>
                                <option value="<?= $row['course_id'] ?>">
                                    <?= $row['course'] ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="fw-semibold">Semester</label>
                    <select class="form-control border-2" name="semester" required>
                        <option>Select Semester</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </div>
                <!-- <div class="row">
                </div> -->
                <div class="form-group col-md-12">
                    <label class="fw-semibold">Division</label>

                    <input type="text" name="division" class="form-control border-2" placeholder="Enter Division"
                        required>
                </div>

                <div class="form-group col-md-12">
                    <label class="fw-semibold">ClassNo</label>
                    <input type="text" name="classNo" class="form-control border-2" placeholder="Enter classNo"
                        required>
                </div>
                <div class="col">
                   <button type="submit" class="btn bg-success text-white fs-6  tracking-wide"
                         name="sub-btn">Add Class</button>
                </div>
        </form>
    </div>
</div>
</div>