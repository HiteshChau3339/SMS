<!-- Page Heading -->
<div class="container-fluid px-5 col-md-6">

    <div class="pt-3">
        <h3 class="fw-bold">Add Course</h3>
    </div>

    <div class="mt-3 border border-2 shadow p-4 rounded-3">
        <form method="post" action="course_process.php">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="fw-semibold">CourseName</label>
                    <input type="text" name="coursename" class="form-control border-2" placeholder="Enter CourseName"
                        id="txtCourse">
                    <div id="error-message" class="col text-danger fw-bold"></div>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-gradient bg-success text-white fs-6 fw-semibold tracking-wide"
                        name="sub-btn" id="btnSubmit">Add Course</button>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-4">
        <a href="./manageClass.php" class="btn btn-light fs-5 p-3">
            <i class="fa fa-arrow-left bg-primary text-light fs-4 p-2 rounded-3"></i> &nbsp;
            Back to Manage course</a>
    </div>
    <div id="success-message"> </div>
</div>
<script type="text/javascript" src="./vendor/jquery/jquery.js"></script>

<script>
    $("#btnSubmit").on("click", function (e) {
        e.preventDefault();

        var courseName = $("#txtCourse").val();

        if (courseName == "") {
            $("#error-message").html("Please Enter CourseName").slideDown();
            $("#success-message").slideUp();
        }
        else {
            $.ajax({
                url: "/SMS-32/course_process.php",
                type: "POST",
                data: { course_name: courseName },
                success: function (data) {
                    if (data == 1) {
                        alert("added");
                        window.location.replace("manageClass.php");
                    }
                    else {
                        alert("Not Added");
                    }
                }
            })
        }
    });
</script>