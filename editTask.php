<?php
    $name=$_POST['taskName'];
    $description=$_POST['taskDesc'];
    $due=$_POST['dueDate'];
    $priority=$_POST['priority'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Task Manager</title>
</head>
<body style="background-color:beige">
    <div class="container mt-5">
        <h1>Edit Task</h1>
   <form action="updateTasks.php" method="post">
    <div class="form-group">
        <label for="task-name">Task Name:</label>
        <input type="text" class="form-control" id="task-name" name="task-name" value="<?php echo $name ?>" required>
    </div>

    <div class="form-group">
        <label for="task-desc">Description:</label>
        <textarea class="form-control" id="task-desc" name="task-desc" required><?php echo $description ?></textarea>

    </div>

    <div class="form-group">
        <label for="due-date">Due Date:</label>
        <input type="date" class="form-control" id="due-date" name="due-date" value="<?php echo $due ?>" required>
    </div>

    <div class="form-group">
        <label for="priority">Priority:</label>
        <select class="form-control" id="priority" name="priority"
         value="<?php echo $priority ?>">
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