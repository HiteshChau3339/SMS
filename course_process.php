<?php
include("connection.php");

$course = $_POST["course_name"];

$sqlForCourse = "SELECT * FROM `course` WHERE `course_name` = '$course' ";
$resultCourse = $connection->query($sqlForCourse);
$recodesForCourse = $resultCourse->rowCount();

if ($recodesForCourse == 0) {

    $sql = "INSERT INTO `course` VALUES (null,'{$course}')";
    $result = $connection->query($sql);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
} 
?>