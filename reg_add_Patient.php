<?php

include "views/main/head.php";

if (isset($_POST['add_reg'])){

    $pat_name = $_POST['pat_name'];
    $pat_phone = $_POST['pat_phone'];
    $pat_exam = $_POST['pat_exam'];
    $pat_doc = $_POST['pat_doc'];
    $pate_regesterd = $_SESSION['user_name'];


      
    $stmt_insert_tree2 = $con->prepare("INSERT INTO `patients` (`pat_id`, `pat_name`, `pat_phone`, `pat_exm`, `doc_email`, `doc_message`, `reg_date`,`pate_regesterd`)
     VALUES (NULL, '$pat_name', '$pat_phone', '$pat_exam', '$pat_doc', '', current_timestamp(),'$pate_regesterd' );");
    $stmt_insert_tree2->execute();
 
    $fmsg =   lang('تـمت إضافة المريض بنجاح','The patient has been added successfully');

}elseif(isset($_GET['delete'])){
  $del = $_GET['delete'];
  $sql="DELETE FROM `patients` WHERE `pat_id` = ? ";
  $stmt_admin_info = $con->prepare("$sql");
  $stmt_admin_info->execute(array($del));
  $fmsg = lang('تـمت حذف المريض بنجاح','The patient was successfully deleted');

 // header('Location: registered_index.php');


}
  
?>
  <style>
body{
    background-image:url(img/3.jpg);
    /* background-position: center; */
    background-size: cover;
   

}
input,select{
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
  <div class="card-header text-center"><?php echo lang('إضافة مريض','Add patient') ?></div>
  <div class="card-body">

  <form dir="rtl" method="post" action="">

  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('إسم المريض','patient Name') ?> </label>
    <input required minlength="4" type="text" name="pat_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('رقم التلفون','phone number') ?> </label>
    <input required minlength="10" type="number" name="pat_phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('الفحص','Examination') ?> </label>
    <!-- *********************************************************************************** -->
    <?php
    $sql="SELECT * FROM `examintions`";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetchAll();

    ?>
        <!-- *********************************************************************************** -->

    <select name="pat_exam" class="form-control">
        <?php
        foreach($admin_info as $exm){
            ?>
                    <option value="<?php echo $exm['ex_name'] ?>"><?php echo $exm['ex_name'] ?></option>


            <?php
        }
        ?>

    </select>
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('الطبيب','Doctor') ?> </label>
    <!-- *********************************************************************************** -->
    <?php
    $sql="SELECT * FROM `doctors`";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetchAll();

    ?>
        <!-- *********************************************************************************** -->

    <select name="pat_doc" class="form-control">
        <?php
        foreach($admin_info as $exm){
            ?>
                    <option value="<?php echo $exm['doc_name'] ?>"><?php echo $exm['doc_name'] ?></option>


            <?php
        }
        ?>

    </select>
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
    $sql="SELECT * FROM `patients`  WHERE  `doc_message` = ''  ORDER BY `pat_id` DESC";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetchAll();
?>
<div dir="<?php echo lang('rtl','ltr') ?>" class="container" style="    margin-top: 40px;         color: aliceblue;">
  <h2><?php echo lang('المرضى','patients ') ?></h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th><?php echo lang('#رقم','#code') ?></th>
        <th><?php echo lang('الرقم المتسلسل','serial number') ?></th>
        <th><?php echo lang('إسم المريض','patient name') ?></th>
        <th><?php echo lang('تلفون المريض','patient phone') ?></th>
        <th><?php echo lang(' الفحص','examination') ?></th>
        <th><?php echo lang(' الطبيب','Doctor') ?></th>
        <th><?php echo lang('المسجل','registrar') ?></th>
        <th><?php echo lang('تاريخ التسجيل','registration date') ?></th>
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
        <td><?php echo $exm['pat_id'] ?></td>
        <td><?php echo $exm['pat_name'] ?></td>
        <td><?php echo $exm['pat_phone'] ?></td>
        <td><?php echo $exm['pat_exm'] ?></td>
        <td><?php echo $exm['doc_email'] ?></td>
        <td><?php echo $exm['pate_regesterd'] ?></td>
        <td><?php echo $exm['reg_date'] ?></td>
        <td>
          <a href="?delete=<?php echo $exm['pat_id']  ?>">
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