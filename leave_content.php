
<div class="container-fluid px-5 col-md-8">

    <div class="pt-3">
        <h3 class="fw-bold">Add Leave</h3>
    </div>

    <div class="mt-3 border border-2 shadow p-4 rounded-3">
        <form method="post" action="leave-process.php">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="fw-semibold">Select LeaveType</label>
                    <select class="form-control" name="leave_type" required>
                        <option value="">Select Leave Type</option>
                        <option value="Personal">Personal</option>
                        <option value="Madical">Madical</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>From Date:</label>
                    <input type="date" class="form-control" name="from_date" required>
                </div>
                <div class="form-group col-md-6">
                    <label>To Date:</label>
                    <input type="date" class="form-control" name="to_date" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Leave Description</label>
                    <textarea name="leave_desc" rows="3" cols="80" class="form-control" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success fw-semibold text-light" name="sub-btn">Add
                        Leave</button>
                </div>
            </div>
        </form>
    </div>
    <div id="success-message"> </div>
</div>

