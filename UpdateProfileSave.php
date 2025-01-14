<?php
    include("connection.php");

    header("Content-Type:Apllication/json");

    $data = json_decode(file_get_contents('php://input'));

    $id = $data->stud_id;
    $firstname = $data->firstname;
    $lastname = $data->lastname;
    $email = $data->email;
    $gender = $data->gender;
    $phone = $data->phone;
    $address = $data->address;

    $sql = "UPDATE stud_register SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',
    `gender`='$gender',`phone`='$phone',`address`='$address' WHERE stud_id=$id";
    $result = $connection->query($sql);

    if($result){
        echo 1;
    }
    else{
        echo 0;
    }
?>