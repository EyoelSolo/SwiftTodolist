<?php
      
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/styles.css">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <title>Task Manager</title>
</head>
<body style="background-color:beige">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="task list.php">Task List</a></li>
            <li><a href="#">Create Task</a></li>
            
        </ul>
    </nav>
    <h1>Create New Task</h1>
    <hr>
    <div class="container mt-5">
        
        <br>
        <form action="addNewTask.php" method="post">
            <div class="form-group">
                <label for="task-name">Task Name:</label>
                <input type="text" class="form-control" id="task-name" name="task-name" required>
            </div>
        
            <div class="form-group">
                <label for="task-desc">Description:</label>
                <textarea class="form-control" id="task-desc" name="task-desc" required></textarea>
            </div>
        
            <div class="form-group">
                <label for="due-date">Due Date:</label>
                <input type="date" class="form-control" id="due-date" name="due-date" required>
            </div>
        
            <div class="form-group">
                <label for="priority">Priority:</label>
                <select class="form-control" id="priority" name="priority">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
