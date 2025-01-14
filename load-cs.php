<?php
    include("connection.php");
    $sql = "SELECT *FROM `stud_class`";
    $result = $connection->query($sql);
    $str="";
    while($row=$result->fetchAll(PDO::FETCH_ASSOC)){
        $str .= "<option value='{$row['class_id']}'>{$row['course']}</option>";
    }
    echo $str;
?>