<?php
include("connection.php");
$sql = "SELECT * FROM course";
$result = $connection->query($sql);
$recodes = $result->fetchAll();
?>

<div class="container-fluid px-5 col-11">

    <!-- Page Heading -->
    <div class="">
        <h1 class="h3 mb-3 text-gray-800 fw-bold">Add Student</h1>
    </div>

    <div class="mb-3 border border-2 shadow p-4 rounded-3">
        <form action="register-process.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="fw-semibold">First Name</label>
                    <input type="text" class="form-control fs-6 border-2" id="exampleFirstName" placeholder="First Name"
                        name="firstname" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="fw-semibold">Last Name</label>
                    <input type="text" class="form-control fs-6 border-2" id="exampleLastName" placeholder="Last Name"
                        name="lastname" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="fw-semibold">Gender</label>
                    <select name="gender" class="form-control fs-6 border-2" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">FeMale</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label class="fw-semibold">Phone No</label>
                    <input type="text" class="form-control fs-6 border-2" id="exampleRepeatPassword"
                        placeholder="Enter PhoneNo" name="phone" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="fw-semibold">Stud_Img</label>
                    <input class="form-control fs-6 border-2" type="file" id="exampleInputEmail" placeholder=""
                        name="uploadfile" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="fw-semibold">Course</label>
                    <select class="form-control border-2" name="course_id">
                        <option value="">Select Course</option>
                        <?php
                        foreach ($recodes as $row) {
                            ?>
                            <option value="<?php echo $row["course_id"]; ?>">
                                <?php echo $row["course_name"]; ?>
                            </option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label class="fw-semibold">Address</label>
                    <input type="text" class="form-control fs-6 border-2" id="exampleInputPassword"
                        placeholder="Enter Address" name="address" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label class="fw-semibold">Email</label>
                    <input type="email" class="form-control fs-6 border-2" id="exampleInputEmail"
                        placeholder="Email Address" name="email" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="fw-semibold">Password</label>
                    <input type="password" class="form-control fs-6 border-2" id="exampleInputPassword"
                        placeholder="Password" name="password" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="fw-semibold">Repassword</label>
                    <input type="password" class="form-control fs-6 border-2" id="exampleRepeatPassword"
                        placeholder="Repeat Password" name="repassword" required>
                </div>
            </div>

            <div class="mt-2">
                <button type="submit" name="send"
                    class="btn btn-gradient bg-success text-white fs-6 fw-semibold tracking-wide">Add Student</button>
            </div>
        </form>
    </div>
</div>