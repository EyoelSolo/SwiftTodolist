<?php
ob_start();

require_once('dataRetreive.php');

$valuesOfSearch=".FEmpty";
if (isset($_POST['search'])){
    $valuesOfSearch=$_POST['search'];
    
}

if($valuesOfSearch==""){
    $valuesOfSearch=".FEmpty";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    
    <link rel="stylesheet" href="static/css/bootstrap.css">
    <link rel="stylesheet" href="static/styles.css">
    
    <style>
        body {
            background-color: #fff; 
            color: #000; 
        }
        .task-container {
            padding: 20px;
        }
        .task-item {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }
        .task-details th {
            font-weight: bold;
        }
        .task-priority.high {
            color: red; 
        }
        
    </style>
    


</head>
<body style="background-color:beige">
<nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="task list.php">Task List</a></li>
            <li><a href="TaskAdd.php">Create Task</a></li>
           
        </ul>
    </nav>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="search" placeholder="Search tasks...">
        <input type="submit" value="Search">
        
    </form>
    <section id="task-list">
        <div class="container task-container">
            <?php
            $tasks = retreiveTasks($valuesOfSearch);
            echo "<h1 class='text-center'>Task List</h1>";
            echo "<hr>";
            foreach ($tasks as $task) {
                
                $name = $task[0];
                $description = $task[1];
                $dueDate = $task[2];
                $priority = $task[3];
                $task_id=$task[4];
                
                ?>
                    
                
                <div class="task-item">
                <form id="myForm" method="post" action="delete_task.php">
                    <div class="form-check">
                    <input type="hidden" id="description" name="taskId"  value="<?php echo $task_id; ?>">
                        <input type="checkbox" onChange="document.getElementById('myForm').submit()" class="form-check-input" id="taskCheckbox"> 
                        <label class="form-check-label" for="taskCheckbox">Mark Task Done</label>
                        
                    </div>
                </form>
                    <table class="table task-details">
                        <tr>
                            <th>Task Name</th>
                            <td><?php echo $name; ?></td>
                        </tr>
                        <tr>
                            <th>Task Description</th>
                            <td><?php echo $description; ?></td>
                        </tr>
                        <tr>
                            <th>Due Date</th>
                            <td><?php echo $dueDate; ?></td>
                        </tr>
                        <tr>
                            <th>Priority</th>
                            <td><span class="task-priority high"><?php echo $priority; ?></span></td>
                        </tr>
                    </table>
                    <div class="task-actions">
                        <form action="editTask.php" method="post">
                            <button type="submit" class="btn btn-primary edit-btn">Edit</button>
                            <input type="hidden" id="task-name" name="taskName"  value="<?php echo $name; ?>">
                            <input type="hidden" id="description" name="taskDesc"  value="<?php echo $description; ?>">
                            <input type="hidden" id="dueDate" name="dueDate"  value="<?php echo $dueDate; ?>">
                            <input type="hidden" id="priority" name="priority"  value="<?php echo $priority; ?>">
                        </form>
                    
                        <form action="deleteATask.php" method="post">
                            <input type="hidden" id="description" name="taskId"  value="<?php echo $task_id; ?>">
                            <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>    
    <script>
   function deleteTask(checkbox,taskId) {
            fetch('delete_task.php', {
                method: 'POST',
                body: JSON.stringify({ taskId: taskId  }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response from PHP:', data);

            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

</script>

</body>
</html>
