<?php
include("connection.php");
$sql = "SELECT * FROM stud_register";
$result = $connection->query($sql);
$recodes = $result->fetchAll(PDO::FETCH_ASSOC);
?>



<!-- Page Heading -->
<div class="container-fluid px-5 col-md-6">

    <div class="pt-3">
        <h3 class="fw-bold">Add Notice</h3>
    </div>

    <div class="mt-3 border border-2 shadow p-4 rounded-3">
        <form method="post" action="notice-process.php">
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="fw-semibold">Select Student</label>
                    <select class="form-control" name="stud_id" required>
                        <option>Select Student</option>
                        <?php
                        foreach ($recodes as $row) {
                            ?>
                            <option value="<?php echo $row["stud_id"]; ?>">
                                <?php
                                echo $row["firstname"];
                                ?>
                                <?php
                        }
                        ?>
                        </option>
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label class="fw-semibold">Post Date:</label>
                    <input type="date" class="form-control" name="post_date" required>
                </div>

                <div class="form-group col-md-12">
                    <label class="fw-semibold">Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required>
                </div>

                <div class="form-group col-md-12">
                    <label class="fw-semibold">Message</label>
                    <textarea name="message" rows="5" cols="80" class="form-control" required></textarea>
                </div>

                <div class="form-group col-md-12">
                    <button type="submit" class="btn text-light btn-success" name="sub-btn">Add Notice</button>
                </div>

            </div>
    </div>
    </form>
</div>
</div>