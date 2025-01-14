<?php
include("connection.php");
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($role == 'Student') {
    $sql = "SELECT * FROM `stud_register`  WHERE `email`='$email' AND `password`='$password'";
} else {
    $sql = "SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'";
}
$result = $connection->query($sql);

if ($result->rowCount() == 1) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    //print_r($row);

    session_start();

    //$_SESSION['firstname'] = $row['firstname'];
    //$_SESSION['lastname'] = $row['lastname'];
    $_SESSION['email'] = $row['email'];
    // $_SESSION['password'] = $row['password'];
    $_SESSION['stud_img'] = $row['stud_img'];
    //$_SESSION['gender'] = $row['gender'];
    //$_SESSION['phone'] = $row['phone'];
    //$_SESSION['address'] = $row['address'];
    //$_SESSION['course'] = $row['course_id'];
    $_SESSION['id'] = $row['stud_id'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['admin_id'] = $row['admin_id'];


    header("Location:home.php");
} else {
    echo "<script>alert('Sorry Password Is Incorrect.....');
        window.location.href ='login.php';
        </script>";
}
?>