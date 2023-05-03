
<?php

include './inc/backened_header.php';
include '../inc/env.php';
$id = $_REQUEST['id'];
$query ="SELECT * FROM banners WHERE id='$id'";
$response =mysqli_query($conn,$query);
$banner= mysqli_fetch_assoc($response);



?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class= "card mt-5 mx-auto col-lg-10">
    <div class="card-header">
        Edit Banner
</div>

<div class="card-body">
   <form enctype="multipart/form-data" 
   action="../controller/bannerUpdate.php" method="POST">

<input type ="hidden" name= "id" value="<?=$id?>">


   <div class="row">
    <div class="col-lg-4">

<input type="file" class="form-control imageUpload" name="banner_img">
<?php
 if (isset($_SESSION['errors']['banner_img_error'])){
    ?>
    <span style="color:red"><?= $_SESSION['errors'] ?></span>
<?php
 }
?>

<br>
<img src="../uploads/<?= $banner['banner_img']?>" class="display"
alt="" width="100%">

    </div>
    <div class="col-lg-8">
    <input type="text" class="form-control" placeholder="Title" name="title" value="<?=$banner['title']?>">
<textarea name="description"  cols="30" rows="10"
class="form-control my-2" placeholder="Description"><?=$banner['detail']?></textarea>

<input name="cta" type="text" class="form-control my-2" placeholder="Call To Action" value="<?=$banner['cta']?>">

<input name="cta_url" type="text" class="form-control my-2" placeholder="Call To Action URL" value="<?=$banner['cta_url']?>">

<input name="video_url" type="text" class="form-control my-2" placeholder="Intro Video URL" value="<?=$banner['video_url']?>">

</div>
   


<button class="btn-primary btn w-100">Submit</button>


</form>

</div>
</main>


<?php

include './inc/backened_footer.php';
unset($_SESSION['errors']);
?>
