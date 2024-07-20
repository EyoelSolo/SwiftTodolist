<?php
session_start();
// Include your database connection file (e.g., db.php)
require_once 'connectSql.php';

// Start the session (if not already started)

echo "inside post";

   
    // Retrieve form data
    $name = $_POST['task-name'];
    echo "todayh";
    $description = $_POST['task-desc'];
    echo "tfoday";
    $dueDate = $_POST['due-date'];
    echo "todaye";
    $priority = $_POST['priority'];
    echo "todayq";
    $today = date("Y-m-d");
    echo "today";
    $userId = $_SESSION['id']; // Make sure the session is properly set
    echo $userId;
    try {
        // Create a prepared statement
        $stmt = $link->prepare("INSERT INTO todolist (list_name, list_description, due_date, added_date, user_id, priority) 
                                VALUES (?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("ssssis", $name, $description, $dueDate, $today, $userId, $priority);

        // Execute the query
        if ($stmt->execute()) {
            echo "Task added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close the database connection
    $link->close();

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
            
                <label for="task-name">Task Name:</label>
                <input type="text" class="form-control" id="task-name" name="task-name" required>
          
        
            
                <label for="task-desc">Description:</label>
                <textarea class="form-control" id="task-desc" name="task-desc" required></textarea>
            
        
            
                <label for="due-date">Due Date:</label>
                <input type="date" class="form-control" id="due-date" name="due-date" required>
            
        
            
                <label for="priority">Priority:</label>
                <select class="form-control" id="priority" name="priority">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            
        
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>

