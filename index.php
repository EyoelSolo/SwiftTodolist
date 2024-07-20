<?php
    
    require_once('validateLogin.php');
    require_once('connectSql.php');
    
    
    if (!isset($_SESSION['id'])) {
        header('Location: login form.html');
        exit;
    } 

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/styles.css">
    <!-- Add custom styles -->
    <style>
        body {
            background-color: beige;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="task list.php">Task List</a></li>
            <li><a href="TaskAdd.php">Create Task</a></li>
        </ul>
    </nav>
    <?php
        $username = $_SESSION['username'];
        echo '<div class="container">';
        echo '    <h2 class="text-center">Welcome ' . $username . '!</h2>';
        echo '</div>';
    ?>
    <section id="home">
        <div class="container">
            <div class="card">
                <h2 class="card-header">Today's Tasks</h2>
                <div class="card-body">
                    <?php
                        $todaysList = todaysTasks();
                        foreach ($todaysList as $today) {
                            echo "<p class='card-text text-success'>$today</p>";
                        }
                    ?>
                </div>
            </div>
            <div class="card">
                <h2 class="card-header">Unfinished Tasks</h2>
                <div class="card-body">
                    <?php
                        $tasks = unfinishedTasks();
                        foreach ($tasks as $task) {
                            echo "<p class='card-text text-primary'>$task</p>";
                        }
                    ?>
                </div>
            </div>
            <div class="card">
                <h2 class="card-header">Tasks with Past Due Dates</h2>
                <div class="card-body">
                    <?php
                        $fastList = retrieveFastCompleted();
                        foreach ($fastList as $part) {
                            echo "<p class='card-text text-danger'>$part</p>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

