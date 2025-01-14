<?php
    include("connection.php");

    header('Content-Type:Application/json');

    $data = json_decode(file_get_contents('php://input'));

    $id = $data->updateEventId;
    $sql = "SELECT *FROM `event` WHERE `event_id`=$id";
    $result = $connection->query($sql);
    $recode = $result->fetch(PDO::FETCH_ASSOC);
    echo json_encode($recode);
?>