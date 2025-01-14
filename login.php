<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-10 text-center my-5">

                <div class="card o-hidden shadow-lg my-5 rounded-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <!-- <div class="col-lg-6 d-none d-lg-block">
                           <img src="img/photo-1523050854058-8df90110c9f1.jpeg">
                        </div> -->
                            <div class="col-lg-10">
                                <div class="p-5">
                                    <div class="text-center d-flex justify-content-center gap-1">
                                        <div class="sidebar-brand-icon rotate-n-15 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                fill="currentColor" class="bi bi-mortarboard-fill text-primary" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                                                <path
                                                    d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                                            </svg>
                                        </div>
                                        <h1 class="h4 text-primary mb-4 fs-2">SMS</h1>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form class="user" action="login-process.php" method="post">
                                        <div class="form-group my-3">
                                            <input type="email" class="form-control fs-6 border-2"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" required>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="password" class="form-control fs-6 border-2"
                                                id="exampleInputPassword" placeholder="Password" name="password"
                                                required>
                                        </div>
                                        <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div> -->
                                        <div class="form-group mt-4">
                                            <select name="role" class="form-control fs-6 border-2" required>
                                                <option value="">Select Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Student">Student</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary fs-6 px-5 my-3">
                                            Login
                                        </button>

                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block fs-6 bg-gradient-danger text-white">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block fs-6 text-white bg-gradient-primary">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> -->
                                    </form>

                                    <!-- <div class="d-flex justify-content-center gap-4">
                                        <div class="text-center">
                                            <a class="small fs-6 text-primary link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                                href="forgot-password.html">Forgot Password?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover fs-6"
                                                href="./register.php">Create an Account!</a>
                                        </div> -->
                                </div>
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