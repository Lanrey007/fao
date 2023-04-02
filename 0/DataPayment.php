<?php
require("session.php");

if (!isset($_POST['network']) && !isset($_POST['mobile']) && !isset($_POST['plan']) && $_SESSION['sid']!=$dbsid){

 header("location:home");
 exit();
}

else {
    
$network=$_POST['network'];
$mobile=$_POST['mobile'];
$plans=$_POST['plan'];
$string=base64_encode("olay:olek3");

if ($network=="MTN"){

  require("$mtnswitch");
}

if ($network=="GLO"){

  require("$gloswitch");
}

if ($network=="AIRTEL"){

  require("$airtelswitch");
}

if ($network=="9MOBILE"){

  require("$mobileswitch");
}

if ($network=="AIRTEL_CG"){

  require("$airtelcgswitch");
}


if ($network=="GIFTING"){

 // require("buy_gift3.php");
   require("$gifting_switch");
}


}



    
?>