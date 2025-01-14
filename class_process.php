<?php
include("connection.php");

$course = $_POST['course'];
$semester = $_POST['semester'];
$division = $_POST['division'];
$classNo = $_POST['classNo'];

$sql = "INSERT INTO `stud_class` VALUES(null,$course,'$semester','$division','$classNo')";
$result = $connection->query($sql);
header("location:home.php");
?>