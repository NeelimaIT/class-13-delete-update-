<?php
require "../inc/env.php";
$id= $_GET['id'];

$query= "UPDATE banners set status = 0";
$response= mysqli_query($conn, $query);

$query= "UPDATE banners set status = 1 WHERE id= '$id'";
$response= mysqli_query($conn, $query);

if($response){
    header("location:../backened/allBanner.php");
}


?>