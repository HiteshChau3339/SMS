<?php
include("connection.php");
$id = $_SESSION['id'];
$role = $_SESSION['role'];

if ($role == "Student") {
    if (isset($_POST['btnleave'])) {
        $sql = "SELECT *FROM `leave` WHERE leave_status='1' AND `stud_id`=$id";
    } else {
        $sql = "SELECT * FROM `leave` WHERE stud_id=$id";
    }
} else {
    if (isset($_POST['btnPanleave'])) {
        $sql = "SELECT *FROM `leave` INNER JOIN `stud_register`
        ON      stud_register.stud_id = leave.stud_id WHERE leave_status='1'";
    } else {
        $sql = "SELECT * FROM `leave`
        INNER JOIN `stud_register`
        ON      stud_register.stud_id = leave.stud_id";
    }
}
$result = $connection->query($sql);
$recodes = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<form method="post" action="#">
    <div class="container-md col-sm-10">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 fw-bold">View Leave</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                        role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row" class="text-center">
                                <th class="sorting sorting_asc bg-primary text-white" tabindex="0"
                                    aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Student_img: activate to sort column descending" style="width:68.2px;">
                                    Leave Type</th>
                                <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                    rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                    style="width: 79.2px;">Leave From</th>
                                <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                    rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"
                                    style="width: 79.2px;">Leave To</th>
                                <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                    rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                    style="width: 145.2px;">Leave Description</th>
                                <?php if ($role == 'Student') { ?>
                                    <th class="sorting text-center bg-primary text-white" tabindex="0"
                                        aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 135.2px;">Leave
                                        Status</th>
                                    <th class="sorting text-center bg-primary text-white" tabindex="0"
                                        aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 135.2px;">
                                        Approval Remark </th>

                                    <th class="sorting text-center bg-primary text-white" tabindex="0"
                                        aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 195.2px;">
                                        Action</th>
                                <?php } else { ?>
                                    <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 50.2px;">StudentName</th>
                                    <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 60.2px;">Leave Status</th>
                                    <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 90.2px;">Approval Remarks</th>
                                    <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 215.2px;">Update Leave Status</th>

                                <?php } ?>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($recodes as $row) {
                                ?>
                                <tr class="even text-center">
                                    <td class="border border-bottom">
                                        <?= $row['leave_type'] ?>
                                    </td>
                                    <td class="border border-bottom">
                                        <?= $row['leave_from'] ?>
                                    </td>
                                    <td class="border border-bottom">
                                        <?= $row['leave_to'] ?>
                                    </td>
                                    <td class="border border-bottom">
                                        <?= $row['leave_description'] ?>
                                    </td>

                                    <?php if ($role == "Student") { ?>

                                        <td class="text-center font-weight-bold  text-uppercase border border-bottom">
                                            <?php
                                            $Status = "";
                                            $Class = "";
                                            if (($row['leave_status'] == 1)) {
                                                $Status = "Applied";
                                                $Class = "class='text-warning'";
                                            }
                                            if (($row['leave_status'] == 2)) {
                                                $Status = "Approved";
                                                $Class = "class='text-success'";
                                            }
                                            if (($row['leave_status'] == 3)) {
                                                $Status = "Rejected";
                                                $Class = "class='text-danger'";
                                            } ?>

                                            <span <?php echo $Class; ?>><?php echo $Status; ?></span>
                                        </td>

                                        <td class="text-center border border-bottom">
                                            <?= $row['ApprovalRemarks'] ?>
                                        </td>

                                        <td class="text-center border border-bottom">
                                            <?php
                                            //$ApproveStyle = "";
                                            //$Style = "";
                                            if (($row['leave_status'] == 2 || $row['leave_status'] == 3)) {
                                                //$ApproveStyle = "style='display:none;'";
                                    
                                                ?>
                                                <i class="fa fa-lock text-danger"></i>

                                                <?php
                                            } else {
                                                //$Style = "style='display:none;'";
                                    
                                                ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal" onclick="UpdateLeave(<?= $row['leave_id'] ?>)"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Click To Update">
                                                    <i class="fas fa-edit fs-5" style="color:;"></i>
                                                </button>&nbsp;&nbsp;&nbsp;

                                                <button type="button" class="btn btn-danger"
                                                    onclick="DeleteLeave(<?= $row['leave_id'] ?>)" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Click To Delete">
                                                    <i class="fa-solid fa-trash-can fs-5" style="color: ;"></i>
                                                </button>
                                            </td>

                                        <?php }
                                    } ?>

                                    <?php if ($role == "Admin") { ?>
                                        <td class="border border-bottom">
                                            <?= $row['firstname'] ?>
                                        </td>
                                        <td class="border border-bottom">
                                            <?php
                                            $Status = "";
                                            $Class = "";
                                            if (($row['leave_status'] == 1)) {
                                                $Status = "Applied";
                                                $Class = "class='text-warning'";
                                            }
                                            if (($row['leave_status'] == 2)) {
                                                $Status = "Approved";
                                                $Class = "class='text-success'";
                                            }
                                            if (($row['leave_status'] == 3)) {
                                                $Status = "Rejected";
                                                $Class = "class='text-danger'";
                                            } ?>
                                            <span <?php echo $Class; ?>><?php echo $Status; ?></span>
                                        </td>
                                        <td class="text-center border border-bottom">
                                            <input class="form-control form-control-user"
                                                name="ApprovalRemark_<?php echo $row['leave_id']; ?>"
                                                placeholder="Approval Remark">
                                        </td>

                                        <td class="text-center border border-bottom">
                                            <input type="hidden" name="leave_id" value="<?php echo $row['leave_id']; ?>>">
                                            <button type="submit" name="submit_<?php echo $row['leave_id']; ?>" value="Approve"
                                                class="btn btn-success" onclick="approve_message()">Approve</button>
                                            <button type="submit" name="submit_<?php echo $row['leave_id']; ?>" value="Reject"
                                                class="btn btn-danger" onclick="reject_message()">Reject</button>
                                        </td>
                                    <?php } ?>

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
</form>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <input type="hidden" class="form-control fs-6 border-2" id="leave_id" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="fw-semibold">Select LeaveType</label>
                        <select class="form-control" id="leave_type" required>
                            <option value="">Select Leave Type</option>
                            <option value="Personal">Personal</option>
                            <option value="Madical">Madical</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>From Date:</label>
                        <input type="date" class="form-control" id="from_date" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>To Date:</label>
                        <input type="date" class="form-control" id="to_date" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Leave Description</label>
                        <textarea id="leave_desc" rows="3" cols="80" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-SaveEditLeave">Save changes</button>
            </div>
        </div>
    </div>
</div>


<?php
// Assuming you have a database connection established

// Check if the form is submitted
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'submit_') === 0) {
            // Get the leave ID
            $leave_id = substr($key, strlen('submit_'));

            // Get the button value (Approve or Reject)
            $approvalStatus = ($value === 'Approve') ? 2 : 3;
            $ApprovalRemark = $_POST['ApprovalRemark_' . $leave_id];
            // Assuming you have an item ID to identify the item being approved/rejected
            // Perform the database update
            $query = "UPDATE `leave` SET leave_status = $approvalStatus ,ApprovalRemarks = '$ApprovalRemark' WHERE leave_id = $leave_id";
            $result = $connection->query($query);
            if ($result) {
                echo "<script>alert('Updated Successfully')</script>";
                ?>
                <meta http-equiv="refresh" content="0; url = ./view_leave.php" />
                <?php
            } else {
                echo "<script>alert('Cannot Be Updated')</script>";
            }
            // Execute the query
        }
    }
}
?>
<script>
    // function approve_message() {
    //     alert("Approve Successfully..");
    // }
    // function reject_message() {
    //     alert("Rejecte Successfully..")

    // }
