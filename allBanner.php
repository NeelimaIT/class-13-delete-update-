<?php

include './inc/backened_header.php';
require "../inc/env.php";
$query="SELECT * FROM banners ";
$response= mysqli_query($conn,$query);
$banners=mysqli_fetch_all($response,1);




?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<h2>All Banner Here</h2>

<table class="table table-responsive">
    <tr>
        <th>#</th>
        <th>Banner Title</th>
        <th>Banner Desc</th>
        <th>Banner Image</th>
        <th>Status</th>
        <th>Actions</th>

</tr>

<?php
foreach($banners as $key=>$banner){
    ?>
    <tr>
    <td>
        <?=++$key ?>
    </td>
    <td>
    <?=$banner['title']?>
    </td>
    <td>
    <?=strlen($banner['detail'])>30 ? 
    substr($banner['detail'], 0,30). "..." : $banner['detail']?>
    </td>
    <td>
   <img width="150px"src=" <?="../uploads/" . $banner['banner_img']?>"alt="">
    </td>
    <td>

<span class="btn btn-sm btn-<?= $banner['status']==1 ? 'success' :'danger'?>">
    <?= $banner['status']==1 ? 'Active' :'Deactive'?></span>

</td>
    <td>
    <a href="../controller/bannerStatus.php?id=<?=$banner['id']?>]" class="btn btn-warning">
    <?= $banner['status']==1 ? 'Deactive' :'Active'?>
    </a>
        <a href="./editBanner.php?id=<?=$banner['id']?>" class="btn btn-primary">Edit</a>
        <a href="../controller/bannerDelete.php?id=<?=$banner['id'] ?>" class="btn btn-danger
        deleteBtn">Delete</a>
    </td>
</tr>
<?php
}
?>




</table>

</main>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(function(){
    //*jquery
  

   let deleteBtn = $('.deleteBtn')

   
   deleteBtn.click(function (event){
event.preventDefault()

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = $(this).attr('href')
    
  }
})

   })

})
    </script>



<?php

include './inc/backened_footer.php';

?>