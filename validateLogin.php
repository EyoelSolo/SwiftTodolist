<?php
session_start();
require_once("connectSql.php");




$email = $password = "";
$email_err = $password_err = $login_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {

        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format.";
        }
    }


    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }


    if (empty($email_err) && empty($password_err)) {

        $sql = "SELECT user_id, first_name, user_password FROM userInfo WHERE user_email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $email);


            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_store_result($stmt);


                if (mysqli_stmt_num_rows($stmt) == 1) {

                    mysqli_stmt_bind_result($stmt, $id, $firstName, $hashed_password);
                    
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {

                            


                            $_SESSION['loggedin'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['email'] = $email;
                            $_SESSION['username']=$firstName;



                            header("location:index.php");
                            
                            exit; 
                        } else {
                            
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    
                    $login_err = "Invalid email or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }

    
    mysqli_close($link);
}
?>


<?php if (!empty($login_err)) {
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
} ?>
