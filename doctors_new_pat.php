<?php

include "views/main/head.php";

if (isset($_POST['add_msg'])){

    $pat_id  = $_POST['pat_id'];
    $doc_message = $_POST['doc_message'];
 


      
    $stmt_insert_tree2 = $con->prepare("UPDATE `patients` SET `doc_message` = '$doc_message' WHERE `pat_id` = '$pat_id' ");
    $stmt_insert_tree2->execute();
 
    $fmsg =   lang('تـمت ارسال الرسالة بنجاح','The message has been sent successfully');


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


<!-- ************************************************************************************************************************************************** -->
<?php
    $doc_regesterd = $_SESSION['user_name'];

    $sql="SELECT * FROM `patients` WHERE `doc_email` =  '$doc_regesterd' && `doc_message` = ''  ORDER BY `pat_id` DESC";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetchAll();
?>
<div dir="<?php echo lang('rtl','ltr') ?>" class="container" style="    margin-top: 40px;         color: aliceblue;">
  <h2><?php echo lang('المرضى','Patients') ?></h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th><?php echo lang('الرقم المتسلسل','serial number') ?></th>
        <th><?php echo lang('إسم المريض','Patient name') ?></th>
        <th><?php echo lang('تلفون المريض','patient phone') ?></th>
        <th><?php echo lang(' الفحص','examination') ?></th>
        <th><?php echo lang('المسجل','registrar') ?></th>
        <th><?php echo lang('الرسالة',' message ') ?></th>
        <th>
          </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $num = 1;
      foreach( $admin_info as $exm){?>
      
      <tr>
        <td><?php echo $exm['pat_id'] ?></td>
        <td><?php echo $exm['pat_name'] ?></td>
        <td><?php echo $exm['pat_phone'] ?></td>
        <td><?php echo $exm['pat_exm'] ?></td>
        <td><?php echo $exm['pate_regesterd'] ?></td>
        <td><?php echo $exm['doc_message'] ?></td>
        <td>
            <button data-id="<?php echo $exm['pat_id']?>" class="btn btn-success edit" data-toggle="modal" data-target="#exampleModal">
            <?php echo lang('تحرير','edit') ?>
            </button>
      </td>
      </tr>
      <?php
    $num ++;
    } ?>
   
    </tbody>
  </table>
</div>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div dir="<?php   echo lang('rtl','ltr') ?>" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('الرسالة ','message') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- ************************************************************************************************* -->
          <form dir="rtl" method="post" action="">
              <input type="hidden" name="pat_id" id="pat_id" value="">

  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('رسالة للمريض','message to the patient') ?> </label>
    <input required type="text" name="doc_message" id="doc_message" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo lang('إغلاق','close') ?></button>
        <button type="submit" name="add_msg" class="btn btn-primary"><?php echo lang('إضافة','Add') ?></button>
      </div>
    </div>
  </div>
</div>
</form>

<?php
include "views/main/fotter.php";
?>
<script>
    $(".edit").on("click",function(){
        var id = $(this).data("id");
        $("#pat_id").val(id);
    })
</script>
</body>
</html>