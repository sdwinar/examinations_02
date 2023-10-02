<?php

include "views/main/head.php";

if (isset($_POST['add_doc'])){

    $doc_name = $_POST['doc_name'];
    $doc_phone = $_POST['doc_phone'];
    $doc_specialty = $_POST['doc_specialty'];
    $doc_email = $_POST['doc_email'];
    $doc_pass = $_POST['doc_pass'];


      
    $stmt_insert_tree2 = $con->prepare("INSERT INTO `doctors` (`doc_id`,`doc_name`,`doc_phone`,`doc_specialty`,`doc_email`,`doc_pass`) 
    VALUES (null,'$doc_name','$doc_phone','$doc_specialty','$doc_email','$doc_pass');");

        $stmt_insert_tree2->execute();

              
    $stmt_insert_tree2 = $con->prepare("INSERT INTO `users` (`user_id`,`user_name`,`user_adress`,`user_phone`,`user_email`,`user_password`,`user_type`) 
    VALUES (null,'$doc_name','$doc_specialty','$doc_phone','$doc_email','$doc_pass',3);");
    $stmt_insert_tree2->execute();
 
    $fmsg =   lang('تـمت إضافة الطبيب بنجاح','The doctor has been added successfully');

}elseif(isset($_GET['delete'])){
  $del = $_GET['delete'];
  $sql="DELETE FROM `users` WHERE `user_email` = ? ";
  $stmt_admin_info = $con->prepare("$sql");
  $stmt_admin_info->execute(array($del));

  $sql="DELETE FROM `doctors` WHERE `doc_email` = ? ";
  $stmt_admin_info = $con->prepare("$sql");
  $stmt_admin_info->execute(array($del));
  $fmsg = lang('تـمت حذف الطبيب  بنجاح','The doctor has been removed successfully');
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
    <div class="container" >
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
        <?php if(isset($fmsg)){?>
                        <div class="alert alert-danger alert-dismissible fade show text-center"
                            style="    background: red;     color: white;" role="alert">
                            <strong><?php echo $fmsg; ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>
<div class="card text-white bg-dark mb-12" style="width: 100%;">
  <div class="card-header text-center"><?php echo lang('إضافة طبيب','Add doctor') ?></div>
  <div class="card-body">

  <form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('إسم الطبيب','Doctor name') ?> </label>
    <input required minlength="4" type="text" name="doc_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('رقم التلفون','phone number') ?> </label>
    <input required minlength="10" type="number" name="doc_phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('تخصص الطبيب','Doctor specialty') ?> </label>
    <input required minlength="4" type="text" name="doc_specialty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('إيميل الطبيب','Doctor email') ?> </label>
    <input required type="email" name="doc_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('كلمة المرور','password') ?> </label>
    <input required minlength="4" type="text" name="doc_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 
  <button type="submit" name="add_doc" class="btn btn-primary"><?php echo lang('إضافة','Add') ?></button>
</form>
  </div>
</div>
    
</div>
</div>
<!-- ************************************************************************************************************************************************** -->
        </div>
        <div class="col-1"></div>
    
<?php
    $sql="SELECT * FROM `doctors` ";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetchAll();
?>
<div dir="<?php echo lang('rtl','ltr') ?>" class="container" style="    margin-top: 40px;     color: aliceblue;">
  <h2><?php echo lang('الاطباء المسجلين','Registered Doctors') ?></h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th><?php echo lang('#رقم','#code') ?></th>
        <th><?php echo lang('إسم الطبيب','Doctor name') ?></th>
        <th><?php echo lang('رقم الطبيب','phone number') ?></th>
        <th><?php echo lang('تخصص الطبيب','Doctor specialty') ?></th>
        <th><?php echo lang('إيميل الطبيب','Doctor email') ?></th>
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
        <td><?php echo $exm['doc_name'] ?></td>
        <td><?php echo $exm['doc_phone'] ?></td>
        <td><?php echo $exm['doc_specialty'] ?></td>
        <td><?php echo $exm['doc_email'] ?></td>
        <td><?php echo $exm['doc_pass'] ?></td>
        <td>
          <a href="?delete=<?php echo $exm['doc_email']  ?>">
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