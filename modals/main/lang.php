<?php

// **********************************************lang****************************************************************
function lang($ar="ar", $en="en")
{
    $_SESSION['lang'] = "en";

 
   if(isset($_GET['lang'])){
    $userlang = $_GET['lang'];
    $_SESSION['lang'] = $userlang;

   }

    if ($_SESSION['lang'] == "ar") {
        $ret = $ar;

    } else {
        $ret =  $en;
    }
    return $ret;
}
?>