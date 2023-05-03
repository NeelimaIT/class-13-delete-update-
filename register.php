<?php
session_start();
include "./inc/login_header.php";

?>

<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Register</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-6 col-lg-5">
<div class="login-wrap p-4 p-md-5">
<div class="icon d-flex align-items-center justify-content-center">
<span class="fa fa-user-o"></span>
</div>
<h3 class="text-center mb-4">Have an account?</h3>
<form action="./controller/store_user.php" class="login-form" method="POST">
<div class="form-group">
<input type="text" name="name" class="form-control rounded-left" placeholder="Username">

<?php
if(isset($_SESSION['error']['name_error'])){
?>
    <span style="color:red"> <?=$_SESSION['error']['name_error']?> </span>

    <?php
}
?>

</div>
<div class="form-group d-flex">
<input type="text" name="email" class="form-control rounded-left" placeholder="your email">
<?php
if(isset($_SESSION['error']['email_error'])){
?>
    <span style="color:red"> <?=$_SESSION['error']['email_error']?> </span>

    <?php
}
?>

</div>
<div class="form-group d-flex">
<input type="number" name="number" class="form-control rounded-left" placeholder="your number">
<?php
if(isset($_SESSION['error']['number_error'])){
?>
    <span style="color:red"> <?=$_SESSION['error']['number_error']?> </span>

    <?php
}
?>

</div>
<div class="form-group d-flex">
<input type="password" name="password" class="form-control rounded-left" placeholder="Password">
<?php
if(isset($_SESSION['error']['password_error'])){
?>
    <span style="color:red"> <?=$_SESSION['error']['password_error']?> </span>

    <?php
}
?>


</div>
<div class="form-group d-flex">
<input type="password" name="confirm_password" class="form-control rounded-left" placeholder="Confirm Password">
<?php
if(isset($_SESSION['error']['con_password_error'])){
?>
    <span style="color:red"> <?=$_SESSION['error']['con_password_error']?> </span>

    <?php
}
?>

</div>
<div class="form-group d-md-flex">
<div class="w-50">
<label class="checkbox-wrap checkbox-primary">Remember Me
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</div>
<div class="w-50 text-md-right">
<a href="#">Forgot Password</a>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>

<?php

include "./inc/login_footer.php";
session_unset();

?>