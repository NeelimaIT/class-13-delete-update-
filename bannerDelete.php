<?php

$id = $_REQUEST['id'];
include "../inc/env.php";
$query = "SELECT banner_img from banners WHERE id = '$id'";

$response = mysqli_query($conn, $query);
$banner =mysqli_fetch_assoc($response);
$path ="../uploads/" . $banner['banner_img'];

//Banner file exist
if(file_exists($path)){
    unlink($path);
}


$query = "DELETE FROM banners WHERE id = '$id'";
$response = mysqli_query($conn, $query);
?>