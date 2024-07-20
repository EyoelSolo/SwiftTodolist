<?php
require_once("connectSql.php");
require_once("delete_task.php");
$value=$_POST['taskId'];
echo $value;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $link;
    
    $setStmt = "DELETE FROM donelist WHERE list_id = '$value'";
    $result = mysqli_query($link, $setStmt);

    if ($result) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }
   
        
        
    }
