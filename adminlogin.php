
<style>

</style>
<?php
include "views/main/head.php";


$pagename = "admin_login";

     

 


if (isset($_POST['submit'])){
 	$email = $_POST['email'];
	$password = $_POST['password'];

    $sql="SELECT * FROM `users` WHERE	`user_email` = '$email' && `user_password`= '$password'";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetch();
    $admin_count = $stmt_admin_info->rowCount();

    if($admin_count == 0){
        $fmsg = "Sorry, the login information is incorrect"; 
     }else{
         $_SESSION['user_id'] =  $admin_info['user_id'];
         $_SESSION['user_name'] =  $admin_info['user_name'];
         $_SESSION['user_type'] =  $admin_info['user_type'];

         $user_type = $admin_info['user_type'];

         if($user_type == 1){
            header('Location: admin_index.php');

         }elseif($user_type == 2){
            header('Location: regwsrers_index.php');

         }elseif($user_type == 3){
          header('Location: doctors_index.php');

       }
     }

   
}
?>
<link rel="stylesheet" href="css/adminlogin.css">
<body  dir="<?php echo lang('rtl','ltr') ?>">
  
<?php
$this_index = '';
include "views/main/navbar.php";
?>
<div class="container" dir="<?php echo lang('rtl','ltr') ?>">
<div class="row" >

<form dir="<?php echo lang('rtl','ltr') ?>" action="" method="post">
    <span class="lbl"><?php echo lang(' تسجيل الدخول','sign in') ?></span></br></br>
  <div class="form-group">
    <label class="lbl"  for="exampleInputEmail1"><?php echo lang('الايميل','Email') ?></label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label  class="lbl" for="exampleInputPassword1">
      
      <?php echo lang('كلمة المرور','password') ?>


    </label>
    <input minlength="4" name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <?php if(isset($fmsg)){?>
                        <div class="alert alert-danger alert-dismissible fade show text-center"
                            style="    background: red;    width: 149%;     color: white;" role="alert">
                            <strong><?php echo $fmsg; ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>

  <button type="submit" name="submit" class="btn btn-primary"> <?php echo lang(' دخول','sing in') ?></button>
</form>


</div>
</div>

<?php
include "views/main/fotter.php";
?>

</body>

