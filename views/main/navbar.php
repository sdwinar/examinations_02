<nav dir="<?php echo lang('rtl','ltr') ?>"
class="navbar navbar-expand-lg navbar-<?php

echo isset($pagename) && $pagename=="admin_login" ? "dark": "light";
?>
bg-<?php

echo isset($pagename) && $pagename=="admin_login" ? "dark": "light";
?>">
  <a class="navbar-brand" href="index.php"><?php echo lang('مختبر مستشفي الراقي','Al Raqi Hospital Laboratory') ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><?php echo lang('الرئسية','Home') ?> <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> -->
      <?php
      if(!isset($this_index)){
      if(isset($_SESSION['user_type']) && $_SESSION['user_type']==1 ){//للادمن فقط

      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="admin_index.php" role="button" data-toggle="dropdown" aria-expanded="false">
          <?php echo lang('لوحة التحكم','Dashbord') ?>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="doctors.php"><?php echo lang('الاطباء','doctors') ?></a>
          <a class="dropdown-item" href="examinations_index.php"> <?php echo lang(' الفحوصات','examinations') ?></a>
          <a class="dropdown-item" href="regwsrers.php"> <?php echo lang(' المسجلين','registereds') ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="admin_index.php">          <?php echo lang('لوحة التحكم','Dashbord') ?>
</a>
        </div>
      </li>
      <?php }else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==2 ){//للمسجلين فقط
      
      ?>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="regwsrers_index.php" role="button" data-toggle="dropdown" aria-expanded="false">
          <?php echo lang('لوحة المسجل','Dashbord') ?>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="reg_add_Patient.php"><?php echo lang('إضافة مريض','Add patient') ?></a>
          <a class="dropdown-item" href="reg_examinations_reusalt2.php"><?php echo lang('نتايج الفحوصات','examinations results') ?></a>

 
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="regwsrers_index.php">          <?php echo lang('لوحة المسجل','Dashbord') ?>
</a>
        </div>
      </li>

      <?php }else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==3 ){//للطبيب فقط
      
      ?>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="doctors_index.php" role="button" data-toggle="dropdown" aria-expanded="false">
          <?php echo lang('لوحة الطبيب','Dashbord') ?>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="doctors_new_pat.php"><?php echo lang('فحص جديد','New examination') ?></a>
          <a class="dropdown-item" href="reg_examinations_reusalt.php"><?php echo lang('نتايج الفحوصات','examinations results') ?></a>
 
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="doctors_index.php">          <?php echo lang('لوحة الطبيب','Dashbord') ?>
</a>
        </div>
      </li>

      <?php }
      }
      ?>
  
  
    </ul>
    <a href="logout.php"></a>
        <a href="?lang=<?php echo lang('en','ar') ?>">
      <button class="btn btn-outline-success my-2 my-sm-0" ><?php echo lang('english','عربي') ?></button>
      </a>
  </div>
</nav>