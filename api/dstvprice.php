<?php

$getTv=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM dstvprice WHERE id='1'"));

$dstv_yanga=$getTv['dstv_yanga'];
$dstv_confam=$getTv['dstv_confam'];
$dstv_padi_extra=$getTv['dstv_padi_extra'];
$dstv_yanga_extra=$getTv['dstv_yanga_extra'];
$dstv_asia=$getTv['dstv_asia'];
$dstv_confam_extra=$getTv['dstv_confam_extra'];
$dstv_compact=$getTv['dstv_compact'];
$dstv_compact_plus=$getTv['dstv_compact_plus'];
$dstv_premium=$getTv['dstv_premium'];
$dstv_premium_asia=$getTv['dstv_premium_asia'];

?>