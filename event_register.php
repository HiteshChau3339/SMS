
<?php
    include("connection.php");

    header('Content-Type:Application/json');

    $data = json_decode(file_get_contents('php://input'));

    $id = $data->updateEventId;
    $stud_id = $data->updateStudId;

    $sql = "INSERT INTO `event_register` (`event_id`,`stud_id`) VALUES ('$id','$stud_id')";
    $result = $connection->query($sql);

    if($result){
        echo 1;
    }
    else{
        echo 0;
    }
?>