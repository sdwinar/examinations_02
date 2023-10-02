<span style="
color: aquamarine;
">
     
    <?php echo lang('مرحباً','HELLO') ?>
    ... </br>
     <?php
    echo  $_SESSION['user_name'];
    ?>
</span>
<div class="container">
<div class="row" >
    <div class="col-4">
    <a href="doctors.php">
        <button class="btn btn-success"><?php echo lang('الاطباء','doctors') ?> </button>
    </a>
</div>
    <div class="col-4">
    <a href="examinations_index.php">
        <button class="btn btn-success"><?php echo lang(' الفحوصات','examinations') ?></button>
    </a>
    </div>
    <div class="col-4">
    <a href="regwsrers.php">
        <button class="btn btn-success"><?php echo lang(' المسجلين','registereds') ?></button>
    </a>
    </div>
</div>
</div>