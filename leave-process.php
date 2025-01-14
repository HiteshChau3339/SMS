<?php
      include("connection.php");
        session_start();

        $stud_id =  $_SESSION['id'];
        $leave_type = $_POST['leave_type'];
        $leave_from = $_POST['from_date'];
        $leave_to = $_POST['to_date'];
        $leave_desc = $_POST['leave_desc'];
    
        $sql = "INSERT INTO `leave` (`leave_id`, `stud_id`,`leave_type`,`leave_from`,`leave_to`, `leave_description`,`leave_status`)VALUES(null,'$stud_id','$leave_type','$leave_from','$leave_to','$leave_desc',1)";
        $result = $connection->query($sql);
        header("location:home.php");
?>