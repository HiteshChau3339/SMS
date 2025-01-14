<?php
    include("connection.php");

    header('Content-Type:Application/json');

    $data = json_decode(file_get_contents('php://input'));

    $id = $data->updateCourseId;
    $sql = "SELECT *FROM course WHERE `course_id`=$id";
    $result = $connection->query($sql);
    $recode = $result->fetch();
    echo json_encode($recode);
?>