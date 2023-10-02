<?php

include "views/main/head.php";
 
  
?>
  <style>
body{
    background-image:url(img/3.jpg);
    /* background-position: center; */
    background-size: cover;
   

}
</style>

<body>
<?php
include "views/main/navbar.php";
?>


<!-- ************************************************************************************************************************************************** -->
<?php
    $doc_regesterd = $_SESSION['user_name'];

    $sql="SELECT * FROM `patients` WHERE  `doc_message` != ''  ORDER BY `pat_id` DESC";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetchAll();
?>
<div dir="<?php echo lang('rtl','ltr') ?>" class="container" style="    margin-top: 40px;         color: aliceblue;">
  <h2><?php echo lang('المرضى','patients') ?></h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th><?php echo lang('الرقم المتسلسل','serial number') ?></th>
        <th><?php echo lang('إسم المريض','Patient name') ?></th>
        <th><?php echo lang('تلفون المريض','patient phone') ?></th>
        <th><?php echo lang(' الفحص','examination') ?></th>
        <th><?php echo lang('المسجل','registrar') ?></th>
        <th><?php echo lang('الرسالة','message') ?></th>
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