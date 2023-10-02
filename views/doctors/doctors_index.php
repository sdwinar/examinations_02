<span style="
color: aquamarine;
">
<?php echo lang('مرحباً','HELLO') ?> ... </br>
     <?php
    echo  $_SESSION['user_name'];
    ?>
</span>
<div class="container">
<div class="row" >
    <div class="col-4">
    <a href="doctors_new_pat.php">
        <button class="btn btn-success">
            <?php
            echo lang("فحص جديد","New examination");
            ?>
            
    </button>
    </a>
</div>
    <div class="col-4">
    <a href="reg_examinations_reusalt.php">
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