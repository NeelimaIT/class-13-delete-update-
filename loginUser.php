<?php
session_start();

include "../inc/env.php";
$email= $_REQUEST['email'];
$password= $_REQUEST['password'];

$query= "SELECT * from users WHERE email= '$email'";
$response= mysqli_query($conn , $query);
$user=mysqli_fetch_assoc($response);


//*Login portion

if($response->num_rows >0){
    //*Email exist db
 $ispasswordTrue=password_verify($password, $user['password']);
if($ispasswordTrue){
    $_SESSION['auth']= $user;
    header("Location: ../backened/dashboard.php");
}
else{
    $_SESSION['error_msg']= "Please enter a valid password";
    header("location: ../login.php");
}

}else {
    $_SESSION['error_msg']= "Please enter a valid email address";
    header("location: ../login.php");

}



?>