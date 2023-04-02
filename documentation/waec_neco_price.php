<?php

$getdiscount=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM waec_neco_price WHERE id='1'"));

$waec_price=$getdiscount['waec_price'];
$neco_price=$getdiscount['neco_price'];
$nabteb_price=$getdiscount['nabteb_price'];

?>