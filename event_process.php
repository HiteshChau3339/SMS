<?php
 include("connection.php");

 $eventName = $_POST['eventname'];
 $eventCategory = $_POST['eventCategory'];
 $eventDate = $_POST['EventDate'];
 $regStartDate = $_POST['regStartDate'];
 $regEndDate = $_POST['regEndDate'];
 $eventDesc=$_POST['eventDesc'];
 
 $sql = "INSERT INTO `event` VALUES (null,'$eventName','$eventCategory','$eventDate','$regStartDate','$regEndDate','$eventDesc')";
 $result = $connection->query($sql);

 echo "<script>alert('Added.....');
     window.location.href = 'view_event.php';
     </script>";

?>
?>