<?php

include "views/main/head.php";

if (isset($_POST['add_exm'])){

    $ex_name = $_POST['ex_name'];

      
    $stmt_insert_tree2 = $con->prepare("INSERT INTO `examintions` (`ex_id`,`ex_name`) 
    VALUES (null,'$ex_name');");
    $stmt_insert_tree2->execute();
 
    $fmsg =   lang('تـمت إضافة الفحص بنجاح','The examintion has been added successfully');

}elseif(isset($_GET['delete'])){
  $del = $_GET['delete'];
  $sql="DELETE FROM `examintions` WHERE `ex_id` = ? ";
  $stmt_admin_info = $con->prepare("$sql");
  $stmt_admin_info->execute(array($del));
  $fmsg = lang('تـمت حذف الفحص بنجاح','The examintion was successfully deleted');
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
<body dir="rtl">
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
  <div class="card-header text-center"><?php echo lang('إضافة فحص','Add Examination') ?></div>
  <div class="card-body">

  <form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('إسم الفحص','Examination Name') ?> </label>
    <input  required minlength="4" type="text" name="ex_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 
  <button type="submit" name="add_exm" class="btn btn-primary"><?php echo lang('إضافة','Add') ?></button>
</form>
  </div>
</div>
<!-- ************************************************************************************************************************************************** -->
        </div>
        <div class="col-1"></div>
 
<?php
    $sql="SELECT * FROM `examintions` ";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetchAll();
?>
<div dir="<?php echo lang('rtl','ltr') ?>" class="container" style="    margin-top: 40px;  color: aliceblue;">
  <h2><?php echo lang('الفحوصات المسجلة','recorded examination') ?></h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th><?php echo lang('#رقم','#code') ?></th>
        <th><?php echo lang('إسم الفحص','examination name') ?></th>
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
        <td><?php echo $exm['ex_name'] ?></td>
        <td>
          <a href="?delete=<?php echo $exm['ex_id']  ?>">
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