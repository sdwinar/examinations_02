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
    <a href="reg_add_Patient.php">
        <button class="btn btn-success">
            <?php
            echo lang("إضافة مريض","Add Patient");
            ?>
            
    </button>
    </a>
</div>
    <div class="col-4">
    <a href="reg_examinations_reusalt2.php">
        <button class="btn btn-success">
        <?php
            echo lang(" نتائج الفحوصات","examinations results ");
            ?>
        </button>
    </a>
    </div>
    <div class="col-4">
    <a href="regwsrers.php">
        <!-- <button class="btn btn-success">المسجلين</button> -->
    </a>
    </div>
</div>
</div>