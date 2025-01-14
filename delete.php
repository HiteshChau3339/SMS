<?php
include("connection.php");


header('Content-Type:Application/json');

$data = json_decode(file_get_contents('php://input'));

$id = $data->CourseId;

$sqlForCourse = "SELECT *FROM `stud_register` WHERE course_id=$id";
$resultForCourse = $connection->query($sqlForCourse);
$count = $resultForCourse->rowCount();

if ($count == 0) {
    $sql = "DELETE FROM course WHERE course_id=$id";
    $result = $connection->query($sql);

    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}
else{
    echo 0;
}


?>