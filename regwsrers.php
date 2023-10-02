<?php

include "views/main/head.php";

if (isset($_POST['add_reg'])){

    $reg_name = $_POST['reg_name'];
    $reg_phone = $_POST['reg_phone'];
    $reg_addrwss = $_POST['reg_addrwss'];
    $reg_email = $_POST['reg_email'];
    $reg_pass = $_POST['reg_pass'];


      
    $stmt_insert_tree2 = $con->prepare("INSERT INTO `users` (`user_id`,`user_name`,`user_adress`,`user_phone`,`user_email`,`user_password`,`user_type`) 
    VALUES (null,'$reg_name','$reg_addrwss','$reg_phone','$reg_email','$reg_pass',2);");
    $stmt_insert_tree2->execute();
 
    $fmsg =   lang('تـمت إضافة المسجل بنجاح','The registrar has been added successfully');

}elseif(isset($_GET['delete'])){
  $del = $_GET['delete'];
  $sql="DELETE FROM `users` WHERE `user_id` = ? ";
  $stmt_admin_info = $con->prepare("$sql");
  $stmt_admin_info->execute(array($del));
  $fmsg = lang('تـمت حذف المسجل بنجاح','The registrar was successfully deleted');

 // header('Location: registered_index.php');


}
  
?>
  <style>
body{
    background-image:url(img/3.jpg);
    /* background-position: center; */
    background-size: cover;
   

}
input{
  text-align: <?php echo lang('right','left') ?>;

}
</style>

<body>
<?php
include "views/main/navbar.php";
?>


<!-- <div class="container" >
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8"></div>
        <div class="col-2"></div>
     </div>
    </div> -->
    <div class="container" >
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
        <?php if(isset($fmsg)){?>
                        <div class="alert alert-danger alert-dismissible fade show text-center"
                            style="    background: red; color: white;" role="alert">
                            <strong><?php echo $fmsg; ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>
        <div class="card text-white bg-dark mb-12" style="width: 100%;">
  <div class="card-header text-center"><?php echo lang('إضافة مسجل','add registrar') ?></div>
  <div class="card-body">

  <form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('إسم المسجل','registrar Name') ?> </label>
    <input  required minlength="4" type="text" name="reg_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('رقم التلفون','phone number') ?> </label>
    <input required minlength="10" type="number" name="reg_phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('عنوان المسجل','registrar address') ?> </label>
    <input required minlength="4" type="text" name="reg_addrwss" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('إيميل المسجل','registrar email') ?> </label>
    <input required type="email" name="reg_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('كلمة المرور','password') ?> </label>
    <input required minlength="4" type="text" name="reg_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 
  <button type="submit" name="add_reg" class="btn btn-primary"><?php echo lang('إضافة','Add') ?></button>
</form>
  </div>
</div>
    
</div>
</div>
        </div>
        <div class="col-1"></div>
     </div>
    </div>

<!-- ************************************************************************************************************************************************** -->
<?php
    $sql="SELECT * FROM `users`  WHERE `user_type` = 2 ";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetchAll();
?>
<div dir="<?php echo lang('rtl','ltr') ?>" class="container" style="    margin-top: 40px;         color: aliceblue;">
  <h2><?php echo lang('المسجلين','Registereds') ?></h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th><?php echo lang('#رقم','#code') ?></th>
        <th><?php echo lang('إسم المسجل','registrar  name') ?></th>
        <th><?php echo lang('رقم التلفون','phone number') ?></th>
        <th><?php echo lang('عنوان المسجل','registrar adress') ?></th>
        <th><?php echo lang('إيميل المسجل','registrar email') ?></th>
        <th><?php echo lang('كلمة المرور','password') ?></th>
        <th>
          </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $num = 1;
      foreach( $admin_info as $exm){?>
      
      <tr>
        <td><?php echo $num ?></td>
        <td><?php echo $exm['user_name'] ?></td>
        <td><?php echo $exm['user_phone'] ?></td>
        <td><?php echo $exm['user_adress'] ?></td>
        <td><?php echo $exm['user_email'] ?></td>
        <td><?php echo $exm['user_password'] ?></td>
        <td>
          <a href="?delete=<?php echo $exm['user_id']  ?>">
            <button class="btn btn-danger">
            <?php echo lang('حذف','Delete') ?>
            </button>
          </a>
      </td>
      </tr>
      <?php
    $num ++;
    } ?>
   
    </tbody>
  </table>
</div>
<?php
include "views/main/fotter.php";
?>
</body>
</html>