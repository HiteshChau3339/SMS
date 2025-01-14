<?php
include("connection.php");
if (isset($_POST['btnRegEvent'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `event_register` INNER JOIN `event` ON `event_register`.`event_id` = `event`.`event_id` WHERE `event_register`.`stud_id` = $id";
} else {
    $sql = "SELECT * FROM `event`";
}
$result = $connection->query($sql);
$recodes = $result->fetchAll(PDO::FETCH_ASSOC)
    ?>

<div class="container-fluid px-5" id="event">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 fw-bold">Event</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if ($role == "Admin") { ?>
                <a class="btn btn-success fw-semibold text-end mb-3 float-end" href="Event.php">
                    Add Event
                </a>
            <?php } ?>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                    aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row" class="text-center">
                            <th class="sorting sorting_asc bg-primary text-white" tabindex="0" aria-controls="dataTable"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Student_img: activate to sort column descending" style="width: 132.2px;">
                                Event Name</th>
                            <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Name: activate to sort column ascending" style="width: 68.2px;">
                                Event Category</th>
                            <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Position: activate to sort column ascending"
                                style="width: 89.2px;">Event Date
                            </th>
                            <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Office: activate to sort column ascending"
                                style="width: 89.2px;">Registration StartDate
                            </th>
                            <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Office: activate to sort column ascending"
                                style="width: 89.2px;">Registration EndDate
                            </th>
                            <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Office: activate to sort column ascending"
                                style="width: 155.2px;">Event Description
                            </th>

                            <th class="sorting bg-primary text-white" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Update: activate to sort column ascending"
                                style="width: 155.2px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($recodes as $row) {
                            ?>
                            <tr class="text-center">
                                <td class="border border-bottom">
                                    <?= $row['event_name'] ?>
                                </td>
                                <td class="border border-bottom">
                                    <?= $row['event_category'] ?>
                                </td>
                                <td class="border border-bottom">
                                    <?= $row['event_date'] ?>
                                </td>
                                <td class="border border-bottom">
                                    <?= $row['reg_startdate'] ?>
                                </td>
                                <td class="border border-bottom">
                                    <?= $row['reg_enddate'] ?>
                                </td>

                                <td class="border border-bottom">
                                    <?= $row['event_desc'] ?>
                                </td>

                                <td class="border border-bottom text-center">
                                    <?php
                                    if ($_SESSION["role"] == "Admin") {
                                        ?>
                                        <!-- <a href="update.php ?stud_id" class="btn btn-primary">Update </a> -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                            onclick="UpdateEvent(<?= $row['event_id'] ?>)" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Update">
                                            <i class="fas fa-edit fs-5" style="color: #;"></i>
                                        </button>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <button type="button" class="btn btn-danger" onclick="DeleteEvent(<?= $row['event_id'] ?>)"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" name="btnDelCourse">
                                            <i class="fa-solid fa-trash-can fs-5" style="color: #;"></i>
                                        </button>

                                    <?php } else {
                                        $stud_id = $_SESSION['id'];
                                        $event_id = $row['event_id'];
                                        $current_date = date("Y-m-d");

                                        $sqlforevent = "SELECT *FROM event_register WHERE stud_id=$stud_id AND event_id = $event_id";
                                        $result = $connection->query($sqlforevent);

                                        if ($result->rowCount() > 0) {

                                            ?>
                                            <!-- <button type="button" class=""
                                                onclick="RegEvent(<?= $row['event_id'] ?>,<?= $stud_id ?>)" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Register" id="btnRegEvent">
                                                <i class="fa-solid fa-trash-can fs-4" style="color: #d80e0e;"></i>
                                            </button> -->
                                            <h class="fw-bold text-success">Registered</h>


                                            <?php
                                        } else {
                                            if ($current_date > $row['reg_enddate']) {
                                                ?>
                                                <h class="fw-bold text-danger">Registration-Closed</h>
                                                <?php
                                            } else {

                                                ?>
                                                <button type="button" class="btn btn btn-warning fw-semibold"
                                                    onclick="RegEvent(<?= $row['event_id'] ?>,<?= $stud_id ?>)" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Click To RegisterEvent" id="btnRegEvent">
                                                    Register
                                                </button>
                                                <?php
                                            }
                                        }
                                    } ?>
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
                        <input type="hidden" class="form-control fs-6 border-2" id="event_id" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Event Name</label>
                        <input type="text" class="form-control fs-6 border-2" name="" id="eventName"
                            placeholder="EventName" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Event Date</label>
                        <input type="date" class="form-control fs-6 border-2" placeholder="eventDate" name=""
                            id="eventDate" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Event Category</label>
                        <select name="eventCategory" class="form-control fs-6 border-2" id="eventCategory" required>
                            <option value="">Select EventCategory</option>
                            <option value="sport">Sport</option>
                            <option value="music">Music</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Registration StartDate</label>
                        <input type="date" id="regStartDate" class="form-control fs-6 border-2"
                            placeholder="Event RegStartDate" name="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Registration EndDate</label>
                        <input type="date" id="regEndDate" class="form-control fs-6 border-2"
                            placeholder="EventRegEndDate" name="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="fw-semibold">Event Descriptio</label>
                        <input type="text" id="eventDesc" class="form-control fs-6 border-2"
                            placeholder="EventDescription" name="" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-SaveEditEvent">Save changes</button>
            </div>
        </div>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script type="text/javascript" src="./vendor/jquery/jquery.js"></script>

<script>

    function UpdateEvent(event_id) {
        $.ajax({
            url: "/SMS-32/UpdateEventProcess.php",
            type: "post",
            contentType: "Application/json",
            data: JSON.stringify({
                updateEventId: event_id
            }),
            success: function (data) {
                if (data) {
                    document.getElementById('event_id').value = data.event_id;
                    document.getElementById('eventName').value = data.event_name;
                    document.getElementById('eventDate').value = data.event_date;
                    document.getElementById('eventCategory').value = data.event_category;
                    document.getElementById('regStartDate').value = data.reg_startdate;
                    document.getElementById('regEndDate').value = data.reg_enddate;
                    document.getElementById('eventDesc').value = data.event_desc;
                }
                else {
                    alert("Data CanNot Be Updated");
                }
            }
        })
    }

    $('#btn-SaveEditEvent').on('click', function () {
        $.ajax({
            url: '/SMS-32/UpdateEventSave.php',
            type: 'post',
            contentType: 'Application/json',
            data: JSON.stringify({
                event_id: $('#event_id').val(),
                event_name: $('#eventName').val(),
                event_date: $('#eventDate').val(),
                event_category: $('#eventCategory').val(),
                reg_startdate: $('#regStartDate').val(),
                reg_enddate: $('#regEndDate').val(),
                event_desc: $('#eventDesc').val(),
            }),
            success: function (data) {
                if (data == 1) {
                    alert("Data Updated Successfully");
                    window.location.replace("view_event.php");
                }
                else {
                    alert("Data CanNot Be Updated");
                }
            }
        })
    })

    function DeleteEvent(event_id) {
        if (confirm("Are You Sure Delete Course")) {
            $.ajax({
                url: "/SMS-32/deleteEvent.php",
                type: "post",
                contentType: "Application/json",
                data: JSON.stringify({
                    deleteEventId: event_id,
                }),
                success: function (data) {
                    if (data == 1) {
                        alert("Data Deleted Successfully");
                        window.location.replace("view_event.php");
                    }
                    else {
                        alert("Data Cannot Be Deleted");
                    }
                }
            });
        }
    }

    function RegEvent(event_id, stud_id) {
        if (confirm("Are You Sure Register Event")) {
            $.ajax({
                url: "/SMS-32/event_register.php",
                type: "post",
                contentType: "Application/json",
                data: JSON.stringify({
                    updateEventId: event_id,
                    updateStudId: stud_id,
                }),
                success: function (data) {
                    if (data == 1) {
                        alert("Register Successfully");
                    }
                    else {
                        alert("Not Register Successfully");
                    }
                }
            });
        }

    }
</script>