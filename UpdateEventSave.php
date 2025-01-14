<?php
    include("connection.php");

    header("Content-Type:Apllication/json");

    $data = json_decode(file_get_contents('php://input'));

    $eventId = $data->event_id;
    $eventName = $data->event_name;
    $eventDate = $data->event_date;
    $regStartDate = $data->reg_startdate;
    $regEndDate = $data->reg_enddate;
    $eventCategory = $data->event_category;
    $eventDesc = $data->event_desc;

    $sql = "UPDATE `event` SET `event_name`='$eventName',`event_date`='$eventDate',`event_desc`='$eventDesc',
    `event_category`='$eventCategory',`reg_startdate`='$regStartDate',`reg_enddate`='$regEndDate' WHERE event_id=$eventId";
    $result = $connection->query($sql);

    if($result){
        echo 1;
    }
    else{
        echo 0;
    }
?>