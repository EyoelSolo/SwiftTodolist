<?php
    
    require_once('validateLogin.php');
    require_once('connectSql.php');
    
    
    if (!isset($_SESSION['id'])) {
        header('Location: login form.html');
        exit;
    } else {
        $username = $_SESSION['username'];
        echo "<h2>Welcome $username</h2>"; // Corrected the heading tag
        
        
    }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="static/styles.css">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="task list.php">Task List</a></li>
            <li><a href="Task Add.html">Create Task</a></li>
            
        </ul>
    </nav>

    <section id="home">
        <h1>Overview of Tasks</h1>
        <div class="container">
            <div class="card">
                <h2>Today's Tasks</h2>
                <?php
                    $todaysList=todaysTasks();
                    foreach ($todaysList as $today) {
                        echo "<h3 style='color:Green'> $today </h3>";  
                    }
                    ?>
            </div>
            <div class="card">
                <h2>Unfinished Tasks</h2>
                <?php
                    $tasks=unfinishedTasks();
                    foreach( $tasks as $task ) {
                        echo "<h3 style='color:Blue'> $task </h3>"; 
                    }
                    ?>
            </div>
            <div class="card">
                <h2>Tasks with past due dates</h2>
                <?php
                    $fastList = retrieveFastCompleted();
                    
                    foreach ($fastList as $part) {
                        echo "<h3 style='color:RED';>$part</h3>";

                    }
                ?>
            </div>
        </div>
    </section>
</body>
</html>
