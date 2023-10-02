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
<body dir="<?php echo lang('rtl','ltr') ?>">

    

<?php
if(isset($_SESSION['user_type']) && $_SESSION['user_type']==2 ){
    

include "views/main/navbar.php";
include "views/regwsrer/regwsrers_index.php";
include "views/main/fotter.php";

}else{
    header('Location: adminlogin.php');
}
?>
</body>
</html>