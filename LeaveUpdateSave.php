<?php
    include("connection.php");

    header("Content-Type:Apllication/json");

    $data = json_decode(file_get_contents('php://input'));

    $id = $data->leave_id;
    $LeaveType = $data->leave_type;
    $LeaveFromDate = $data->from_date;
    $LeaveToDate = $data->to_date;
    $LeaveDesc = $data->leave_desc;
  
    $sql = "UPDATE `leave` SET `leave_type`='$LeaveType',`leave_from`='$LeaveFromDate',`leave_to`='$LeaveToDate',
    `leave_description`='$LeaveDesc' WHERE leave_id =$id";
    $result = $connection->query($sql);

    if($result){
        echo 1;
    }
    else{
        echo 0;
    }
?>