<?php
$link = mysqli_connect("localhost", "root", "", "todo"); 

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$dateArray = retrieveFastCompleted();
$notDoneArray = unfinishedTasks();
$todayList = todaysTasks();






function retrieveFastCompleted()
{
    global $link;


    $doneListSql = "SELECT * FROM todolist WHERE DATE(due_date) <= CURDATE()";
    $doneResult = mysqli_query($link, $doneListSql);

    if ($doneResult) {
        $dateArray = array();


        $toDoListSql = "SELECT * FROM todolist";
        $todoResult = mysqli_query($link, $toDoListSql);

        while ($todoRow = mysqli_fetch_assoc($doneResult)) {
            $dateArray[] = $todoRow['list_name'];
        }

        return $dateArray;
    } else {
        die("Error executing query: " . mysqli_error($link));
    }
}


function unfinishedTasks()
{
    global $link;
    $notDoneArray = array();

    $doneListSql = "SELECT * FROM todolist where done=0";
    $doneResult = mysqli_query($link, $doneListSql);

    while ($doneRow = mysqli_fetch_assoc($doneResult)) {
        $notDoneArray[] = $doneRow['list_name'];
    }
    $arrayUnique=array_unique($notDoneArray);
    return $arrayUnique;
}

function todaysTasks()
{
    global $link;
    $todayList = array();

    $doneListSql = "SELECT * FROM todolist";
    $doneResult = mysqli_query($link, $doneListSql);

    $today = new DateTime('today');

    while ($doneRow = mysqli_fetch_assoc($doneResult)) {
        $dueDate = new DateTime($doneRow['due_date']);

        if ($dueDate->format('Y-m-d') === $today->format('Y-m-d')) {
            $todayList[] = $doneRow['list_name'];
        }
    }

    mysqli_free_result($doneResult);

    return $todayList;
}
?>
