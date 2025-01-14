<?php
    include("connection.php");

    $stud_id = $_POST['stud_id'];
    $subject = $_POST['subject'];
    $post_date = $_POST['post_date'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `notice` (`notice_id`, `stud_id`, `date`, `subject`, `message`)VALUES(null,'$stud_id','$post_date','$subject','$message')";
    $result = $connection->query($sql);
    header("location:manageNotice.php");
?> 