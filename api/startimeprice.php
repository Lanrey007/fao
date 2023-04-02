<?php

$getTv=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM startimeprice WHERE id='1'"));

$nova_week=$getTv['nova_week'];
$nova_month=$getTv['nova_month'];
$basic_week=$getTv['basic_week'];
$basic_month=$getTv['basic_month'];
$smart_week=$getTv['smart_week'];
$smart_month=$getTv['smart_month'];
$classic_week=$getTv['classic_week'];
$classic_month=$getTv['classic_month'];
$super_week=$getTv['super_week'];
$super_month=$getTv['super_month'];

?>