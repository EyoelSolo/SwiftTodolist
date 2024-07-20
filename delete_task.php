<?php
require_once("connectSql.php");
   
        $setStmt = "UPDATE todolist SET done = 1 WHERE list_id = '$value'";
       
        $today = date("Y-m-d");
        
        mysqli_query($link, $setStmt);
        
    
            
            
         
    

$value=$_POST['taskId'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $link;
    $insertSql = "INSERT INTO donelist (completion_date, list_id) VALUES (?, ?)";
    $setStmt = "UPDATE todolist SET done = 1 WHERE list_id = '$value'";
    $insertStmt = mysqli_prepare($link, $insertSql);
    $today = date("Y-m-d");
    mysqli_stmt_bind_param($insertStmt, "ss", $today, $value);
    mysqli_stmt_execute($insertStmt);
    mysqli_query($link, $setStmt);
    echo $value;
   header("Location:task list.php");
   exit;
        
        
    }



?>