</script>

<script type="text/javascript" src="./vendor/jquery/jquery.min.js"></script>

<script>
    function UpdateLeave(leave_id) {
        $.ajax({
            url: "/SMS-32/LeaveUpdate_Process.php",
            type: "post",
            contentType: "Application/json",
            data: JSON.stringify({
                updateLeaveId: leave_id,
            }),
            success: function (data) {
                if (data) {
                    document.getElementById('leave_id').value = data.leave_id;
                    document.getElementById('leave_type').value = data.leave_type;
                    document.getElementById('from_date').value = data.leave_from;
                    document.getElementById('to_date').value = data.leave_to;
                    document.getElementById('leave_desc').value = data.leave_description;
                }
                else {
                    alert("Data CanNot Be Updated");
                }
            }
        })
    }

    $('#btn-SaveEditLeave').on('click', function () {
        $.ajax({
            url: '/SMS-32/LeaveUpdateSave.php',
            type: 'post',
            contentType: 'Application/json',
            data: JSON.stringify({
                leave_id: $('#leave_id').val(),
                leave_type: $('#leave_type').val(),
                from_date: $('#from_date').val(),
                to_date: $('#to_date').val(),
                leave_desc: $('#leave_desc').val(),

            }),
            success: function (data) {
                if (data == 1) {
                    alert("Data Updated Successfully");
                    window.location.replace("view_leave.php");
                }
                else {
                    alert("Data CanNot Be Updated");
                }
            }
        })
    })

    function DeleteLeave(leave_id) {
        if (confirm("Are You Sure Delete Course")) {
            $.ajax({
                url: "/SMS-32/deleteleave.php",
                type: "post",
                contentType: "Application/json",
                data: JSON.stringify({
                    LeaveId: leave_id
                }),
                success: function (data) {
                    if (data == 1) {
                        alert("Data Deleted Successfully");
                        window.location.replace("view_leave.php");
                    }
                    else {
                        alert("Data Cannot Be Deleted");
                    }
                }
            });
        }
    }
</script>