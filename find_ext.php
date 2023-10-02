<?php

include "views/main/head.php";

if (isset($_POST['find_msg'])){

    $pat_id  = $_POST['pat_id'];
  

    $sql="SELECT * FROM `patients` WHERE  `pat_id` = '$pat_id'";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_info = $stmt_admin_info->fetch();
    $admin_count = $stmt_admin_info->rowCount();

}
 
 
  
?>
  <style>
body{
    background-image:url(img/3.jpg);
    /* background-position: center; */
    background-size: cover;
   

}
</style>

<body dir="<?php echo lang('rtl','ltr') ?>">
<?php
$this_index = '';
include "views/main/navbar.php";
?>
<div dir="<?php echo lang('rtl','ltr') ?>" class="container" >
    <div class="row">
</div>
        <div class="col-4"></div>
        <div class="col-4">
            <?php
            if($admin_count>0){ ?>
            <div class="rus" style="
                border: 1px solid #00ff89;
    padding: 6px;
    border-radius: 10px;
    position: relative;
    left: 23rem;
    color: aliceblue;
            ">
                <span><?php echo lang('الرقم المتسلسل','serial number') ?> :   </span>
                <span><?php echo  $admin_info['pat_id'] ?></span>
            </br></hr>
                <span><?php echo lang('إسم المريض','Patient name') ?>  :   </span>
                <span><?php echo  $admin_info['pat_name'] ?></span>
                </br></hr>

                               <span><?php echo lang(' الفحص','examination') ?>   :    </span>
                <span><?php echo  $admin_info['pat_exm'] ?></span>
                </br></hr>
                <span><?php echo lang(' النتيجة',' result') ?>  :   </span>
                <span><?php

                if($admin_info['doc_message']==""){
                    echo lang(' لم تظهر النتيجة',' The result did not appear') ;
                }else{
                    echo  $admin_info['doc_message'];
                }
                
               ?></span>
                </br></hr>

            </div>
        </div>
        <?php }else{ ?>
            <div class="alert alert-warning" style="
               position: relative;
    left: 23rem;
            ">  <?php echo lang(' هذا الرقم غير مسجل','This number is not registered') ?> </div>
            <?php } ?>
          

            </div>

            
        <div class="col-4"></div>
        <center>
        <a href="index.php" class="btn btn-info" style="    margin-right: 0rem;
    margin-top: 1rem;"><?php echo lang(' عودة',' back') ?></a>
        </center>
</div>
</div>


<?php
include "views/main/fotter.php"; 
?>

</body>
</html>