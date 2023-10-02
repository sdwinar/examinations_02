
<div class="container" dir="<?php echo lang('rtl','ltr') ?>" >
    <div class="row" dir="<?php echo lang('rtl','ltr') ?>">

    <div class="col-2">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
    style="
    position: relative;
    top: 8rem;
    padding-left: 2rem;
    text-align: center;
    ">

<?php echo lang('نتيجة فحص','Examination result') ?>
</button>
    <a style="color:black" href="adminlogin.php">        
    <button style="top: 143px;    position: relative;" class="btn btn-info">
           
            <?php echo lang(' تسجيل الدخول','sign in') ?>
        </button>
        </a>
        </div>
           <div class="col-8">
            <img class="indimg" src="img/ph1.png" alt="قد تكون صورة لشخص مريض">
        </div>
        <div class="col-2">
        <span class="maintitl">
        
        <?php echo lang('ابدا الاهتمام بصحتك','Start taking care of your health') ?>
    </span>
        </div>

    </div>

    <div class="row">

    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div dir="<?php echo lang('rtl','ltr') ?>" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
         
          <?php echo lang(' رقم المتسلسل','serial number') ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ************************************************************************************************* -->
        <form dir="rtl" method="post" action="find_ext.php">

  <div class="form-group">
    <label for="exampleinput requiredEmail1"><?php echo lang('ادخل الرقم المتسلسل','Enter the serial number') ?> </label>
    <input required type="number" name="pat_id" class="form-control" >
  </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          
          <?php echo lang('إغلاق','Close') ?>
        </button>
        <button type="submit" name="find_msg" class="btn btn-primary"><?php echo lang('بــحــث','search') ?></button>
      </div>
    </div>
  </div>
</div>
</form>