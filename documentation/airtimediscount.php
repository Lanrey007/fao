<?php

$getairtime=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM airtimeprice WHERE id='1'"));
$mtn_discount=$getairtime['mtndiscount'];
$glo_discount=$getairtime['glodiscount'];
$airtel_discount=$getairtime['airteldiscount'];
$mobile_discount=$getairtime['mobilediscount'];

?>