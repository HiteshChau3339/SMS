<?php
include("connection.php");
header('Content-Type:Application/json');

$data = json_decode(file_get_contents('php://input'));


$id = $data->deleteStudId;

$sql = "DELETE FROM stud_register WHERE stud_id=$id";
$result = $connection->query($sql);
if ($result) {
    echo 1;
} else {
    echo 0;
}


?>