<?php
include("connection.php");

header("Content-Type:Apllication/json");

$data = json_decode(file_get_contents('php://input'));

$id = $data->admin_id;
$adminImg = $data->admin_IMG;

//$updateImg = $_FILES["$adminImg"]["name"];

 $filename = $_FILES["adminImg"]["name"];
 $tmp_filename = $_FILES["adminImg"]["tmp_name"];

//$folder = addslashes(file_get_contents($_FILES["adminImg"]["tmpname"]));
$folder = "stu_img/" . $folder;


move_uploaded_file($tmp_filename, $folder);

$sql = "UPDATE `admin` SET `admin_img`='$folder' WHERE `admin_id` = $id";
$result = $connection->query($sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}
?>