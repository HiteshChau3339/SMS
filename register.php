<?php
include("connection.php");
$sql = "SELECT * FROM course";
$result = $connection->query($sql);
$recodes = $result->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Offline Bootstrap CSS link  -->
    <link rel="stylesheet" href="./bootstrap-5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-5.3.0/dist/css/bootstrap-utilities.min.css">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register">
                        <img src="img\register-back.jpg" width="550px" height="602px">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome to SMS! Please create an Account.</h1>
                            </div>
                            <form class="user" action="register-process.php" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="  form-control fs-6 border-2" id="exampleFirstName"
                                            placeholder="First Name" name="firstname" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control fs-6 border-2" id="exampleLastName"
                                            placeholder="Last Name" name="lastname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control fs-6 border-2" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" required>
                                </div>
                                <!-- <div class="form-group">
                                    <input type="file" class="form-control" id="exampleInputEmail" placeholder="Email Address" name="uploadfile" required>
                                </div> -->
                                <div class="form-group">
                                    <input class="form-control fs-6 border-2" type="file" id="exampleInputEmail"
                                        placeholder="Email Address" name="uploadfile" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control fs-6 border-2"
                                            id="exampleInputPassword" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control fs-6 border-2"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="repassword"
                                            required>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Class</label>
                                        <select class="form-control border-2" name="class_id">
                                            <?php
                                            foreach ($recodes as $row) {
                                                ?>
                                                <option value="<?php echo $row["course_id"]; ?>">
                                                    <?php echo $row["course"]; ?>
                                                </option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Role</label>
                                        <select class="form-control border-2" name="role">
                                            <option>Admin</option>
                                            <option>Student</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control fs-6 border-2" id="exampleInputPassword"
                                            placeholder="Phone" name="password" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <ul
                                            class="items-center w-full text-sm font-medium text-gray-900 bg-white border-2 border-gray-200 rounded-lg sm:flex dark:bg-white dark:border-gray-300 dark:text-slate-900">
                                            <li
                                                class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-400">
                                                <div class="flex items-center pl-3">
                                                    <h5 class="font-semibold text-gray-900 dark:text-slate-900 text-sm">
                                                        Gender
                                                    </h5>
                                                    <input id="horizontal-list-radio-license" type="radio" value=""
                                                        name="list-radio"
                                                        class="w-8 h-5 text-blue-600 bg-white border-gray-300 border-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-white focus:ring-2 dark:bg-white dark:border-gray-500">
                                                    <label for="horizontal-list-radio-license"
                                                        class="w-full py-3 ml-2 text-base font-medium text-gray-900 dark:text-gray-900">Male</label>
                                                    <input id="horizontal-list-radio-id" type="radio" value=""
                                                        name="list-radio"
                                                        class="w-8 h-5 text-blue-600 bg-gray-100 border-gray-300 border-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-white focus:ring-2 dark:bg-white dark:border-gray-500">
                                                    <label for="horizontal-list-radio-id"
                                                        class="w-full py-3 ml-2 text-base font-medium text-gray-900 dark:text-gray-900">Female</label>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control fs-6 border-2" id="exampleInputEmail"
                                        placeholder="Address" name="email" required>
                                </div>
                                <br>
                                <button class="btn btn-primary btn-user btn-block fs-6" type="submit">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html"
                                    class="btn btn-google btn-user btn-block bg-danger fs-6 text-white">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block fs-6 text-white"
                                    style="background-color: #3b5998;">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-center">
                                    <a class="small link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-6"
                                        href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover fs-6"
                                        href="login.php">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Bootstrap JS file -->
    <script src="./bootstrap-5.3.0/dist/js/bootstrap.js"></script>
    <script src="./bootstrap-5.3.0/dist/js/bootstrap.bundle.js"></script>
    <script src="./bootstrap-5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./bootstrap-5.3.0/dist/js/bootstrap.min.js"></script>


</body>

</html>