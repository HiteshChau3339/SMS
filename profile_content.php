<?php
// include("connection.php");
// $id = $_SESSION['id'];

// // $sql = "SELECT * FROM stud_class  WHERE stud_id=$id";
// $result = $connection->query($sql);
// $recodes = $result->fetch();
?>

<?php /*
$id = $_SESSION['id'];
include("connection.php");
$editQuery = "SELECT * FROM stud_register 
INNER JOIN stud_class 
ON stud_class.class_id = stud_register.class_id
INNER JOIN course 
ON course.course_id = stud_class.course_id 
WHERE stud_register.stud_id=$id";

$resultprofile = $connection->query($editQuery);
$recodesprofile = $resultprofile->fetch();
*/?>

<?php
include("connection.php");
$id = $_SESSION['id'];
$admin_id = $_SESSION['admin_id'];
$role = $_SESSION['role'];

if ($role == 'Admin') {
  $sql = "SELECT * FROM `admin` WHERE `admin_id`=$admin_id";
} else {
  $sql = "SELECT * FROM stud_register INNER JOIN course ON course.course_id=stud_register.course_id WHERE `stud_id`=$id";
}
$result = $connection->query($sql);
$recodes = $result->fetch();
?>
<link rel="stylesheet" href="profile_style.css">
<!-- Offline Bootstrap CSS link  -->
<link rel="stylesheet" href="./bootstrap-5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap-5.3.0/dist/css/bootstrap-utilities.min.css">
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="container">
    <div class="main-body">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
          <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-3 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <?php
                if ($role == "Admin") {
                  ?>
                  <img class="img-profile rounded-circle" src="./<?= $recodes['admin_img'] ?>" height="150px"
                    width="150px">
                <?php } ?>

                <?php
                if ($role == "Student") {
                  ?>
                  <img class="img-profile rounded-circle border border-2" src="./<?= $recodes['stud_img'] ?>"
                    height="150px" width="150px">
                <?php } ?>
                <div class="mt-3">
                  <h4>
                    <?= $recodes['firstname'] ?>
                  </h4>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">First Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $recodes['firstname'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Last Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $recodes['lastname'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $recodes['email'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Gender</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $recodes['gender'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Mobile</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $recodes['phone'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $recodes['address'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <?php if ($role == "Student") { ?>
                  <div class="col-sm-3">
                    <h6 class="mb-0">Course</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?= $recodes['course_name'] ?>
                  </div>
                <?php } ?>
              </div>
              <div class="row pl-3 mt-4">
                <?php if ($role == "Student") { ?>
                  <button type="button" class="btn btn-success col-md-2 fw-semibold" data-toggle="modal"
                    data-target="#exampleModal" onclick="UpdateProfile(<?= $recodes['stud_id'] ?>)">
                    Edit Profile
                  </button>
                <?php } ?>
                <?php if ($role == "Admin") { ?>
                  <button type="button" class="btn btn-success col-md-2 fw-semibold" data-toggle="modal"
                    data-target="#exampleModal" onclick="UpdateAdminProfile(<?= $recodes['admin_id'] ?>)">
                    Edit Profile
                  </button>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
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
          <?php if ($role == "Student") { ?>
            <div class="form-group col-md-6">
              <input type="hidden" class="form-control fs-6 border-2" id="stud_id" required>
            </div>
          <?php } ?>
          <?php if ($role == "Admin") { ?>
            <div class="form-group col-md-6">
              <input type="hidden" class="form-control fs-6 border-2" id="admin_id" required>
            </div>
          <?php } ?>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label class="fw-semibold">First Name</label>
            <input type="text" class="form-control fs-6 border-2" name="firstname" id="firstname" required>
          </div>
          <div class="form-group col-md-6">
            <label class="fw-semibold">Last Name</label>
            <input type="text" class="form-control fs-6 border-2" placeholder="Last Name" name="lastname" id="lastname"
              required>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label class="fw-semibold">Gender</label>
            <select name="gender" class="form-control fs-6 border-2" id="gender" required>
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="fw-semibold">Phone No</label>
            <input type="text" id="phone" class="form-control fs-6 border-2" placeholder="Enter PhoneNo" name="phone"
              required>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label class="fw-semibold">Address</label>
            <input type="text" id="address" class="form-control fs-6 border-2" placeholder="Enter Address"
              name="address" required>
          </div>
          <div class="form-group col-md-6">
            <label class="fw-semibold">Email</label>
            <input type="email" id="email" class="form-control fs-6 border-2" placeholder="Email Address" name="email"
              required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php if ($role == "Student") { ?>
          <button type="button" class="btn btn-primary" id="btn-SaveEditProfile">Save changes</button>
        <?php } ?>
        <?php if ($role == "Admin") { ?>
          <button type="button" class="btn btn-primary" id="btn-SaveEditAdminProfile">Save changes</button>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<script src="./vendor/jquery/jquery.min.js" type="text/javascript"></script>

<script>
  function UpdateProfile(stud_id) {
    $.ajax({
      url: "/SMS-32/ProfileUpdate_Process.php",
      type: "post",
      contentType: "Application/json",
      data: JSON.stringify({
        updateStudId: stud_id
      }),
      success: function (data) {
        if (data) {
          document.getElementById('stud_id').value = data.stud_id;
          document.getElementById('firstname').value = data.firstname;
          document.getElementById('lastname').value = data.lastname;
          document.getElementById('email').value = data.email;
          document.getElementById('gender').value = data.gender;
          document.getElementById('phone').value = data.phone;
          document.getElementById('address').value = data.address;
        }
        else {
          alert("Data CanNot Be Updated");
        }
      }
    })
  }

  $('#btn-SaveEditProfile').on('click', function () {
    $.ajax({
      url: '/SMS-32/UpdateProfileSave.php',
      type: 'post',
      contentType: 'Application/json',
      data: JSON.stringify({
        stud_id: $('#stud_id').val(),
        firstname: $('#firstname').val(),
        lastname: $('#lastname').val(),
        gender: $('#gender').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        address: $('#address').val(),
      }),
      success: function (data) {
        if (data == 1) {
          alert("Data Updated Successfully");
          window.location.replace("profile.php");
        }
        else {
          alert("Data CanNot Be Updated");
        }
      }
    })
  })

  function UpdateAdminProfile(admin_id) {
    $.ajax({
      url: "/SMS-32/AdminProfileUpdate_Process.php",
      type: "post",
      contentType: "Application/json",
      data: JSON.stringify({
        updateAdminId: admin_id
      }),
      success: function (data) {
        if (data) {
          document.getElementById('admin_id').value = data.admin_id;
          document.getElementById('firstname').value = data.firstname;
          document.getElementById('lastname').value = data.lastname;
          document.getElementById('email').value = data.email;
          document.getElementById('gender').value = data.gender;
          document.getElementById('phone').value = data.phone;
          document.getElementById('address').value = data.address;
        }
        else {
          alert("Data CanNot Be Updated");
        }
      }
    })
  }

  $('#btn-SaveEditAdminProfile').on('click', function () {
    $.ajax({
      url: '/SMS-32/AdminProfileUpdateSave.php',
      type: 'post',
      contentType: 'Application/json',
      data: JSON.stringify({
        admin_id: $('#admin_id').val(),
        firstname: $('#firstname').val(),
        lastname: $('#lastname').val(),
        gender: $('#gender').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        address: $('#address').val(),
      }),
      success: function (data) {
        if (data == 1) {
          alert("Data Updated Successfully");
          window.location.replace("profile.php");
        }
        else {
          alert("Data CanNot Be Updated");
        }
      }
    })
  })


  function UpdateAdminImg(admin_id) {
    $.ajax({
      url: "/SMS-32/AdminImgUpdate.php",
      type: "post",
      contentType: "Application/json",
      data: JSON.stringify({
        updateAdminImg: admin_id
      }),
      success: function (data) {
        if (data) {
          document.getElementById('adminId').value = data.admin_id;
          //document.getElementById('admin_img').value = data.admin_img;
        }
        else {
          alert("Data CanNot Be Updated");
        }
      }
    })
  }
</script>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data" id="image_form">
          <input type="text" id="adminId" class="form-control fs-6 border-2" required>

          <label class="fw-semibold">Select Img</label>
          <input class="form-control fs-6 border-2" type="file" id="adminImg" placeholder="" required><br>

          <button type="button" class="btn btn-primary" id="btn-SaveEditAdminProfileImg">Update</button>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#btn-SaveEditAdminProfileImg').on('click', function () {
    $.ajax({
      url: '/SMS-32/AdminImgUpdateSave.php',
      type: 'post',
      contentType: 'Application/json',
      data: JSON.stringify({
        admin_id: $('#adminId').val(),
        admin_img: $('#adminImg').val(),
      }),
      success: function (data) {
        if (data == 1) {
          alert("Data Updated Successfully");
          window.location.replace("profile.php");
        }
        else {
          alert("Data CanNot Be Updated");
        }
      }
    })
  })
</script>