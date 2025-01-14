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
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "INSERT INTO `admin` (`admin_id`,`firstname`,`lastname`,`gender`,`email`,`password`,`phone`,`address`,`admin_img`,`role`)VALUES (null,'$firstname','$lastname','$gender','$email','$password','$phone','$address','$folder','Admin')";
$result = $connection->query($sql);
echo "<script>
			alert('Added.....');
        </script>";
?>