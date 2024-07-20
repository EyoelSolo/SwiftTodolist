<?php
session_start();

require_once 'connectSql.php';


    $name = $_POST['task-name'];
   
    $description = $_POST['task-desc'];
    
    $dueDate = $_POST['due-date'];
    
    $priority = $_POST['priority'];
    
    $today = date("Y-m-d");
    
    $userId = $_SESSION['id']; 
    
    try {
        
        $stmt = $link->prepare("INSERT INTO todolist (list_name, list_description, due_date, added_date, user_id, priority) 
                                VALUES (?, ?, ?, ?, ?, ?)");

        
        $stmt->bind_param("ssssis", $name, $description, $dueDate, $today, $userId, $priority);

        
        if ($stmt->execute()) {
           
        } else {
            echo "<script>alert('error check your data');</script>";
        }

        
        $stmt->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
    
    $link->close();
    header("Location:task list.php");
    exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Task Manager</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Create New Task</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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

