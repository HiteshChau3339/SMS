<!-- Page Heading -->
<div class="container-fluid px-5 col-md-7">

    <div class="">
        <h1 class="h3 mb-4 text-gray-800 fw-bold">Add Event</h1>
    </div>

    <div class="mt-3 border border-2 shadow p-4 rounded-3">
        <form method="post" action="event_process.php">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="fw-semibold">EventName</label>
                    <input type="text" name="eventname" class="form-control border-2" placeholder="Enter EventName"
                        required>
                </div>

                <div class="form-group col-md-12">
                    <label class="fw-semibold">Event Category</label>
                    <select name="eventCategory" id="" class="form-control border-2">
                        <option value="">Select Category</option>
                        <option value="sport">Sport</option>
                        <option value="music">Music</option>

                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label class="fw-semibold">Event Date</label>
                    <input type="date" name="EventDate" class="form-control border-2"
                        placeholder="Enter Event-StartDate" required>
                </div>

               
                    <div class="form-group col-6">
                        <label class="fw-semibold">Registration Start-Date</label>
                        <input type="date" name="regStartDate" class="form-control border-2"
                            placeholder="Enter Event-StartDate" required>
                    </div>
                    <div class="form-group col-6">
                        <label class="fw-semibold">Registration End-Date</label>
                        <input type="date" name="regEndDate" class="form-control border-2"
                            placeholder="Enter Event-StartDate" required>
                    </div>

                <div class="form-group col-12">
                    <label class="fw-semibold">Event Description</label>
                    <textarea name="eventDesc" rows="3" cols="80" class="form-control border-2"></textarea>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-gradient bg-success text-white fs-6 fw-semibold tracking-wide"
                        name="sub-btn">Add Event</button>
                </div>
            </div>
        </form>
    </div>
</div>