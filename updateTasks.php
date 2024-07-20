<?php
session_start();
require_once("connectSql.php");
$taskName=$_POST['task-name'];
$taskDes=$_POST['task-desc'];
$taskDue=$_POST['due-date'];
$taskPrior=$_POST['priority'];
$id=$_SESSION['id'];
$sql = "UPDATE todolist SET
        list_name = '$taskName',
        list_description = '$taskDes',
        due_date = '$taskDue',
        priority = '$taskPrior'
        WHERE list_id = $id";
if (mysqli_query($link, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($link);
}
header("Location:task list.php");
exit;