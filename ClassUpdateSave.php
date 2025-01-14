<?php
    include("connection.php");

    header("Content-Type:Apllication/json");

    $data = json_decode(file_get_contents('php://input'));

    $course_id = $data->course_id;
    $course = $data->course_name;
    
    $sql = "UPDATE `course` SET `course_name`='$course' WHERE course_id=$course_id";
    $result = $connection->query($sql);

    if($result){
        echo 1;
    }
    else{
        echo 0;
    }
?>