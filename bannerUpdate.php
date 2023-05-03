<?php

include "../inc/env.php";

$title= $_REQUEST['title'];
$description= $_REQUEST['description'];
$cta= $_REQUEST['cta'];
$cta_url= $_REQUEST['cta_url'];
$video_url= $_REQUEST['video_url'];
$banner_img= $_FILES['banner_img'];
$id = $_REQUEST['id'];


if($banner_img['size']>0){

//*user update if we have image
$query = "SELECT banner_img from banners WHERE id = '$id'";
$response = mysqli_query($conn,$query);
$banner =mysqli_fetch_assoc($response);
$path= "../uploads/".$banner['banner_img'];

//*banner file exist
if(file_exists($path)){
    unlink($path);
}

//*banner image process
$ext = pathinfo($banner_img['name'], PATHINFO_EXTENSION);
$newFileName ="Banner" . uniqid() . '.' .$ext;
print_r($banner_img);
$uploads = move_uploaded_file($banner_img['tmp_name'],"../uploads/$newFileName");

//*update db

$query = "UPDATE banners SET title='$title',detail='$description',cta='$cta',cta_url='$cta_url',video_url='$video_url',
banner_img='$newFileName' WHERE id= '$id'";

$response= mysqli_query($conn, $query);
if($response){
    header("Location: ../backened/allBanner.php");
}

}else{
    $query = "UPDATE banners SET title='$title',detail='$description',cta='$cta',cta_url='$cta_url',video_url='$video_url'
     WHERE id= '$id'";

$response= mysqli_query($conn, $query);
if($response){
    header("Location: ../backened/allBanner.php");
}

}

?>