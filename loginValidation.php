<?php
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$email=$_POST['email'];
$password=$_POST['password'];
$hashedPass=password_hash($password,PASSWORD_DEFAULT);
$link=mysqli_connect('localhost','root','','todo');
if($link===false){
    echo "couldn't connect ".mysqli_connect_error();

}
else{
    if($firstName!=null && $lastName!=null &&
    $email!=null && $password!=null){
        $sql="insert into userinfo(first_name,last_name,user_email,user_password)
        values('$firstName','$lastName','$email','$hashedPass')";
        if(mysqli_query($link,$sql)){
            echo "<h3> successfull registration</h3>";
        }
        else{
            echo "please enter your details again";
        }
    }
    else{
        echo "<h4>couldn't pass an empty value</h4>";
    }
}