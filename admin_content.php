<div class="container-md px-5 col-md-7">

    <!-- Page Heading -->
    <div class="">
        <h1 class="h3 mb-4 text-gray-800 fw-bold">Admin</h1>
    </div>

    <div class="mt-3 border border-2 shadow p-4 rounded-3 p-5">
        <form method="post" action="admin-process.php" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="fw-semibold">First Name</label>
                    <input type="text" name="firstname" class="form-control p-2" placeholder="Enter First Name">
                </div>
                <div class="form-group col-md-6">
                    <label class="fw-semibold">Last Name</label>
                    <input type="text" name="lastname" class="form-control p-2" placeholder="Enter Last Name">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control p-2" placeholder="Enter Email">
                </div>
                <div class="form-group col-md-6">
                    <label class="fw-semibold">Password</label>
                    <input type="text" name="password" class="form-control p-2" placeholder="Enter Password">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="fw-semibold">Gender</label>
                    <select name="gender" class="form-control fs-6 border-2" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">FeMale</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="fw-semibold">Phone No</label>
                    <input type="text" class="form-control fs-6 border-2" id="exampleRepeatPassword"
                        placeholder="Enter PhoneNo" name="phone" required>
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
                <div class="form-group col-md-6">
                    <label class="fw-semibold">Stud_Img</label>
                    <input class="form-control fs-6 border-2" type="file" id="exampleInputEmail" placeholder=""
                        name="uploadfile" required>
                </div>
            </div>

            <div class="mt-2">
                <button type="submit"
                    class="btn btn-success fw-semibold py-2 text-white fs-6 fw-semibold tracking-wide px-5"
                    name="sub-btn">Add Admin</button>
            </div>
        </form>
    </div>
</div>