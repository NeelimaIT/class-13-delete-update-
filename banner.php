
<?php

include './inc/backened_header.php';

?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class= "card mt-5 mx-auto col-lg-10">
    <div class="card-header">
        Add Banner
</div>

<div class="card-body">
   <form enctype="multipart/form-data" 
   action="../controller/bannerStore.php" method="POST">

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
<img src="" class="display"
alt="" width="100%">

    </div>
    <div class="col-lg-8">
    <input type="text" class="form-control" placeholder="Title" name="title">
<textarea name="description"  cols="30" rows="10"
class="form-control my-2" placeholder="Description"></textarea>

<input name="cta" type="text" class="form-control my-2" placeholder="Call To Action">

<input name="cta_url" type="text" class="form-control my-2" placeholder="Call To Action URL">

<input name="video_url" type="text" class="form-control my-2" placeholder="Intro Video URL">

</div>
   


<button class="btn-primary btn w-100">Submit</button>


</form>

</div>
</main>


<?php

include './inc/backened_footer.php';
unset($_SESSION['errors']);
?>
