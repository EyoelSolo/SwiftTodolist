<?php



$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];

$email_err = $password_err = $confirm_password_err = $firstName_err=$lastName_err="";


$hashedPass = password_hash($password, PASSWORD_DEFAULT);


$link = mysqli_connect('localhost', 'root', '', 'todo');
if ($link === false) {
    echo "Couldn't connect to the database: " . mysqli_connect_error();
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty(trim($firstName))) {
            $firstName_err = "First name cannot be empty";
        } else {
        
        }

        
        if (empty(trim($lastName))) {
            $lastName_err = "Last name cannot be empty";
        } else {
        
        }

        
        if (empty(trim($email))) {
            $email_err = "Empty Email field";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
        } else {
            
            $sql = "SELECT * FROM users WHERE email = ?";
            
            if ($stmt = mysqli_prepare($link, $sql)) {
                
                mysqli_stmt_bind_param($stmt, "s", $email);
                
                
                if (mysqli_stmt_execute($stmt)) {
                    
                    mysqli_stmt_store_result($stmt);
                    
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $email_err = "This email is already registered.";
                    } else {
       
       
                        $username = $email;
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

       
                mysqli_stmt_close($stmt);
            }
        }
        
       
        if (empty(trim($password))) {
            $password_err = "Password cannot be empty";
        } elseif (strlen(trim($password)) < 6) {
            $password_err = "Password must have at least 6 characters.";
        } else {
       
        }
        
       
        $confirm_password = $_POST["confirm_password"]; // Assuming you have this field in your form
        if (empty(trim($confirm_password))) {
            $confirm_password_err = "Please confirm password.";
        } elseif ($password != $confirm_password) {
            $confirm_password_err = "Password did not match.";
        } else {
       
        }
        
       
        if (empty($email_err) && empty($password_err) && empty($confirm_password_err) 
        && empty($lastName_err)&& empty($firstName_err)) {
       
            $sql = "INSERT INTO userinfo (first_name,last_name,user_email, user_password) VALUES (?, ?,?,?)";
            
            if ($stmt = mysqli_prepare($link, $sql)) {
       
                mysqli_stmt_bind_param($stmt, "ssss",$firstName,$lastName, $email, $hashedPass);
                
       
                if (mysqli_stmt_execute($stmt)) {
       
                    header("location: login form.html");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                mysqli_stmt_close($stmt);
            }
        }
        
       
        mysqli_close($link);
    }
}
?>
