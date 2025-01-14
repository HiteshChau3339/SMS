<?php
include("connection.php");

$filename = $_FILES["uploadfile"]["name"];
$tmp_filename = $_FILES["uploadfile"]["tmp_name"];
$folder = "stu_img/" . $filename;

move_uploaded_file($tmp_filename, $folder);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$course_id = $_POST['course_id'];

$sqlForStudent = "SELECT * FROM `stud_register` WHERE `email` = '$email' ";
$resultStud = $connection->query($sqlForStudent);
$recodesForStud = $resultStud->rowCount();

if ($recodesForStud == 0) {
    $sql = "INSERT INTO stud_register VALUES (null,'$firstname','$lastname','$email','$password','$repassword','$folder','$gender','$phone','$address','$course_id','Student')";
    if ($password == $repassword) {
        $result = $connection->query($sql);

        header("Location:manageStudent.php");

    } else {
        echo "<script>alert('Sorry Password Is Incorrect.....');
            window.location.href = 'addStudent.php';
            </script>";
        //echo "Soryyyy";
    }
} else {
    echo "<script>alert('Sorry please enter another email becase this email is alrady registered');
    window.location.href = 'addStudent.php';
    </script>";
}


?>