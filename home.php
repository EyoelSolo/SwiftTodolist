<?php
    require_once('validateLogin.php');
    if(!isset($_SESSION['id'])){
        header('Location:login form.html');
        exit;
    }
    else{
        header('Location:connectSql.php');
    }
?>
<!doctype html>
<html>
    <head>
        <title>Home</title>    
        <?php echo "welcome ".$_SESSION['username'];?>
    </head>
    <body>
            
    </body>
</html>
