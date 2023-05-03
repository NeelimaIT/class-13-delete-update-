<?php

session_start();
include "../inc/env.php";

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['number'];
$password=$_REQUEST['password'];
$confirm_password=$_REQUEST['confirm_password'];
$enc_psk= password_hash($password, PASSWORD_BCRYPT);

$errors=[];


if(empty($name)){
    $errors['name_error']="please enter your name";
}

//* if email already exist

$query="SELECT * from users where email= '$email'";
$response = mysqli_query($conn, $query);

if(empty($email))
{
  $errors['email_error']="please enter your email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_error'] ="Please enter your valid email";
}
else if ($response->num_rows >0) {
    $errors['email_error'] ="This email already exist";
}
if((strlen($phone))!=11){
    $errors['number_error']="enter a valid number";
}

if(empty($password)){

    $errors['password_error']="please enter your password";

}else if(strlen($password)<8){
    $errors['password_error']="please enter strong password";

}
if(empty($confirm_password)){

    $errors['con_password_error']="please enter your confirm password";

}else if($password!=$confirm_password){
    $errors['con_password_error']="confirm password did not match";
}

if(count($errors)>0){
    $_SESSION['error']=$errors;
    header("location:../register.php");
}else{
    $query="INSERT INTO users(name, email, phone, password) VALUES ('$name','$email','$phone','$enc_psk')";
    $response=mysqli_query($conn,$query);
    
    
    if($response){
        header("location: ../login.php");
    }
}
?>