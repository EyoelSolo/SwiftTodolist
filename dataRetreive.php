<?php
require_once("connectSql.php");
function retreiveTasks($newValue){
    global $link;
    $value=$newValue;
    if($newValue==".FEmpty"){
        $value= "";
    }
    $toDoList = array();
  
    // SQL query to get all tasks from the todolist table
    
    $doneListSql = "SELECT * FROM todolist where done=0;";
    $doneResult = mysqli_query($link, $doneListSql);

    // Check if the query was successful
    if (!$doneResult) {
        die("Error executing query: " . mysqli_error($link));
    }

    // Get today's date as a DateTime object
    $today = new DateTime('today');
    while ($doneRow = mysqli_fetch_assoc($doneResult)) {
         if( $value=='')  {
            $tempArray=array();
            $tempArray[]=$doneRow['list_name'];
            $tempArray[]=$doneRow['list_description'];
            $tempArray[]=$doneRow['due_date'];
            $tempArray[]=$doneRow['priority'];
            $tempArray[]=$doneRow['list_id'];
            $toDoList[]=$tempArray;
         }
         else{
            if(strpos($doneRow['list_name'], $value) !==false ){
                    
                    $tempArray=array();
                    $tempArray[]=$doneRow['list_name'];
                    $tempArray[]=$doneRow['list_description'];
                    $tempArray[]=$doneRow['due_date'];
                    $tempArray[]=$doneRow['priority'];
                    $tempArray[]=$doneRow['list_id'];
                    $toDoList[]=$tempArray;
                }
            else{
                continue;
            }
         }
        }
    return $toDoList;
    }

function deleteFunction($value){
    global $link;
    $insertSql = "INSERT INTO donelist (completion_date, list_id) VALUES (?, ?)";
    $setStmt = "UPDATE todolist SET done = 1 WHERE list_id = '$value'";
    $insertStmt = mysqli_prepare($link, $insertSql);
    $today = date("Y-m-d");
    mysqli_stmt_bind_param($insertStmt, "ss", $today, $value);
    mysqli_stmt_execute($insertStmt);
    mysqli_query($link, $setStmt);
    //header("Location:task list.php");
    //exit;
}
?>